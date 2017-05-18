<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\OrderItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class OrderController extends Controller
{
    public function index()
    {
    	// $orders = Order::all();
        $orders = DB::table('orders')
                    ->leftJoin('users', 'orders.user_id', '=', 'users.id')
                    ->select('orders.*', 'users.name')
                    ->orderBy('orders.id', 'desc')
                    ->get();

    	return view('orders.index', compact('orders'));
    }

    public function create(Request $request, $cartTotal)

    {
        // Calculam totalul
        $cart = $request->session()->get('cart');
        $total = $this->totalCart($cart);

        $product_id = $request->session()->get('cart', 'product_id');
        

        // Citim user id pt userul logat 
        $user_id = Auth::id();
       
       // Salvam 
        $order = Order::create([
            'user_id' => $user_id,
            'total_price' => $total,
        ]);

        $last_id = $order->id;

        //  Salvam itemurile in order_items 
        $this->saveOrderItems($cart, $last_id, $product_id);

        return redirect('/products/empty-cart');
             
    }


    // Save order items
    protected function saveOrderItems($cart, $last_id, $product_id)
    {
        //dd($cart);
        foreach($cart as $item)
        {
            $subtotal = $item['price'] * $item['q'];
            // Insert $item into order_items 
             // Citim user id pt userul logat 
            $user_id = Auth::id();
            //$order_id = Order::all();

           // $order_id = DB::table('orders')                    
           //         ->insertGetId(['field'])
          //         ->get();
           
            $order_id = $last_id;
            $product = $item['product_id'];
            $quantity = $item['q'];
            $price = $item['price'];
            $subtotal = $quantity * $price;
            

           // dd($order_id);
       
            // Salvam 
            $order_item = OrderItem::create([
            'order_id' => $last_id,
            'product_id' => $product,
            'quantity' => $quantity,
            'price' => $price,
            'subtotal' => $subtotal,
        ]);
        }
    }

    protected function totalCart($cart)
    {
        $total = 0;
        foreach($cart as $item)
        {
            $total+= $item['price'] * $item['q'];
        }

        return $total;
    }
}

