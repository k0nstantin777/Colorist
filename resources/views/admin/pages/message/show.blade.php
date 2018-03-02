{{--ADMIN.PAGES.REVIEW.SHOW--}}
<!-- Content Header (Page header) -->
@component('admin.components.page-header')
    @slot('head')Сообщение от {{$message->name}}@endslot
    @slot('breadcrump')
        <li><a href="{{route('admin.message.index')}}">Сообщения</a></li>
        <li class="active">Просмотр сообщения</li>
    @endslot
@endcomponent
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-6">
            <div class="box box-primary">
                 <div class="box-body no-padding">
                    <div class="mailbox-read-info">
                        <h3>Тема: {{$message->subject ?: 'N/A'}}</h3>
                        <h5>Отправитель: {{$message->name ?: 'N/A'}} <span class="mailbox-read-time pull-right">{{$message->created_at ? date('d F Y',strtotime($message->created_at)) : 'N/A'}}</span></h5>
                    </div><!-- /.mailbox-read-info -->

                    <div class="mailbox-read-message">
                        <p>Сообщение:</p>
                        <p>{{$message->message ? nl2br($message->message) : 'N/A'}}</p>
                    </div><!-- /.mailbox-read-message -->
                     <div class="mailbox-controls with-border text-center">
                         <div class="btn-group">
                             <a href="{{route('admin.message.index')}}" class="btn btn-success btn-sm" title="К списку сообщений" ><i class="fa fa-chevron-left"></i></a>
                             <a href="{{route('admin.message.delete', $message->id)}}" class="btn btn-danger btn-sm" title="Удалить" onclick='return confirm("Удалить сообщение ?")'><i class="fa fa-trash-o"></i></a>

                         </div><!-- /.btn-group -->

                     </div><!-- /.mailbox-controls -->
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</section><!-- /.content -->