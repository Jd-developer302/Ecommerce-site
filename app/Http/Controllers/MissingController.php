<?php

namespace App\Http\Controllers;

use App\Models\Missing;
use Illuminate\Http\Request;

class MissingController extends Controller
{

    public function index()
    {
        $orders = Missing::latest()->paginate(50);
        $input = array();
        return view('missing.index', compact('orders'));
    }
    public function addMissingOrder(Request $request)
    {

        $input = $request->validate([
            'name' => 'required',
            'product_id' => '',
            'phone' => 'required',
            'whatsapp' => '',
            // 'email' => '',
            'city' => '',
        ]);
        $miss = Missing::create([
            "product_id" => $input['product_id'],
            "name" => $input['name'],
            "whatsapp" => $input['whatsapp'],
            "phone" => $input['phone'],
            "city" => $input['city'],
            // "email" => $input['email'],
            "quantity" => 1
        ]);


        session()->put('missing_id', $miss->id);

        return @$miss->id;
    }
}
