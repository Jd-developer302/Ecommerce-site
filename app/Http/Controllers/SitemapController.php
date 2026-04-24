<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    public function catalog()
    {
        // Get all products
        $products = Product::where('status', 'ACTIVE')->get();


        $xml = new \SimpleXMLElement('<catalog/>');

        foreach ($products as $product) {
            $productNode = $xml->addChild('product');
            $productNode->addChild('id', encryptNumber($product->id));
            $productNode->addChild('title', htmlspecialchars($product->name));
            $productNode->addChild('description', htmlspecialchars($product->description));
            $productNode->addChild('link', route('products.buy', encryptNumber($product->id)));
            $productNode->addChild('image_link', asset('image/' . $product->image));
            $productNode->addChild('price', $product->price . ' AED');
            $productNode->addChild('availability', 'Available');
            $productNode->addChild('brand', htmlspecialchars($product->brand));
            $productNode->addChild('sku', htmlspecialchars($product->sku));
            $productNode->addChild('condition', 'Good');
        }

        return response($xml->asXML(), 200)
            ->header('Content-Type', 'application/xml');
    }
}
