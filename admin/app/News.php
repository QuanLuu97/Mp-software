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
        'date',
        'description',
        'slug',
        'status'
    ];

    public function cat_news() {
        return $this->hasMany('App\Cat_News','news_id','id');
    }

    public function news_tag() {
        return $this->hasMany('App\News_Tag', 'news_id', 'id');
    }
}
