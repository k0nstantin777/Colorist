@component('admin.widgets.page-header')
    @slot('head')
        <i class="fa fa-file-text-o"></i> {{$pageModel->name}}
    @endslot
    @slot('breadcrump')
        <li><i class="fa fa-files-o" aria-hidden="true"></i>Редактирование страниц сайта</li>
        <li><i class="fa fa-file-text-o"></i>{{$pageModel->name}}
    @endslot
@endcomponent

@section('local_scripts')
<!--<script src="js/form-component.js"></script>-->
<!-- ck editor -->
<script type="text/javascript" src="assets/ckeditor/ckeditor.js"></script>
<script src="js/jquery.hotkeys.js"></script>
<!--<script src="js/bootstrap-wysiwyg.js"></script>
<script src="js/bootstrap-wysiwyg-custom.js"></script>-->
@endsection

<div class="row">
    <div class="panel-group m-bot20" id="accordion">
        <div class="col-sm-12">
            @if(!in_array($pageModel->name, ['Header', 'Footer']))
                @include('admin.widgets.forms.page-params')
            @endif
        </div>
     
        <div class="col-sm-12">
            @include('admin.widgets.forms.block-edit')
        </div>
    </div>   
</div>