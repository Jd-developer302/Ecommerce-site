<?php

namespace App\Http\Controllers;

use App\Models\Attribute;
use App\Models\AttributeCombination;
use App\Models\Bundle;
use App\Models\BundleLine;
use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;

class ProductsController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:product-list|product-create|product-edit|product-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:product-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:product-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:product-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Products = Product::latest()->paginate(50);

        return view('products.index', compact('Products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $attributes = Attribute::orderBy('name')->get();
        return view('products.create', compact('attributes', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'image' => 'required|image|mimes:png,jpg,jpeg,webp,avif|max:2048',
            'stock' => 'required',
            'brand' => 'required',
            'description' => '',
            'old_price' => 'required',
            'delivery_charge' => 'required',
            'category_id' => 'required',
            'cost_per_product' => 'nullable|numeric|min:1',
        ]);

        if ($request->attr_id_order) {
            $arrayIds = (string)"$request->attr_id_order";

            $stringNew = substr($arrayIds, 1, -1);
            // $arrayNew = (array)$stringNew;
            $arrayNew = str_replace("],", "]@", $stringNew);
            $arrayIdsNew = explode("@", $arrayNew);
        }
        $input = $request->all();
        if ($request->is_newarrival == '') {
            $input['is_newarrival'] = 0;
        }
        if ($request->is_vat == '') {
            $input['is_vat'] = 0;
        }
        if ($request->mega_deal == '') {
            $input['mega_deal'] = 0;
        }
        if ($request->is_mega_offer == '') {
            $input['is_mega_offer'] = 0;
        }
        if ($request->is_active == '') {
            $input['is_active'] = 0;
        }


        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }
        $input['sku'] = $this->generate_sku('UAEP', $input['name'], 15);
        $input['price'] = 0; // Temporary value to avoid SQL error
        $product = Product::create($input);

        if ($files = $request->file('images')) {
            foreach ($files as $file) {
                $name = $file->getClientOriginalName();
                $file->move('images', $name);
                Image::insert([
                    'image' =>  $name,
                    'product_id' => $product['id'],
                ]);
            }
        }

        if ($request->moreFields != "") {
            $i = 0;
            foreach ($request->moreFields as $item) {
                $variantImage = "";
                if (isset($item['image'])) {
                    $destinationPath = 'image/';
                    $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
                    $image->move($destinationPath, $profileImage);
                    $variantImage = "$profileImage";
                }
                AttributeCombination::insert([
                    'product_id' => $product['id'],
                    'sku' =>  $item['sku'],
                    'stock' => $item['stock'],
                    'unit_amount' =>  $item['price'],
                    'image' => $variantImage,
                    'attribute_ids_combinations' => $arrayIdsNew[$i],
                    'attribute_comb_name' => $item['combination'],
                ]);
                $i++;
            }
        }

        // Save multiple prices if provided
        if ($request->has('prices')) {
            $singleProductPrice = null;
            foreach ($request->prices as $price) {
                if (!empty($price['quantity']) && !empty($price['cost'])) {
                    $product->prices()->create([
                        'quantity' => $price['quantity'],
                        'cost' => $price['cost'],
                    ]);
                    if ($price['quantity'] == 1) {
                        $singleProductPrice = $price['cost'];
                    }
                }
            }
            // Update product's main price column with the price for quantity 1
            if ($singleProductPrice !== null) {
                $product->price = $singleProductPrice;
                $product->save();
            }
        }

        return redirect()->route('products.index')
            ->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(product $product)
    {
        $users = User::pluck('name', 'id');
        $reviews = $product->reviews;
        return view('products.show', [
            'product' => $product,
            'users' => $users,
            'reviews' => $reviews
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(product $product)
    {
        $categories = Category::all();
        $images = Image::where('product_id', $product['id'])->get();
        $attributes = Attribute::orderBy('name')->get();
        $combinations = AttributeCombination::where('product_id', $product['id'])->get();
        return view('products.edit', [
            'product' => $product,
            'images' => $images,
            'attributes' => $attributes,
            'combinations' => $combinations,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, product $product)
    {

        $request->validate([
            'name' => 'required',
            'image' => '',
            'stock' => 'required',
            'brand' => 'required',
            'description' => 'required',
            'delivery_charge' => 'required',
            'category_id' => 'required',
            'old_price' => 'required',
        ]);

        if ($request->attr_id_order) {
            $arrayIds = (string)"$request->attr_id_order";

            $stringNew = substr($arrayIds, 1, -1);
            // $arrayNew = (array)$stringNew;
            $arrayNew = str_replace("],", "]@", $stringNew);
            $arrayIdsNew = explode("@", $arrayNew);
        }
        $input = $request->all();
        if ($request->is_newarrival == '') {
            $input['is_newarrival'] = 0;
        }
        if ($request->is_vat == '') {
            $input['is_vat'] = 0;
        }
        if ($request->mega_deal == '') {
            $input['mega_deal'] = 0;
        }
        if ($request->is_mega_offer == '') {
            $input['is_mega_offer'] = 0;
        }
        if ($request->is_active == '') {
            $input['is_active'] = 0;
        }


        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        } else {
            unset($input['image']);
        }
        $product->update($input);

        if ($files = $request->file('images')) {
            foreach ($files as $file) {
                $name = $file->getClientOriginalName();
                $file->move('images', $name);
                Image::insert([
                    'image' =>  $name,
                    'product_id' => $product['id'],
                ]);
            }
        }

        if ($request->moreFields != "") {
            $i = 0;
            foreach ($request->moreFields as $item) {
                $variantImage = "";
                if (isset($item['image'])) {
                    $destinationPath = 'image/';
                    $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
                    $image->move($destinationPath, $profileImage);
                    $variantImage = "$profileImage";
                }
                AttributeCombination::insert([
                    'product_id' => $product['id'],
                    'sku' =>  $item['sku'],
                    'stock' => $item['stock'],
                    'unit_amount' =>  $item['price'],
                    'image' => $variantImage,
                    'attribute_ids_combinations' => $arrayIdsNew[$i],
                    'attribute_comb_name' => $item['combination'],
                ]);
                $i++;
            }
        }

        // Update prices
        if ($request->has('prices')) {
            // Delete old prices
            $product->prices()->delete();
            $singleProductPrice = null;
            foreach ($request->prices as $price) {
                if (!empty($price['quantity']) && !empty($price['cost'])) {
                    $product->prices()->create([
                        'quantity' => $price['quantity'],
                        'cost' => $price['cost'],
                    ]);
                    if ($price['quantity'] == 1) {
                        $singleProductPrice = $price['cost'];
                    }
                }
            }
            // Update product's main price column with the price for quantity 1
            if ($singleProductPrice !== null) {
                $product->price = $singleProductPrice;
                $product->save();
            }
        }

        return redirect()->route('products.index')
            ->withSuccess(__('Product updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(product $product)
    {
        $product->delete();

        return redirect()->route('products.index')
            ->withSuccess(__('Product deleted successfully.'));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function check($id)
    {
        $product = product::find($id);
        return view('products.check', [
            'product' => $product
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
        product::where('id', $id)->update([
            'status' => 1
        ]);

        return redirect()->route('products.index')
            ->withSuccess(__('product verified successfully.'));
    }
    public function imageDestroy(image $image)
    {
        print_r($image);
        die();
        $image->delete();

        return redirect()->route('products.edit')
            ->withSuccess(__('product deleted successfully.'));
    }
    public function addProductBunddle()
    {
        $products = Product::all();
        return view('products.add_bunddle', compact('products'));
    }

    public function saveProductBundle(Request $request)
    {

        $input = $request->validate([
            'name' => 'required',
            'price' => 'required',
            'image' => 'required',
            'description' => '',
            'delivery_charge' => 'required'
        ]);

        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }
        if ($request->is_vat == '') {
            $input['is_vat'] = 0;
        }
        $input['sku'] = $this->generate_sku('UAEB', $input['name'], 15);
        $bundle = Bundle::create($input);

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
            ->with('success', 'Bundle created successfully.');
    }
    public function generate_sku($prefix, $name, $length)
    {
        $name = strtoupper(preg_replace('/[^A-Za-z0-9-]+/', '_', $name));
        $rand_num = rand(1000, 9999);
        $micro_time = round(microtime(true) * 1000);
        $sku = uniqid($prefix . $micro_time . $name . $rand_num);
        return substr($sku, 0, $length);
    }
    public function search(Request $request)
    {
        $query = Product::query();

        if ($request->has('name') && !is_null($request->name)) {
            $query->where('name', 'LIKE', '%' . $request->name . '%');
        }


        if ($request->has('sku') && !is_null($request->sku)) {
            $query->where('sku', $request->sku);
        }


        $Products = $query->paginate(50);


        return view('products.index', compact('Products'));
    }

    public function showHistory(product $product)
    {
        dd($product->activity);

        return view('products.history', compact('product', 'activities'));
    }
}
