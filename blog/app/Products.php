<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = 'products';
    protected $gaureded = ['id'];
    public $timestamps = false;

    public function categories() {
    	return $this->belongsTo('App\Categories','categories_id', 'id');
    }
}
