<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\EmailMessage;
use App\Models\Bundle;
use App\Models\BundleLine;
use App\Models\Category;
use App\Models\Consumable;
use App\Models\Customer;
use App\Models\Image;
use App\Models\Order;
use App\Models\OrderLine;
use App\Models\OrderStatus;
use App\Models\Product;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Stevebauman\Location\Facades\Location;

class IndexController extends Controller
{
    public function index()
    {
        $count = $this->cartCount();
        $categories = Category::orderBy('order')->get();
        $newArrivals = Product::where('is_newarrival', 1)->where('is_active', 1)->get();
        $megaDeals = Product::where('mega_deal', 1)->where('is_active', 1)->get();

        // $megaOffers = Product::where('is_mega_offer', 1)->where('is_active', 1)->take(3)->get();
        $megaOffers = Category::whereIn('name', ['Laptops', 'Mobiles', 'Watches'])->take(3)->get();
        // dd($megaOffers);

        $featuredCats = Category::where('featured', 1)->get();
        $listed = Category::where('listing', 1)->get();
        $setting = Setting::first();
        $bundles = Bundle::latest();
        foreach ($featuredCats as $key => $item) {
            $featuredCats[$key]['products'] = Product::where('is_active', 1)->where('category_id', $item->id)->limit(10)->get();
        }
        foreach ($listed as $key2 =>  $item) {
            $listed[$key2]['products'] = Product::where('is_active', 1)->where('category_id', $item->id)->limit(10)->get();
        }
        $cartItems = session()->get('cart');
        $total_price = 0;
        if ($cartItems != null) {
            foreach ($cartItems as $item) {
                $total_price = $total_price + ($item['price'] * $item['quantity']);
            }
        }
        return view('frontend.index', compact('newArrivals', 'count', 'categories', 'megaDeals', 'megaOffers', 'featuredCats', 'cartItems', 'listed', 'setting', 'bundles'));
    }
    public function shop(Request $request)
    {
        $count = $this->cartCount();
        $query = Product::query();

        // Sorting logic
        if ($request->has('sort')) {
            switch ($request->sort) {
                case 'asc':
                    $query->orderBy('name', 'asc');
                    break;
                case 'desc':
                    $query->orderBy('name', 'desc');
                    break;
                case 'latest':
                    $query->latest();
                    break;
                case 'oldest':
                    $query->oldest();
                    break;
                default:
                    $query->latest();
            }
        } else {
            $query->latest();
        }

        $products = $query->paginate(32);
        $totalProducts = $products->count();
        $bundles = Bundle::latest()->get();
        $setting = Setting::first();

        return view('frontend11.shop', compact('products', 'count', 'setting', 'bundles', 'totalProducts'));
    }
    public function contact()
    {
        $count = $this->cartCount();
        $setting = Setting::first();
        return view('frontend.contact', compact('count', 'setting'));
    }
    public function aboutUs()
    {
        $count = $this->cartCount();
        $setting = Setting::first();
        return view('frontend.about', compact('count', 'setting'));
    }
    public function cart()
    {
        $count = $this->cartCount();
        $setting = Setting::first();
        return view('frontend.cart', compact('count', 'setting'));
    }
    public function buy1($pid)
    {
        $count = $this->cartCount();
        $product = Product::find($pid);
        $brand = $product->brand;
        $name = $product->name;
        $code = $product->code;
        $series = $product->series;
        $setting = Setting::first();
        $images = Image::where('product_id', $product->id)->get();
        $related = Product::where('id', '<>', '')->orWhere('name', 'LIKE', "%{$name}%")->orWhere('code', 'LIKE', "%{$code}%")->orWhere('brand', 'LIKE', "%{$brand}%")->orWhere('series', 'LIKE', "%{$series}%")->where('id', '<>', $pid)->get();
        $consumables = Consumable::where('product_id', $pid)->get();
        return view('frontend.detail', compact('product', 'related', 'images', 'count', 'consumables', 'pid', 'setting'));
    }
    public function buy($pid)
    {
        $setting = Setting::first();
        $product = Product::with('prices')->find(decryptNumber($pid));
        $images = Image::where('product_id', $product->id)->get();
        if ($product->is_mega_offer) {
            $products = Product::where('is_mega_offer', 1)->where('is_active', 1)->get();
        } else if ($product->mega_deal) {
            $products = Product::where('mega_deal', 1)->where('is_active', 1)->get();
        } else {
            $products = Product::where('category_id', $product->category_id)->where('is_active', 1)->get();
        }
        return view('frontend.buy', compact('product', 'images', 'products', 'setting'));
    }
    public function catView($cid)
    {
        $setting = Setting::first();
        $categories = Category::orderBy('order')->get();
        $products = Product::where('category_id', decryptNumber($cid))->where('is_active', 1)->get();
        $cat =  Category::find(decryptNumber($cid));
        return view('frontend.category', compact('categories', 'products', 'cat', 'setting'));
    }
    public function fetch($pid)
    {
        $count = $this->cartCount();
        $product = Product::find($pid);
        $setting = Setting::first();
        $consumables = Consumable::latest()->where('product_id', $pid)->get();
        return view('frontend.consumables', compact('product', 'consumables', 'count', 'setting'));
    }
    public function buyConsumable($cid)
    {
        $count = $this->cartCount();
        $consumable = Consumable::find($cid);
        $name = $consumable->name;
        $setting = Setting::first();
        $related = Product::where('id', '<>', '')->orWhere('name', 'LIKE', "%{$name}%")->get();
        $consumables = Consumable::where('name', 'LIKE', "%{name}%")->get();
        return view('frontend.consumable_detail', compact('consumable', 'consumables', 'related', 'count', 'cid', 'setting'));
    }
    public function search(Request $request)
    {
        $count = $this->cartCount();
        $setting = Setting::first();
        // dd($request->all());

        $searchTerm = trim(strtolower($request->product));
        // dd($searchTerm);

        $products = Product::whereRaw('LOWER(name) LIKE ?', ["%{$searchTerm}%"])
        ->orWhereRaw('LOWER(sku) LIKE ?', ["%{$searchTerm}%"])
        ->orWhereRaw('LOWER(brand) LIKE ?', ["%{$searchTerm}%"])
        ->get();
        // dd($products);


        $categories = Category::where('name', 'LIKE', "%{$request->search}%")->get();

        // $consumables = Consumable::where('name', 'LIKE', "%{$request->search}%")->get();
        return view('frontend.search', compact('products', 'count', 'setting', 'categories'));
    }
    public function filledDetail(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'city' => 'required',
            'address' => 'required',
            'trn' => '',
            'company_name' => '',
            'company_address' => '',
            'country' => 'required',
            'delivery_type' => 'required',
            'delivery_address' => 'required',
            'notes' => ''
        ]);
        /* amount */
        $cartItems = session()->get('cart');
        $total_price = 0;
        if ($cartItems != null) {
            foreach ($cartItems as $item) {
                $total_price = $total_price + ($item['price'] * $item['quantity']);
            }
        }
        session()->put('delivery_type', $request->delivery_type);
        $input = $request->all();
        $input['status'] = 'pending';
        $input['amount'] = $total_price;
        $order_id = session()->get('order_id');
        if ($order_id == null) {
            $order = Order::create($input);
            if ($cartItems != null) {
                foreach ($cartItems as $item) {
                    OrderLine::insert([
                        'order_id' => $order['id'],
                        "product_id" => $item['product_id'],
                        "name" => $item['name'],
                        "quantity" => $item['quantity'],
                        "price" => $item['price'],
                        "image" => $item['image'],
                        "variant" => $item['variant']
                    ]);
                }
            }
        } else {
            $order = Order::find($order_id);
            $order->update($input);
            OrderLine::where('order_id', $order_id)->delete();
            foreach ($cartItems as $item) {
                OrderLine::insert([
                    'order_id' => $order['id'],
                    "product_id" => $item['product_id'],
                    "name" => $item['name'],
                    "quantity" => $item['quantity'],
                    "price" => $item['price'],
                    "image" => $item['image'],
                    "variant" => $item['variant']
                ]);
            }
        }
        $setting = Setting::first();
        session()->put('order_id', $order['id']);
        return view('checkout', compact('setting'));
    }
    public function fillDetail()
    {
        $count = $this->cartCount();
        $ncount = 0;
        if ($count < 1) {
            $cartItems = session()->get('cart');
            $total_price = 0;
            $courier = 0;
            if ($cartItems != null) {
                foreach ($cartItems as $item) {
                    $total_price = $total_price + ($item['price'] * $item['quantity']);
                }
                if ($total_price < 250) {
                    // if ($item['delivery_type'] == 'ship') {
                    $courier = 25;
                    //}
                }
            }
            return view('frontend.cart', compact('cartItems', 'total_price', 'count', 'courier'));
        } else {
            $j = 0;
            $cartItems = session()->get('cart');
            $total_price = 0;
            $courier = 0;
            if ($cartItems != null) {
                foreach ($cartItems as $item) {
                    $total_price = $total_price + ($item['price'] * $item['quantity']);
                }
                if ($total_price < 250) {
                    //if ($item['delivery_type'] == 'ship') {
                    $courier = 25;
                    //}
                }
            }
            foreach ($cartItems as $item) {
                if (str_contains($item['product_id'], 'i')) {
                    $Nid = str_replace('i', '', $item['product_id']);
                    $product = Consumable::find($Nid);
                } else {
                    $product = Product::find($item['product_id']);
                }
                if ($product['quantity'] == 0) {
                    unset($cartItems[$item['product_id']]);
                    session()->put('cart', $cartItems);
                    $ncount = 1;
                } else if ($product['quantity'] < $item['quantity']) {
                    $cartItems[$item['product_id']] = [
                        "product_id" => $item['product_id'],
                        "name" => $cartItems[$item['product_id']]['name'],
                        "quantity" => $product['quantity'],
                        "price" => $cartItems[$item['product_id']]['price'],
                        "image" => $cartItems[$item['product_id']]['image'],
                        "variant" => $cartItems[$item['product_id']]['variant']
                    ];
                    session()->put('cart', $cartItems);
                    $ncount = 1;
                }
                $j++;
            }
            if ($ncount == 1) {
                $cartItems = session()->get('cart');
                $total_price = 0;
                $courier = 0;
                if ($cartItems != null) {
                    foreach ($cartItems as $item) {
                        $total_price = $total_price + ($item['price'] * $item['quantity']);
                    }
                    if ($total_price < 250) {
                        //if ($item['delivery_type'] == 'ship') {
                        $courier = 25;
                        //}
                    }
                }
                session()->flash('error quantities are unavailable ');
                return view('frontend.cart', compact('cartItems', 'total_price', 'count', 'courier'));
            }
        }
        $order_id = session()->get('order_id');
        if ($order_id != null) {
            $details = Order::find($order_id);
        } else {
            $details = null;
        }
        $setting = Setting::first();
        return view('frontend11.fill-detail', compact('count', 'details', 'total_price', 'courier', 'setting'));
    }
    public function cartCount()
    {
        $cartItems = session()->get('cart');
        $count = 0;
        if ($cartItems != "") {
            $count = count($cartItems);
        } else {
            $count = 0;
        }
        return $count;
    }
    public function contactPost(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        $details['name'] = $request->name;
        $details['email'] = $request->email;
        $details['message'] = $request->message;

        $setting = Setting::first();
        Mail::to('support@proximaenergyme.com')->send(new EmailMessage($details));

        $count = $this->cartCount();
        session()->flash('message', 'Your message sent successfully!');
        $setting = Setting::first();
        return view('frontend.contact', compact('count', 'setting'));
    }

    public function details($name, $id)
    {
        $product = Product::find($id);
        $product['images'] = Image::where('product_id', $id)->get();
        $products = @$product->category->products;
        $setting = Setting::first();

        return view('frontend.detail', compact('product', 'setting', 'products'));
    }

    public function bundleDetail($id, $name1)
    {
        $product = Bundle::find($id);
        $bundles = BundleLine::where('bundle_id', $id)->get();
        $i = 0;
        //dd($product);
        // foreach ($bundles as $item) {
        //     $images[$i]['image'] = Product::where('id', $item->product_id)->value('image');
        //     $i++;
        // }
        $images = [];
        //dd($images);
        $product->images = $images;
        $setting = Setting::first();
        //dd($product);

        return view('frontend.detail', compact('product', 'setting'));
    }

    public function checkout()
    {
        $cart = session()->get('tempcart');
        // dd($cart);
        $array = array_values($cart);
        //    dd($array);
        if ($array != null) {
            $total_price = 0;
            foreach ($array as $item) {
                $total_price = $total_price + ($item['price'] * $item['quantity']);
            }
            $total_price = $total_price + 0;
        }
        // $product = Product::find($id);
        // $product['images'] = Image::where('product_id', $id)->get();
        $setting = Setting::first();

        return view('frontend11.checkout', compact('setting', 'array', 'total_price'));
    }

    public function checkoutSubmit(Request $request)
    {
        $input = $request->validate([
            'name' => 'required',
            'order_id' => '',
            'phone' => 'required',
            'whatsapp' => 'required',
            'areacode' => '',
            'email' => '',
            'city' => 'required',
            'address' => 'required',
            'comment' => ''
        ]);
        
        // $ip = '';

        // $tt =  Location::get($ip);

        $latestOrder = Order::latest()->first();

        //dd($request);
        DB::beginTransaction();
        if (isset($latestOrder)) {
            $orderId = DB::table('INFORMATION_SCHEMA.TABLES')
                ->where('table_name', '=', 'orders')
                ->where('table_schema', '=', DB::getDatabaseName())
                ->value('AUTO_INCREMENT');
        } else {
            $orderId = 1;
        }
        if ($request->is_coupon_applied) {
            $input['coupon_code'] = $request->coupon_code;
            $input['coupon_price'] = $request->coupon_price;
            $input['coupon_id'] = $request->coupon_id;
        }
        $input['order_id'] = "UAE1000" . $orderId;
        $input['total_qty'] = 0;
        $input['delivery_charge'] = 0;
        $input['total_price'] = 0;
        $input['status'] = 'ORDER CONFIRMED';
        $input['created_by'] = $request->name;
        $input['created_user_id'] = 111;
        if ($request->email == "") {
            $input['email'] = $input['phone'] . '@gmail.com';
        }
        $orderNo = $input['order_id'];
        //dd($input);
        try {
            $order = Order::create($input);
        } catch (\Exception $e) {
            DB::rollback();
            //return redirect()->back()->with('error', 'Order is not created');
            throw $e;
        }
        //dd($order);
        OrderStatus::create([
            'order_id' => $orderNo,
            'status' => 'ORDER CONFIRMED',
            'changed_by' =>  $request->name,
            'user_id' => 111
        ]);
        $tQty = 0;
        $tPrice = 0;
        $totalVat = 0;
        $delCharge = 0;
        $del = false;
        $cart = session()->get('tempcart');
        $orderLine = array_values($cart);
        if ($orderLine != "") {
            $k = 0;
            foreach ($orderLine as $item) {
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
                    $orderlineArray[$k]['sub_price'] = $item['price'] * $item['quantity'];
                    $orderlineArray[$k]['name'] = $item['name'];
                    $orderlineArray[$k]['order_id'] = $orderNo;
                    $orderlineArray[$k]['combination_id'] = null;
                    if ($product->is_vat == 1) {
                        $orderlineArray[$k]['vat'] =  $orderlineArray[$k]['sub_price'] * 0.05;
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
            // print_r($orderlineArray);
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
            $data['total_vat'] = $totalVat;
            $data['total_price'] = $tPrice + $data['delivery_charge'];
            try {
                Order::where('order_id', $orderNo)->update($data);
            } catch (\Exception $e) {
                DB::rollback();
                throw $e;
            }
        } else {
            DB::rollback();
            //throw $e;
            return redirect()->back()->with('error', 'Product is missing');
        }

        DB::commit();
        $rew = session()->forget('tempcart');
        return redirect('/');
    }

    public function registerCustomer()
    {
        $setting = Setting::first();
        return view('frontend.register', compact('setting'));
    }

    public function registerByPhone(Request $request)
    {
        if ($request->phone != "") {
            $input['username'] = $request->phone;
            $input['phone'] = $request->phone;
            $input['password'] = bcrypt('123xyz');
            $customer = Customer::create($input);
            if ($customer != null) {
            }
        }
    }
    public function termConditions()
    {
        $count = $this->cartCount();
        $setting = Setting::first();
        return view('frontend.termcondion', compact('count', 'setting'));
    }
    public function returnPolicy()
    {
        $count = $this->cartCount();
        $setting = Setting::first();
        return view('frontend.return-policy', compact('count', 'setting'));
    }
}
