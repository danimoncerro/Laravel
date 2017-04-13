<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

	// Dezactiveaza coloanele created_at si updated_at 
	// public $timestamps = false;

    public function products() {
    	return $this->hasMany('App\Product');
    }
}
