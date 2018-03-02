{{--ADMIN.PAGES.USER.INDEX--}}
<!-- Content Header (Page header) -->
@component('admin.components.page-header')
    @slot('head')Пользователи@endslot
    @slot('breadcrump')
    <li class="active">Пользователи</li>
    @endslot
@endcomponent

@section('local-styles')
<!-- DataTables -->
<link rel="stylesheet" href="admin/assets/datatables/dataTables.bootstrap.css">
@endsection

@section('local-scripts')
<!-- DataTables -->
<script src="admin/assets/datatables/jquery.dataTables.min.js"></script>
<script src="admin/assets/datatables/dataTables.bootstrap.min.js"></script>
<script>
$(function () {
    $("#users").DataTable();
});
</script>    
@endsection

<section class="content">
    <div class="row">
        <div class="col-xs-12 margin-bottom">
            <a href="{{route('admin.user.create')}}" class="btn btn-primary"><i class="fa fa-user-plus"></i> Создать пользователя</a>
            <a href="{{route('admin.prive.index')}}" class="btn btn-warning"><i class="fa fa-user-times"></i> Управление правами</a>
        </div>
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Список пользователей</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table id="users" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Логин</th>
                                <th>Email</th>
                                <th>Тип доступа</th>
                                <th>Дата регистрации</th>
                                <th>Действия</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users_active as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->role->name}}</td>
                                <td>{{date('d F Y',strtotime($user->created_at))}}</td>
                                <td>
                                    <form method="post" action="{{route('admin.user.destroy', $user->name)}}">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <div class="btn-group">
                                            @if ($authUser->id !== $user->id)
                                                <a class="btn btn-info btn-xs" href="{{route('admin.user.activate', $user->name)}}" title="Деактивировать"><i class="fa fa-toggle-on"></i></a>
                                            @endif
                                            <a class="btn btn-primary btn-xs" href="{{route('admin.user.show', $user->name)}}" title="Открыть профиль"><i class="fa fa-eye"></i></a>
                                            <a class="btn btn-success btn-xs" href="{{route('admin.user.edit', $user->name)}}" title="Редактировать профиль"><i class="fa fa-edit"></i></a>
                                            @if ($authUser->id !== $user->id)    
                                                <button type="submit" class="btn btn-danger btn-xs" title="Удалить" onclick='return confirm("Удалить пользователя {{$user->name}} ?")'><i class="fa fa-close"></i></button>
                                            @endif

                                        </div>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            @foreach($users_disable as $user)
                            <tr style="opacity:0.3">
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->role->name}}</td>
                                <td>{{date('d F Y',strtotime($user->created_at))}}</td>
                                <td>
                                    <div class="btn-group">
                                        <a class="btn btn-default btn-xs" href="{{route('admin.user.activate', $user->name)}}" title="Активировать"><i class="fa fa-toggle-off"></i></a>
                                        <a class="btn btn-primary btn-xs" href="{{route('admin.user.show', $user->name)}}" title="Смотреть информацию"><i class="fa fa-eye"></i></a>
                                        <a class="btn btn-success btn-xs" href="{{route('admin.user.edit', $user->name)}}" title="Редактировать информацию"><i class="fa fa-edit"></i></a>
                                        <a class="btn btn-danger btn-xs" href="{{route('admin.user.destroy', $user->name)}}" title="Удалить"><i class="fa fa-close"></i></a>
                                        
                                    </div>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Логин</th>
                                <th>Email</th>
                                <th>Тип доступа</th>
                                <th>Дата регистрации</th>
                                <th>Действия</th>
                            </tr>
                        </tfoot>
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</section><!-- /.content -->
