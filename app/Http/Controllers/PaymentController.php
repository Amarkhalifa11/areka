<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{



    public function verify(Request $request , $transaction_id){
        $request->session()->put('transaction_id' , $transaction_id);
        return redirect()->route('complete');
        
    }

    public function complete(Request $request){

        if ($request->session()->has('order_id') && $request->session()->has('transaction_id')) {
            
            $order_id       = $request->session()->get('order_id');
            $transaction_id = $request->session()->get('transaction_id');
            $date           = date('Y-m-d');
            $status         = "paid";


            $change_status =  DB::table('orders')
            ->where('id' , $order_id)
            ->update([
                'status' => $status,
            ]);

            $payment = DB::table('payments')->insert([
                'transaction_id' => $transaction_id,
                'order_id'       => $order_id,
                'date'           => $date,
            ]);

            $request->session()->flush();
            return redirect()->route('thank_you');

        }
    }
}
