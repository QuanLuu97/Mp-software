<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';
    //public $timestamps = false;
    protected $fillable = [
        'title',
        'image',
        'content',
        'date',
        'description',
        'slug',
        'status',
        'created_at',
        'updated_at'
    ];

    public function cat_news() {
        return $this->hasMany('App\Models\CategoryObj','news_id','id');
    }

    public function news_tag() {
        return $this->hasMany('App\Models\TagObj', 'news_id', 'id');
    }
}
