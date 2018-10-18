<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cat_News extends Model
{
	protected $table = 'categories_object_news';
    public function categories() {
    	return $this->belongsTo('App\Category','category_id','id');
    }
    public function news() {
    	return $this->belongsTo('App\News','news_id','id');
    }
}
