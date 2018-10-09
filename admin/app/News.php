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

    public function Cat_News() {
        return $this->belongsTo('App\Cat_News','news_id','id');
    }
}
