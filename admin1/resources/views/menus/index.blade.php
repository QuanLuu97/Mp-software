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
            <a href="{{ route('indexMenu') }}">MENU</a>

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
			<i class="fa fa-globe"></i>List Menu
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
        				Parent_Menu
        			</th>
                    <th class="col-md-1 text-center">
                        sort
                    </th>
                    <th class="col-md-1 text-center">
                        Status
                    </th>
        			<th class="col-md-2" colspan="2">
        				
        			</th>
        		</tr>
    		</thead>
    		<tbody>
        		@foreach($menus as $menu)
        			<tr class="text-center">
        				<td>{{ $menu->id }}</td>
                        <td>{{ $menu->name }}</td>                
                        <td>
                            @if($menu->menu_parent != null)
                                {{ $menu->menu_parent->name }}
                            @endif
                        </td>
                        <td>{{ $menu->sort }}</td>
                        <td>{{ $menu->status }}</td> 
        				<td>
        					<a class="glyphicon btn btn-primary" id="delete" onclick='deleteItem(<?php echo $menu->id; ?>)'" >&#xe020;</a>
        				</td>
                        <td>                
                            <a href="{{ route('editMenu', $menu->id) }}" class="glyphicon btn btn-primary"  >&#x270f;</a>           
                        </td>
        			</tr>
        			
        		@endforeach		
    		</tbody>
		</table>		
	</div>
</div>
<a href="{{ route('addMenu') }}" class="btn btn-success">ADD</a>
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
                    url: Laravel.data.base + "/categories/delete/" +id,
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
</script>
@endsection
