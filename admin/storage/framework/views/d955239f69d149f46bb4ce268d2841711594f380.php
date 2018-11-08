<?php $__env->startSection('content'); ?>

<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="<?php echo e(route('home')); ?>">Home</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="#">eCommerce</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="<?php echo e(route('indexNews')); ?>">News</a>

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

<div class="col-md-12 portlet box green-haze">
	<div class="portlet-title">
		<div class="caption">
			<i class="fa fa-globe"></i>List News
		</div>
		
	</div>
	<div class="col-md-12 portlet-body">
		<table class="table table-striped table-bordered table-hover" id="sample_2">
		<thead>
		<tr>
			<th class="col-md-2 text-center">
				Title
			</th >
			<th class="col-md-1 text-center">
				Category
			</th >
			<th class="col-md-3 text-center">
				Image
			</th>
			<th class="col-md-4 text-center">
				Content
			</th>
			<th class="col-md-1 text-center">
				Date
			</th>
			<th class="col-md-1 text-center" colspan="2">
				
			</th>
		</tr>
		</thead>
		<tbody>
		<?php $__currentLoopData = $newss; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $news): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<tr>
				<td class="text-center"><?php echo e($news->title); ?></td>
				<td class="text-center"><?php echo e($news->title); ?></td>
				<td class="text-center"><img src="<?php echo e(asset('image/'.$news->image)); ?>" width="200px" height="200px"></td>
				<td class="text-center"><?php echo $news->content; ?></td>
				<td class="text-center"><?php echo e($news->date); ?></td>
				<td>
					<!-- onclick='deleteItem(<?php echo $news->id; ?>)' -->
					<a class="glyphicon btn btn-primary" id="delete" onclick='deleteItem(<?php echo $news->id; ?>)'" >&#xe020;</a>
				</td>
				<td>				
					<button class="glyphicon btn btn-primary" data-toggle="modal" data-target="#edit" onclick='getRecord(<?php echo $news->id; ?>)'>&#x270f;</button>			
				</td>
			</tr>
			
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>		

		</tbody>
		</table>
		<div id="edit"  class="modal fade" tabindex="-1" role="dialog">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" >&times;</button>
					<h4 class="modal-title">Edit</h4>
					</div>
					<div class="modal-body">
						<form id="form-edit" >
							<div class="form-body">							
								<div class="form-group ">
									<label for="title">Title input</label>
									<input type="text" class="form-control" name="title" id="title" placeholder="title">
																		
								</div>
								<div class="form-group ">
									<label for="image">Image Input</label>
									<input type="file" class="form-control" name="image" id="image"   >
									<img src="" id="image_tag" width="200px">
									
									<?php if($errors->has('image')): ?>
										<div class="alert alert-danger"><?php echo e($errors->first('image')); ?></div>
									<?php endif; ?>
								</div>
								<div class="form-group ">
									<label for="content">Content input</label>
									<textarea class="form-control ckeditor" name="content" id="content"></textarea>
									
									<?php if($errors->has('content')): ?>
										<div class="alert alert-danger"><?php echo e($errors->first('content')); ?></div>
									<?php endif; ?>
								</div>
								<div class="form-group  ">
									<label for="date">Date input</label>
									<input type="date" class="form-control" name="date" id="date">
									
									<?php if($errors->has('date')): ?>
										<div class="alert alert-danger"><?php echo e($errors->first('date')); ?></div>
									<?php endif; ?>
								</div>
								<input type="hidden" id="post_id" value="" />
								<span id="save" class="btn btn-primary">Save changes</span>	
								<div class="form-group form-md-line-input ">
									<span id="mess"></span>
								</div>				
							</div>
							<?php echo e(csrf_field()); ?>

						</form>
					</div>
					<div class="modal-footer">
						<a href="<?php echo e(route('indexNews')); ?>"  class="btn btn-default" >Close</a>						
					</div>
				</div><!-- /.modal-content -->

			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
	</div>

