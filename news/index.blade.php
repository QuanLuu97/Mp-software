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
<!-- <div class="portlet box green-haze">

    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-globe"></i>Datatable with TableTools
        </div>
        <div class="tools">
            <a href="javascript:;" class="reload" data-original-title="" title="">
            </a>
            <a href="javascript:;" class="remove" data-original-title="" title="">
            </a>
        </div>

    </div>
    <div class="portlet-body">
        <div id="sample_2_wrapper" class="dataTables_wrapper no-footer">
            <div class="row">
                <div class="col-md-12">
                    <div class="btn-group tabletools-btn-group pull-right"><a
                                class="btn btn-sm default DTTT_button_print" id="ToolTables_sample_2_3"
                                title="View print view"><span>Print</span></a></div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="dataTables_length" id="sample_2_length"><label>Show
                            <div class="select2-container form-control input-xsmall input-inline" id="s2id_autogen3"><a
                                        href="javascript:void(0)" class="select2-choice" tabindex="-1"> <span
                                            class="select2-chosen" id="select2-chosen-4">&nbsp;</span><abbr
                                            class="select2-search-choice-close"></abbr> <span class="select2-arrow"
                                                                                              role="presentation"><b
                                                role="presentation"></b></span></a><label for="s2id_autogen4"
                                                                                          class="select2-offscreen"></label><input
                                        class="select2-focusser select2-offscreen" type="text" aria-haspopup="true"
                                        role="button" aria-labelledby="select2-chosen-4" id="s2id_autogen4">
                                <div class="select2-drop select2-display-none select2-with-searchbox">
                                    <div class="select2-search"><label for="s2id_autogen4_search"
                                                                       class="select2-offscreen"></label> <input
                                                type="text" autocomplete="off" autocorrect="off" autocapitalize="off"
                                                spellcheck="false" class="select2-input" role="combobox"
                                                aria-expanded="true" aria-autocomplete="list"
                                                aria-owns="select2-results-4" id="s2id_autogen4_search" placeholder="">
                                    </div>
                                    <ul class="select2-results" role="listbox" id="select2-results-4"></ul>
                                </div>
                            </div>
                            <select name="sample_2_length" aria-controls="sample_2"
                                    class="form-control input-xsmall input-inline select2-offscreen" tabindex="-1"
                                    title="">
                                <option value="5">5</option>
                                <option value="15">15</option>
                                <option value="20">20</option>
                                <option value="-1">All</option>
                            </select> entries</label></div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div id="sample_2_filter" class="dataTables_filter"><label>Search:<input type="search"
                                                                                             class="form-control input-small input-inline"
                                                                                             placeholder=""
                                                                                             aria-controls="sample_2"></label>
                    </div>
                </div>
            </div>
            <div class="table-scrollable">
                <table class="table table-striped table-bordered table-hover dataTable no-footer" id="sample_2"
                       role="grid" aria-describedby="sample_2_info">
                    <thead>
                    <tr role="row">
                        <th class="sorting_asc" tabindex="0" aria-controls="sample_2" rowspan="1" colspan="1"
                            aria-sort="ascending" aria-label="
									 Rendering engine
								: activate to sort column ascending" style="width: 233px;">
                            Rendering engine
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="sample_2" rowspan="1" colspan="1" aria-label="
									 Browser
								: activate to sort column ascending" style="width: 296px;">
                            Browser
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="sample_2" rowspan="1" colspan="1" aria-label="
									 Platform(s)
								: activate to sort column ascending" style="width: 271px;">
                            Platform(s)
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="sample_2" rowspan="1" colspan="1" aria-label="
									 Engine version
								: activate to sort column ascending" style="width: 202px;">
                            Engine version
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="sample_2" rowspan="1" colspan="1" aria-label="
									 CSS grade
								: activate to sort column ascending" style="width: 148px;">
                            CSS grade
                        </th>
                    </tr>
                    </thead>
                    <tbody>


                    <tr role="row" class="odd">
                        <td class="sorting_1">
                            Gecko
                        </td>
                        <td>
                            Firefox 1.0
                        </td>
                        <td>
                            Win 98+ / OSX.2+
                        </td>
                        <td>
                            1.7
                        </td>
                        <td>
                            A
                        </td>
                    </tr>
                    <tr role="row" class="even">
                        <td class="sorting_1">
                            Gecko
                        </td>
                        <td>
                            Firefox 1.5
                        </td>
                        <td>
                            Win 98+ / OSX.2+
                        </td>
                        <td>
                            1.8
                        </td>
                        <td>
                            A
                        </td>
                    </tr>
                    <tr role="row" class="odd">
                        <td class="sorting_1">
                            Gecko
                        </td>
                        <td>
                            Firefox 2.0
                        </td>
                        <td>
                            Win 98+ / OSX.2+
                        </td>
                        <td>
                            1.8
                        </td>
                        <td>
                            A
                        </td>
                    </tr>
                    <tr role="row" class="even">
                        <td class="sorting_1">
                            Gecko
                        </td>
                        <td>
                            Firefox 3.0
                        </td>
                        <td>
                            Win 2k+ / OSX.3+
                        </td>
                        <td>
                            1.9
                        </td>
                        <td>
                            A
                        </td>
                    </tr>
                    <tr role="row" class="odd">
                        <td class="sorting_1">
                            Gecko
                        </td>
                        <td>
                            Camino 1.0
                        </td>
                        <td>
                            OSX.2+
                        </td>
                        <td>
                            1.8
                        </td>
                        <td>
                            A
                        </td>
                    </tr>
                    <tr role="row" class="even">
                        <td class="sorting_1">
                            Gecko
                        </td>
                        <td>
                            Camino 1.5
                        </td>
                        <td>
                            OSX.3+
                        </td>
                        <td>
                            1.8
                        </td>
                        <td>
                            A
                        </td>
                    </tr>
                    <tr role="row" class="odd">
                        <td class="sorting_1">
                            Gecko
                        </td>
                        <td>
                            Netscape 7.2
                        </td>
                        <td>
                            Win 95+ / Mac OS 8.6-9.2
                        </td>
                        <td>
                            1.7
                        </td>
                        <td>
                            A
                        </td>
                    </tr>
                    <tr role="row" class="even">
                        <td class="sorting_1">
                            Gecko
                        </td>
                        <td>
                            Netscape Browser 8
                        </td>
                        <td>
                            Win 98SE+
                        </td>
                        <td>
                            1.7
                        </td>
                        <td>
                            A
                        </td>
                    </tr>
                    <tr role="row" class="odd">
                        <td class="sorting_1">
                            Gecko
                        </td>
                        <td>
                            Netscape Navigator 9
                        </td>
                        <td>
                            Win 98+ / OSX.2+
                        </td>
                        <td>
                            1.8
                        </td>
                        <td>
                            A
                        </td>
                    </tr>
                    <tr role="row" class="even">
                        <td class="sorting_1">
                            Gecko
                        </td>
                        <td>
                            Mozilla 1.0
                        </td>
                        <td>
                            Win 95+ / OSX.1+
                        </td>
                        <td>
                            1
                        </td>
                        <td>
                            A
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="row">
                <div class="col-md-5 col-sm-12">
                    <div class="dataTables_info" id="sample_2_info" role="status" aria-live="polite">Showing 1 to 10 of
                        43 entries
                    </div>
                </div>
                <div class="col-md-7 col-sm-12">
                    <div class="dataTables_paginate paging_simple_numbers" id="sample_2_paginate">
                        <ul class="pagination">
                            <li class="paginate_button previous disabled" aria-controls="sample_2" tabindex="0"
                                id="sample_2_previous"><a href="#"><i class="fa fa-angle-left"></i></a></li>
                            <li class="paginate_button active" aria-controls="sample_2" tabindex="0"><a href="#">1</a>
                            </li>
                            <li class="paginate_button " aria-controls="sample_2" tabindex="0"><a href="#">2</a></li>
                            <li class="paginate_button " aria-controls="sample_2" tabindex="0"><a href="#">3</a></li>
                            <li class="paginate_button " aria-controls="sample_2" tabindex="0"><a href="#">4</a></li>
                            <li class="paginate_button " aria-controls="sample_2" tabindex="0"><a href="#">5</a></li>
                            <li class="paginate_button next" aria-controls="sample_2" tabindex="0" id="sample_2_next"><a
                                        href="#"><i class="fa fa-angle-right"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->

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
			<th class="col-md-2">
				Title
			</th class="col-md-4">
			<th>
				Image
			</th>
			<th class="col-md-4">
				Content
			</th>
			<th class="col-md-1">
				Date
			</th>
			<th class="col-md-1" colspan="2">
				
			</th>
		</tr>
		</thead>
		<tbody>
		@foreach($newss as $news)
			<tr>
				<td>{{ $news->title }}</td>
				<td><img src="{{ asset('image/'.$news->image) }}" width="200px" height="200px"></td>
				<td>{!! $news->content !!}</td>
				<td>{{ $news->date }}</td>
				<td>
					<button class="glyphicon btn btn-primary" data-toggle="modal" data-target="#delete">&#xe020;</button>
				</td>
				<td>				
					<button class="glyphicon btn btn-primary" data-toggle="modal" data-target="#edit" onclick='getRecord(<?php echo $news->id; ?>)'>&#x270f;</button>			
				</td>
			</tr>
			
		@endforeach		

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
						
							<div class="form-body">							
								<div class="form-group form-md-line-input">
									<input type="text" class="form-control" name="title" id="title" placeholder="title">
									<label for="title">Title input</label>
									@if($errors->has('title'))
										<div class="alert alert-danger">{{ $errors->first('title') }}</div>
									@endif
								</div>
								<div class="form-group form-md-line-input">
									<input type="file" class="form-control" name="image" id="image"   >
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
								<input type="hidden" id="post_id" value="" />
								<button id="save" class="btn btn-primary">Save changes</button>			
							</div>
							{{ csrf_field() }}
						
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>						
					</div>
				</div><!-- /.modal-content -->

			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
	</div>
<script type="text/javascript">
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
						$('#image_tag').attr({'src': '../image/'+res.data.image});
						CKEDITOR.instances.content.setData(res.data.content); 
						$('#date').val(res.data.date);
					}
				}
			});
		}
	}
	$(document).ready(function(){
		$('#save').click(function(){
			var id = $('#post_id').val();
			
			var formData = new FormData();
			formData.append('title', $('#title').val());
			formData.append('content', CKEDITOR.instances.content.getData());
			formData.append('date', $('#date').val());
			formData.append('image', $('#image')[0].files[0]);
			$.ajax({
				 	url: "../news/update/"+id,
					type: 'post',
					data: formData,
					contentType: false,
    				processData: false,
					success: function(res) {
						alert(res.msg);
					}
			});
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