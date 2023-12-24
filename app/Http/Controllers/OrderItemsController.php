<?php

namespace App\Http\Controllers;

use App\Models\Order_items;
use Illuminate\Http\Request;

class OrderItemsController extends Controller
{

    public function all_orders_items()
    {
        $all_orders_items = Order_items::all();
        return view('backend.orders items.all_orders_item' , compact('all_orders_items'));
    }

    public function destroy($id)
    {
        
        $all_orders_items = Order_items::find($id);
        $all_orders_items->delete();
        return redirect()->route('dashboard.orders_items.all_orders_items')->with('message' , 'the item is deleted successfully');

    }
}
