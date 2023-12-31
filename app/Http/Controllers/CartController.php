<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add_to_cart(Request $request){

        // if session has cart
        if ($request->session()->has('cart')) {
            
            $cart = $request->session()->get('cart');

            $product_array_ids = array_column($cart , 'id');

            $id = $request->id;

            if (!in_array($id , $product_array_ids)) {
                
                $name        = $request->name;
                $image       = $request->input('image');
                $price       = $request->price;
                $sale_price  = $request->sale_price;
                $quantity    = $request->quantity;


                if ($sale_price != null) {
                    $original_price = $sale_price;
                }else{
                    $original_price = $price;
                }

                $product_array = array(
                    'id' => $id,
                    'name' => $name,
                    'image' => $image,
                    'quantity' => $quantity,
                    'price' => $original_price,
                );

                $cart[$id] = $product_array;
                $request->session()->put('cart' , $cart);

                //if the product id in cart
            }else{
                echo "<script>alert('product has been already in the cart')</script>";

            }

            $this->calculate_total($request);
            return view('frontend.cart');


        // if session dont has cart
        }else{


            $cart = array();

            $id          = $request->id;
            $name        = $request->name;
            $image       = $request->input('image');
            $price       = $request->price;
            $sale_price  = $request->sale_price;
            $quantity    = $request->quantity;

            if ($sale_price != null) {
                $original_price = $sale_price;
            }else{
                $original_price = $price;
            }

            $product_array = array(
                'id'       => $id,
                'name'     => $name,
                'image'    => $image,
                'quantity' => $quantity,
                'price'    => $original_price,
            );

            $cart[$id] = $product_array;
            $request->session()->put('cart' , $cart);

            $this->calculate_total($request);
            return view('frontend.cart');

        }

    }

    public function calculate_total(Request $request){

        $cart = $request->session()->get('cart');
        $total_price = 0;
        $total_quantity = 0;

        foreach ($cart as $id => $product) {
            
            $product = $cart[$id];

            $price    = $product['price'];
            $quantity = $product['quantity'];

            $total_price = $total_price + ($price * $quantity);
            $total_quantity = $total_quantity + $quantity;
        }

        $request->session()->put('total' , $total_price);
        $request->session()->put('quantity' , $total_quantity);

    }

    public function remove_from_cart(Request $request){


        if($request->session()->has('cart')){
            
            $cart = $request->session()->get('cart');
            $id = $request->id;

            unset($cart[$id]);

            $request->session()->put('cart' , $cart);
            $this->calculate_total($request);
        }
            return view('frontend.cart');

    }

    public function edit_quantity(Request $request){

        if($request->session()->has('cart')){
        $product_id = $request->id;
        $product_quantity = $request->quantity;
        
        if ($request->has('decrease')) {
            $product_quantity = $product_quantity - 1 ; 
        }elseif ($request->has('increase')) {
            $product_quantity = $product_quantity + 1 ; 
        }

        if($product_quantity == 0){
            $this->remove_from_cart($request);
        }
        
        $cart = $request->session()->get('cart');


        if (array_key_exists($product_id , $cart)) {
            $cart[$product_id]['quantity']  = $product_quantity;
            $request->session()->put('cart' , $cart);
            $this->calculate_total($request);
        }
        }

        return view('frontend.cart');
    }

    public function place_order(Request $request){

        if ($request->session()->has('cart')) {
            

            $name    = $request->name;
            $email   = $request->email;
            $adress  = $request->adress;
            $phone   = $request->phone;
            $city    = $request->city;
            $date    = date('Y-m-d');
            $status  = "not paid";
            $cost    = $request->session()->get('total');

            $cart = $request->session()->get('cart');

            $order_id = DB::table('orders')->insertGetId([

                'name'    => $name,
                'email'   => $email,
                'cost'    => $cost,
                'adress'  => $adress,
                'phone'   => $phone,
                'city'    => $city,
                'date'    => $date,
                'status'  => $status,
            ] , 'id');

            
            foreach ($cart as $id => $product) {
                
                $product = $cart[$id];

                $product_id        = $product['id'];
                $product_name      = $product['name'];
                $product_price     = $product['price'];
                $product_quantity  = $product['quantity'];
                $product_image     = $product['image'];
                $order_date        = date('Y-m-d');

                $order_items = DB::table('order_items')->insert([
                    'order_id'          => $order_id,
                    'product_id'        => $product_id,
                    'product_name'      => $product_name,
                    'product_image'     => $product_image,
                    'product_price'     => $product_price,
                    'product_quantity'  => $product_quantity,
                    'order_date'        => $order_date,
                ]);
            }

            
            $request->session()->put('order_id' , $order_id);
            return view('frontend.payment');


        }else{
            return redirect()->route('home');
        }
    }

}