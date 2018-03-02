@component('admin.widgets.page-header')
    @slot('head')
        <i class="fa fa-camera" aria-hidden="true"></i> Фотографии
    @endslot
    @slot('breadcrump')
        <li><i class="fa fa-camera" aria-hidden="true"></i>Фотографии</li>
    @endslot
@endcomponent
@section('local-styles')
    <!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
    <link rel="stylesheet" href="css/basic.css">
    <link rel="stylesheet" href="css/dropzone.css">
@endsection
@section('local_scripts')
    <script src="js/dropzone.js"></script>
    
@endsection

<div class="row">
    <div class="col-sm-12 col-xs-8 page-buttons">
            <a href="#upload" data-toggle="modal" class="btn btn-primary">
                <i class="fa fa-plus-square" aria-hidden="true"></i> Загрузить фото
            </a>
            <button class="btn btn-success active" id="all-photo" type="button">Все фото</button>
            <button class="btn btn-warning" id="photo-wo-album" type="button">Фото без альбома</button>
            @if($user->is_superadmin)
            <a href="{{route('admin.image.updateImage')}}" class="btn btn-danger">
                Преобразовать фото
            </a>
            <a href="{{route('admin.image.watermark')}}" class="btn btn-danger">
                Обновить водный знак
            </a>
            @endif
            <!-- Modal -->
                @component('admin.widgets.modal.upload')
                    @slot('form_body')
                    @endslot  
                @endcomponent
            <!-- modal -->
        
    </div>
</div> 
<div class="row">
    <div class="col-sm-12" id="photo-list">
        @include('admin.widgets.lists.photo')
    </div>
</div>



