<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $table = 'categories';
    protected $guarded = ['id'];
    public $timestamps = false; 

    public function categories() {
    	return $this->hasMany('App\Models\Categories', 'parent_id', 'id');
    }

    public function catalog() {
    	return $this->belongsTo('App\Models\Categories', 'parent_id', 'id');
    }
    public function cat_news() {
        return $this->hasMany('App\Models\CategoryObj','category_id','id');
    }
}

