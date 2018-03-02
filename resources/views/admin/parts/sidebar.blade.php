<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{$userImage}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{$authUser->name}}</p>
                <a ><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">ГЛАВНОЕ МЕНЮ</li>
            <li class="treeview">
                <a href="{{route('admin.home')}}">
                    <i class="fa fa-dashboard"></i> <span>Главная</span>
                </a>
                
            </li>
            <li class="treeview">
                <a href="{{route('admin.page.index')}}">
                    <i class="fa fa-files-o"></i> <span>Страницы</span>
                </a>
                
            </li>
            <li class="treeview">
                <a href="{{route('admin.review.index')}}">
                    <i class="fa fa-commenting-o"></i><span>Отзывы</span>
                </a>

            </li>
            {{--<li class="treeview">--}}
                {{--<a href="{{route('admin.page.index')}}">--}}
                    {{--<i class="fa fa-bell-o"></i> <span>Заявки</span>--}}
                {{--</a>--}}

            {{--</li>--}}
            <li class="treeview">
                <a href="{{route('admin.message.index')}}">
                    <i class="fa fa-envelope-o"></i> <span>Сообщения</span>
                </a>

            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i> <span>Пользователи</span><i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('admin.user.index')}}"><i class="fa fa-circle-o"></i> Все</a></li>
                    <li><a href="{{route('admin.user.create')}}"><i class="fa fa-circle-o"></i> Создать</a></li>
                    <li><a href="{{route('admin.prive.index')}}"><i class="fa fa-circle-o"></i> Управление правами</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="{{route('admin.setting.edit')}}">
                    <i class="fa fa-cogs"></i> <span>Настройки</span>
                </a>

            </li>
            
    </section>
    <!-- /.sidebar -->
</aside>