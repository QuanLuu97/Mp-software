<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Excel;

class ExController extends Controller
{	
	public function handle() {
    Excel::load('Book1.xls', function ($reader){
    	$title = $reader->getTitle();

    })->get();

	}

	public function Export() {
		Excel::create('demo1', function($excel) {
			$excel->setTitle('Our new awesome title');
			$excel->sheet('demo', function($sheet) {
				$sheet->loadView('excel.export');
			});
			// $excel->fromArray(array()

			// ]);	
		})->export('xlsx');
		
	}
	public function upload() {
		return view('excel.upload');
	}

	public function import(Request $request) {
		$file = $request->file('upload');
		//$file->move('file', $file->getClientOriginalName());
		$results = Excel::load('file/'.$file->getClientOriginalName(), function($reader) {
			$reader->all();

		})->get();
		
		return view('excel.import', compact('results'));
	}
}
