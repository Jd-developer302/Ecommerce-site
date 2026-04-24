<?php

namespace App\Http\Controllers;

use App\Models\Bundle;
use App\Models\Order;
use App\Models\OrderLine;
use App\Models\OrderStatus;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class JandTController extends Controller
{

    private $apiAccount;
    private $customerCode;
    private $pwd;
    private $privateKey;
    private $url;

    public function __construct()
    {
        $this->apiAccount = config('jandt.apiAccount');
        $this->customerCode = config('jandt.customerCode');
        $this->pwd = config('jandt.password');
        $this->privateKey = config('jandt.privateKey');
        $this->url = config('jandt.url');
    }
    private function getBodyDIgest()
    {
        $str = strtoupper($this->customerCode . md5($this->pwd . 'jadada236t2')) . $this->privateKey;
        return base64_encode(pack('H*', strtoupper(md5($str))));
    }
    private function getHeaderDigest($post)
    {
        $biz = json_encode($post, JSON_UNESCAPED_UNICODE);
        $digest = base64_encode(pack('H*', strtoupper(md5($biz . $this->privateKey))));
        return $digest;
    }
    public function addOrder($order)
    {
        $orderlines = OrderLine::where('order_id', $order->order_id)->get();
        $orderItems = [];
        foreach ($orderlines as $key => $line) {
            $productname = "";
            if ($line->product_id != null) {
                $productname = Product::find($line->product_id)->name;
            } else {
                $productname = Bundle::find($line->bundle_id)->name;
            }
            $orderItems[$key]['itemType'] = "ITN4";
            $orderItems[$key]['itemName'] = $productname;
            $orderItems[$key]['priceCurrency'] = "AED";
            $orderItems[$key]['itemValue'] = $line->price;
        }

        $bizContentArr = [
            "customerCode" => $this->customerCode,
            "digest" => $this->getBodyDigest(),
            "network" => "",
            "txlogisticId" => $order->order_id,
            "expressType" => "EZ",
            "orderType" => "2",
            "serviceType" => "01",
            "deliveryType" => "04",
            "payType" => "PP_PM",
            "sender" => [
                "name" => "Winscart",
                "company" => "NAS Electronic General Trading LLC",
                "postCode" => "",
                "mobile" => "0586583113",
                "phone" => "",
                "mailBox" => "info@winscart.com",
                "countryCode" => "AE",
                "prov" => "Sharjah",
                "city" => "Sharjah",
                "street" => "",
                "address" => "Yaser Bin Ammar St - Al Qasimia - Al Nud - Sharjah",
                "areaCode" => "058"
            ],
            "receiver" => [
                "name" => $order->name,
                "company" => "",
                "postCode" => "",
                "mobile" => $order->areacode.$order->phone,
                "phone" => $order->areacode.$order->phone,
                "mailBox" => $order->email,
                "countryCode" => "AE",
                "prov" => $order->city,
                "city" => $order->city,
                "street" => "",
                "address" => $order->address,
                "areaCode" => $order->areacode
            ],
            "goodsType" => "ITN4",
            "weight" => 1,
            "totalQuantity" => $order->total_qty,
            "itemsValue" => $order->total_price,
            "priceCurrency" => "AED",
            "remark" => $order->comment,
            "operateType" => 1,
            "isUnpackEnabled" => 0,
            "items" => $orderItems,
        ];

        $urlData = $this->url . 'order/addOrder';

        $headers = array(
            "apiAccount:" . $this->apiAccount,
            "digest:" . $this->getHeaderDigest($bizContentArr),
            "timestamp:" . time()
        );
        ///dd($header);
        $biz = json_encode($bizContentArr, JSON_UNESCAPED_UNICODE);
        $data = [
            'bizContent' => $biz
        ];

        $curl = curl_init($urlData);

        //SSL certificate verification
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        //whether to return data
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        //set to POST method
        curl_setopt($curl, CURLOPT_POST, true);
        //set POST request parameters
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        //set http header 
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

        // execute request
        $result = curl_exec($curl);

        //close request
        curl_close($curl);
        return $result;
    }
    public function loopAddOrder(Request $request)
    {

        $ids = explode(',', $request->ids);
        foreach ($ids as $order_id) {
            $order = Order::where('order_id', $order_id)->first();
            if ($order->status == 'INVOICE PRINTED') {
                $resp = json_decode($this->addOrder($order));
                if ($resp->code == 1) {
                    $order->awb = $resp->data->billCode;
                    $order->status = 'PICKEDUP';
                    $order->delivery_boy_id = 21;
                    $order->shipped_date = date('Y-m-d');
                    $order->save();
                    OrderStatus::create([
                        'order_id' => $order_id,
                        'status' => 'ASSIGNED TO RIDER',
                        'changed_by' =>  auth()->user()->name,
                        'user_id' => auth()->user()->id,
                        'comment' => 'Added through api'
                    ]);
                    OrderStatus::create([
                        'order_id' => $order_id,
                        'status' => 'PICKEDUP',
                        'changed_by' =>  auth()->user()->name,
                        'user_id' => auth()->user()->id,
                        'comment' => 'Added through api'
                    ]);
                }
            }
            // $this->getOrders('UTE300002506275');
            // $this->cancelOrder($order_id,'UTE300002506053');
            //$this->returnOrder($order_id,'UTE300002506359');
            //$this->returnExchange('UTE300002506359');
            //$this->trackOrder('UTE300002506286');
        }

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
    public function getOrders($waybillNo)
    {

        $bizContentArr = [
            "customerCode" => $this->customerCode,
            "digest" => $this->getBodyDigest(),
            "command" => 2,
            "serialNumber" => [$waybillNo]
        ];
        $headers = array(
            "apiAccount:" . $this->apiAccount,
            "digest:" . $this->getHeaderDigest($bizContentArr),
            "timestamp:" . time()
        );
        ///dd($header);
        $biz = json_encode($bizContentArr, JSON_UNESCAPED_UNICODE);
        $data = [
            'bizContent' => $biz
        ];
        $urlData = $this->url . 'order/getOrders';
        $curl = curl_init($urlData);

        //SSL certificate verification
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        //whether to return data
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        //set to POST method
        curl_setopt($curl, CURLOPT_POST, true);
        //set POST request parameters
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        //set http header 
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

        // execute request
        $result = curl_exec($curl);
        // dd($result);

        //close request
        curl_close($curl);
        return $result;
    }

    public function cancelOrder($order_id, $waybillNo)
    {
        $bizContentArr = [
            "customerCode" => $this->customerCode,
            "digest" => $this->getBodyDigest(),
            "orderType" => "2",
            "txlogisticId" => $order_id,
            "reason" => "nothinggg",
            "billCode" => $waybillNo
        ];
        $headers = array(
            "apiAccount:" . $this->apiAccount,
            "digest:" . $this->getHeaderDigest($bizContentArr),
            "timestamp:" . time()
        );
        ///dd($header);
        $biz = json_encode($bizContentArr, JSON_UNESCAPED_UNICODE);
        $data = [
            'bizContent' => $biz
        ];
        $urlData = $this->url . 'order/cancelOrder';
        $curl = curl_init($urlData);

        //SSL certificate verification
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        //whether to return data
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        //set to POST method
        curl_setopt($curl, CURLOPT_POST, true);
        //set POST request parameters
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        //set http header 
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

        // execute request
        $result = curl_exec($curl);
        // dd($result);

        //close request
        curl_close($curl);
        return $result;
    }
    public function returnOrder($order_id, $waybillNo)
    {
        $bizContentArr = [
            "customerCode" => $this->customerCode,
            "digest" => $this->getBodyDigest(),
            "txlogisticId" => $order_id,
            "rebackTransferReason" => "nothinggg",
            "billCode" => $waybillNo
        ];
        $headers = array(
            "apiAccount:" . $this->apiAccount,
            "digest:" . $this->getHeaderDigest($bizContentArr),
            "timestamp:" . time()
        );
        //dd($headers);
        $biz = json_encode($bizContentArr, JSON_UNESCAPED_UNICODE);
        //dd($biz);
        $data = [
            'bizContent' => $biz
        ];
        $urlData = $this->url . 'order/applyReturn';
        $curl = curl_init($urlData);

        //SSL certificate verification
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        //whether to return data
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        //set to POST method
        curl_setopt($curl, CURLOPT_POST, true);
        //set POST request parameters
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        //set http header 
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

        // execute request
        $result = curl_exec($curl);
        // dd($result);

        //close request
        curl_close($curl);
        return $result;
    }

    public function returnExchange($waybillNo)
    {
        $bizContentArr = [
            "customerCode" => $this->customerCode,
            "digest" => $this->getBodyDigest(),
            "returnAndExchangeType" => "2",
            "itemDescription" => "test",
            "billCode" => $waybillNo
        ];
        $headers = array(
            "apiAccount:" . $this->apiAccount,
            "digest:" . $this->getHeaderDigest($bizContentArr),
            "timestamp:" . time()
        );
        //dd($headers);
        $biz = json_encode($bizContentArr, JSON_UNESCAPED_UNICODE);
        //dd($biz);
        $data = [
            'bizContent' => $biz
        ];
        $urlData = $this->url . 'order/returnAndExchange';
        $curl = curl_init($urlData);

        //SSL certificate verification
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        //whether to return data
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        //set to POST method
        curl_setopt($curl, CURLOPT_POST, true);
        //set POST request parameters
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        //set http header 
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

        // execute request
        $result = curl_exec($curl);
        // dd($result);

        //close request
        curl_close($curl);
        return $result;
    }
    public function trackOrder($waybillNo)
    {
        $bizContentArr = [
            "billCodes" => $waybillNo
        ];
        $headers = array(
            "apiAccount:" . $this->apiAccount,
            "digest:" . $this->getHeaderDigest($bizContentArr),
            "timestamp:" . time()
        );
        //dd($headers);
        $biz = json_encode($bizContentArr, JSON_UNESCAPED_UNICODE);
        //dd($biz);
        $data = [
            'bizContent' => $biz
        ];
        $urlData = $this->url . 'logistics/trace?uuid=7c19fb1e70c74a01b8f7cc909b3f62c2';
        $curl = curl_init($urlData);

        //SSL certificate verification
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        //whether to return data
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        //set to POST method
        curl_setopt($curl, CURLOPT_POST, true);
        //set POST request parameters
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        //set http header 
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

        // execute request
        $result = curl_exec($curl);
        // dd($result);

        //close request
        curl_close($curl);
        return $result;
    }
}
