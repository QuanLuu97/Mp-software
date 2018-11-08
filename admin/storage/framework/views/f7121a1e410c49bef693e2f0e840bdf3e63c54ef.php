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
            <a href="<?php echo e(route('indexCat')); ?>">Categories</a>

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

<div class="col-md-8 col-md-offset-2">
	<div class="portlet light bordered">
		<div class="portlet-title">
			<div class="caption font-red-sunglo">
				<i class="icon-settings font-red-sunglo"></i>
				<span class="caption-subject bold uppercase"> EDIT </span>
			</div>	
		</div>
		<div class="portlet-body form">	
		<form id="form-edit" >
			<div class="form-body">							
				<div class="form-group ">
					<label for="title">Title input</label>
					<input type="text" class="form-control" name="title" id="title" placeholder="title" value="<?php echo e($news->title); ?>">
														
				</div>
				<div class="form-group ">
		            <label for="categories_id">categories_id</label>
		     		<select id="categories_id" class="form-control select" name="categories_id" multiple="multiple">
			          	<option value="0"></option>
			         	<?php 
							function showCategories($categories, $cat_news, $parent_id = 0, $char = '') {
								foreach ($categories as $key => $category) {
									$i = 0;
									if($category['parent_id'] == $parent_id) {
										foreach ($cat_news as $key1 => $item) {
											if($category['id'] == $item['category_id']) {
												echo '<option value="' . $category['id'] . '" selected = "selected">';
												echo $char . ' ' . $category['name'];
												echo '</option>';
												unset($categories[$key1]);
												showCategories($categories, $cat_news, $category->id, $char.'- - - ');
												$i = 1; break;
											}
										}
										if( $i == 0) {
											echo '<option value="' . $category['id'] . '">';
											echo $char . ' ' . $category['name'];
											echo '</option>';
											unset($categories[$key]);
											showCategories($categories, $cat_news, $category->id, $char.'- ');
										}								
									}
								}
							}
			            	showCategories($categories, $cat_news);
			            ?>    		                           
			     	 </select>		            
		        </div>
				<div class="form-group ">
					<label for="image">Image Input</label>
					<input type="file" class="form-control" name="image" id="image"   >
					<img src="<?php echo e(asset('/image/'. $news->image)); ?>" id="image_tag" width="200px">
				</div>
				<div class="form-group ">
					<label for="description">Description input</label>
					<textarea class="form-control " name="description" id="description"><?php echo e($news->description); ?></textarea>
				</div>
				<div class="form-group ">
					<label for="content">Content input</label>
					<textarea class="form-control " name="content" id="content"><?php echo e($news->content); ?></textarea>
				</div>
				<!-- <div class="form-group  ">
					<label for="date">Date input</label>
					<input type="date" class="form-control" name="date" id="date" value="<?php echo e($news->date); ?>">
				</div> -->
				<div class="form-group">
					<label for="tag">Tags</label>
					<select id="tag" class="form-control select" multiple="multiple">
						<?php 
							foreach($tags as $tag){
								$x = 1;
								foreach($news_tags as $news_tag){
									if($tag->id == $news_tag->tag_id){
										echo'<option value="'. $tag->id .' "selected="selected">'. $tag->name .'</option>';
										$x = 0; break;
									}
								}
								if($x == 1){
									echo'<option value="'. $tag->id .'">'. $tag->name .'</option>';
								}								
							}
						?>
					</select>
				</div>
				 <div class="form-group">
					<label>Status</label>
					<input type="checkbox" name="status" id="status" data-toggle = "toggle" <?php if($news->status == 1): ?> checked <?php endif ?>>
                </div>
				<input type="hidden" id="post_id" value="<?php echo e($news->id); ?>" />
				<span id="save" class="btn btn-primary">Save changes</span>	
				<a href="<?php echo e(route('indexNews')); ?>" class="btn btn-default">Cancel</a>			
			</div>
			<?php echo e(csrf_field()); ?>

		</form>
	</div>
	</div>

</div>
<div class="clearfix" style="clear:both;"></div>
<script src="<?php echo e(asset('ckeditor/ckeditor.js')); ?>"></script>
<script type="text/javascript">
	$(document).ready(function(){

		//validate
		$(".select").select2({
			tags: true,
            tokenSeparators: [',', ' ']
		});
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
		var validator = $("#form-edit").validate({
			ignore: [], // cho content
			rules:{
				title: {
					required:true,
					minlength:5
				},
				categories_id: {
					required:true
				},
				description: {
                     required: function() 
                    {
                    CKEDITOR.instances.description.updateElement();
                    }
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
				}
				// date: {
				// 	required:true,
				// 	date:true
				// }
			},
			messages:{
				title: {
					required: "không được để trống",
					minlength: "độ dài lớn hơn 5 kí tự"
				},
				categories_id: {
					required: "chưa chọn danh mục"
				},
				description: {
                    required:"không được để trống"
                },
				content: {
					required: "không được để trống",
					minlength: "độ dài lớn hơn 5 kí tự"
				},
				image:{
					isImage: "image phải đúng định dạng và kích cỡ dưới 1MB"
				}
				// date: {
				// 	required: "không được để trống",
				// 	date: "sai định sạng ngày"
				// }
			}
		});
	
		// edit
		$('#save').click(function(){
			// console.log($('#checkbox').prop('checked'));
			var check = $('#form-edit').valid();
			var categories_id = $('#categories_id').val();
			if(check){
				var id = $('#post_id').val();			
				var formData = new FormData();
				formData.append('title', $('#title').val());
				formData.append('categories_id', categories_id);
				formData.append('tag', $('#tag').val());
				formData.append('content', CKEDITOR.instances.content.getData());
				formData.append('status', $('#checkbox').prop('checked'));
				formData.append('description', CKEDITOR.instances.description.getData());
				// formData.append('date', $('#date').val());
				formData.append('image', $('#image')[0].files[0]);
				formData.append('_token', "<?php echo e(csrf_token()); ?>");
				$.ajax({
				 	url:  Laravel.data.base + "/news/update/" +id,
					type: 'post',
					data: formData,
					contentType: false,
					processData: false,
					success: function(res) {
						if(res.code == 200) {
							swal({
								type: "success",
								title: "update success!!",
								text: res.msg,
								showCancelButton:true,
								cancelButtonText: "Trang Chủ",
								cancelButtonColor: "green",
								confirmButtonText: "Edit"
							}).then((result) => {
								if(!result.value) {
									location.href="<?php echo e(route('indexNews')); ?>"; 
								}
								else{
									location.reload();
								}
							});
						}
						if(res.code == 404) {
							swal({
								type: "error",
								title: "update not success!!",
								text: res.msg
							});
						}
						if(res.code == 403) {
							swal({
								type: "warning",
								title: "Warning!",
								text: res.msg
							}).then((result) =>{
								if(result.value){
									$('#title').focus();
								}
							});

						}
					}	
				});
			}
			else {
                validator.focusInvalid();
            }
			
		});

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
    //xóa icon image ckeditor
    CKEDITOR.replace('description', {
        removePlugins: 'image'
    } );
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('templates.admin.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>