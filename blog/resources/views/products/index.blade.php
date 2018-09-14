<!DOCTYPE html>
<html>
<head>
	<title>listProducts</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" rel="stylesheet" />
	
</head>
<body>
	<div class="col-md-12 justify-content-center row mt-5">
		<div class="col-md-10">
			<h1>List Products</h1>
			<h3>tìm kiếm</h3>
			<div class="col-md-12">
				<form class="" action="{{ route('indexProduct') }}" method="post">
					<div class="fom-group">
						<div class="row">
							<label>Catalog</label>
							<select class="col-md-2 form-control  select ml-3 mr-3" name="categories" >
								<option value="">---catalog---</option>
								@foreach($catalogs as $catalog)
									<option style="font-weight: bold; font-size: 20px;"  value="{{ $catalog->id }}">{{ $catalog->name }}</option>
									@foreach($categories as $category)
										@if($category->categories_id == $catalog->id)
											<option value="{{ $category->id }}">--{{ $category->name }}</option>
										@endif
									@endforeach
								@endforeach
							</select>
							<!-- <label>Categories</label>
							<select class="col-md-2 form-control  select ml-3" name="categories" id="categories">
								<option value="">---Categories---</option>
							</select> -->
							<button type="submit" name="submit" id="submit" class="btn btn-search ml-3">Search</button>
						</div>
					</div>
					{{ csrf_field() }}
				</form>
			</div>
			<table class="table table-hover mt-5">
				<tr>
					<th>name</th>
					<th>price</th>
					<th>category</th>
					<th>delete</th>
					<th>edit</th>
				</tr>
				@foreach($products as $product)
					<tr>
						<td>{{ $product->name }}</td>
						<td>{{ $product->price }}</td>
						<td>{{ $product->categories->name }}</td>
						<td><a href="#">delete</a></td>
						<td><a href="#">edit</a></td>
					</tr>
				@endforeach
			</table>
			<a href="{{ route('addProduct') }}" class="btn btn-success">ADD</a>
		</div>
	</div>
	<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
	<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			// $('#catalog').change(function(){
			// 	var token = $('#token').val();
			// 	var token = $("input[name='_token']").val();
			// 	var catalog = $('#catalog').val();
			// 	$.ajax({
			// 		url: "{{ route('showProduct') }}",
			// 		type: 'post',
			// 		data: {
			// 			catalog : catalog,
			// 			_token : token
			// 		},
			// 		success: function(res){
			// 			$('#categories').html('');
			// 			$('#categories').append(
			// 				"<option value="+''+">"+"---Categories---</option>"
			// 			);
			// 			if(res!=null)
			// 				$.each(res, function(key, value){		
			//                     $('#categories').append(
			//                         "<option value=" + value.id + ">" + value.name + "</option>"
			//                     );
		 //                	});
			// 		}
			// 	});
			// });

			$(".select").select2();

		});
	</script>
</body>
</html>