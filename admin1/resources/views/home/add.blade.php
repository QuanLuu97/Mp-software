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
            <a href="{{ route('indexMenu') }}">Home</a>

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
            <form action="" method="POST" id="form-addHome" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="title">title</label>
                    <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}">
                </div>
                
                <div class="form-group">
                    <label>description</label>
                    <textarea name="description" id="description" ></textarea>
                </div>
                <div class="form-group">
                    <label>content</label> 
                    <textarea name="content"  id="content" ></textarea>
                </div>               
                <div class="form-group">
                    <label>images</label> 
                    <input type="file" name="images[]" id="images" multiple="multiple" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">
                        status 
                        <input type="checkbox"  id="checkbox" checked data-toggle="toggle" data-on="Enabled" data-off="Disabled">
                    </label>                 
                </div>
                <div class="form-group">
                    <input type="submit" value="ADD" name="btn_add" class="btn btn-success">
                    <a href="#" class="btn btn-danger">Cancel</a>
                </div> 
                
            </form>
        </div>
    </div>

</div>
<div class="clearfix" style="clear:both;"></div>
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function (){        
        $('#form-addHome').validate({
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
    })
</script>
@endsection