<script type="text/javascript">
	//get data by ajax
	function getRecord(id) {
		if (id > 0) {
			$.ajax({
				url: "<?php echo e(route('getData')); ?>",
				type: 'post',
				data: {
					id : id,
					_token: '<?php echo e(csrf_token()); ?>'
				},
				success: function(res) {
					if(res.code == 202){	
						$('#title').val(res.data.title);					
						$('#post_id').val(res.data.id);					
						$('#title').val(res.data.title);
						$('#image_tag').attr({'src': '../image/'+res.data.image});
						CKEDITOR.instances.content.setData(res.data.content); 
						$('#date').val(res.data.date);
					}
				}
			});
		}
	}
	// delete item with  swal
	function deleteItem (id) {
		swal({
		  title: 'Are you sure?',
		  text: "You won't be able to revert this!",
		  type: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  confirmButtonText: 'Yes, delete it!'
		}).then((result) => {
		  if (result.value) {
		  	$.ajax({
		  		url: "../news/delete/"+id,
		  		type:'get',
		  		data: {
		  			id:id
		  		},
		  		success:function(res) {
		  			if(res.code == 200) {
		  				swal(
							'Deleted!',
						     res.msg,
							'success'
						).then((result) => {
							if(result.value) {
								location.reload();
							}
							
						});
		  			}
		  			else {
		  				swal({
							  type: 'error',
							  title: 'Oops...',
							  text: res.msg+'!'
						})
		  			}
		  		},

		  	});    
		  }
		});
			
	};
	$(document).ready(function(){
		//validate
		jQuery.validator.addMethod("isImage", function(value){

		 	var file = $('#image')[0].files[0];
		 	if(file){
		 		var fileType = file.type;

				var ValidImageTypes = ["image/gif", "image/jpeg", "image/png"];
				if($.inArray(fileType, ValidImageTypes) < 0 || file.size >1048576) {
					return false;
				}
				return true;
		 	} 
		 	else {
		 		return true;
		 	}
			
		 });
		$("#form-edit").validate({
			ignore: [],
			rules:{
				title: {
					required:true,
					minlength:5
				},
				content: {
					 required: function() 
					{
					CKEDITOR.instances.content.updateElement();
					},
					minlength:5
				},
				image: {
					isImage:true
				},
				date: {
					required:true,
					date:true
				}
			},
			messages:{
				title: {
					required: "không được để trống",
					minlength: "độ dài lớn hơn 5 kí tự"
				},
				content: {
					required: "không được để trống",
					minlength: "độ dài lớn hơn 5 kí tự"
				},
				image:{
					isImage: "image phải đúng định dạng và kích cỡ dưới 1MB"
				},
				date: {
					required: "không được để trống",
					date: "sai định sạng ngày"
				}
			}
		});
	
		// edit
		$('#save').click(function(){
			var check = $('#form-edit').valid();
		
			if(check){
				var id = $('#post_id').val();			
				var formData = new FormData();
				formData.append('title', $('#title').val());
				formData.append('content', CKEDITOR.instances.content.getData());
				formData.append('date', $('#date').val());
				formData.append('image', $('#image')[0].files[0]);
				formData.append('_token', "<?php echo e(csrf_token()); ?>");
				$.ajax({
				 	url: "../news/update/"+id,
					type: 'post',
					data: formData,
					contentType: false,
					processData: false,
					success: function(res) {
						if(res.code == 202) {
							$('#mess').html(res.msg);
							$('#mess').addClass("alert alert-success");
						}
						if(res.code == 404) {
							$('#mess').html(res.msg);
							$('#mess').addClass("alert alert-danger");
						}
					}
				});
			}
			
		});

	});
</script>
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
</div>
<a href="<?php echo e(route('addNews')); ?>" class="btn btn-success">ADD</a>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('templates.admin.index', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>