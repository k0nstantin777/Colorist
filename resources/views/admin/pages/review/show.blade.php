{{--ADMIN.PAGES.REVIEW.SHOW--}}
<!-- Content Header (Page header) -->
@component('admin.components.page-header')
    @slot('head')Отзыв автора {{$review->author}}@endslot
    @slot('breadcrump')
        <li><a href="{{route('admin.review.index')}}">Отзывы</a></li>
        <li class="active">Просмотр отзыва</li>
    @endslot
@endcomponent
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-body">
                    <!-- Attachment -->
                    <div class="attachment-block clearfix">
                        <img class="attachment-img img-responsive img-circle" src="{{$authorImage}}" alt="image">
                        <div class="attachment-pushed">
                            <h4 class="attachment-heading">Автор</h4>
                            <div class="attachment-text">
                                <p>{{$review->author ?: 'N/A'}}</p>
                            </div><!-- /.attachment-text -->
                            <h4 class="attachment-heading">Текст</h4>
                            <div class="attachment-text">
                                <p>{{$review->text ?: 'N/A'}}</p>
                            </div><!-- /.attachment-text -->
                            <h4 class="attachment-heading">Дата создания</h4>
                            <div class="attachment-text">
                                <p>{{$review->created_at ? date('d F Y',strtotime($review->created_at)) : 'N/A'}}</p>
                            </div><!-- /.attachment-text -->
                            <h4 class="attachment-heading">Статус</h4>
                            <div class="attachment-text">
                                <p>{{$review->is_active ? 'Активен' : 'Неактивен'}}</p>
                            </div><!-- /.attachment-text -->
                        </div><!-- /.attachment-pushed -->
                    </div><!-- /.attachment-block -->


                    <a href="{{route('admin.review.edit', $review->id)}}" class="btn btn-primary btn-block"><b>Редактировать</b></a>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</section><!-- /.content -->