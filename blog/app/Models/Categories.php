<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $table = 'categories';
    protected $guarded = ['id'];
    public $timestamps = false; 

    public function categories() {
    	return $this->hasMany('App\Categories', 'categories_id', 'id');
    }

    public function catalog() {
    	return $this->belongsTo('App\Categories', 'categories_id', 'id');
    }

    public function products() {
    	return $this->hasMany('App\Products', 'categories_id', 'id');
    }
}
