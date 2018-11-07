<?php 
	namespace App\Http\Controllers;
	use App\Models\demoModel;
	use Illuminate\Http\Request;
	use Illuminate\Http\Response;
	use App\Http\Requests;
	use App\Models\form;
	use Validator;
	/**
	* 
	*/
	class demo_Controller extends Controller
	{
		
		public function display($var = "a Quan")
		{
			echo "hello ".$var;
			return redirect()-> route('myroute');
		}
		public function viewRouter()
		{
			$md = new demoModel();
			$list = $md -> get_data();
			return view('ViewRouter',[
				'datas' => $list
			]);
		}
		public function getURL(Request $request)
		{
			//return $request->path();
			//return $request->URL();
			if($request ->isMethod('get'))
			{
				echo " phuong thuc GET";
			}
			else 
			{
				echo " phuong thuc POST";
			}
		}
		public function postForm(Request $request)
		{
			//echo "a Quan";
			echo $request->HoTen; 
		}

			// su dung cookie voi request va response trong laravel 
			// response : giup chung ta xuat ra kieu du lieuj mong muon
		public function setCookie()
		{
			$response = new Response();
			$response -> withCookie('hoTen','Le Quan', 1); // 1 tuong ung vs thoi gian song la 1'
			
			return $response;
		}   
		public function getCookie(Request $request)
		{
			return $request->cookie('hoTen');
		}

		public function postFile(Request $request)
		{
			if($request ->hasFile('myFile'))
			{
				$file = $request->file('myFile');
				$nameF = $file->getClientOriginalName('myFile'); 
				$file->move(
						'images',
						"$nameF"
						);
			}
			else
			{
				echo " chua co file";
			}
		}

		public function setJSON(){
			return response()->json(['name' => 'Quan', 'girlFriend' => 'Le']);
		}
		public function gettime($time) //time = tham so truyen vao tren route
		{
			
			return view('myView',['t'=>$time]);		// t là tham số truyền sang view với giá trị là time
		}

		public function blade($str)
		{
			if ($str == "laravel")
			{
				$khoahoc = 'Laravel - Laravel';
				return view('pages.laravel',['kh' => $khoahoc]);
			}
			elseif ($str =="php")
			{
				$khoahoc = 'PHP - PHP';
				return view('pages.php',['kh' => $khoahoc]); // dat ten bien la kh va gan $khoahoc sang cho $kh, $kh dc su dung ben view
			}
		}


		public function blade1($str)
		{
			if($str =="Quan")
			{

				$q = "Quan - Le";
				return view('pages.quan',['var' => $q]);	
			}
			elseif ($str == "Le") {
				$l = "Le - Quan";
				return view('pages.le',['var' => $l]);
			}
		}

		public function add(){
			return view('validate');
		}

		public function store(Request $request){
			

			$validate = Validator::make(
				$request->all(),
				[
					'name' => 'required|min:3',
					'email' => 'required|email',
					'subject' => 'required',
					'message' => 'required',
				],
				[
					'required' => 'không được để trống',
					'email' => 'email phải đúng định dạng',
					'min' => 'độ dài tối thiểu là 3'
				]
			);
			if($validate->fails() == false){
				return response()->json([
					'code' => 200,
					'msg' => 'thành công'
				]);
			}
			else{
				return response()->json([
					'code' => 404,
					'msg' => 'thất bại'
				]);
			}
		}
	}
