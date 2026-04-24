<?php

namespace App\Http\Controllers;

use App\Events\StatusChange;
use App\Models\Order;
use App\Models\OrderLine;
use App\Models\OrderStatus;
use App\Models\Product;
use App\Models\User;
use App\Models\Rma;
use App\Models\RmaLine;
use App\Models\RmaStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\ValidationException;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Orders = Order::where('delivery_boy_id', auth()->user()->id)->latest()->paginate(50);

        return view('drivers.orders', compact('Orders'));
    }

    public function todaysOrders()
    {
        $Orders = Order::where('delivery_boy_id', auth()->user()->id)->where('delivery_date', now()->format('Y-m-d'))->latest()->paginate(50);

        return view('drivers.orders', compact('Orders'));
    }

    public function crmOrders()
    {
        $statusArr = array('CANCELLED FOR AUTH', 'NO ANSWER FOR AUTH', 'ORDER PLACED', 'TO BE CONFORMED', 'PICKEDUP', 'OUT FOR DELIVERY', 'ATTENTED');
        $Orders = Order::whereIn('status', $statusArr)->latest()->paginate(200);

        return view('drivers.crm', compact('Orders'));
    }
    public function rmaCrmOrders()
    {
        $statusArr = array('CANCELLED FOR AUTH', 'NO ANSWER FOR AUTH', 'RMA', 'PACKED', 'PICKEDUP', 'ASSIGNED TO RIDER', 'DELIVERED');
        $Rmas = Rma::whereIn('status', $statusArr)->latest()->paginate(200);

        return view('drivers.rmacrm', compact('Rmas'));
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
        $order = Order::find($id);
        $products = DB::table('order_lines')
            ->join('products', 'order_lines.product_id', '=', 'products.id', 'left')
            ->select('order_lines.*', 'products.image')
            ->where('order_lines.order_id', $order->order_id)
            ->get();

        return view('drivers.show', [
            'order' => $order,
            'products' => $products
        ]);
    }

    public function view($id)
    {
        $order = Order::find($id);
        $products = DB::table('order_lines')
            ->join('products', 'order_lines.product_id', '=', 'products.id', 'left')
            ->select('order_lines.*', 'products.image')
            ->where('order_lines.order_id', $order->order_id)
            ->get();

        return view('drivers.view', [
            'order' => $order,
            'products' => $products
        ]);
    }
    public function rmaview($id)
    {
        $rma = Rma::find($id);
        $products = DB::table('rma_lines')
            ->join('products', 'rma_lines.product_id', '=', 'products.id', 'left')
            ->select('rma_lines.*', 'products.image')
            ->where('rma_lines.rma_id', $rma->id)
            ->get();

        return view('drivers.rmaview', [
            'rma' => $rma,
            'products' => $products
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function rmaOrderStatus(Request $request)
    {
        $request->validate([
            'order_id' => 'required|exists:rmas,order_id',
            'status' => 'required|string',
        ]);

        $CurrentOrder = Rma::where('order_id', $request->order_id)->first();


        if (!$CurrentOrder) {
            return redirect()->back()->with('error', 'Order not found');
        }
        $rma_id = $request->rma_id ?? $CurrentOrder->id;
        try {
            if ($CurrentOrder->status != $request->status) {
                if (isset($request->delivery_date)) {
                    $Arr = array('status' => $request->status, 'delivery_date' => $request->delivery_date);
                } else {
                    $Arr = array('status' => $request->status);
                }
                $CurrentOrder->update($Arr);
                if ($request->status == 'PICKEDUP') {
                    if ($CurrentOrder->shipped_date == null) {
                        $CurrentOrder->update(array('shipped_date' => date('Y-m-d'), 'rto' => 1));
                    } else if ($CurrentOrder->shipped_date1 == null) {
                        $CurrentOrder->update(array('shipped_date1' => date('Y-m-d'), 'rto' => 1));
                    } else if ($CurrentOrder->shipped_date2 == null) {
                        $CurrentOrder->update(array('shipped_date2' => date('Y-m-d'), 'rto' => 1));
                    } else if ($CurrentOrder->shipped_date3 == null) {
                        $CurrentOrder->update(array('shipped_date3' => date('Y-m-d'), 'rto' => 1));
                    } else if ($CurrentOrder->shipped_date4 == null) {
                        $CurrentOrder->update(array('shipped_date4' => date('Y-m-d'), 'rto' => 1));
                    }
                    $delId = $CurrentOrder->value('delivery_boy_id');
                    if ($delId != auth()->user()->id) {
                        return redirect()->back()->with('error', 'This is not your order');
                    }
                    // RmaStatus::create([
                    //     'rma_id' => $CurrentOrder->id,
                    //     'status' => $request->status,
                    //     'comment' => $request->comment,
                    //     'changed_by' =>  auth()->user()->name,
                    //     'user_id' => auth()->user()->id,
                    // ]);
                }

                RmaStatus::create([
                    'rma_id' => $rma_id,
                    'status' => $request->status,
                    'comment' => $request->comment,
                    'changed_by' =>  auth()->user()->name,
                    'user_id' => auth()->user()->id
                ]);

                if ($request->status == 'NO ANSWER' || $request->status == 'CANCELLED') {
                    event(new StatusChange($request->order_id));
                }

                $products = RmaLine::where('rma_id', $request->rma_id)->get();
                if ($CurrentOrder->status == 'RMA' || $CurrentOrder->status == 'ORDER PLACED' || $CurrentOrder->status == 'TO BE CONFIRMED' || $CurrentOrder->status == 'ORDER CONFIRMED' || $CurrentOrder->status == 'PICKEDUP' || $CurrentOrder->status == 'OUT FOR DELIVERY' || $CurrentOrder->status == 'ATTENDED' || $CurrentOrder->status == 'RESCHEDULE') {
                    if ($request->status == 'CANCELLED') {
                        foreach ($products as $item) {
                            Product::where('id', $item['product_id'])->increment('stock', $item['quantity']);
                        }
                        // if ($CurrentOrder->status == 'PICKEDUP') {
                        //     Order::where('order_id', $request->order_id)->update(array('rto' => 1));
                        // }
                    }
                }
                if ($CurrentOrder->status == 'PICKEDUP' || $CurrentOrder->status == 'OUT FOR DELIVERY' || $CurrentOrder->status == 'ATTENDED' || $CurrentOrder->status == 'CANCELLED' || $CurrentOrder->status == 'RESCHEDULE') {
                    if ($request->status == 'DELIVERED') {
                        $CurrentOrder->update(array('delivery_date' => date('Y-m-d'), 'rto' => 2));
                    }
                }
                if ($CurrentOrder->status == 'ATTENDED') {
                    $count = RmaStatus::where('order_id', $request->order_id)->where('status', 'ATTENDED')->count();
                    if ($count > 4) {
                        $CurrentOrder->update(array('status' => 'AUTOMATIC CANCELLED'));
                        RmaStatus::create([
                            'rma_id' => $request->rma_id,
                            'status' => $request->status,
                            'comment' => $request->comment,
                            'changed_by' =>  auth()->user()->name,
                            'user_id' => auth()->user()->id
                        ]);
                    }
                }
                if ($CurrentOrder->status == 'DELIVERED') {
                }
                if ($CurrentOrder->status == 'DELIVERED') {
                    $CurrentOrder->update(array('delivery_boy_id' => null, 'rto' => 1));
                }


                return redirect()->back()->with('success', 'Status changed');
            } else {
                return redirect()->back()->with('error', 'same status');
            }

            //return redirect()->route('drivers.index');
        } catch (\Throwable $th) {
            return redirect()->back()->with('something went wrong', $th);
        }
    }

    public function assignOrder(Request $request)
    {
        $order_id_arr = explode(",", $request->ids);
        foreach ($order_id_arr as $item) {
            Order::where('order_id', $item)
                ->update([
                    'status' => 'ASSIGNED TO RIDER',
                    'delivery_boy_id' => $request->delivery_boy_id,
                    'delivery_date' => $request->delivery_date
                ]);


            OrderStatus::create([
                'order_id' => $item,
                'status' => 'ASSIGNED TO RIDER',
                'changed_by' =>  auth()->user()->name,
                'user_id' => auth()->user()->id
            ]);
        }

        return redirect()->route('orders.index')
            ->with('success', 'orders assigned successfully.');
    }

    public function orderStatus(Request $request)
    {
        $CurrentOrder = Order::where('order_id', $request->order_id)->first();
        if ($request->status) {
            if (isset($request->delivery_date)) {
                $Arr = array('status' => $request->status, 'delivery_date' => $request->delivery_date);
            } else {
                $Arr = array('status' => $request->status);
            }
            Order::where('order_id', $request->order_id)->update($Arr);
            if ($request->status == 'PICKEDUP') {
                Order::where('order_id', $request->order_id)->update(array('shipped_date' => date('Y-m-d'), 'rto' => 1));
                $delId = Order::where('order_id', $request->order_id)->value('delivery_boy_id');
                if ($delId != auth()->user()->id) {
                    return redirect()->back()->with('error', 'This is not your order');
                }
            }
            OrderStatus::create([
                'order_id' => $request->order_id,
                'status' => $request->status,
                'comment' => $request->comment,
                'changed_by' =>  auth()->user()->name,
                'user_id' => auth()->user()->id
            ]);

            if ($request->status == 'NO ANSWER' || $request->status == 'CANCELLED') {
                event(new StatusChange($request->order_id));
            }

            $products = OrderLine::where('order_id', $request->order_id)->get();
            if ($CurrentOrder->status == 'ORDER PLACED' || $CurrentOrder->status == 'TO BE CONFORMED' || $CurrentOrder->status == 'ORDER CONFIRMED' || $CurrentOrder->status == 'PICKEDUP' || $CurrentOrder->status == 'OUT FOR DELIVERY' || $CurrentOrder->status == 'ATTENTED' || $CurrentOrder->status == 'RESHEDULED') {
                if ($request->status == 'CANCELLED') {
                    foreach ($products as $item) {
                        Product::where('id', $item['product_id'])->increment('stock', $item['quantity']);
                    }
                    // if ($CurrentOrder->status == 'PICKEDUP') {
                    //     Order::where('order_id', $request->order_id)->update(array('rto' => 1));
                    // }
                }
            }
            if ($CurrentOrder->status == 'PICKEDUP' || $CurrentOrder->status == 'OUT FOR DELIVERY' || $CurrentOrder->status == 'ATTENTED' || $CurrentOrder->status == 'CANCELLED' || $CurrentOrder->status == 'RESHEDULED') {
                if ($request->status == 'DELIVERED') {
                    Order::where('order_id', $request->order_id)->update(array('delivery_date' => date('Y-m-d'), 'rto' => 2));
                }
            }
            if ($CurrentOrder->status == 'DELIVERED' && $request->status == 'RMA') {
                Order::where('order_id', $request->order_id)->update(array('delivery_boy_id' => null, 'rto' => 1));
            }

            if ($request->status == 'RMA') {
                $rma = Rma::create([
                    'user_id' => auth()->id(),
                    'order_id' => $CurrentOrder->order_id,
                    'comment' => $CurrentOrder->comment ?? '',
                    'product_id' => $products->first()?->product_id ?? 'N/A',
                    'name' => $CurrentOrder->name ?? '',
                    'quantity' => $CurrentOrder->quantity ?? 1,
                    'price' => $CurrentOrder->price ?? 0.00,
                    'phone' => $CurrentOrder->phone ?? '',
                    'email' => $CurrentOrder->email ?? '',
                    'city' => $CurrentOrder->city ?? '',
                    'address' => $CurrentOrder->address ?? '',
                    'total_qty' => $CurrentOrder->total_qty ?? 1,
                    'delivery_charge' => $CurrentOrder->delivery_charge ?? 0.00,
                    'total_price' => $CurrentOrder->total_price ?? 0.00,
                    'combination_id' => $CurrentOrder->combination_id ?? null,
                    'total_vat' => $CurrentOrder->total_vat ?? 0.00,
                    'delivery_date' => $CurrentOrder->delivery_date ?? null,
                    'delivery_boy_id' => $CurrentOrder->delivery_boy_id ?? null,
                    'created_by' => $CurrentOrder->created_by ?? auth()->id(),
                    'coupon_id' => $CurrentOrder->coupon_id ?? null,
                    'coupon_price' => $CurrentOrder->coupon_price ?? 0.00,
                    'coupon_code' => $CurrentOrder->coupon_code ?? '',
                    'areacode' => $CurrentOrder->areacode ?? '',
                    'lat' => $CurrentOrder->lat ?? null,
                    'long' => $CurrentOrder->long ?? null,
                    'shipped_date' => $CurrentOrder->shipped_date ?? null,
                    'rto' => $CurrentOrder->rto ?? null,
                    'rto_date' => $CurrentOrder->rto_date ?? null,
                    'pto_date' => $CurrentOrder->pto_date ?? null,
                    'awb' => $CurrentOrder->awb ?? '',
                    'shipped_date1' => $CurrentOrder->shipped_date1 ?? null,
                    'shipped_date2' => $CurrentOrder->shipped_date2 ?? null,
                    'shipped_date3' => $CurrentOrder->shipped_date3 ?? null,
                    'shipped_date4' => $CurrentOrder->shipped_date4 ?? null,
                    'delivery_boy_id1' => $CurrentOrder->delivery_boy_id1 ?? null,
                    'delivery_boy_id2' => $CurrentOrder->delivery_boy_id2 ?? null,
                    'delivery_boy_id3' => $CurrentOrder->delivery_boy_id3 ?? null,
                    'delivery_boy_id4' => $CurrentOrder->delivery_boy_id4 ?? null,
                    'awb_details' => $CurrentOrder->awb_details ?? '',
                    'source' => $CurrentOrder->source ?? '',
                    'whatsapp' => $CurrentOrder->whatsapp ?? '',
                    'payment_method' => $CurrentOrder->payment_method ?? '',
                    'trans_id' => $CurrentOrder->trans_id ?? '',
                    'payment_status' => $CurrentOrder->payment_status ?? '',
                    'shipping_charge_collected' => $CurrentOrder->shipping_charge_collected ?? 0.00,
                    'gross_sale_amount' => $CurrentOrder->gross_sale_amount ?? 0.00,
                ]);
                foreach ($CurrentOrder->orderLines as $line) {
                    RmaLine::create([
                        'rma_id' => $rma->id,
                        'product_id' => $line->product_id,
                        'combination_id' => $line->combination_id,
                        'name' => $line->name,
                        'quantity' => $line->quantity,
                        'price' => $line->price,
                        'sub_price' => $line->sub_price,
                        'vat' => $line->vat,
                        'bundle_id' => $line->bundle_id,
                        'delivery_charge' => $line->delivery_charge,
                        'trans_id' => $line->trans_id,
                        'payment_status' => $line->payment_status,
                    ]);
                }
                
            }

            if ($CurrentOrder->status == 'DELIVERED' && $request->status == 'ATTENTED') {
                Order::where('order_id', $request->order_id)->update(array('rto' => 1));
            }
            
            return redirect()->back()->with('success', 'Status changed');
        } else {
            return redirect()->back()->with('error', 'Please select status');
        }
    }

    

    //********************* API ********************** */
    public function loginDriver(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        // if (is_numeric($request->get('username'))) {
        //     $username = $request->get('username');
        //     $userfeild = 'phone_number';
        // } elseif (filter_var($request->get('username'), FILTER_VALIDATE_EMAIL)) {
        //     $username = $request->get('username');
        //     $userfeild = 'email';
        // }
        $username = $request->get('username');
        $userfeild = 'email';
        $password = $request->get('password');

        $user = User::where($userfeild, '=', $username)->first();
        if ($user != null) {
            $role = DB::table('model_has_roles')
                ->join('users', 'users.id', '=', 'model_has_roles.model_id', 'left')
                ->join('roles', 'roles.id', '=', 'model_has_roles.role_id', 'left')
                ->select('users.*')
                ->where('roles.name', 'Driver')
                ->where('users.id', $user->id)
                ->first();
            if ($role != null) {
                // if ($user->driver_status != 1) {
                //     return response([
                //         'message' => 'Driver is blocked, Please contact support'
                //     ], 401);
                // }
                $driver = User::where($userfeild, $username)->first();
                if (Hash::check($password, $driver->password)) {
                    $token = $user->createToken('winscart_del_boy')->plainTextToken;

                    $data = [
                        'driver' => $driver,
                        'token' => $token,
                    ];
                    $response = [
                        'data' => $data,
                        'message' => 'Successfully logged in'
                    ];

                    return response(
                        $response,
                        201
                    );
                } else {
                    return response([
                        'message' => 'Bad credentials'
                    ], 401);
                }
                //check
                if (!$driver) {
                    return response([
                        'message' => 'Bad credentials'
                    ], 401);
                }
            } else {
                return response([
                    'message' => "Driver doesn't exist!"
                ], 401);
            }
        } else {
            if (!$user) {
                return response([
                    'message' => "Driver doesn't exist!"
                ], 401);
            }
        }
    }
    public function assignedOrders()
    {
        $user =  auth('sanctum')->user();
        $orders = Order::where('delivery_boy_id', $user->id)->latest()->get();
        return response(
            $orders,
            200
        );
    }
    public function ChangeStatus(Request $request)
    {
        try {
            $validated = $request->validate([
                'order_id' => 'required',
                'status' => 'required'
            ]);
            $user = auth('sanctum')->user();
            $arr = array('status' => $request->status, 'delivery_date' => $request->delivery_date);
            $order = Order::where('order_id', $request->order_id)->update($arr);
            if ($order != null) {
                OrderStatus::create([
                    'order_id' => $request->order_id,
                    'status' => $request->status,
                    'changed_by' =>  $user->name,
                    'user_id' => $user->id
                ]);
                $products = OrderLine::where('order_id', $request->order_id)->get();
                if ($request->status == 'CANCELLED') {
                    foreach ($products as $item) {
                        Product::where('id', $item['product_id'])->increment('stock', $item['quantity']);
                    }
                }
                return response([
                    'message' => "Order  status updated successfully"
                ], 204);
            }
        } catch (ValidationException $e) {
            // Validation failed, return a JSON response with the validation errors
            return response()->json([
                'message' => 'The given data was invalid.',
                'errors' => $e->errors()
            ], 422);
        }
    }

    public function invoicedOrders()
    {
        $Orders = Order::where('status', 'INVOICE PRINTED')->latest()->paginate(50);

        return view('stores.invoiced', compact('Orders'));
    }

    public function assignedStoreOrders()
    {
        $status = array('PACKED', 'RMA');
        $Orders = Order::whereIn('status', $status)->latest()->paginate(50);
        $drivers = DB::table('model_has_roles')
            ->join('users', 'users.id', '=', 'model_has_roles.model_id', 'left')
            ->join('roles', 'roles.id', '=', 'model_has_roles.role_id', 'left')
            ->select('users.*')
            ->where('roles.name', 'Driver')
            ->get();
        $delivery_date = '';
        $selected_rider = -1;
        return view('stores.packed', compact('Orders', 'drivers', 'selected_rider', 'delivery_date'));
    }

    public function confirmedOrders()
    {
        $Orders = Order::where('status', 'ORDER CONFIRMED')->latest()->paginate(50);

        return view('stores.confirmed', compact('Orders'));
    }

    public function assignOrderFromStore(Request $request)
    {
        if ($request->delivery_boy_id != null) {
            Order::where('order_id', $request->order_id)
                ->update([
                    'status' => 'ASSIGNED TO RIDER',
                    'delivery_boy_id' => $request->delivery_boy_id,
                    'delivery_date' => $request->delivery_date
                ]);


            OrderStatus::create([
                'order_id' => $request->order_id,
                'status' => 'ASSIGNED TO RIDER',
                'changed_by' =>  auth()->user()->name,
                'user_id' => auth()->user()->id
            ]);
            if ($request->delivery_boy_id == 52) {
                //For Tawseel
                $order = Order::where('order_id', $request->order_id)->first();
                $resp = $this->addOrderToTawseel($order);
                if ($resp['response']) {
                    $order->awb = $resp['awb_number'];
                    $order->save();
                } else {
                    $order->status = 'PACKED';
                    $order->save();
                }
            }
        }
        $Orders = Order::where('status', 'PACKED')->latest()->paginate(50);
        $drivers = DB::table('model_has_roles')
            ->join('users', 'users.id', '=', 'model_has_roles.model_id', 'left')
            ->join('roles', 'roles.id', '=', 'model_has_roles.role_id', 'left')
            ->select('users.*')
            ->where('roles.name', 'Driver')
            ->get();

        $delivery_date = $request->delivery_date;
        $selected_rider = $request->delivery_boy_id;
        return view('stores.packed', compact('Orders', 'drivers', 'selected_rider', 'delivery_date'));
    }
    public function cancelOrders(Request $request)
    {
        Order::where('order_id', $request->order_id)
            ->update([
                'status' => 'CANCELLED',
                'delivery_boy_id' => null
            ]);


        OrderStatus::create([
            'order_id' => $request->order_id,
            'status' => 'CANCELLED',
            'changed_by' =>  auth()->user()->name,
            'user_id' => auth()->user()->id,
            'comment' => 'cancelled from store'
        ]);
        return view('stores.cancelled');
    }
    public function storeCancel()
    {

        return view('stores.cancelled');
    }
    public function reciveRto(Request $request)
    {
        $order = Order::where('order_id', $request->order_id)->get();
        if (count($order) > 0) {
            // if ($status == 'CANCELLED') {
            Order::where('order_id', $request->order_id)
                ->update([
                    'rto' => '0',
                    'rto_date' => date('Y-m-d')
                ]);


            OrderStatus::create([
                'order_id' => $request->order_id,
                'status' => 'RTO recived',
                'changed_by' =>  auth()->user()->name,
                'user_id' => auth()->user()->id,
                'comment' => 'rto recived'
            ]);
            // }
        } else {
            $order_id = Order::where('awb', $request->order_id)->value('order_id');
            if (isset($order_id)) {
                Order::where('order_id', $order_id)
                    ->update([
                        'rto' => '0',
                        'rto_date' => date('Y-m-d')
                    ]);
                OrderStatus::create([
                    'order_id' => $order_id,
                    'status' => 'RTO recived',
                    'changed_by' =>  auth()->user()->name,
                    'user_id' => auth()->user()->id,
                    'comment' => 'rto recived'
                ]);
            }
        }
        return view('stores.rto');
    }
    public function storeRto()
    {

        return view('stores.rto');
    }

    private function addOrderToTawseel($order)
    {

        $subquery = DB::table('order_lines')
            ->leftJoin('products', 'order_lines.product_id', '=', 'products.id')
            ->leftJoin('bundles', 'order_lines.bundle_id', '=', 'bundles.id')
            ->select(
                'order_lines.order_id',
                DB::raw("
                    GROUP_CONCAT(
                        CONCAT(IFNULL(products.name, bundles.name), ' (Qty: ', order_lines.quantity, ')')
                        SEPARATOR '|'
                    ) AS product_names_with_qty
                ")
            )
            ->groupBy('order_lines.order_id');

        $orderdetail = DB::table('orders')
            ->leftJoinSub($subquery, 'order_lines', function ($join) {
                $join->on('orders.order_id', '=', 'order_lines.order_id');
            })->where('orders.order_id', $order->order_id)
            ->first();

        $cityMapping = [
            "DUBAI" => "Dubai",
            "ABU DHABI" => "AbuDhabi",
            "SHARJAH" => "Sharjah",
            "AJMAN" => "Ajman",
            "RAK" => "RAK",
            "FUJAIRAH" => "Fujairah",
            "UMM AL QUWAIN" => "Umm Al Quwain",
            "AL AIN" => "Al Ain"
        ];
        $city = $cityMapping[$order->city];
        $externalApiUrl = 'http://api.tawseel.com/index.php/tawseel_api/CreateOrder';
        $response = Http::withHeaders([
            'api' => 'an75g15x8dbgw52',
            'pwd' => 'kuh821cv24b8921k',
        ])
            ->asForm()
            ->post($externalApiUrl, [
                'pickup_id' => 1,
                'customer_name' => $order->name,
                'mobile_no' => $this->correctPhoneNumber($order->areacode . $order->phone),
                'service_type' => 'NORMAL',
                'shipping_address' => $order->address,
                'flat_villa' => $order->address,
                'shipping_city' => $city,
                'latitude' => $order->lat,
                'longitude' => $order->long,
                'description' => $orderdetail->product_names_with_qty,
                'remarks' => $order->comment,
                'merch_order_no' => $order->order_id,
                'cod_amount' => $order->payment_method == 'cod' ? $order->total_price : null,
            ]);

        return $response->json();
    }


    public function correctPhoneNumber($phone)
    {
        $phone = str_replace(' ', '', $phone);
        // Remove all non-numeric characters (spaces, plus, dashes, etc.)
        $phone = preg_replace('/\D/', '', $phone);

        // If the number has exactly 10 digits, return it as is
        if (strlen($phone) === 10) {
            return $phone;
        }

        // If the number starts with '050' or '5' followed by 9 digits, format it to 10 digits
        if (strlen($phone) === 9 && preg_match('/^5\d{8}$/', $phone)) {
            return '0' . $phone;  // Prefix with '0' to match the local format
        }

        // If the number starts with '00971' or '+971', strip it to get the last 9 digits
        if (substr($phone, 0, 4) === '00971') {
            return substr($phone, 4);  // Return the number without the international code
        }

        if (substr($phone, 0, 3) === '+971') {
            return substr($phone, 3);  // Return the number without the '+971' country code
        }

        // If the phone number is invalid or doesn't match expected formats, return false
        return false;
    }

    public function tawseelImport(Request $request)
    {
        $error = array();
        $k = 0;
        // Split the string into an array
        $array = explode(',', $request->ids);

        // Remove empty elements
        $orderIds = array_filter($array);
        foreach ($orderIds as $orderId) {

            //For Tawseel
            $order = Order::where('order_id', $orderId)->first();
            $resp = $this->addOrderToTawseel($order);
            if ($resp['response']) {
                $order->awb = $resp['awb_number'];
                $order->save();
                Order::where('order_id', $orderId)
                    ->update([
                        'status' => 'ASSIGNED TO RIDER',
                        'delivery_boy_id' => 52,
                        'delivery_date' => date('Y-m-d')
                    ]);


                OrderStatus::create([
                    'order_id' => $orderId,
                    'status' => 'ASSIGNED TO RIDER',
                    'changed_by' =>  auth()->user()->name,
                    'user_id' => auth()->user()->id
                ]);
            } else {
                $error[$k] = $orderId . ': ' . $resp['message'];
                $k++;
            }
            echo $orderId . ' -';
        }
        echo 'error list';
        dd($error);
    }
    public function updateTawseelStatus(Request $request)
    {

        $status_arr = [
            "picked" => "PICKEDUP",
            // "Delivered" => "DELIVERED",
        ];

        $orders = Order::whereIn('status', ['ASSIGNED TO RIDER'])
            ->where('delivery_boy_id', 52)->get();
        foreach ($orders as $order) {
            $externalApiUrl = 'http://api.tawseel.com/index.php/tawseel_api/OrderStatusAll';
            $response = Http::withHeaders([
                'api' => 'an75g15x8dbgw52',
                'pwd' => 'kuh821cv24b8921k',
            ])
                ->asForm()
                ->post($externalApiUrl, [
                    'awb_number' => $order->awb
                ]);

            $resp = $response->json();
            if ($resp['response']) {
                $statuses = $resp['results'];
                // rsort($statuses);
                foreach ($statuses as $status) {
                    if (array_key_exists($status['status_desc'], $status_arr)) {
                        // if ($status['status_desc'] == 'Delivered') {
                        //     Order::where('order_id', $order->order_id)
                        //         ->update([
                        //             'status' =>  $status_arr[$status['status_desc']]
                        //         ]);
                        // } else if ($status_arr[$status['status_desc']] != $order->status) {

                        Order::where('order_id', $order->order_id)
                            ->update([
                                'status' => $status_arr[$status['status_desc']]
                            ]);
                        // }

                        OrderStatus::create([
                            'order_id' => $order->order_id,
                            'status' =>  $status_arr[$status['status_desc']],
                            'changed_by' =>  auth()->user()->name,
                            'user_id' => auth()->user()->id,
                            'comment' => $status['trans_datetime']
                        ]);
                        break;
                    }
                }
            }
        }
        return true;
    }
}
