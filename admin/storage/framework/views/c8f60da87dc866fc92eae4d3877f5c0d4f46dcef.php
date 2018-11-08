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

<div class="col-md-12 portlet box green-haze">
	<div class="portlet-title">
		<div class="caption">
			<i class="fa fa-globe"></i>List Categories
		</div>
		
	</div>
	<div class="col-md-12 portlet-body">
		<table class="table table-striped table-bordered table-hover" id="sample_2">
		<thead>
		<tr>
			<th class="col-md-2 text-center">
				ID
			</th >
			<th class="col-md-3 text-center">
				Name
			</th>
			<th class="col-md-3 text-center">
				Parent_Category
			</th>
            <th class="col-md-2 text-center">
                Status
            </th>
			<th class="col-md-2" colspan="2">
				
			</th>
		</tr>
		</thead>
		<tbody>
		<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<tr class="text-center">
				<td><?php echo e($category->id); ?></td>
                <td><?php echo e($category->name); ?></td>                
                <td>
                    <?php if($category->catalog != null): ?>
                        <?php echo e($category->catalog->name); ?>

                    <?php endif; ?>
                </td>
                <td><?php echo e($category->status); ?></td> 
				<td>
					<a class="glyphicon btn btn-primary" id="delete" onclick='deleteItem(<?php echo $category->id; ?>)'" >&#xe020;</a>
				</td>
				<td>				
					<button class="glyphicon btn btn-primary" data-toggle="modal" data-target="#edit" onclick='getRecord(<?php echo $category->id; ?>)'>&#x270f;</button>			
				</td>
			</tr>
			
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>		
        <div id="edit" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button class="close" data-dismiss='modal'>&times;</button>
                        <h4>edit Category</h4>
                    </div>
                    <div class="modal-body">
                        <form id="form-edit">
                            <div class="form-group">
                                <label for="name">name</label>
                                <input type="text" id="name" name="name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="parent_id">parent_category</label>
                                <select class="form-control" id="parent_id">
                                    <option value="0"></option>
                                    <?php 
                                        function showCategories($categories, $parent_id = 0, $char = ''){
                                            foreach ($categories as $key => $category) {
                                                if($category->parent_id == $parent_id) {
                                                    echo '<option value ="' . $category->id . '">' . $char . $category->name . '</option>';
                                                    unset($categories[$key]);
                                                    showCategories($categories, $category->id, $char.'- - -');
                                                }
                                            }
                                        }
                                        showCategories($categories);
                                    ?>
                                </select>

                            </div>
                            <div class="form-group">
                                <label>status</label>
                                <input type="checkbox"  id="checkbox" checked data-toggle="toggle" data-on="Enabled" data-off="Disabled" data-width="100">
                            </div>
                            <div class="form-group">
                                <span id="mess"></span>
                            </div>
                            <input type="hidden" id="id">
                            <span id="save" class="btn btn-success">update</span>

                            <?php echo e(csrf_field()); ?>

                        </form>
                    </div>
                    <div class="modal-footer">
                        <a href="<?php echo e(route('indexCat')); ?>"  class="btn btn-default" >Close</a>                      
                    </div>
                </div>
            </div>
        </div>
		</tbody>
		</table>		
	</div>
</div>
<a href="<?php echo e(route('addCat')); ?>" class="btn btn-success">ADD</a>
<script type="text/javascript">
    function deleteItem(id) {
        swal({
            type: 'warning',
            title: 'WARNING!',
            text: 'muốn xóa không?',
            showCancelButton:true,
            confirmButtonText: 'muốn lắm rồi',
            cancelButtonText: 'chờ tý đã'
        }).then((result) => {
          if (result.value) {
                $.ajax({
                    url: './delete/' +id,
                    type: 'get',
                    data: {
                        id:id
                    },
                    success:function(res){
                        if(res.code == 200) {
                            swal({
                                type:'success',
                                title: 'SUCCESS!',
                                text: res.msg
                            }).then((result)=> {
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
                            });
                        }
                    }
                });
            }
        });
    }
    function getRecord(id) {
        $.ajax({
            url: "<?php echo e(route('getDataCat')); ?>",
            type: 'post',
            data:{
                id:id,
                _token: '<?php echo e(csrf_token()); ?>'
            },
            success:function(res) {
                if(res.code == 200) {
                    $('#id').val(res.msg.id);
                    $('#name').val(res.msg.name);
                    $('#parent_id').val(res.msg.parent_id);
                    $('#checkbox').prop('checked',res.msg.status).change();
                }
                if(res.code == 404) {
                    alert(res.msg);
                }
            }
        });
    }
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
                    url: "./update/"+id,
                    type:'post',
                    data:{                       
                        name: $('#name').val(),
                        parent_id: $('#parent_id').val(),
                        status: $('#checkbox').prop('checked'),
                        _token: '<?php echo e(csrf_token()); ?>'
                    },
                    success:function(res) {
                        if(res.code == 200) {
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
    })
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('templates.admin.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>