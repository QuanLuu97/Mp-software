<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;
use App\Models\Person;

class ExcelController extends Controller
{
    public function importFile()
    {
    	return view('excel.import');
    }
    public function postImport(Request $request)
    {
    	if($request->hasFile('filesTest')) {
    		$file = $request->file('filesTest');
    		$file->move('uploads/files', $file->getClientOriginalName());
    	}
        Excel::load('uploads/files/' .$file->getClientOriginalName(), function($reader) {
       		foreach ($reader->all() as $sheet) {
       			Person::insert($sheet->toArray());
       		}
       		
       });
    }
}