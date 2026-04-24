<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Consumable;
use App\Models\Product;
use Illuminate\Http\Request;

class ConsumablesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Consumables = Consumable::latest()->paginate(50);

        return view('consumables.index', compact('Consumables'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        return view('consumables.create', compact('products'));
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
            'image' => 'required|image|mimes:png,jpg,jpeg,webp,avif,webp,avif|max:2048',
            'product_id' => 'required',
            'description' => 'required',
            'price' => 'required',
        ]);
        $input = $request->all();


        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }
        $consumable = Consumable::create($input);
        /*Insert your data*/

       

        return redirect()->route('consumables.index')
            ->with('success', 'Consumable created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(consumable $consumable)
    {
        return view('consumables.show', [
            'consumable' => $consumable
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(consumable $consumable)
    {
        $products = Product::all();
        return view('consumables.edit', [
            'consumable' => $consumable, 'products' => $products
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, consumable $consumable)
    {
        $request->validate([
            'name' => 'required',
            'product_id' => 'required',
            'price' => 'required',
            'description' => 'required',
        ]);

        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        } else {
            unset($input['image']);
        }

        $consumable->update($input);



        return redirect()->route('consumables.index')
            ->withSuccess(__('consumable updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(consumable $consumable)
    {
        $consumable->delete();

        return redirect()->route('consumables.index')
            ->withSuccess(__('consumable deleted successfully.'));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function check($id)
    {
        $consumable = consumable::find($id);
        return view('consumables.check', [
            'consumable' => $consumable
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
        consumable::where('id', $id)->update([
            'status' => 1
        ]);

        return redirect()->route('consumables.index')
            ->withSuccess(__('consumable verified successfully.'));
    }
    public function imageDestroy(image $image)
    {
        $image->delete();

        return redirect()->route('consumables.edit')
            ->withSuccess(__('consumable deleted successfully.'));
    }
}
