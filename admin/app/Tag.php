<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = 'tag';
    public $timestamps = false;

    public function news_tag() {
    	return $this->hasMany('App\News_Tag', 'tag_id', 'id');
    }
}
