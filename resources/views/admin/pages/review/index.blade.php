{{--ADMIN.PAGES.REVIEW.INDEX--}}
<!-- Content Header (Page header) -->
@component('admin.components.page-header')
    @slot('head')Отзывы@endslot
    @slot('breadcrump')
        <li class="active">Отзывы</li>
    @endslot
@endcomponent


<section class="content">
    <div class="row">
        <div class="col-xs-12 margin-bottom">
            <a href="{{route('admin.review.create')}}" class="btn btn-primary"><i class="fa fa-user-plus"></i> Создать отзыв</a>
        </div>
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Список отзывов</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table id="reviews" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Автор</th>
                            <th>Текст</th>
                            <th>Дата создания</th>
                            <th>Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($reviews_count === 0)
                            <tr>
                                <td colspan="5">Отзывов нет</td>
                            </tr>
                        @else
                            @foreach($reviews_active as $review)
                                <tr>
                                    <td>{{$review->id}}</td>
                                    <td>{{$review->author}}</td>
                                    <td>{{substr($review->text,0, 101).'...'}}</td>

                                    <td>{{date('d F Y',strtotime($review->created_at))}}</td>
                                    <td>
                                        {{Form::open(['route'=> ['admin.review.destroy', $review->id], 'method' => 'DELETE'])}}
                                            <div class="btn-group">
                                                <a class="btn btn-info btn-xs" href="{{route('admin.review.activate', $review->id)}}" title="Деактивировать"><i class="fa fa-toggle-on"></i></a>
                                                <a class="btn btn-primary btn-xs" href="{{route('admin.review.show', $review->id)}}" title="Просмотреть"><i class="fa fa-eye"></i></a>
                                                <a class="btn btn-success btn-xs" href="{{route('admin.review.edit', $review->id)}}" title="Редактировать"><i class="fa fa-edit"></i></a>
                                                {{Form::button('<i class="fa fa-close"></i>', ['type'=>'submit', 'class' => 'btn btn-danger btn-xs', 'title' => 'Удалить', 'onclick'=>'return confirm("Удалить отзыв ?")' ])}}
                                            </div>
                                        {{Form::close()}}
                                    </td>
                                </tr>
                            @endforeach
                            @foreach($reviews_disable as $review)
                                <tr style="opacity:0.3">
                                    <td>{{$review->id}}</td>
                                    <td>{{$review->author}}</td>
                                    <td>{{substr($review->text, 0, 100).'...'}}</td>
                                    <td>{{date('d F Y',strtotime($review->created_at))}}</td>
                                    <td>
                                        {{Form::open(['route'=> ['admin.review.destroy', $review->id], 'method' => 'DELETE'])}}
                                        <div class="btn-group">
                                            <a class="btn btn-default btn-xs" href="{{route('admin.review.activate', $review->id)}}" title="Активировать"><i class="fa fa-toggle-off"></i></a>
                                            <a class="btn btn-primary btn-xs" href="{{route('admin.review.show', $review->id)}}" title="Просмотреть"><i class="fa fa-eye"></i></a>
                                            <a class="btn btn-success btn-xs" href="{{route('admin.review.edit', $review->id)}}" title="Редактировать"><i class="fa fa-edit"></i></a>
                                            {{Form::button('<i class="fa fa-close"></i>', ['type'=>'submit', 'class' => 'btn btn-danger btn-xs', 'title' => 'Удалить', 'onclick'=>'return confirm("Удалить отзыв ?")' ])}}
                                        </div>
                                        {{Form::close()}}
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Автор</th>
                            <th>Текст</th>
                            <th>Дата создания</th>
                            <th>Действия</th>
                        </tr>
                        </tfoot>
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</section><!-- /.content -->
