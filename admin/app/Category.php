<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $guarded = ['id'];
    public $timestamps = false; 

    public function categories() {
        return $this->hasMany('App\Category', 'parent_id', 'id');
    }

    public function catalog() {
        return $this->belongsTo('App\Category', 'parent_id', 'id');
    }
    public function Cat_News() {
    	return $this->hasMany('App\Cat_News','category_id','id');
    }
}
