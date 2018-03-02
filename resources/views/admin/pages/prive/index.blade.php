{{--ADMIN.PAGES.PRIVE.INDEX--}}
<!-- Content Header (Page header) -->
@component('admin.components.page-header')
    @slot('head')Пользователи@endslot
    @slot('breadcrump')
    <li class="active">Управление правами</li>
    @endslot
@endcomponent

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Управление правами</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <form action="{{route('admin.prive.role.update')}}" method="post">
                        {{ csrf_field() }} 
                    <table id="users" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Тип доступа</th>
                                @foreach($roles as $role)
                                    <th>{{$role->name}}</th>
                                @endforeach
                                
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Права</td
                                <td colspan="4"></td>
                            </tr>
                            
                            @foreach($prives as $prive)
                            <tr>
                                <td>{{$prive->discription}}</td>
                                @foreach($roles as $role)
                                    <td><input type="checkbox" name="rules[]" value="{{$role->id.'.'.$prive->id}}"
                                    @if(in_array($prive->id, $role->prives->pluck('id')->toArray()))
                                      checked
                                    @endif
                                    ></td>
                                @endforeach
                                
                            </tr>
                            @endforeach
                            
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Тип доступа</th>
                                @foreach($roles as $role)
                                <th>{{$role->name}}</th>
                                @endforeach
                            </tr>
                        </tfoot>
                    </table>
                         <button type="submit" class="btn btn-primary">Сохранить</button>
                    </form>
                   
                </div><!-- /.box-body -->
               
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</section><!-- /.content -->


