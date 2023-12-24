<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use Illuminate\Http\Request;

class OrdersController extends Controller
{

    public function all_orders()
    {
        $orders = Orders::all();
        return view('backend.orders.all_orders' , compact('orders'));
    }



    public function destroy($id)
    {
        $orders = Orders::find($id);
        $orders->delete();
        return redirect()->route('dashboard.orders.all_orders')->with('message' , 'the order is deleted succefully');
    }
}
