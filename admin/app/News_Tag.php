<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\News;

class News_Tag extends Model
{
    protected $table = 'news_tag';
    public $timestamps = false;

    public function news() {
    	return $this->belongsTo(News::class, 'news_id', 'id');
    }

     public function tag() {
    	return $this->belongsTo('App\Tag', 'tag_id', 'id');
    }
}
