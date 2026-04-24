<?php

namespace App\Http\Controllers;

use App\Models\Bundle;
use App\Models\ProductSpand;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductSpendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $product_id = $request->input('product_id');
        $bundle_id = $request->input('bundle_id');


        if (!$product_id && !$bundle_id) {
            return redirect()->back()->with('error', 'Product ID or Bundle ID is required');
        }

        if ($product_id) {
            $product = Product::find($product_id);

            if (!$product) {
                return redirect()->back()->with('error', 'Product not found');
            }

            $productSpands = ProductSpand::where('product_id', $product_id)->get();
            return view('product_spend.index', [
                'productSpands' => $productSpands,
                'product' => $product,
            ]);
        }

        if ($bundle_id) {
            $bundle = Bundle::find($bundle_id);
            if (!$bundle) {
                return redirect()->back()->with('error', 'Bundle not found');
            }

            $productSpands = ProductSpand::where('bundle_id', $bundle_id)->get();
            return view('product_spend.index', [
                'productSpands' => $productSpands,
                'product' => $bundle, // still using 'product' in view for simplicity
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $product_id = $request->input('product_id');
        $bundle_id = $request->input('bundle_id');

        if (!$product_id && !$bundle_id) {
            return redirect()->back()->with('error', 'Product ID or Bundle ID is required');
        }

        if ($product_id) {
            $productSpands = ProductSpand::where('product_id', $product_id)->get();
            return view('product_spands.create', compact('productSpands', 'product_id'));
        }

        if ($bundle_id) {
            $productSpands = ProductSpand::where('bundle_id', $bundle_id)->get();
            return view('product_spands.create', compact('productSpands', 'bundle_id'));
        }
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
            'total_spand'  => 'required|numeric|min:0',
            'reason'       => 'nullable|string|max:255',
            'product_id'   => 'nullable|exists:products,id',
            'bundle_id'    => 'nullable|exists:bundles,id',
            'date_spend'   => 'nullable|date',
        ]);

        // Ensure at least one of product_id or bundle_id is present
        if (empty($request->product_id) && empty($request->bundle_id)) {
            return redirect()->back()->with('error', 'Product ID or Bundle ID is required.');
        }

        $productSpend = new ProductSpand();
        $productSpend->product_id = $request->product_id;
        $productSpend->bundle_id = $request->bundle_id;
        $productSpend->total_spand = $request->total_spand;
        $productSpend->date_spend = $request->date_spend ?? now();
        $productSpend->reason = $request->reason;
        $productSpend->save();

        return redirect()->back()->with('success', 'Total spend added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\resource  $resource
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\resource  $resource
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $productSpand = ProductSpand::find($id);

        if (!$productSpand) {
            return redirect()->back()->with('error', 'Record not found.');
        }

        return view('product_spend.edit', compact('productSpand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\resource  $resource
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'total_spand' => 'required|numeric|min:0',
        ]);

        $productSpand = ProductSpand::find($id);

        if (!$productSpand) {
            return redirect()->back()->with('error', 'Record not found.');
        }

        $productSpand->update([
            'total_spand' => $request->total_spand,
            'reason' => $request->reason,
            'date_spend' => $request->date_spend ?? now(),
        ]);

        // Determine redirect parameters based on which ID exists
        if ($productSpand->product_id) {
            return redirect()->route('product.spands.index', ['product_id' => $productSpand->product_id])
                ->with('success', 'Product spend updated successfully.');
        } elseif ($productSpand->bundle_id) {
            return redirect()->route('product.spands.index', ['bundle_id' => $productSpand->bundle_id])
                ->with('success', 'Product spend updated successfully.');
        }

        return redirect()->route('product.spands.index')
            ->with('success', 'Product spend updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\resource  $resource
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $productSpand = ProductSpand::find($id);

        if (!$productSpand) {
            return redirect()->back()->with('error', 'Record not found.');
        }

        $productSpand->delete();

        return redirect()->back()->with('success', 'Product spend deleted successfully.');
    }
}
