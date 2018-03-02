{{--ADMIN.PAGES.SETTING.EDIT--}}
<!-- Content Header (Page header) -->
@component('admin.components.page-header')
    @slot('head')Настройки @endslot
    @slot('breadcrump')
        <li class="active">Настройки</li>
    @endslot
@endcomponent
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Настройки сайта</h3>

                </div><!-- /.box-header -->
                <div class="box-body">
                    {{Form::open(['route'=>'admin.setting.update', 'class'=>'form-horizontal', 'role'=>'form', 'id' => 'settings_form'])}}

                        {{Form::adminText('TIMEZONE', 'Временная зона <sup><i class="fa fa-question-circle" title="Временная зона"></i></sup>',
                                old('TIMEZONE') ? old('TIMEZONE') : $TIMEZONE, ['required'])}}

                        {{Form::adminEmail('MAIL_TO', 'Основной email сайта <sup><i class="fa fa-question-circle" title="Электронный адрес, на который будут приходить уведомления с сайта. Также с данного адреса будут отправляться письма"></i></sup>',
                                old('MAIL_TO') ? old('MAIL_TO') : $MAIL_TO, ['required'])}}
                        {{Form::adminText('MAIL_FROM_NAME', 'Имя отправителя <sup><i class="fa fa-question-circle" title="Данное имя будет указано в письме, отправляемом при отправке сообщения в форме обратной связи"></i></sup>',
                                old('MAIL_FROM_NAME') ? old('MAIL_FROM_NAME') : $MAIL_FROM_NAME, ['required'])}}
                        {{Form::adminText('MAIL_HOST', 'Сервер отправки Email <sup><i class="fa fa-question-circle" title="Хост отправки Email, например smtp.google.com"></i></sup>',
                                old('MAIL_HOST') ? old('MAIL_HOST') : $MAIL_HOST, ['required'])}}
                        {{Form::adminText('MAIL_PORT', 'Порт сервера отправки Email <sup><i class="fa fa-question-circle" title="Порт почтового сервера, например 465"></i></sup>',
                                old('MAIL_PORT') ? old('MAIL_PORT') : $MAIL_PORT, ['required'])}}
                        {{Form::adminText('MAIL_ENCRYPTION', 'Тип шифрования <sup><i class="fa fa-question-circle" title="Протокол шифрования используемого почтовым сервером"></i></sup>',
                                old('MAIL_ENCRYPTION') ? old('MAIL_ENCRYPTION') : $MAIL_ENCRYPTION, ['required'])}}
                        {{Form::adminText('MAIL_USERNAME', 'Логин Email <sup><i class="fa fa-question-circle" title="Логин учетной записи Email"></i></sup>',
                                old('MAIL_USERNAME') ? old('MAIL_USERNAME') : $MAIL_USERNAME, ['required'])}}
                        {{Form::adminPassword('MAIL_PASSWORD', 'Пароль Email <sup><i class="fa fa-question-circle" title="Пароль учетной записи Email, оставьте пустым, если не изменяетя"></i></sup>')}}


                <div class="box-footer clearfix">
                    <div class="col-xs-12">

                        {{Form::adminSubmit('Сохранить', ['form'=> 'settings_form'], 'col-sm-offset-3')}}

                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<!--tab nav start-->
