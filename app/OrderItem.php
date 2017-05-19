<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
     protected $fillable = ['order_id', 'product_id', 'quantity', 'price', 'subtotal'];
    
     public function product(){
     	
     	return $this->belongsTo('App\Product');
     }

     public function order()
     {
     	return $this->belongsTo('App\Order');
     }
}
