<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OrderItem;
use Illuminate\Support\Facades\DB;

class OrderItemController extends Controller
{
     public function index($id)
    {
    	// $orders = Order::all();
    	//$id1 = $id;
    	//$orderItem = OrderItem::find($id1);
    	//dd($orderItem);

    	//return view('orderItem.index', compact('orderItem'));


    	 $orderItem = DB::table('order_items')
                    ->where('order_id', $id)
                    ->get();
        // dd($orderItem);
    	return view('orderItem.index', compact('orderItem'));
     
    }
}
