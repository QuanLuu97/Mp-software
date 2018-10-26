<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    protected $table = 'form';
    public $timestamps = false;
    protected $guarded = ['id'];

    // public function create($query, $request) {
    //  form::create([
    //      'name' => $request->get('name'),
    //      'email' => $request->get('email'),
    //      'subject' => $request->get('subject'),
    //      'mess' => $request->get('message'),
    //  ]);
    // }
}
