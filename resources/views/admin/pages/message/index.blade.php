{{--ADMIN.PAGES.MESSAGE.INDEX--}}
<!-- Content Header (Page header) -->
@component('admin.components.page-header')
    @slot('head')Сообщения@endslot
    @slot('breadcrump')
        <li class="active">Сообщения</li>
    @endslot
@endcomponent


<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Список сообщений</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table id="reviews" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Имя</th>
                            <th>Email</th>
                            <th>Тема</th>
                            <th>Сообщение</th>
                            <th>Дата</th>

                            <th>Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if ($messages->count() === 0)
                            <tr>
                                <td colspan="6">Сообщений пока нет</td>
                            </tr>
                        @else
                            @foreach($messages as $message)

                                <tr
                                        @if($message->is_read === 0)
                                        style="font-weight:600"
                                        @endif
                                >
                                    <td>{{$message->name}}</td>
                                    <td>{{$message->email}}</td>
                                    <td>{{$message->subject}}</td>
                                    <td>{{substr($message->message, 0, 100)}}...</td>
                                    <td>{{date('H:i:s d/m/Y', strtotime($message->created_at))}}</td>


                                    <td>
                                        <div class="btn-group">

                                            <a title="Смотреть" class="btn btn-success" href="{{route('admin.message.show', $message->id)}}"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                            <a title="Удалить" onclick='return confirm("Удалить сообщение ?")' class="btn btn-danger" href="{{route('admin.message.delete', $message->id)}}"><i class="fa fa-times-circle-o fa-1x" aria-hidden="true"></i></a>
                                        </div>
                                    </td>
                                </tr>

                            @endforeach
                        @endif
                        </tbody>
                        <tfoot>
                        <tr>
                            <th><i class="icon_profile"></i> Имя</th>
                            <th><i class="icon_mail_alt"></i> Email</th>
                            <th><i class="fa fa-bullhorn" aria-hidden="true"></i> Тема</th>
                            <th><i class="fa fa-comment-o" aria-hidden="true"></i> Сообщение</th>
                            <th><i class="icon_calendar"></i> Дата</th>

                            <th><i class="icon_cogs"></i> Действия</th>
                        </tr>
                        </tfoot>
                    </table>
                    {{$messages->links()}}
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</section><!-- /.content -->

