<?php

namespace App\Http\Controllers;

use App\Models\Attribute;
use App\Models\AttributeCombination;
use App\Models\Attributevalue;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;

class AttributesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Attributes = Attribute::latest()->paginate(50);

        return view('attributes.index', compact('Attributes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('attributes.create');
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
            'name' => 'required'
        ]);
        
        $input = $request->all();

        $Attribute = Attribute::create($input);
        /*Insert your data*/

       

        return redirect()->route('attributes.index')
            ->with('success', 'Attribute created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($attribute_id)
    {
        $attributedetail = Attribute::find($attribute_id);
        $values = Attributevalue::where('attribute_id',$attribute_id)->get();
        return view('attributes.show', compact('values','attributedetail','attribute_id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Attribute $Attribute)
    {
        return view('attributes.edit', [
            'attribute' => $Attribute
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Attribute $Attribute)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $input = $request->all();
        

        $Attribute->update($input);



        return redirect()->route('attributes.index')
            ->withSuccess(__('Attribute updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attribute $Attribute)
    {
        $Attribute->delete();

        return redirect()->route('attributes.index')
            ->withSuccess(__('Attribute deleted successfully.'));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function check($id)
    {
        $Attribute = Attribute::find($id);
        return view('Attributes.check', [
            'Attribute' => $Attribute
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
        Attribute::where('id', $id)->update([
            'status' => 1
        ]);

        return redirect()->route('Attributes.index')
            ->withSuccess(__('Attribute verified successfully.'));
    }
    public function imageDestroy(image $image)
    {
        print_r($image);
        die();
        $image->delete();

        return redirect()->route('Attributes.edit')
            ->withSuccess(__('Attribute deleted successfully.'));
    }

    public function addAttributeValue(Request $request,$attribute_id){
        $request->validate([
            'value' => 'required'
        ]);
        $input = $request->all();
        $input['attribute_id'] = $attribute_id;

        $Attribute = Attributevalue::create($input);
        $attributedetail = Attribute::find($attribute_id);
        $values = Attributevalue::where('attribute_id',$attribute_id)->get();
        return view('attributes.show', compact('values','attributedetail','attribute_id'));
    }

    public function destroycombination($id){

        $Combination = AttributeCombination::find($id);
        $product_id = $Combination->product_id;

        $Combination->delete();

        return redirect()->route('products.edit', $product_id);
        // $product = Product::find($product_id);
        // $images = Image::where('product_id', $product['id'])->get();
        // $attributes = Attribute::orderBy('name')->get();
        // $combinations = AttributeCombination::where('product_id', $product['id'])->get();
        //  return view('products.edit', [
        //     'product' => $product, 'images' => $images, 'attributes' => $attributes, 'combinations' => $combinations
        // ]);
    }

}
