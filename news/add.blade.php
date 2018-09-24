@extends('templates.admin.index')
@section('content')

<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="{{ route('home') }}">Home</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="#">eCommerce</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="{{ route('indexNews') }}">News</a>

        </li>
    </ul>
    <div class="page-toolbar">
        <div id="dashboard-report-range" class="pull-right tooltips btn btn-sm btn-default" data-container="body"
             data-placement="bottom" data-original-title="Change dashboard date range">
            <i class="icon-calendar"></i>&nbsp; <span class="thin uppercase visible-lg-inline-block"></span>&nbsp; <i
                class="fa fa-angle-down"></i>
        </div>
    </div>
</div>


	<div class="portlet light bordered">
		<div class="portlet-title">
			<div class="caption font-red-sunglo">
				<i class="icon-settings font-red-sunglo"></i>
				<span class="caption-subject bold uppercase"> ADD </span>
			</div>	
		</div>
		<div class="portlet-body form">
			<form role="form" action="{{ route('storeNews') }}" enctype="multipart/form-data" method="post" accept="image/*">
				<div class="form-body">
					<div class="form-group form-md-line-input">
						<input type="text" class="form-control" name="title" id="form_control_1" placeholder="title" value="{{ old('title') }}">
						<label for="form_control_1">Title input</label>
						@if($errors->has('title'))
							<div class="alert alert-danger">{{ $errors->first('title') }}</div>
						@endif
					</div>
					<div class="form-group form-md-line-input">
						<input type="file" class="form-control" name="image" id="image"  multiple >
						<img src="" id="image_tag" width="200px">
						<label for="form_control_1">Image Input</label>
						@if($errors->has('image'))
							<div class="alert alert-danger">{{ $errors->first('image') }}</div>
						@endif
					</div>
					<div class="form-group form-md-line-input has-success ">
						<textarea class="form-control ckeditor" name="content">{{ old('content') }}</textarea>
						<label for="form_control_1">Content input</label>
						@if($errors->has('content'))
							<div class="alert alert-danger">{{ $errors->first('content') }}</div>
						@endif
					</div>
					<div class="form-group form-md-line-input ">
						<input type="date" class="form-control" name="date" id="form_control_1" value="{{ old('date') }}">
						<label for="form_control_1">Date input</label>
						@if($errors->has('date'))
							<div class="alert alert-danger">{{ $errors->first('date') }}</div>
						@endif
					</div>				
				</div>
				<div class="form-actions noborder">
					<button type="submit" class="btn blue">Submit</button>
					<a href="{{ route('indexNews') }}" class="btn default">Cancel</a>
				</div>
				{{ csrf_field() }}
			</form>
		</div>
	</div>

<script type="text/javascript">
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
@endsection