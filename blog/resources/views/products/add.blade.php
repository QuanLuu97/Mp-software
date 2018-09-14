<!DOCTYPE html>
<html>
<head>
	<title>create</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<style type="text/css">
		.error{
			color:red;
		}
	</style>
</head>
<body>
	<div class="col-md-12 justify-content-center row mt-5">

		<div class="col-md-6">
			<div class="card">
				<div class="card-header">Add product</div>
				<div class="card-body">
					<form action="" method="post" id="form-addCategory">
						<div class="form-group">
							<label for="name">name</label>
							<input type="text" name="name" id="name" class="form-control">
						</div>
						<div class="form-group">
							<label for="price">price</label>
							<input type="text" name="price" id="price" class="form-control">
						</div>
						<div class="form-group col-md-6">
							<label for="catalog">catalog</label>
							<select id="catalog" class="form-control" name="catalog">
								<option value="">--Catalog--</option>
								@foreach($categories as $category)
									<option value="{{ $category->id }}">{{ $category->name }}</option>		
								@endforeach
							</select>
						</div>
						<div class="form-group col-md-6">
							<label for="categories">categories</label>
							<select  id="categories" class="form-control" name="categories">
							</select>
						</div>
						<div class="form-group">
							<input id="submit" value="Add" class="btn btn-success">
						</div>
						<!-- <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}"> -->
						{{ csrf_field() }}
					</form>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#catalog').change(function(){
				//var token = $('#token').val();
				var token = $("input[name='_token']").val();
				var catalog = $('#catalog').val();
				$.ajax({
					url: "{{ route('showProduct') }}",
					type: 'post',
					data: {
						catalog : catalog,
						_token : token
					},
					success: function(res){
						$('#categories').html('');
						$.each(res, function(key, value){		
		                    $('#categories').append(
		                        "<option value=" + value.id + ">" + value.name + "</option>"
		                    );
	                	});
					}
				});
			});
			jQuery.validator.addMethod("conditionPrice", function(value, element){
				//code
			});	
			$('#form-addCategory').validate({
				rules: {
					name:{
						required:true,
						minlength:3
					},
					price:{
						required:true,
						number:true,
						min:-1000
					},
					categories:{
						required:true

					}
				},
				messages:{
					name:{
						required:'không được để trống',
						minlength:'name phải hơn 3 kí tự'
					},
					price:{
						required:'không được để trống',
						number: 'phải là số ',
						min:'giá gì mà rẻ thế'
					},
					categories:{
						required:'không được để trống'
					}
				}
			});
			$('#submit').click(function(){
				var check = $('#form-addCategory').valid();
				if(check){
					var name = $('#name').val();
					var price = $('#price').val();
					var categories = $('#categories').val();
					var token = $("input[name='_token']").val();
					$.ajax({
						url: "{{ route('storeProduct') }}",
						type: 'post',
						data:{
							name:name,
							price:price,
							categories:categories,
							_token:token
						},
						success:function(res){
						
								alert(res.msg);
						},
						error:function(err){
							alert('lỗi cú pháp gì đếch biết ==');
						}
					});
				}
			});
		});
	</script>
</body>
</html>