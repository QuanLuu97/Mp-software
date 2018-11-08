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
            <form id="form-edit">
                <div class="form-group">
                    <label for="name">name</label>
                    <input type="text" id="name" name="name" class="form-control" value="<?php echo e($category->name); ?>">
                    <label id="name-error" class="error" for="name"></label>
                </div>
                <div class="form-group">
                    <label for="parent_id">parent_category</label>
                    <select class="form-control" id="parent_id">
                        <option value="0"></option>
                        <?php 
                            function showCategories($categories, $category, $parent_id = 0, $char = ''){
                                foreach ($categories as $key => $item) {
                                    if($item->parent_id == $parent_id) {
                                        if($item->id == $category->parent_id){

                                            echo '<option value ="' . $item->id . '" selected = "selected" >' . $char . $item->name . '</option>';
                                            unset($categories[$key]);  
                                        }
                                        else {
                                            echo '<option value ="' . $item->id . '">' . $char . $item->name . '</option>';
                                            unset($categories[$key]);
                                        }
                                        
                                        showCategories($categories, $category, $item->id, $char.'- ');
                                    }
                                }
                            }
                            showCategories($categories,$category);
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>status</label>
                    <input type="checkbox"  id="checkbox" <?php if($category->status == 1): ?> checked <?php endif ?> data-toggle="toggle" data-on="Enabled" data-off="Disabled" data-width="100">
                </div>
                <div class="form-group">
                    <span id="mess"></span>
                </div>
                <input type="hidden" id="id" value="<?php echo e($category->id); ?>">
                <span id="save" class="btn btn-success">update</span>
                <a href="<?php echo e(route('indexCat')); ?>" class="btn btn-default">Cancel</a>
                <?php echo e(csrf_field()); ?>

            </form>
        </div>
    </div>
</div>
<div class="clearfix" style="clear:both;"></div>
<script type="text/javascript">
    $(document).ready(function (){        
        $('#form-edit').validate({
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
        $('#save').click(function() {
            var check = $('#form-edit').valid();
            var  id = $('#id').val();
            if(check) {

                $.ajax({
                    url: "../update/"+id,
                    type:'post',
                    data:{                       
                        name: $('#name').val(),
                        parent_id: $('#parent_id').val(),
                        status: $('#checkbox').prop('checked'),
                        _token: '<?php echo e(csrf_token()); ?>'
                    },
                    success:function(res) {
                        if(res.code == 200) {
                            $('#edit').modal('hide')
                            swal({
                                type: 'success',
                                title: 'Success!!',
                                text: res.msg
                            }).then((result) => {
                                location.reload();
                            });
                        }
                        if(res.code == 404) {
                            $('#edit').modal('hide');
                            swal({
                                type: 'error',
                                title: 'Error!!',
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
                                    $('#name').focus();
                                }
                            });

                        }
                    }
                });

            }
        });
    })
</script>    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('templates.admin.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>