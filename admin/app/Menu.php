<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = "tbl_menus";
    public $timestamps = false;
    protected $fillable = [
       'name',
       'parent_id',
       'status',
       'description',
       'content',
       'content2',
        'images',
        'sort',
        'slug'
    ];

    public function menu_parent() {
    	return $this->belongsTo('App\Menu', 'parent_id', 'id');
    }
    public function menus() {
        return $this->hasMany('App\Menu', 'parent_id', 'id');
    }

}
