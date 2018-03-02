{{--ADMIN.PAGES.REVIEW.EDIT--}}
<!-- Content Header (Page header) -->
@component('admin.components.page-header')
    @slot('head')Редактирование отзыва автора {{$review->author}}@endslot
    @slot('breadcrump')
        <li><a href="{{route('admin.review.index')}}">Отзывы</a></li>
        <li class="active">Редактирование отзыва</li>
    @endslot
@endcomponent

@section('local-scripts')
    <script>
        $('.image').change(function () {
            var input = $(this)[0];
            var id = $(this).attr('id');
            if (input.files && input.files[0]) {
                if (input.files[0].type.match('image.*')) {
                var reader = new FileReader();
                    reader.onload = function (e) {
                    $('#preview_'+id).attr('src', e.target.result).show();

                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }
        });
    </script>

@endsection


<!-- Main content -->
<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Форма редактирования отзыва</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                {{Form::open(['route' => ['admin.review.update', $review->id], 'class' => 'form-horizontal', 'role'=> 'form', 'method' => 'PUT', 'id' => 'review_edit', 'files'=>true])}}

                    {{Form::hidden('action', 'update')}}

                    <div class="box-body">
                        {{ Form::adminText('author',
                                'Автор',
                                old('author') ? old('author') : $review->author) }}
                        {{ Form::adminTextarea('text',
                                'Текст',
                                old('text') ? old('text') : $review->text)}}
                        <div class="col-sm-4 col-sm-offset-3">
                            {{Form::adminImage('file','Загрузить изображение', $authorImage)}}
                        </div>
                    </div><!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Сохранить</button>
                </div>
                {{Form::close()}}
            </div><!-- /.box -->
        </div><!--/.col (right) -->
    </div>   <!-- /.row -->
</section><!-- /.content -->
