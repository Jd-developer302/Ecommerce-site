<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Product;
use App\Models\Setting;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function show($id, $pid)
    {
        // $image->delete();
        Image::where('id', $id)->delete();
        $product = Product::find($pid);
        $images = Image::where('product_id', $product['id'])->get();
        return redirect()->route('products.edit', $product['id']);
        // ->with('success', 'Product created successfully.');

        // return view('products.edit', [
        //     'product' => $product,'images' => $images
        //]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        print_r($id);
        die();
        return redirect()->route('products.edit')
            ->withSuccess(__('product deleted successfully.'));
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
    public function destroy(Image $image)
    {
        // print_r($image);
        // die();
        $image->delete();

        return redirect()->route('products.index')
            ->withSuccess(__('product deleted successfully.'));
    }

    public function bannerDelete($banner)
    {
        // $image->delete();

        $setting = Setting::first();
        $setting->$banner = null;
        $setting->save();
        return redirect()->route('settings.index',  compact($setting));
        // ->with('success', 'Product created successfully.');

        // return view('products.edit', [
        //     'product' => $product,'images' => $images
        //]);
    }
}
