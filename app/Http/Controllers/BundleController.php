<?php

namespace App\Http\Controllers;

use App\Models\Bundle;
use App\Models\BundleLine;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class BundleController extends Controller
{
    public function index()
    {
        $Bundles = Bundle::latest()->paginate(50);
        return view('bundles.index', compact('Bundles'));
    }

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
        $bundle = Bundle::find($id);
        $lines = BundleLine::where('bundle_id', $id)->get();
        $users = User::pluck('name', 'id');
        $reviews = $bundle->reviews; 
        return view('bundles.show', compact('bundle', 'lines', 'users', 'reviews'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bundle = Bundle::find($id);
        $products = Product::all();
        $added = BundleLine::where('bundle_id', $id)->get();
        return view('bundles.edit', compact('bundle', 'products', 'added'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, bundle $bundle)
    {
        $input = $request->validate([
            'name' => 'required',
            'price' => 'required',
            'image' => '',
            'description' => '',
            'delivery_charge' => 'required',
            'is_vat' => '',
        ]);

        if ($request->is_vat == '') {
            $input['is_vat'] = 0;
        }else{
            $input['is_vat'] = 1;
        }
        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }else{
            unset($input['image']);
        }

        $bundle->update($input);

        if ($request->orderline != "") {
            $k = 0;
            foreach ($request->orderline as $item) {
                if (isset($item['image'])) {
                    $item['image'];
                } else {
                    $item['image'] = '';
                }
                if ($item['product_id'] != "" && $item['quantity'] > 0) {
                    $bundlelineArray[$k]['bundle_id'] = $bundle['id'];
                    $bundlelineArray[$k]['product_id'] = $item['product_id'];
                    $bundlelineArray[$k]['name'] = $item['name'];
                    $bundlelineArray[$k]['image'] = $item['image'];
                    $bundlelineArray[$k]['quantity'] = $item['quantity'];
                    $bundlelineArray[$k]['combination_id'] = null;
                    $k++;
                }
            }
            $bundleline = BundleLine::insert($bundlelineArray);
        }

        return redirect()->route('bundles.index')
            ->with('success', 'Bundle updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bundle $bundle)
    {
        // print_r($image);
        // die();
        $bundle->delete();

        return redirect()->route('bundles.index')
            ->withSuccess(__('Bundle deleted successfully.'));
    }

    public function destroyBundleProduct($id)
    {

        $bundle = BundleLine::where('id', $id)->first();
        $bundle_id = $bundle->bundle_id;

        $bundle->delete();

        return redirect()->route('bundles.edit', $bundle_id);
    }
    public function search(Request $request)
    {
        $query = Bundle::query();

        if ($request->has('name') && !is_null($request->name)) {
            $query->where('name', 'LIKE', '%' . $request->name . '%');
        }
        
        if ($request->has('sku') && !is_null($request->sku)) {
            $query->where('sku',$request->sku);
        }
        
        $Bundles = $query->paginate(50);
        

        return view('bundles.index', compact('Bundles'));
    }
}
