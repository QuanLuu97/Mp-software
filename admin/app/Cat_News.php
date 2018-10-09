<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cat_News extends Model
{
	protected $table = 'category_news';
    public function categories() {
    	return $this->hasMany('App\Category','category_id','id');
    }
    public function news() {
    	return $this->hasMany('App\News','news_id','id');
    }
}
