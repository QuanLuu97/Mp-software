@extends('layout.index')
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
            <a href="{{ route('indexMenu') }}">Menu</a>

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
            <form action="{{ route('updateMenu', $menu->id) }}" enctype="multipart/form-data" method="post" id="form-edit">
                <div class="form-group">
                    <label for="name">name</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ $menu->name }}">
                    <label id="name-error" class="error" for="name"></label>
                </div>
                <div class="form-group">
                    <label for="parent_id">parent_menu</label>
                    <select class="form-control" id="parent_id" name="parent_id">
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
                            showCategories($menus, $menu);
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>description</label>
                    <textarea name="description" id="description" >{{ $menu->description }}</textarea>
                </div>
                <div class="form-group">
                    <label>content</label> 
                    <textarea name="content"  id="content" >{{ $menu->content }}</textarea>
                </div>
                <div class="form-group">
                    <label>content2</label> 
                    <textarea name="content2"  id="content2" >{{ $menu->content2 }}</textarea>
                </div>
                 <div class="form-group">
                    <label>sort</label> 
                    <input type="number" name="sort" id="sort" class="form-control" value="{{ $menu->sort }}">
                </div>
                <div class="form-group">
                    <label>images</label> 
                    <input type="file" name="images[]" id="images" multiple="multiple" class="form-control">
                </div>
                <div class="form-group">
                    <label>status</label>
                    <input type="checkbox"  id="checkbox" <?php if($menu->status == 1): ?> checked <?php endif ?> data-toggle="toggle" data-on="Enabled" data-off="Disabled" data-width="100">
                </div>
                <div class="form-group">
                    <span id="mess"></span>
                </div>
                <input type="hidden" id="id" value="{{ $menu->id }}">
                <input type="submit" name="btn_update" class="btn btn-success" value="update">
                <a href="{{ route('indexMenu') }}" class="btn btn-default">Cancel</a>
                {{ csrf_field() }}
            </form>
        </div>
    </div>
</div>
<div class="clearfix" style="clear:both;"></div>
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
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
          
         CKEDITOR.replace('description', {
            removePlugins: 'image'
        } );
        CKEDITOR.replace('content', {
            filebrowserBrowseUrl: '{{ asset('ckfinder/ckfinder.html') }}',
            filebrowserImageBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Images') }}',
            filebrowserFlashBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Flash') }}',
            filebrowserUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
            filebrowserImageUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
            filebrowserFlashUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}'
        } );
        CKEDITOR.replace('content2', {
            filebrowserBrowseUrl: '{{ asset('ckfinder/ckfinder.html') }}',
            filebrowserImageBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Images') }}',
            filebrowserFlashBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Flash') }}',
            filebrowserUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
            filebrowserImageUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
            filebrowserFlashUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}'
        } );
    })
</script>    
@endsection
