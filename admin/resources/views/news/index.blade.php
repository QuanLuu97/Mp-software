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
		@foreach($newss as $news)
			<tr>
				<td class="text-center">{{ $news->title }}</td>
				<td class="text-center"></td>
				<td class="text-center"><img src="{{ asset('image/'.$news->image) }}" width="200px" height="200px"></td>
				<td class="text-center more" id="more" >
                    <div  class="content hideContent">
                        {!! $news->content !!}
                    </div>
                   <!--  <div class="show-more">
                        <a href="#">Show More</a>
                    </div> -->
                </td>
				<td class="text-center" >{{ $news->date }}</td>
				<td>
					<a class="glyphicon btn btn-primary" id="delete" onclick='deleteItem(<?php echo $news->id; ?>)'" >&#xe020;</a>
				</td>
               <!--  goi route -->
                <td>
                    <a href="{{ route('editNews', $news->id) }}" class="glyphicon btn btn-primary">&#x270f;</a>
                </td>
                
                <!-- goi modal -->
				<!-- <td>				
					<button class="glyphicon btn btn-primary" data-toggle="modal" data-target="#edit" onclick='getRecord(<?php echo $news->id; ?>)'>&#x270f;</button>			
				</td> -->
			</tr>
			
		@endforeach   

		</tbody>
		</table>

		<div id="edit"  class="modal fade"  role="dialog">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" >&times;</button>
					<h4 class="modal-title">Edit</h4>
					</div>
					<div class="modal-body dropdownParent">
						<form id="form-edit" >
							<div class="form-body">							
								<div class="form-group ">
									<label for="title">Title input</label>
									<input type="text" class="form-control" name="title" id="title" placeholder="title">
																		
								</div>
								<div class="form-group ">
			                         <label for="categories_id">categories_id</label>
                              <select id="categories_id" class="form-control"  style="width: 400px;" name="categories_id" multiple="multiple">
                                  <option value="0"></option>
                                  <?php 
                                      function showCategories($categories, $parent_id = 0, $char = '') {
                                          foreach ($categories as $key => $category) {
                                              if($category['parent_id'] == $parent_id) {
                                                  echo '<option value="' . $category['id'] . '">';
                                                  echo $char . ' ' . $category['name'];
                                                  echo '</option>';
                                                  unset($categories[$key]);
                                                  showCategories($categories, $category->id, $char.'- - - ');
                                              }
                                          }
                                      }
                                      showCategories($categories);
                                  ?>                       
                              </select>
			                        
			                    </div>
								<div class="form-group ">
									<label for="image">Image Input</label>
									<input type="file" class="form-control" name="image" id="image"   >
									<img src="" id="image_tag" width="200px">
								</div>
								<div class="form-group ">
									<label for="content">Content input</label>
									<textarea class="form-control ckeditor" name="content" id="content"></textarea>
								</div>
								<div class="form-group  ">
									<label for="date">Date input</label>
									<input type="date" class="form-control" name="date" id="date">
								</div>
								<input type="hidden" id="post_id" value="" />
								<span id="save" class="btn btn-primary">Save changes</span>	
								<div class="form-group form-md-line-input ">
									<span id="mess"></span>
								</div>				
							</div>
							{{ csrf_field() }}
						</form>
					</div>
					<div class="modal-footer">
						<a href="{{ route('indexNews') }}"  class="btn btn-default" >Close</a>						
					</div>
				</div><!-- /.modal-content -->

			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
	</div>
<script src="../node_modules/readmore-js/readmore.min.js"></script>
<script type="text/javascript">
    // $("a").on("click", function() {
    //     var $this = $(this); 
    //     var $content = $this.parent().prev("div.content");
    //     var linkText = $this.text().toUpperCase();    
        
    //     if(linkText === "SHOW MORE"){
    //         linkText = "Show less";
    //         $content.switchClass("hideContent", "showContent", 10);
    //     } else {
    //         linkText = "Show more";
    //         $content.switchClass("showContent", "hideContent", 10);
    //     };

    //     $this.text(linkText);
    // });
	//get data by ajax
	function getRecord(id) {
		
		if (id > 0) {
			$.ajax({
				url: "{{ route('getData') }}",
				type: 'post',
				data: {
					id : id,
					_token: '{{ csrf_token() }}'
				},
				success: function(res) {
					if(res.code == 202){
						$('#title').val(res.data.title);					
						$('#post_id').val(res.data.id);					
						$('#title').val(res.data.title);
                        console.log(res.data2[0]);
                        $('categories_id').val(res.data2[0]);
                        // $.each(res.data2, function (key, value){
                        //     $("#categories_id option[value='" + value + "']").prop("selected", true);
                        // });
                        
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
		  // $("#edit").on("show.bs.modal",function(){
    //         $("#categories_id").select2({
    //             dropdownParent: $('.dropdownParent')
    //         });    
    //     })
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
				formData.append('_token', "{{ csrf_token() }}");
				$.ajax({
				 	url: Laravel.data.base + "/news/update/" + id,
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
<a href="{{ route('addNews') }}" class="btn btn-success">ADD</a>
@endsection