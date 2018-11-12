<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExcelController extends Controller
{
    public function importFile() {
    	return view('excel.import');
    }

    public function postImport(Request $request) {
    	return 1;
    }
}
