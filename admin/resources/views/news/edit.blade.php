<!-- không dùng tới -->

<div class="portlet-body form">
	
	<form role="form" action="{{ route('updateNews', $news->id) }}" enctype="multipart/form-data" id="form-edit" method="post" accept="image/*">
		<div class="form-body">
			<div class="form-group form-md-line-input">
				<input type="text" class="form-control" name="title" id="title" placeholder="title">
				<label for="title">Title input</label>
				@if($errors->has('title'))
					<div class="alert alert-danger">{{ $errors->first('title') }}</div>
				@endif
			</div>
			<div class="form-group form-md-line-input">
				<input type="file" class="form-control" name="image" id="image"  multiple >
				<img src="" id="image_tag" width="200px">
				<label for="image">Image Input</label>
				@if($errors->has('image'))
					<div class="alert alert-danger">{{ $errors->first('image') }}</div>
				@endif
			</div>
			<div class="form-group form-md-line-input has-success ">
				<textarea class="form-control ckeditor" name="content" id="content"></textarea>
				<label for="content">Content input</label>
				@if($errors->has('content'))
					<div class="alert alert-danger">{{ $errors->first('content') }}</div>
				@endif
			</div>
			<div class="form-group form-md-line-input ">
				<input type="date" class="form-control" name="date" id="date">
				<label for="date">Date input</label>
				@if($errors->has('date'))
					<div class="alert alert-danger">{{ $errors->first('date') }}</div>
				@endif
			</div>	
			<button type="submit" class="btn btn-primary">Save changes</button>			
		</div>
		{{ csrf_field() }}
	</form>
</div>
<script type="text/javascript">
	$(document).ready(function() {

	});
	
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#image_tag').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#image").change(function(){
        readURL(this);
    });
</script>