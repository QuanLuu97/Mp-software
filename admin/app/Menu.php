<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = "tbl_menus";
    protected $fillable = [
       'name'
    ];

    public function menu_parent() {
    	return $this->belongsTo('App\Menu', 'parent_id', 'id');
    }
    public function menus() {
        return $this->hasMany('App\Menu', 'parent_id', 'id');
    }

}
