<?php

namespace App\Http\Controllers;

use App\Models\Rma;
use App\Models\Order;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\RmaReportExport;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Bundle;
use App\Models\Product;
use App\Models\Coupon;
use App\Models\RmaLine;
use App\Models\RmaStatus;
use App\Models\BundleLine;

class RmaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        // $rmas = Rma::with('user', 'order', 'product')->latest()->paginate(50);
        $query = Rma::with('user', 'order', 'product')->latest();

        if ($request->has('order_id') && !empty($request->order_id)) {
            $query->where('order_id', $request->order_id);
        }

        // Filter by Contact Number
        if ($request->has('contact_number') && !empty($request->contact_number)) {
            $query->whereHas('order', function ($q) use ($request) {
                $q->where('phone', 'like', '%' . $request->contact_number . '%');
            });
        }

        if ($request->has('start_date') && !empty($request->start_date)) {
            $query->whereDate('created_at', '>=', $request->start_date);
        }

        // Filter by End Date
        if ($request->has('end_date') && !empty($request->end_date)) {
            $query->whereDate('created_at', '<=', $request->end_date);
        }

        // if ($request->has('sort_by')) {
        //     $sortColumn = $request->sort_by; 
        //     $sortDirection = $request->sort_direction ?? 'asc'; 


        //     if (in_array($sortColumn, ['order_id'])) {
        //         $query->orderBy($sortColumn, $sortDirection);
        //     }

        //     if ($request->sort_by === 'total_spend') {
        //         $query->orderBy(
        //             Order::selectRaw('total_price + delivery_charge')
        //                 ->whereColumn('orders.order_id', 'rmas.order_id'),
        //             $sortDirection
        //         );
        //     }
        // }
        $rmas = $query->paginate(50);
        $totalSpend = 0;
        $totalPriceSum = 0;

        foreach ($rmas as $item) {
            if ($item->order) {
                $totalSpend += $item->order->total_price + $item->order->delivery_charge;
                $totalPriceSum += $item->order->total_price;
            }
        }
        $totalOrders = Rma::count();
        $avgCostPerSale = $totalOrders > 0 ? $totalPriceSum / $totalOrders : 0;
        return view('rma.index', compact('rmas', 'totalOrders', 'totalSpend', 'avgCostPerSale'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rma = Rma::with(['user', 'order', 'product'])->findOrFail($id);
        // dd($rma);
        return view('rma.show', compact('rma'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function reportExport(Request $request)
    {
        $ids = $request->ids;
        //return Excel::download(new ReportExport($ids), 'reports-' . now()->toDateTimeString() . '.xlsx');
        return Excel::download(new RmaReportExport($ids), 'orders-' . now()->toDateTimeString() . '.xlsx');
    }
    public function edit(Rma $rma)
    {
        $rma->load(['user', 'product', 'order']);
        // $rma_linesp->load(['user', 'product', 'order']);
        $rma_linesp = DB::table('rma_lines')
            ->join('products', 'rma_lines.product_id', '=', 'products.id')
            ->select('rma_lines.*', 'products.image', 'products.sku', 'products.name as pname')->where('rma_lines.rma_id', $rma->id)->get();
        $rma_linesb = DB::table('rma_lines')
            ->join('bundles', 'rma_lines.bundle_id', '=', 'bundles.id')
            ->select('rma_lines.*', 'bundles.image', 'bundles.sku', 'bundles.name as bname')
            ->where('rma_lines.rma_id', $rma->id)
            ->get();
        $products = Product::orderBy('name', 'DESC')->get();
        $bundles = Bundle::orderBy('name', 'DESC')->get();
        $coupons = Coupon::where('is_active', 1)->get();
        $previous = Rma::where('phone', $rma->phone)->where('order_id', '!=', $rma->order_id)->latest()->get();

        return view('rma.edit', compact('products', 'bundles', 'rma', 'rma_linesp', 'rma_linesb', 'previous', 'coupons'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rma $rma)
    {
        // $input = $request->validate([
        //     'rma_id' => 'required',
        //     'order_id' => 'required',
        //     'phone' => 'required',
        //     'email' => '',
        //     'city' => 'required',
        //     'address' => 'required',
        //     'comment' => '',
        // ]);

        $inputs = $request->all();

        // dd($request->all());
        // $rmaNo = $request->rma_id;
        $validStatuses = ["RMA", "INVOICE PRINTED", "PACKED", "ASSIGNED TO RIDER", "PICKEDUP", "DELIVERED"];

        // Retrieve the RMA record
        // $rma = Rma::where('id', $rmaNo)->first();

        // dd($rma);

        DB::beginTransaction();

        if ($rma->status === "RMA" && in_array($request->status, $validStatuses)) {
            if (empty($request->email)) {
                $request['email'] = $request['phone'] . '@gmail.com';
            }

            $rma->update([
                'status' => $request->status,
                'comment' => $request->comment,
            ]);

            // Log the RMA status change
            RmaStatus::create([
                'rma_id' => $rma->id,
                'status' => $request->status,
                'changed_by' => auth()->user()->name,
                'user_id' => auth()->user()->id,
            ]);

            // dd($request->all());

            $tQty = $rma->total_qty ?? 0;
            $tPrice = $rma->total_price ?? 0.00;
            $totalVat = $rma->total_vat ?? 0.00;

            if ($request->RmaLine != "") {

                // dd($request->RmaLine);
                $k = 0;
                foreach ($request->RmaLine as $item) {
                    if ($item['quantity'] > 0) {
                        if (isset($item['product_id'])) {
                            $product = Product::find($item['product_id']);

                            $rmaLineArray[$k]['bundle_id'] = null;
                            $rmaLineArray[$k]['product_id'] = $item['product_id'];
                            $rmaLineArray[$k]['delivery_charge'] = $product['delivery_charge'];
                            $rmaLineArray[$k]['name'] = $product['name'];
                            Product::where('id', $item['product_id'])->increment('stock', $item['quantity']);

                            // dd($rmaLineArray);

                        } else {
                            $product = Bundle::find($item['bundle_id']);
                            $rmaLineArray[$k]['product_id'] = null;
                            $rmaLineArray[$k]['bundle_id'] = $item['bundle_id'];
                            $rmaLineArray[$k]['delivery_charge'] = $product['delivery_charge'];
                            $rmaLineArray[$k]['name'] = $product['name'];
                            $bundleLines = BundleLine::where('bundle_id', $item['bundle_id'])->get();
                            foreach ($bundleLines as $line) {
                                Product::where('id', $line['product_id'])->increment('stock', $item['quantity'] * $line['quantity']);
                            }
                        }

                        $rmaLineArray[$k]['price'] = $item['price'];
                        $rmaLineArray[$k]['quantity'] = $item['quantity'];
                        $rmaLineArray[$k]['sub_price'] = $item['sub_price'];
                        $rmaLineArray[$k]['rma_id'] = $rma->id;
                        $rmaLineArray[$k]['combination_id'] = null;

                        // Calculate VAT
                        if ($product->is_vat == 1) {
                            $rmaLineArray[$k]['vat'] = ($rmaLineArray[$k]['sub_price'] * 0.05);
                            $totalVat = $totalVat + $rmaLineArray[$k]['vat'];
                            $rmaLineArray[$k]['sub_price'] = $rmaLineArray[$k]['sub_price'] + $rmaLineArray[$k]['vat'];
                        } else {
                            $rmaLineArray[$k]['vat'] = 0;
                        }

                        // Update delivery charge and prices
                        if ($product->delivery_charge > 0) {
                            $tPrice = $tPrice + $rmaLineArray[$k]['sub_price'];
                        }

                        $tQty = $tQty + $item['quantity'];
                        $k++;
                    }
                }

                // dd($rmaLineArray);

                // Insert RMA line items
                try {
                    foreach ($rmaLineArray as $key => $rmaLine) {
                        RmaLine::updateOrCreate([
                            'rma_id' => $rma->id,
                            'product_id' => $rmaLine['product_id'],
                            'bundle_id' => $rmaLine['bundle_id'],
                        ], $rmaLine);
                    }
                    // RmaLine::insert($rmaLineArray);
                } catch (\Exception $e) {
                    DB::rollback();
                    throw $e;
                }

                // Calculate the updated total price
                $data['total_qty'] = $tQty;
                $data['total_price'] = $tPrice;
                $data['total_vat'] = $totalVat;

                // Check for any applied coupon
                $code = $request->coupon_code;
                $CouponData = Coupon::where('code', $code)->where('is_active', 1)->first();

                if (isset($CouponData)) {
                    $created_at = $CouponData->created_at;
                    $formatted_date = $created_at->format('Y-m-d H:i:s');
                    $expiration_time = date("Y-m-d H:i:s", strtotime($formatted_date) + (5 * 60)); // Expiry after 5 minutes
                    $current_time = date("Y-m-d H:i:s");

                    if ($current_time < $expiration_time) {
                        // Apply coupon discount
                        $data['total_price'] = $data['total_price'] - $request['coupon_price'];
                        $data['coupon_code'] = $request->coupon_code;
                        $data['coupon_price'] = $request->coupon_price;
                        $data['coupon_id'] = $request->coupon_id;
                        $data['comment'] = $request->comment ?? $rma->comment;
                        // $data['name'] = 'Demo';
                        $ddata['is_active'] = 0;

                        $rma->update($data);
                        Coupon::where('code', $data['coupon_code'])->update($ddata);
                    }
                }

                try {
                    $data['total_price'] = round($data['total_price'] * 2) / 2;
                    $data['product_id'] = $rmaLineArray[0]['product_id'];

                    $rma->update($data);
                } catch (\Exception $e) {
                    DB::rollback();
                    throw $e;
                }
            } else {
                // If no RMA line items are provided
                return redirect()->back()->with('error', 'RMA Line items are required.');
            }
        } else {
            // If RMA status is not allowed to update
            return redirect()->back()->with('error', 'RMA status cannot be updated.');
            DB::rollback();
        }

        DB::commit();
        return redirect()->route('rma.index')
            ->withSuccess(__('RMA updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function exportRmaPdf(Request $request)
    {
        $order_id_arr = explode(",", $request->ids);

        // Subquery for product and bundle names
        $subquery = DB::table('rma_lines')
            ->leftJoin('products', 'rma_lines.product_id', '=', 'products.id')
            ->leftJoin('bundles', 'rma_lines.bundle_id', '=', 'bundles.id')
            ->select(
                'rma_lines.rma_id',
                DB::raw("GROUP_CONCAT(IFNULL(products.name, bundles.name) SEPARATOR '|') AS product_names")
            )
            ->groupBy('rma_lines.rma_id');

        // Fetch RMA details with product name
        $rmas = DB::table('rmas')
            ->join('orders', 'rmas.order_id', '=', 'orders.order_id')
            ->leftJoinSub($subquery, 'rma_lines', function ($join) {
                $join->on('rmas.id', '=', 'rma_lines.rma_id');
            })
            ->leftJoin('products', 'rmas.product_id', '=', 'products.id') // Fetch product name directly
            ->select(
                'orders.order_id',
                'orders.name',
                'orders.areacode',
                'orders.phone',
                'orders.email',
                'orders.city',
                'orders.address',
                'orders.total_qty',
                'orders.delivery_charge',
                'orders.total_price',
                'orders.comment',
                'orders.created_at',
                'orders.delivery_boy_id',
                'rma_lines.product_names',
                'rmas.id',
                'rmas.comment',
                'rmas.status as rma_status',
                'products.name as product_name' // Get product name
            )
            ->whereIn('orders.order_id', $order_id_arr)
            ->orderBy('orders.order_id')
            ->get();

        // Fetch driver information
        $drivers = [];

        if ($rmas->count() > 0) {
            foreach ($rmas as $rma) {
                $driver = DB::table('model_has_roles')
                    ->join('users', 'users.id', '=', 'model_has_roles.model_id')
                    ->join('roles', 'roles.id', '=', 'model_has_roles.role_id')
                    ->select('users.*')
                    ->where('roles.name', 'Driver')
                    ->where('users.id', $rma->delivery_boy_id)
                    ->first();

                $drivers[$rma->order_id] = $driver;
            }
        }

        // Generate PDF with rmas and driver details
        $pdf = Pdf::loadView('rma.pdf', ['rmas' => $rmas, 'drivers' => $drivers])
            ->setPaper('a4', 'portrait');

        return $pdf->download('rmas_orders.pdf');
    }
    public function destroy($id)
    {
        //
    }
    public function deleteCartItems($cart_item_id, $order_id)
    {
        RmaLine::where('id', $cart_item_id)->delete();
        $total_price = 0;
        $delCharge = 0;
        $total_vat = 0;
        $total_qty = 0;
        $order = Rma::find($order_id);
        $orderItems = RmaLine::where('rma_id', $order->id)->get();
        foreach ($orderItems as $item) {
            if ($item->delivery_charge > 0) {
                if ($delCharge > 0) {
                    if ($delCharge > $item->delivery_charge) {
                        $delCharge =  $item->delivery_charge;
                    }
                } else {
                    $delCharge =  $item->delivery_charge;
                }
            } else {
                $delCharge = 0;
            }
            $total_price = $total_price + $item->sub_price;
            $total_vat = $total_vat + $item->vat;
            $total_qty = $total_qty + $item->quantity;
        }
        $data['delivery_charge'] = $delCharge;
        $data['total_price'] = $total_price + $data['delivery_charge'];
        $data['total_qty'] = $total_qty;
        $data['total_vat'] = $total_vat;
        if ($order->coupon_id == 1) {
            $data['total_price'] =  $data['total_price'] - $order->coupon_price;
        }
        $data['total_price'] = number_format($data['total_price'], 3);
        $order->update($data);
        return redirect()->route('rma.edit', $order_id)
            ->withSuccess(__('order item successfully.'));
    }
}
