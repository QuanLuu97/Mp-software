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
				<span class="caption-subject bold uppercase"> ADD </span>
			</div>	
		</div>
		<div class="portlet-body form" >
			<form action="" method="post" id="form-addCategory">
                <div class="form-group">
                    <label for="name">name</label>
                    <input type="text" name="name" id="name" class="form-control" value="<?php echo e(old('name')); ?>">
                </div>
                <div class="form-group ">
                    <label for="parent_id">parent_category</label>
                    <select id="parent_id" class="form-control" name="parent_id">
                        <option value="0"></option>
                        <?php 
                            function showCategories($categories, $parent_id = 0, $char = '') {
                                foreach ($categories as $key => $category) {
                                    if($category['parent_id'] == $parent_id) {
                                        echo '<option value="' . $category['id'] . '">';
                                        echo $char . ' ' . $category['name'];
                                        echo '</option>';
                                        unset($categories[$key]);
                                        showCategories($categories, $category->id, $char.'- ');
                                    }                                    
                                }
                            }
                            showCategories($categories);
                        ?>
                        
                    </select>
                </div>
                <div class="form-group">
                    <label>type</label>
                    <select id="type" name="type" class="form-control">
                        <option value="news">news</option>
                        <option value="menu">menu</option>
                    </select>
                </div>
                <div class="form-group" id="div_des" style="display: none">
                    <label>description</label>
                    <textarea name="description" id="description" ></textarea>
                </div>
                <div class="form-group" id="div_cont" style="display: none">
                    <label>content</label> 
                    <textarea name="content"  id="content" ></textarea>
                </div>
                 <div class="form-group" id="div_stt" style="display: none">
                    <label>stt</label> 
                    <input type="number" name="stt" id="stt" class="form-control">
                </div>
                 <div class="form-group">
                    <label for="">
                        status 
                        <input type="checkbox"  id="checkbox" checked data-toggle="toggle" data-on="Enabled" data-off="Disabled">
                    </label>
                    
                </div>
                <div class="form-group">
                    <span class="btn btn-success" id="add">ADD</span>
                    <a href="<?php echo e(route('indexCat')); ?>" class="btn btn-danger">Cancel</a>
                </div> 
                <?php echo e(csrf_field()); ?>

            </form>
		</div>
	</div>

</div>
<div class="clearfix" style="clear:both;"></div>
<script src="<?php echo e(asset('ckeditor/ckeditor.js')); ?>"></script>
<script type="text/javascript">
    $('#type').change(function(){
        if($('#type').val() == 'menu'){
            $('#div_cont').css('display', 'block');
            $('#div_des').css('display', 'block');
            $('#div_stt').css('display', 'block');
        }
        if($('#type').val() == 'news'){
            $('#div_cont').css('display', 'none');
            $('#div_des').css('display', 'none');
            $('#div_stt').css('display', 'none');
        }
    })
    $(document).ready(function (){        
        $('#checkbox').change(function (){
            console.log($(this).prop('checked'));
        })
        $('#form-addCategory').validate({
            rules: {
                name: {
                    required:true,
                    minlength:3
                }
            },
            messages: {
                name: {
                    required: "không được để trống",
                    minlength: "lớn hơn 3 kí tự"
                }
            }
        });
        $('#add').click(function() {
           
            var check = $('#form-addCategory').valid();
            if(check) {

                $.ajax({
                    url: "<?php echo e(route('storeCat')); ?>",
                    type:'post',
                    data:{
                        name: $('#name').val(),
                        parent_id: $('#parent_id').val(),
                        status: $('#checkbox').prop('checked'),
                        content: CKEDITOR.instances.content.getData(),
                        description: CKEDITOR.instances.description.getData(),
                        type: $('#type').val(),
                        stt: $('#stt').val(),
                        _token: '<?php echo e(csrf_token()); ?>'
                    },
                    success:function(res) {
                        if(res.code == 200) {
                              swal({
                                type:'success',
                                title:'SUCCESS!',
                                text:res.msg
                            }).then((result)=>{
                                if(result.value){
                                    location.reload();
                                }
                            });
                        }
                        if(res.code == 404) {
                            swal({
                                type:'error',
                                title:'ERROR!',
                                text:res.msg
                            });
                        }
                        if(res.code == 403) {
                            swal({
                                type: "warning",
                                title: "Warning!",
                                text: res.msg
                            }).then((result) =>{
                                if(result.value){
                                    $('#name').focus();
                                }
                            });

                        }
                    }
                });

            }
        });
        CKEDITOR.replace('description', {
            removePlugins: 'image'
        } );
        CKEDITOR.replace('content', {
            filebrowserBrowseUrl: '<?php echo e(asset('ckfinder/ckfinder.html')); ?>',
            filebrowserImageBrowseUrl: '<?php echo e(asset('ckfinder/ckfinder.html?type=Images')); ?>',
            filebrowserFlashBrowseUrl: '<?php echo e(asset('ckfinder/ckfinder.html?type=Flash')); ?>',
            filebrowserUploadUrl: '<?php echo e(asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files')); ?>',
            filebrowserImageUploadUrl: '<?php echo e(asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images')); ?>',
            filebrowserFlashUploadUrl: '<?php echo e(asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash')); ?>'
        } );
    })
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('templates.admin.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>