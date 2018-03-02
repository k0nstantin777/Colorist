{{--ADMIN.PAGES.USER.EDIT--}}
<!-- Content Header (Page header) -->
@component('admin.components.page-header')
    @slot('head')Редактирование профиля пользователя {{$user->name}}@endslot
    @slot('breadcrump')
        <li><a href="{{route('admin.user.index')}}">Пользователи</a></li>
        <li class="active">Редактирование профиля</li>
    @endslot
@endcomponent
@section('local-styles')
    <link rel="stylesheet" href="admin/assets/jcrop/css/jquery.ui.theme.css" type="text/css" />
    <link rel="stylesheet" href="admin/assets/jcrop/css/jquery.ui.accordion.css" type="text/css" />
    <link rel="stylesheet" href="admin/assets/jcrop/css/jquery.Jcrop.css" type="text/css" />
    <link rel="stylesheet" href="admin/assets/jcrop/css/jcrop_main.css" type="text/css" />
@endsection

@section('local-scripts')
    <!-- InputMask -->
    <script src="admin/assets/input-mask/jquery.inputmask.js"></script>
    <script src="admin/assets/input-mask/jquery.inputmask.date.extensions.js"></script>
    <script src="admin/assets/input-mask/jquery.inputmask.extensions.js"></script>
    
    <script src="admin/assets/jcrop/js/jquery.ui.widget.js"></script>
    <script src="admin/assets/jcrop/js/jquery.ui.accordion.js"></script>
    <script src="admin/assets/jcrop/js/jquery.Jcrop.min.js"></script>
    <script src="admin/assets/jcrop/js/jcrop_main.js"></script>
    <script>
        $(function () {
            //Datemask dd/mm/yyyy
            $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
            $("[data-mask]").inputmask();
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
                    <h3 class="box-title">Форма редактирования профиля</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="post" action="{{route('admin.user.update', strtolower($user->name))}}" enctype="multipart/form-data">
                    {{ method_field('PUT') }}
                    {{ csrf_field() }}  
                    <input type="hidden" name="userId" value="{{$user->id}}">
                    <input type="hidden" name="action" value="update">
                    <div class="box-body">
                        <div class="form-group {{ $errors->has('login') ? ' has-error' : '' }}">
                            <label for="login">Login</label>
                             <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                </div>
                            <input type="text" class="form-control" id="login" name="login" value="{{old('login') ?: $user->name}}" autofocus>
                            </div>
                            @if ($errors->has('login'))
                                <span class="help-block">
                                    <i>{{ $errors->first('login') }}</i>
                                </span>
                            @endif
                             
                        </div>
                        <div class="form-group">
                            <label>Тип аккаунта</label>
                            <select class="form-control" name="role">
                                @foreach ($roles as $role)
                                    <option value='{{$role->id}}'
                                        @if($user->role->id === $role->id)
                                            selected
                                        @endif    
                                        >{{$role->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email">Email</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-envelope-o"></i>
                                </div>
                                <input type="email" class="form-control" id="email" name="email" value="{{old('email') ?: $user->email}}">
                            </div>      
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <i>{{ $errors->first('email') }}</i>
                                    </span>
                                @endif
                              
                        </div>
                        <div class="form-group {{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label for="phone">Телефон</label>
                             <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-phone"></i>
                                </div>
                            <input type="text" class="form-control" id="phone" name="phone" value="{{old('phone') ?: $user->profile->phone}}" data-inputmask='"mask": "+9 (999) 999-9999"' data-mask>
                            </div>
                            @if ($errors->has('phone'))
                                <span class="help-block">
                                    <i>{{ $errors->first('phone') }}</i>
                                </span>
                            @endif
                             
                        </div>
                        <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password">Пароль</label>
                             <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-eye-slash"></i>
                                </div>
                                 <input type="password" class="form-control" id="password" name="password" value="{{old('password')}}" placeholder="Введите новый пароль если хотите его изменить или оставьте пустым">
                            </div>    
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <i>{{ $errors->first('password') }}</i>
                                    </span>
                                @endif
                             
                        </div>
                        <div class="form-group {{ $errors->has('repeate_password') ? ' has-error' : '' }}">
                            <label for="repeate_password">Повторите пароль</label>
                             <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-eye-slash"></i>
                                </div>
                                 <input type="password" class="form-control" id="repeate_password" name="repeate_password" value="{{old('repeate_password')}}" placeholder="Повторите новый пароль или оставьте пустым">
                            </div>    
                                @if ($errors->has('repeate_password'))
                                    <span class="help-block">
                                        <i>{{ $errors->first('repeate_password') }}</i>
                                    </span>
                                @endif
                             
                        </div>
                        <div class="form-group {{ $errors->has('first_name') ? ' has-error' : '' }}">
                            <label for="first_name">Имя</label>
                            <input type="text" class="form-control" id="first_name" name="first_name" value="{{old('first_name') ?: $user->profile->first_name}}">
                            @if ($errors->has('first_name'))
                                <span class="help-block">
                                    <i>{{ $errors->first('first_name') }}</i>
                                </span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('last_name') ? ' has-error' : '' }}">
                            <label for="first_name">Фамилия</label>
                            <input type="text" class="form-control" id="last_name" name="last_name" value="{{old('last_name') ?: $user->profile->last_name}}">
                            @if ($errors->has('last_name'))
                                <span class="help-block">
                                    <i>{{ $errors->first('last_name') }}</i>
                                </span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('age') ? ' has-error' : '' }}">
                            <label for="age">Возраст</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="number" class="form-control" id="age" name="age" value="{{old('age') ?: $user->profile->age}}">
                            </div>    
                                @if ($errors->has('age'))
                                    <span class="help-block">
                                        <i>{{ $errors->first('age') }}</i>
                                    </span>
                                @endif
                                
                        </div>
                        <div class="form-group {{ $errors->has('birthdate') ? ' has-error' : '' }}">
                            <label for="birthdate">Дата рождения</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask id="birthdate" name="birthdate" 
                                       value="{{old('birthdate') ? old('birthdate') : ($user->profile->birthdate === null ? '' : date('d m Y', strtotime($user->profile->birthdate)))}})">
                            </div>    
                                @if ($errors->has('birthdate'))
                                    <span class="help-block">
                                        <i>{{ $errors->first('birthdate') }}</i>
                                    </span>
                                @endif
                            
                        </div>
                        <div class="form-group">
                            <label>Пол</label>
                            <select class="form-control" name="sex">
                                @foreach (['мужской','женский'] as $sex)
                                    <option value='{{$sex}}'
                                        @if($user->profile->sex === $sex)
                                            selected
                                        @endif    
                                        >{{$sex}}</option>
                                @endforeach
                            </select>
                        </div>
                        
                       <div class="form-group {{ session('errorUpload') ? ' has-error' : '' }} {{$errors->has('file') ? ' has-error' : '' }}">
                            <label>Изображение профиля</label>
                            <div class="margin-bottom" id="div-preview" style="overflow: hidden;">                          
                            
                                <img id="preview" src="{{$imageProfile}}" width="200" height="200" />
                            
                            </div>
                            @if (session('errorUpload')) 
                                <span class="help-block">
                                    <i>{{ session('errorUpload') }}</i>
                                </span>
                            @elseif ($errors->has('file'))
                                <span class="help-block">
                                    <i>{{ $errors->first('file') }}</i>
                                </span>
                            @endif
                            <a href="#saveImage" data-toggle="modal" class="btn btn-primary">Изменить</a>
                                                        
                        </div>
                        <div class="modal fade" id="saveImage" tabindex="-1" role="dialog" aria-labelledby="createAlbum" aria-hidden="true"">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              <h4 class="modal-title">Загрузка изображения профиля</h4>
                            </div>
                            <div class="modal-body">
                                <p>В данном окне вы можете выбрать изображение с жеского диска и обрезать его</p>
                                <label class="btn btn-success margin-bottom" for="image">Выбрать
                                      <input type="file" id="image" multiple accept="image/*" name="file" class="hidden"/>
                                </label>
                                    
                  <!--                <a class="btn btn-default" id="reset-img-preview">Сбросить</a>-->
                                  <img id="img" src="" alt="Предпросмотр" hidden width="400" height="400"/>

                                  <input type="hidden" name="x" id="x" />
                                  <input type="hidden" name="y" id="y" />
                                  <input type="hidden" name="w" id="w" />
                                  <input type="hidden" name="h" id="h" />
                              
                            <div class="callout col-xs-8" id="help" hidden style="position:absolute; bottom:0; z-index:1000;"></div>   
                            </div>
                            <div class="modal-footer">
<!--                              <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Закрыть</button>-->
                              <button type="button" class="btn btn-primary" data-dismiss="modal">Сохранить</button>

                            </div>

                          </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                      </div><!-- /.modal -->
                        
                        
                    </div><!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Сохранить</button>
                    </div>
                </form>
            </div><!-- /.box -->
        </div><!--/.col (right) -->
    </div>   <!-- /.row -->
</section><!-- /.content -->
