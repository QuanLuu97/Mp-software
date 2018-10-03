<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';
    public $timestamps = false;
     protected $fillable = [
        'title',
        'image',
        'content',
        'date'
        
    ];

    public function categories() {
    	return $this->belongstoMany('App\Category','category_news','category_id', 'news_id');
    }
}
