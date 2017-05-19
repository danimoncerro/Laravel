<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OrderItem;
use App\Order;
use Illuminate\Support\Facades\DB;

class OrderItemController extends Controller
{
     public function index($id)
    {
    	// $orderItems = DB::table('order_items')
     //                ->where('order_id', $id)
     //                ->get();
       
       	// Array 
    	//$orderItems = OrderItem::where('order_id', $id)->get();

    	// Object 
    	$order = Order::find($id);

    	return view('orderItem.index', compact(
    										['orderItems', 'order']
    									));
     
    }
}
