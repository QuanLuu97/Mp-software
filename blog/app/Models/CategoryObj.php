<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryObj extends Model
{
    protected $table = 'categories_object_news';
    public $timestamps = false;
    public function categories() {
    	return $this->belongsTo('App\Models\Categories','parent_id','id');
    }
    public function news() {
    	return $this->belongsTo('App\Models\News','news_id','id');
    }
}
