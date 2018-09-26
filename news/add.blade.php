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
			<form id="form-add"  enctype="multipart/form-data" method="post" accept="image/*">
				<div class="form-body">
					<div class="form-group ">
						<label for="title">Title input</label>
						<input type="text" class="form-control" name="title" id="title" placeholder="title" >

					</div>
					<div class="form-group ">
						<label for="image">Image Input</label>
						<input type="file" class="form-control" name="image" id="image" >
						<img src="" id="image_tag" width="200px">

					</div>
					<div class="form-group  ">
						<label for="content">Content input</label>
						<textarea class="form-control ckeditor" name="content"></textarea>
					</div>
					<div class="form-group ">
						<label for="date">Date input</label>
						<input type="date" class="form-control" name="date" id="date">
						
					</div>				
				</div>
				<div class="form-actions noborder">
					<button id="add" class="btn blue" type="button">Submit</button>
					<a href="{{ route('indexNews') }}" class="btn default">Cancel</a>
				</div>
				{{ csrf_field() }}
			</form>
		</div>
	</div>

<script type="text/javascript">
	//preview image
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
    $(document).ready(function(){
    	//validate
    	jQuery.validator.addMethod("isImage", function(elment){
	    	var file = $('#image')[0].files[0];
	    	if(file) {
	    		var fileType = file.type;
		    	var arrType = ['image/jpg', 'image/jpeg', 'image/png'];
		    	if($.inArray(fileType, arrType) <0 || file.size > 2048576){
		    		return false;
		    	}
		    	return true;
	    	}
	    	return true;	    
	    });
    	$('#form-add').validate({
    		ignore: [],
    		debug: false,
    		rules: {
    			title: {
    				required:true,
    				minlength:5
    			},
    			image: {
    				isImage:true
    			},
    			content: {
    				 required: function() 
					{
					CKEDITOR.instances.content.updateElement();
					},

					minlength:10
    			},
    			date: {
    				required:true,
    				date:true
    			}
    		},
    		messages: {
    			title: {
    				required: "không được để trống",
    				minlength: "5 kí tự trở lên"
    			},
    			image: {
    				isImage:"image phải đúng định dạng file và nhỏ hơn 2MB"
    			},
    			content: {
    				required:"không được để trống",
    				minlength: "5 kí tự trở lên"
    			},
    			date: {
    				required:"không được để trống",
    				date:"không đúng định dạng ngày"
    			}
    		}
    	});
    	//add
    	$('#add').click(function(){
    		var check = $('#form-add').valid();
    		if(check) {
    			var formData = new FormData();
				formData.append('title', $('#title').val());
				formData.append('content', CKEDITOR.instances.content.getData());
				formData.append('date', $('#date').val());
				formData.append('image', $('#image')[0].files[0]);
				formData.append('_token', "{{ csrf_token() }}");
    			$.ajax({
    				url: "{{ route('storeNews') }}",
    				type: 'POST',
    				data: formData,
    				contentType: false,
					processData: false,
    				success: function(res) {
    					if(res.code == 200) {
    						swal({
    							type: 'success',
    							title: 'Success',
    							text: res.msg
    						});
    					}
    					if(res.code == 404) {
    						swal({
    							type: 'error',
    							title: 'Error!',
    							text: res.msg
    						});
    					}
    				},
    				error: function(err) {
    					console.log(err);
    				}
    			});
    		}
    	});
    });
    
</script>
@endsection