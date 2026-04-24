<?php

namespace App\Http\Controllers;

use App\Events\StatusChange;
use App\Exports\ImpressExport;
use App\Exports\CamelExport;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\OrdersExport;
use App\Exports\ReportExport;
use App\Exports\ProductStateExport;
use App\Imports\OrdersImport;
use App\Imports\ImileImport;
use App\Imports\impressImport;
use App\Imports\CamelImport;
use App\Imports\JtImport;
use App\Imports\pandaImport;
use App\Mail\EmailOrder;
use App\Mail\EmailStatus;
use App\Models\Bundle;
use App\Models\BundleLine;
use App\Models\CartItem;
use App\Models\Coupon;
use App\Models\Missing;
use App\Models\Order;
use App\Models\OrderLine;
use App\Models\OrderStatus;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\Console\Input\Input;

class OrdersController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:order-list|order-create|order-edit|order-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:order-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:order-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:order-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $drivers = DB::table('model_has_roles')
            ->join('users', 'users.id', '=', 'model_has_roles.model_id', 'left')
            ->join('roles', 'roles.id', '=', 'model_has_roles.role_id', 'left')
            ->select('users.*')
            ->whereNull('deleted_at')
            ->where('roles.name', 'Driver')
            ->get();
        $users = DB::table('model_has_roles')
            ->join('users', 'users.id', '=', 'model_has_roles.model_id', 'left')
            ->join('roles', 'roles.id', '=', 'model_has_roles.role_id', 'left')
            ->select('users.*')
            ->whereNull('deleted_at')
            // ->where('roles.name', 'Driver')
            ->get();
        $Orders = Order::latest()->paginate(50);
        $input = array();
        return view('orders.index', compact('Orders', 'drivers', 'users', 'input'));
    }

    public function unPage(Request $request)
    {
        $todayDate = Carbon::now()->format('Y-m-d');
        $from_date = $request->from_date ? $request->from_date : null;
        $to_date = $request->to_date ? $request->to_date : null;
        $status = $request->status ? $request->status : null;
        $dateType = $request->date_type ? $request->date_type : 'created_at';


        $drivers = DB::table('model_has_roles')
            ->join('users', 'users.id', '=', 'model_has_roles.model_id', 'left')
            ->join('roles', 'roles.id', '=', 'model_has_roles.role_id', 'left')
            ->select('users.*')
            ->where('roles.name', 'Driver')
            ->get();
        //$Orders = Order::latest()->get()->paginate(1000);
        $query = DB::table('orders');


        if ($from_date && $to_date) {
            $query->whereBetween($dateType, [$from_date, $to_date]);
        } else if ($from_date) {
            $query->where($dateType, '>=', $from_date);
        } else if ($to_date) {
            $query->where($dateType, '<=', $to_date);
        }
        if ($request->order_ids) {

            $orderIds = explode(',', $request->order_ids);

            $query->whereIn('order_id', $orderIds);
        }
        if ($request->order_id) {
            $query->where('order_id', 'like', "%$request->order_id%");
        }
        if ($request->name) {
            $query->where('name', 'like', "%$request->name%");
        }
        if ($request->phone) {
            $query->where('phone', 'like', "%$request->phone%");
        }
        if ($request->order_by) {
            $query->where('created_user_id', $request->order_by);
        }
        if ($request->city) {
            $query->where('city', $request->city);
        }
        if ($request->driver) {
            $query->where('delivery_boy_id', $request->driver);
        }
        if ($status) {
            $query->where('status', $status);
        }

        $query->orderBy($dateType, 'desc');
        // dd($query->get());
        $tempQ = $query->take(100)->get();
        // dd($tempQ);
        return $tempQ;
    }
    public function filter(Request $request)
    {

        $todayDate = Carbon::now()->format('Y-m-d');
        $from_date = $request->from_date ? $request->from_date : null;
        $to_date = $request->to_date ? $request->to_date : null;
        $status = $request->status ? $request->status : null;
        $dateType = $request->date_type ? $request->date_type : 'created_at';


        $drivers = DB::table('model_has_roles')
            ->join('users', 'users.id', '=', 'model_has_roles.model_id', 'left')
            ->join('roles', 'roles.id', '=', 'model_has_roles.role_id', 'left')
            ->select('users.*')
            ->where('roles.name', 'Driver')
            ->get();
        //$Orders = Order::latest()->get()->paginate(1000);
        $query = DB::table('orders');
        if ($from_date && $to_date) {
            $query->whereBetween(DB::raw('DATE(' . $dateType . ')'), [$from_date, $to_date]);
        } else if ($from_date) {
            $query->where(DB::raw('DATE(' . $dateType . ')'), '>=', $from_date);
        } else if ($to_date) {
            $query->where(DB::raw('DATE(' . $dateType . ')'), '<=', $to_date);
        }
        if ($request->order_id) {
            $query->where('order_id', 'like', "%$request->order_id%");
        }
        if ($request->order_ids) {

            $orderIds = explode(',', $request->order_ids);

            $query->whereIn('orders.order_id', $orderIds);
        }
        if ($request->name) {
            $query->where('name', 'like', "%$request->name%");
        }
        if ($request->phone) {
            $query->where('phone', 'like', "%$request->phone%");
        }
        if ($request->order_by) {
            if ($request->order_by == 51) {
                $query->where('created_by', 'Online Order');
            } else {
                $query->where('created_user_id', $request->order_by);
            }
        }
        if ($request->city) {
            $query->where('city', $request->city);
        }
        if ($request->driver) {
            $query->where('delivery_boy_id', $request->driver);
        }
        if ($request->is_rto) {
            $query->where('rto', $request->is_rto);
        }
        if ($status) {
            $query->where('status', $status);
        }

        $query->orderBy('id', 'desc');


        // dd(1);
        $tempQ = $this->unPage($request);

        // dd(2);
        $Orders = $query->paginate(100)->appends(request()->except('page'));

        // $Orders->get();
        // dd($Orders);
        // die();
        $users = DB::table('model_has_roles')
            ->join('users', 'users.id', '=', 'model_has_roles.model_id', 'left')
            ->join('roles', 'roles.id', '=', 'model_has_roles.role_id', 'left')
            ->select('users.*')
            // ->where('roles.name', 'Driver')
            ->get();
        $order_ids = array();
        $order_ids1 = array();
        if (count($Orders) > 0) {
            foreach ($Orders as $item) {
                array_push($order_ids, $item->order_id);
            }
            session()->put('order_ids', $order_ids);
            foreach ($tempQ as $item1) {
                array_push($order_ids1, $item1->order_id);
            }
            session()->put('filter_ids', $order_ids1);
        }
        //session()->put('ordersExport', $ordersExport);
        //$Orders = Order::whereBetween($dateType, [$from_date, $to_date])->whereIn('status', $status)->get()->paginate(1000);
        //return redirect()->route('orders.index',compact('Orders','drivers'));
        return view('orders.index', compact('Orders', 'drivers', 'users'))->with('input', $request->all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::orderBy('name', 'DESC')->get();
        $bundles = Bundle::orderBy('name', 'DESC')->get();
        $coupons = Coupon::where('is_active', 1)->get();
        return view('orders.create', compact('products', 'bundles', 'coupons'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // DB::transaction(function () {
        $input = $request->validate([
            'name' => 'required',
            'order_id' => '',
            'phone' => 'required',
            'areacode' => '',
            'email' => '',
            'city' => 'required',
            'address' => 'required',
            'comment' => '',
        ]);

        $latestOrder = Order::latest()->first();
        $orderId = $latestOrder->id + 1;
        // $orderId = DB::select("SHOW TABLE STATUS LIKE 'orders'")[0]->Auto_increment;

        DB::beginTransaction();
        // if (isset($latestOrder)) {
        //     $orderId = DB::table('INFORMATION_SCHEMA.TABLES')
        //         ->where('table_name', '=', 'orders')
        //         ->where('table_schema', '=', DB::getDatabaseName())
        //         ->value('AUTO_INCREMENT');
        // } else {
        //     $orderId = 1;
        // }
        if ($request->confirmed != null) {
            $status = 'ORDER CONFIRMED';
        } else {
            $status = 'ORDER PLACED';
        }
        //dd($request->is_coupon_applied);
        $input['order_id'] = "UAE1000" . $orderId;
        $input['total_qty'] = 0;
        $input['delivery_charge'] = 0;
        $input['total_price'] = 0;
        $input['status'] = $status;
        $input['created_at'] = now();
        $input['updated_at'] = now();
        $input['created_by'] = auth()->user()->name;
        $input['created_user_id'] = auth()->user()->id;
        if ($request->email == "") {
            $input['email'] = $input['phone'] . '@gmail.com';
        }
        $orderNo = $input['order_id'];

        try {
            $order = Order::create($input);
        } catch (\Exception $e) {
            DB::rollback();
            //return redirect()->back()->with('error', 'Order is not created');
            throw $e;
        }

        OrderStatus::create([
            'order_id' => $orderNo,
            'status' => $status,
            'changed_by' =>  auth()->user()->name,
            'user_id' => auth()->user()->id
        ]);
        $tQty = 0;
        $tPrice = 0;
        $totalVat = 0;
        $delCharge = 0;
        $del = false;
        if ($request->orderline != "") {
            $k = 0;
            foreach ($request->orderline as $item) {
                if ($item['quantity'] > 0) {
                    if (isset($item['product_id'])) {
                        $product = Product::find($item['product_id']);
                        $orderlineArray[$k]['bundle_id'] = null;
                        $orderlineArray[$k]['product_id'] = $item['product_id'];
                        $orderlineArray[$k]['delivery_charge'] = $product['delivery_charge'];
                        Product::where('id', $item['product_id'])->decrement('stock', $item['quantity']);
                    } else {
                        $product = Bundle::find($item['bundle_id']);
                        $orderlineArray[$k]['product_id'] = null;
                        $orderlineArray[$k]['bundle_id'] = $item['bundle_id'];
                        $orderlineArray[$k]['delivery_charge'] = $product['delivery_charge'];
                        $bundleLines = BundleLine::where('bundle_id', $item['bundle_id'])->get();
                        foreach ($bundleLines as $line) {
                            Product::where('id', $line['product_id'])->decrement('stock', $item['quantity'] * $line['quantity']);
                        }
                    }
                    $orderlineArray[$k]['price'] = $item['price'];
                    $orderlineArray[$k]['quantity'] = $item['quantity'];
                    $orderlineArray[$k]['sub_price'] = $item['sub_price'];
                    $orderlineArray[$k]['name'] = $item['name'];
                    $orderlineArray[$k]['order_id'] = $orderNo;
                    $orderlineArray[$k]['created_at'] = now();
                    $orderlineArray[$k]['updated_at'] = now();
                    $orderlineArray[$k]['combination_id'] = null;
                    if ($product->is_vat == 1) {
                        $orderlineArray[$k]['vat'] =  ($orderlineArray[$k]['sub_price'] * 0.05);
                        $totalVat =  $totalVat +  $orderlineArray[$k]['vat'];
                        $orderlineArray[$k]['sub_price'] =  $orderlineArray[$k]['sub_price'] + $orderlineArray[$k]['vat'];
                    } else {
                        $orderlineArray[$k]['vat'] =  0;
                    }

                    if ($product->delivery_charge > 0) {
                        if ($k != 0) {
                            if ($delCharge > 0) {
                                if ($delCharge > $product->delivery_charge) {
                                    $delCharge =  $product->delivery_charge;
                                }
                            } else {
                                $delCharge =  $product->delivery_charge;
                            }
                        } else {
                            $delCharge =  $product->delivery_charge;
                        }
                    } else {
                        $del = true;
                        $delCharge = 0;
                    }

                    $tQty = $tQty + $item['quantity'];
                    $tPrice = $tPrice + $orderlineArray[$k]['sub_price'];
                    $k++;
                }
            }
            //// print_r($orderlineArray);
            // die();
            try {
                $orderline = OrderLine::insert($orderlineArray);
            } catch (\Exception $e) {
                DB::rollback();
                //return redirect()->back()->with('error', 'Order line is not created');
                throw $e;
            }
            $data['total_qty'] = $tQty;
            if ($del == true) {
                $data['delivery_charge'] = 0;
            } else {
                $data['delivery_charge'] = $delCharge;
            }
            $delVat = ($data['delivery_charge'] * 0.05);
            $data['total_vat'] = $totalVat + $delVat;
            $data['total_price'] = $tPrice + $data['delivery_charge'] + $delVat;

            if ($request->is_coupon_applied) {
                $code = $request->coupon_code;
                $CouponData = Coupon::where('code', $code)->where('is_active', 1)->first();
                $created_at = $CouponData->created_at;
                $formatted_date = $created_at->format('Y-m-d H:i:s');
                if (isset($CouponData)) {
                    $expiration_time = date("Y-m-d H:i:s", strtotime($formatted_date) + (5 * 60)); // Calculate the expiration time (5 minutes from created_at)
                    $current_time = date("Y-m-d H:i:s"); // Get the current time
                    if ($current_time <= $expiration_time) {
                        $data['coupon_code'] = $request->coupon_code;
                        $data['coupon_price'] = $request->coupon_price;
                        $data['coupon_id'] = $request->coupon_id;
                        $data['total_price'] = $data['total_price'] - $data['coupon_price'];
                        $CouponData->is_active = 0;
                        $CouponData->save();
                    }
                }
            }
            try {
                $data['total_price'] = round($data['total_price'] * 2) / 2;
                Order::where('order_id', $orderNo)->update($data);
            } catch (\Exception $e) {
                DB::rollback();
                throw $e;
            }
        } else {
            DB::rollback();
            return redirect()->back()->with('error', 'Product is missing');
        }

        DB::commit();
        // });

        return redirect()->route('orders.index')
            ->withSuccess(__('order created successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(order $order)
    {
        // $products = OrderLine::where('order_id', $order['order_id'])->get();
        $products = DB::table('order_lines')
            ->join('products', 'order_lines.product_id', '=', 'products.id')
            ->select('order_lines.*', 'products.image', 'products.name as pname')
            ->where('order_lines.order_id', $order->order_id)
            // ->where('order_lines.product_id', '')
            //->where('order_lines.bundle_id', '')
            ->get();

        $bundles = DB::table('order_lines')
            ->join('bundles', 'order_lines.bundle_id', '=', 'bundles.id')
            ->select('order_lines.*', 'bundles.image', 'bundles.name as bname')
            ->where('order_lines.order_id', $order->order_id)
            // ->where('order_lines.product_id', '')
            // ->where('order_lines.bundle_id', '')
            ->get();

        ///       get user type    /////
        $roles = DB::table('model_has_roles')
            ->join('users', 'users.id', '=', 'model_has_roles.model_id', 'left')
            ->join('roles', 'roles.id', '=', 'model_has_roles.role_id', 'left')
            ->select('roles.*')
            ->where('users.id', auth()->user()->id)
            ->get();
        $filtered = $roles->filter(function ($item) {
            return $item->name === 'CRM';
        });
        if (count($filtered) > 0) {
            $is_crm = true;
        } else {
            $is_crm = false;
        }



        /////////////////////
        $history = OrderStatus::where('order_id', $order->order_id)->get();
        $previous = Order::where('phone', $order->phone)->where('order_id', '!=', $order->order_id)->latest()->get();
        return view('orders.show', [
            'order' => $order,
            'products' => $products,
            'bundles' => $bundles,
            'history' => $history,
            'previous' => $previous,
            'is_crm' => $is_crm
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(order $order)
    {
        $order_linesp = DB::table('order_lines')
            ->join('products', 'order_lines.product_id', '=', 'products.id')
            ->select('order_lines.*', 'products.image', 'products.sku', 'products.name as pname')->where('order_lines.order_id', $order->order_id)->get();
        $order_linesb = DB::table('order_lines')
            ->join('bundles', 'order_lines.bundle_id', '=', 'bundles.id')
            ->select('order_lines.*', 'bundles.image', 'bundles.sku', 'bundles.name as bname')
            ->where('order_lines.order_id', $order->order_id)
            ->get();
        $products = Product::orderBy('name', 'DESC')->get();
        $bundles = Bundle::orderBy('name', 'DESC')->get();
        $coupons = Coupon::where('is_active', 1)->get();
        $previous = Order::where('phone', $order->phone)->where('order_id', '!=', $order->order_id)->latest()->get();
        return view('orders.edit', compact('products', 'bundles', 'order', 'order_linesp', 'order_linesb', 'previous', 'coupons'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update() {}
    public function updateData(Request $request)
    {
        $input = $request->validate([
            'name' => 'required',
            'order_id' => 'required',
            'phone' => 'required',
            'areacode' => '',
            'email' => '',
            'city' => 'required',
            'address' => 'required',
            'comment' => '',
        ]);
        $orderNo = $request->order_id;
        $sts = array("ORDER PLACED", "TO BE CONFORMED", "ORDER CONFIRMED");
        $order = Order::where('order_id', $orderNo)->first();
        DB::beginTransaction();
        if (in_array($order->status, $sts)) {
            $input['status'] = 'ORDER CONFIRMED';
            if ($request->email == "") {
                $input['email'] = $input['phone'] . '@gmail.com';
            }
            try {
                $order->update($input);
            } catch (\Exception $e) {
                DB::rollback();
                //return redirect()->back()->with('error', 'Order is not created');
                throw $e;
            }

            OrderStatus::create([
                'order_id' => $orderNo,
                'status' => 'ORDER EDITED',
                'changed_by' =>  auth()->user()->name,
                'user_id' => auth()->user()->id
            ]);
            $tQty = $order->total_qty;
            $tPrice = $order->total_price - $order->delivery_charge - ($order->delivery_charge * 0.05);
            $totalVat = $order->total_vat - ($order->delivery_charge * 0.05);
            $delCharge = $order->delivery_charge;
            if ($delCharge > 0) {
                $del = false;
            } else {
                if ($tQty > 0) {
                    $del = true;
                } else {
                    $del = false;
                }
            }
            if ($request->orderline != "") {
                $k = 0;
                foreach ($request->orderline as $item) {
                    if ($item['quantity'] > 0) {
                        if (isset($item['product_id'])) {
                            $product = Product::find($item['product_id']);
                            $orderlineArray[$k]['bundle_id'] = null;
                            $orderlineArray[$k]['product_id'] = $item['product_id'];
                            $orderlineArray[$k]['delivery_charge'] = $product['delivery_charge'];
                            Product::where('id', $item['product_id'])->decrement('stock', $item['quantity']);
                        } else {
                            $product = Bundle::find($item['bundle_id']);
                            $orderlineArray[$k]['product_id'] = null;
                            $orderlineArray[$k]['bundle_id'] = $item['bundle_id'];
                            $orderlineArray[$k]['delivery_charge'] = $product['delivery_charge'];
                            $bundleLines = BundleLine::where('bundle_id', $item['bundle_id'])->get();
                            foreach ($bundleLines as $line) {
                                Product::where('id', $line['product_id'])->decrement('stock', $item['quantity'] * $line['quantity']);
                            }
                        }
                        $orderlineArray[$k]['price'] = $item['price'];
                        $orderlineArray[$k]['quantity'] = $item['quantity'];
                        $orderlineArray[$k]['sub_price'] = $item['sub_price'];
                        $orderlineArray[$k]['name'] = $item['name'];
                        $orderlineArray[$k]['order_id'] = $orderNo;
                        $orderlineArray[$k]['combination_id'] = null;
                        if ($product->is_vat == 1) {
                            $orderlineArray[$k]['vat'] =  ($orderlineArray[$k]['sub_price'] * 0.05);
                            $totalVat =  $totalVat +  $orderlineArray[$k]['vat'];
                            $orderlineArray[$k]['sub_price'] =  $orderlineArray[$k]['sub_price'] + $orderlineArray[$k]['vat'];
                        } else {
                            $orderlineArray[$k]['vat'] =  0;
                        }
                        if ($product->delivery_charge > 0) {
                            if ($delCharge > 0) {
                                if ($delCharge > $product->delivery_charge) {
                                    $delCharge =  $product->delivery_charge;
                                }
                            } else {
                                $delCharge =  $product->delivery_charge;
                            }
                        } else {
                            $del = true;
                            $delCharge = 0;
                        }

                        $tQty = $tQty + $item['quantity'];
                        $tPrice = $tPrice + $orderlineArray[$k]['sub_price'];
                        $k++;
                    }
                }
                try {
                    $orderline = OrderLine::insert($orderlineArray);
                } catch (\Exception $e) {
                    DB::rollback();
                    //return redirect()->back()->with('error', 'Order line is not created');
                    throw $e;
                }
                $data['total_qty'] = $tQty;
                if ($del == true) {
                    $data['delivery_charge'] = 0;
                } else {
                    $data['delivery_charge'] = $delCharge;
                }
                //dd($tPrice);
                $delVat = ($data['delivery_charge'] * 0.05);
                $data['total_price'] = $tPrice + $data['delivery_charge'] + $delVat;
                $data['total_vat'] = $totalVat + $delVat;
                $code = $request->coupon_code;
                $CouponData = Coupon::where('code', $code)->where('is_active', 1)->first();
                if (isset($CouponData)) {
                    // print_r(8);
                    //dd($CouponData);
                    $created_at = $CouponData->created_at;
                    $formatted_date = $created_at->format('Y-m-d H:i:s');
                    $expiration_time = date("Y-m-d H:i:s", strtotime($formatted_date) + (5 * 60)); // Calculate the expiration time (5 minutes from created_at)
                    $current_time = date("Y-m-d H:i:s"); // Get the current time
                    if ($current_time < $expiration_time) {
                        $data['total_qty'] = $tQty;
                        if ($del == true) {
                            $data['delivery_charge'] = 0;
                        } else {
                            $data['delivery_charge'] = $delCharge;
                        }
                        //$data['total_vat'] = $totalVat;
                        //$data['total_price'] = $tPrice + $data['delivery_charge'];
                        $data['total_price'] = $data['total_price'] - $input['coupon_price'];
                        ///$data['total_price'] = round($data['total_price'] * 2) / 2;
                        //Order::where('order_id', $orderNo)->update($data);
                        $data['coupon_code'] = $request->coupon_code;
                        $data['coupon_price'] = $request->coupon_price;
                        $data['coupon_id'] = $request->coupon_id;
                        $ddata['is_active'] = 0;
                        Order::where('order_id', $orderNo)->update($data);
                        Coupon::where('code', $data['coupon_code'])->update($ddata);
                    }
                }
                try {
                    $data['total_price'] = round($data['total_price'] * 2) / 2;
                    Order::where('order_id', $orderNo)->update($data);
                } catch (\Exception $e) {
                    DB::rollback();
                    throw $e;
                }
            } else {
                // print_r(1);
                if ($order->is_coupon_applied == null) {
                    // print_r(2);
                    if ($request->is_coupon_applied) {
                        // print_r(3);
                        $code = $request->coupon_code;
                        $CouponData = Coupon::where('code', $code)->where('is_active', 1)->first();
                        if (isset($CouponData)) {
                            // print_r(4);
                            //dd($CouponData);
                            $created_at = $CouponData->created_at;
                            $formatted_date = $created_at->format('Y-m-d H:i:s');
                            $expiration_time = date("Y-m-d H:i:s", strtotime($formatted_date) + (5 * 60)); // Calculate the expiration time (5 minutes from created_at)
                            $current_time = date("Y-m-d H:i:s"); // Get the current time
                            if ($current_time < $expiration_time) {
                                $data['total_qty'] = $tQty;
                                if ($del == true) {
                                    $data['delivery_charge'] = 0;
                                } else {
                                    $data['delivery_charge'] = $delCharge;
                                }
                                $delVat = ($data['delivery_charge'] * 0.05);
                                $data['total_vat'] = $totalVat + $delVat;
                                $data['total_price'] = $tPrice + $data['delivery_charge'] + $delVat;
                                $data['total_price'] = $data['total_price'] - $CouponData->price;
                                $data['total_price'] = round($data['total_price'] * 2) / 2;
                                //Order::where('order_id', $orderNo)->update($data);
                                $data['coupon_code'] = $request->coupon_code;
                                $data['coupon_price'] = $request->coupon_price;
                                $data['coupon_id'] = $request->coupon_id;
                                $ddata['is_active'] = 0;
                                Order::where('order_id', $orderNo)->update($data);
                                Coupon::where('code', $data['coupon_code'])->update($ddata);
                            }
                        }
                    }
                }
            }
        } else {
            return redirect()->back()->with('error', 'Order is already in transit!!, you cannot edit');
            DB::rollback();
        }

        DB::commit();
        // });

        return redirect()->route('orders.index')
            ->withSuccess(__('Order updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(order $order)
    {
        $order->delete();

        return redirect()->route('orders.index')
            ->withSuccess(__('Order deleted successfully.'));
    }
    public function deleteCartItem($cart_item_id, $order_id)
    {
        OrderLine::where('id', $cart_item_id)->delete();
        $total_price = 0;
        $delCharge = 0;
        $total_vat = 0;
        $total_qty = 0;
        $order = Order::find($order_id);
        $orderItems = OrderLine::where('order_id', $order->order_id)->get();
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
        $delVat =  $data['delivery_charge'] * 0.05;
        $data['total_price'] = $total_price + $data['delivery_charge'] + $delVat;
        $data['total_qty'] = $total_qty;
        $data['total_vat'] = $total_vat + $delVat;
        if ($order->coupon_id == 1) {
            $data['total_price'] =  $data['total_price'] - $order->coupon_price;
        }
        $data['total_price'] = round($data['total_price'] * 2) / 2;
        $order->update($data);
        return redirect()->route('orders.edit', $order_id)
            ->withSuccess(__('order item successfully.'));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function check($id)
    {
        $order = order::find($id);
        return view('orders.check', [
            'order' => $order
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function verify($id)
    {
        order::where('id', $id)->update([
            'status' => 1
        ]);

        return redirect()->route('orders.index')
            ->withSuccess(__('order verified successfully.'));
    }

    public function note($order_id)
    {
        $order = Order::find($order_id);
        return view('orders.note', [
            'order' => $order
        ]);
    }

    public function noted(Request $request, $order_id)
    {
        $input = $request->all();
        $input['note_image'] = isset($input['note_image']) ? $input['note_image'] : '';

        if ($image = $request->file('note_image')) {
            $destinationPath = 'delivery_note/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['note_image'] = "$profileImage";
        } else {
            unset($input['note_image']);
        }

        if (isset($input['note_image']) && isset($input['note'])) {
            Order::where('id', $order_id)->update(array('note' => $input['note'], 'note_image' => $input['note_image']));
        } elseif (isset($input['note_image'])) {
            Order::where('id', $order_id)->update(array('note_image' => $input['note_image']));
        } else {
            Order::where('id', $order_id)->update(array('note' => $input['note']));
        }


        $order = Order::find($order_id);
        $products = OrderLine::where('order_id', $order_id)->get();
        return view('orders.show', [
            'order' => $order,
            'products' => $products
        ]);
    }

    public function orderStatus(Request $request)
    {
        Order::where('order_id', $request->order_id)->update(array('status' => $request->status));
        $order = Order::find($request->id);
        $products = OrderLine::where('order_id', $request->order_id)->get();
        //Mail::to($order->email)->send(new EmailStatus($order));
        // return view('orders.show', [
        //     'order' => $order, 'products' => $products
        // ]);
        // if ($request->status == 'CANCELLED FOR AUTH' || $request->status == 'NO ANSWER FOR AUTH') {
        //     event(new StatusChange($request->order_id));
        // }
        OrderStatus::create([
            'order_id' => $request->order_id,
            'status' => $request->status,
            'changed_by' =>  auth()->user()->name,
            'user_id' => auth()->user()->id
        ]);
        if ($request->status == 'CANCELLED') {
            foreach ($products as $item) {
                Product::where('id', $item['product_id'])->increment('stock', $item['quantity']);
            }
        }
        if ($request->status == 'PICKEDUP') {
            Order::where('id', $request->order_id)->update(array('shipped_date' => date('Y-m-d')));
        }
        return redirect()->route('orders.show', [
            'order' => $order,
            'products' => $products
        ]);
    }

    public function send_mail()
    {
        $details = [
            'title' => 'Mail from DollarForHumanity',
            'body' => 'Your Donation Has Been Successfully Received'
        ];
        //$email = Request('email');
        $email = 'medappilramsheed@gmail.com';

        Mail::to($email)->send(new EmailOrder($details));
        return view('success');
        // dd("Email is Sent.");
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function export(Request $request)
    {
        $ids = $request->ids;
        return Excel::download(new OrdersExport($ids), 'orders-' . now()->toDateTimeString() . '.xlsx');
    }

    public function reportExport(Request $request)
    {
        $ids = $request->ids;
        //return Excel::download(new ReportExport($ids), 'reports-' . now()->toDateTimeString() . '.xlsx');
        return Excel::download(new ReportExport($ids), 'orders-' . now()->toDateTimeString() . '.xlsx');
    }

    public function filterExport()
    {
        $ids = session()->get('filter_ids');
        return Excel::download(new OrdersExport($ids), 'orders-' . now()->toDateTimeString() . '.xlsx');
    }

    public function impressExport()
    {
        $ids = session()->get('filter_ids');
        return Excel::download(new ImpressExport($ids), 'orders-' . now()->toDateTimeString() . '.xlsx');
    }

    public function camelExport()
    {
        $ids = session()->get('filter_ids');
        return Excel::download(new CamelExport($ids), 'orders-' . now()->toDateTimeString() . '.xlsx');
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function import()
    {
        Excel::import(new OrdersImport, request()->file('file'));

        return back();
    }

    public function imileImport(Request $request)
    {
        $partner = $request->delivery_partner;
        if ($partner == 1) {
            Excel::import(new JtImport, request()->file('file'));
        } else if ($partner == 2) {
            Excel::import(new imileImport, request()->file('file'));
        } else if ($partner == 3) {
            Excel::import(new pandaImport, request()->file('file'));
        } else if ($partner == 4) {
            Excel::import(new impressImport, request()->file('file'));
        } else if ($partner == 5) {
            Excel::import(new camelImport, request()->file('file'));
        }

        return redirect()->back()->with('success', 'AWB imported successfully.');
    }

    public function getPhoneDetails(Request $request)
    {
        $phone = $request->phone;
        $areacode = $request->areacode;
        $data['details'] = Order::where('phone', $phone)->where('areacode', $areacode)->first();
        $data['orders'] = Order::where('phone', $phone)->where('areacode', $areacode)->latest()->get();
        if (isset($data['details'])) {
            $data['success'] = true;
        } else {
            $data['success'] = false;
        }
        return response()->json($data);
    }


    public function getOrderStatus(Request $request)
    {
        $order_id = $request->order_id;
        $data['details'] = Order::where('order_id', $order_id)->where('delivery_boy_id', auth()->user()->id)->first();
        if (isset($data['details'])) {
            $data['success'] = true;
        } else {
            $data['success'] = false;
        }
        return response()->json($data);
    }

    public function getOrderStatusAlluser(Request $request)
    {
        $order_id = $request->order_id;
        $data['details'] = Order::where('order_id', $order_id)->first();
        if (isset($data['details'])) {
            $data['success'] = true;
        } else {
            $data['success'] = false;
        }
        return response()->json($data);
    }

    public function orderLog($order_id)
    {
        $data = OrderStatus::where('order_id', $order_id)->orderBy('created_at', 'asc')->get();
        return view('orders.log', [
            'Status' => $data
        ]);
    }

    public function addToOrder(Request $request)
    {

        $missing =  Missing::find($request->miss_id);
        $input = $missing->toArray();

        // DB::transaction(function () {

        $latestOrder = Order::latest()->first();
        $orderId = $latestOrder->id + 1;

        $status = 'ORDER PLACED';
        //dd($request->is_coupon_applied);
        $input['order_id'] = "UAE1000" . $orderId;
        $input['total_qty'] = 0;
        $input['delivery_charge'] = 0;
        $input['total_price'] = 0;
        $input['status'] = $status;
        $input['created_by'] = 'Online Order';
        $input['created_user_id'] = '51';
        $input['address'] = '';
        if ($request->email == "") {
            $input['email'] = $input['phone'] . '@gmail.com';
        }
        $orderNo = $input['order_id'];

        try {
            $order = Order::create($input);
        } catch (\Exception $e) {
            DB::rollback();
            //return redirect()->back()->with('error', 'Order is not created');
            throw $e;
        }

        OrderStatus::create([
            'order_id' => $orderNo,
            'status' => $status,
            'changed_by' =>  'Converted',
            'user_id' => '51'
        ]);

        $quantity = 1;
        $product = Product::find($input['product_id']);
        OrderLine::insert([
            'order_id' => $order->order_id,
            "product_id" => $product->id,
            "name" => $product->name,
            "quantity" => $quantity,
            "price" => $product->price,
            "vat" => ($product->is_vat) ? ($product->price * $quantity * .05) : 0,
            "sub_price" => ($product->is_vat) ? (($product->price * .05 * $quantity) + ($product->price * $quantity)) : ($product->price * $quantity),
            "delivery_charge" => $product->delivery_charge,
            // "image" => $product->image,
            // "variant" => ''
        ]);
        // });
        $missing->order_id = $orderNo;
        $missing->is_converted = 1;
        $missing->save();
        $missing->delete();

        return redirect()->route('orders.index')
            ->withSuccess(__('order created successfully.'));
    }

    // public function productState(Request $request)
    // {
    //     // Handle date range
    //     if ($request->filled('fromDate') && $request->filled('toDate')) {
    //         $fromDate = Carbon::parse($request->fromDate)->startOfDay()->toDateString();
    //         $toDate = Carbon::parse($request->toDate)->endOfDay()->toDateString();
    //     } else {
    //         $fromDate = Carbon::today()->toDateString();
    //         $toDate = Carbon::today()->toDateString();
    //     }

    //     // Products query
    //     $products = Product::select(
    //         'products.id',
    //         'products.name',
    //         'products.sku',
    //         DB::raw("'product' as type"),
    //         DB::raw("COUNT(DISTINCT order_lines.order_id) as total_orders"),
    //         DB::raw("AVG(order_lines.price) as cost_per_sale"),
    //         DB::raw("(COALESCE((SELECT SUM(product_spands.total_spand) 
    //         FROM product_spands 
    //         WHERE product_spands.product_id = products.id 
    //         AND DATE(product_spands.date_spend) 
    //         BETWEEN '{$fromDate}' AND '{$toDate}'), 0)) as total_spend")
    //     )
    //         ->leftJoin('order_lines', 'products.id', '=', 'order_lines.product_id')
    //         ->whereBetween(DB::raw("DATE(order_lines.created_at)"), [$fromDate, $toDate])
    //         ->groupBy('products.id', 'products.name', 'products.sku');

    //     // Bundles query
    //     $bundles = Bundle::select(
    //         'bundles.id',
    //         'bundles.name',
    //         'bundles.sku',
    //         DB::raw("'bundle' as type"),
    //         DB::raw("COUNT(DISTINCT order_lines.order_id) as total_orders"),
    //         DB::raw("AVG(order_lines.price) as cost_per_sale"),
    //         DB::raw("(COALESCE((SELECT SUM(product_spands.total_spand) 
    //         FROM product_spands 
    //         WHERE product_spands.bundle_id = bundles.id 
    //         AND DATE(product_spands.date_spend) 
    //         BETWEEN '{$fromDate}' AND '{$toDate}'), 0)) as total_spend")
    //     )
    //         ->leftJoin('order_lines', 'bundles.id', '=', 'order_lines.bundle_id')
    //         ->whereBetween(DB::raw("DATE(order_lines.created_at)"), [$fromDate, $toDate])
    //         ->groupBy('bundles.id', 'bundles.name', 'bundles.sku');

    //     // Combine queries using unionAll
    //     $combinedQuery = $products->unionAll($bundles);

    //     // Paginate manually after union
    //     $allResults = DB::table(DB::raw("({$combinedQuery->toSql()}) as combined"))
    //         ->mergeBindings($products->getQuery()) // Use base query bindings
    //         ->paginate(50);
    //     // dd($allResults);

    //     return view('products.product_state', [
    //         'products' => $allResults,
    //         'fromDate' => $fromDate,
    //         'toDate' => $toDate,
    //     ]);
    // }
    public function productState(Request $request)
    {
        // Handle date range
        if ($request->filled('fromDate') && $request->filled('toDate')) {
            $fromDate = Carbon::parse($request->fromDate)->startOfDay()->toDateString();
            $toDate = Carbon::parse($request->toDate)->endOfDay()->toDateString();
        } else {
            $fromDate = Carbon::today()->toDateString();
            $toDate = Carbon::today()->toDateString();
        }

        // Products query
        $products = Product::select(
            'products.id',
            'products.name',
            'products.sku',
            DB::raw("'product' as type"),
            DB::raw("COUNT(DISTINCT order_lines.order_id) as total_orders"),
            DB::raw("SUM(order_lines.quantity) as total_quantity"), // ✅ Added quantity
            DB::raw("AVG(order_lines.price) as cost_per_sale"),
            DB::raw("(COALESCE((SELECT SUM(product_spands.total_spand) 
            FROM product_spands 
            WHERE product_spands.product_id = products.id 
            AND DATE(product_spands.date_spend) 
            BETWEEN '{$fromDate}' AND '{$toDate}'), 0)) as total_spend")
        )
            ->leftJoin('order_lines', 'products.id', '=', 'order_lines.product_id')
            ->whereBetween(DB::raw("DATE(order_lines.created_at)"), [$fromDate, $toDate])
            ->groupBy('products.id', 'products.name', 'products.sku');

        // Bundles query
        $bundles = Bundle::select(
            'bundles.id',
            'bundles.name',
            'bundles.sku',
            DB::raw("'bundle' as type"),
            DB::raw("COUNT(DISTINCT order_lines.order_id) as total_orders"),
            DB::raw("SUM(order_lines.quantity) as total_quantity"), // ✅ Added quantity
            DB::raw("AVG(order_lines.price) as cost_per_sale"),
            DB::raw("(COALESCE((SELECT SUM(product_spands.total_spand) 
            FROM product_spands 
            WHERE product_spands.bundle_id = bundles.id 
            AND DATE(product_spands.date_spend) 
            BETWEEN '{$fromDate}' AND '{$toDate}'), 0)) as total_spend")
        )
            ->leftJoin('order_lines', 'bundles.id', '=', 'order_lines.bundle_id')
            ->whereBetween(DB::raw("DATE(order_lines.created_at)"), [$fromDate, $toDate])
            ->groupBy('bundles.id', 'bundles.name', 'bundles.sku');

        // Combine queries using unionAll
        $combinedQuery = $products->unionAll($bundles);

        // Paginate manually after union
        $allResults = DB::table(DB::raw("({$combinedQuery->toSql()}) as combined"))
            ->mergeBindings($products->getQuery()) // Use base query bindings
            ->paginate(50);
        // dd($allResults);

        return view('products.product_state', [
            'products' => $allResults,
            'fromDate' => $fromDate,
            'toDate' => $toDate,
        ]);
    }
    public function exportProductState(Request $request)
    {
        $ids = $request->input('ids');
        $fromDate = $request->input('fromDate');
        $toDate = $request->input('toDate');

        if (empty($ids)) {
            return back()->with('error', 'Please select at least one product to export.');
        }

        $idsArray = explode(',', $ids);

        return Excel::download(
            new ProductStateExport($idsArray, $fromDate, $toDate),
            'product_state.xlsx'
        );
    }
}
