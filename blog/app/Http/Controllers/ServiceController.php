<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;

class ServiceController extends Controller
{
    public function indexService ()
    {
    	$service = Categories::where('name', 'Service')->first();
    	return view('service.indexService', compact('service'));
    }
}
