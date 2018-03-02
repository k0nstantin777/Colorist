{{--ADMIN.PAGES.USER.SHOW--}}
<!-- Content Header (Page header) -->
@component('admin.components.page-header')
    @slot('head')Профиль пользователя {{$user->name}}@endslot
    @slot('breadcrump')
        <li><a href="{{route('admin.user.index')}}">Пользователи</a></li>
        <li class="active">Профиль пользователя</li>
    @endslot
@endcomponent
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-body box-profile">
                    <img class="profile-user-img img-responsive img-circle" src="{{$imageProfile}}" alt="User profile picture">
                    <h3 class="profile-username text-center">{{$user->name}}</h3>
                    <p class="text-muted text-center">{{$user->profile->first_name.' '.$user->profile->last_name}}</p>

                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>Тип аккаунта</b> <a class="pull-right">{{$user->role->name ?: 'N/A'}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Телефон</b> <a class="pull-right">{{$user->profile->phone ?: 'N/A'}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>E-mail</b> <a class="pull-right">{{$user->email ?: 'N/A'}}</a>
                        </li>
                         <li class="list-group-item">
                            <b>Дата регистрации</b> <a class="pull-right">{{$user->created_at ? date('d F Y',strtotime($user->created_at)) : 'N/A'}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Пол</b> <a class="pull-right">{{$user->profile->sex ?: 'N/A'}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Возраст</b> <a class="pull-right">{{$user->profile->age ?: 'N/A'}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Дата рождения</b> <a class="pull-right">{{$user->profile->birthdate !== null ? date('d F Y',strtotime($user->profile->birthdate)) : 'N/A'}}</a>
                        </li>
                        
                    </ul>

                    <a href="{{route('admin.user.edit', $user->name)}}" class="btn btn-primary btn-block"><b>Редактировать</b></a>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</section><!-- /.content -->
