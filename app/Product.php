<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	protected $fillable = ['title', 'stock', 'price', 'category_id'];

    public function category(){
    	return $this->belongsTo('App\Category');
    }

    public function orderItems(){
    	return $this->hasMany('App\OrderItem');
    }
}
