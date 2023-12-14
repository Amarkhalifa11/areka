<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{

    public function all_product_api()
    {
        $products = Product::all();
        return response()->json($products, 200);
    }

    public function single_product($id)
    {
        $products = Product::find($id);
        return view('frontend.single_product' , compact('products'));
    }

    public function single_product_api($id)
    {
        $products = Product::find($id);
        return response()->json($products, 200);
    }
    
    public function store(StoreProductRequest $request)
    {
        //
    }


    public function edit(Product $product)
    {
        //
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        //
    }

    public function destroy(Product $product)
    {
        //
    }
}
