<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Auth;

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

    public function all_product()
    {
        $products = Product::all();
        return view('backend.product.all_product' , compact('products'));
    
    }

    public function create(){
        $categories = Category::all();
        return view('backend.product.add_product' , compact('categories'));
    }
    
    public function store(StoreProductRequest $request)
    {
        $name         = $request->name;
        $desc         = $request->desc;
        $price        = $request->price;
        $sale_price   = $request->sale_price;
        $quantity     = $request->quantity;
        $user_id      = Auth::user()->id;
        $category_id  = $request->category_id;

        $image_product = $request->file('image');


        $name_gen = hexdec(uniqid()); 
        $img_ext = strtolower($image_product->getClientOriginalExtension()); 
        $img_name = $name_gen . '.' . $img_ext; 
         
        $upload_location = 'frontend/images/'; 
        $image = $img_name; 
        $image_product->move($upload_location,$img_name); 

        $product = Product::create([
            'name'         => $name,
            'price'        => $price,
            'desc'         => $desc,
            'sale_price'   => $sale_price,
            'quantity'     => $quantity,
            'user_id'      => $user_id,
            'category_id'  => $category_id,
            'image'        => $image,
        ]);

        return redirect()->route('dashboard.product.all_product')->with('message' , 'the product is added successfully');

    }


    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::all();

        return view('backend.product.edit_product' ,compact('product' , 'categories'));
    }

    public function update(UpdateProductRequest $request,$id)
    {
        $products = Product::find($id);

        $name         = $request->name;
        $desc         = $request->desc;
        $price        = $request->price;
        $sale_price   = $request->sale_price;
        $quantity     = $request->quantity;
        $user_id      = Auth::user()->id;
        $category_id  = $request->category_id;

        $image_product = $request->file('image');


        $name_gen = hexdec(uniqid()); 
        $img_ext = strtolower($image_product->getClientOriginalExtension()); 
        $img_name = $name_gen . '.' . $img_ext; 
         
        $upload_location = 'frontend/images/'; 
        $image = $img_name; 
        $image_product->move($upload_location,$img_name); 

        $products->update([
            'name'         => $name,
            'price'        => $price,
            'desc'         => $desc,
            'sale_price'   => $sale_price,
            'quantity'     => $quantity,
            'user_id'      => $user_id,
            'category_id'  => $category_id,
            'image'        => $image,
        ]);

        return redirect()->route('dashboard.product.all_product')->with('message' , 'the product is updated successfully');
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
                return redirect()->route('dashboard.product.all_product')->with('message' , 'the product is deleted successfully');

    }
}
