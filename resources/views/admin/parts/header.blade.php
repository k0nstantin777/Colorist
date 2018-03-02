<header class="main-header">
    <!-- Logo -->
    <a href="{{route('admin.home')}}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>C</b>RT</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>COLOR</b>IST</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- Messages: style can be found in dropdown.less-->
                <li class="dropdown messages-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-envelope-o"></i>
                        <span class="label label-success">{{$newMessages->count()}}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">{{$newMessages->count()}} нов{{newCountEnding($newMessages->count(), 3)}} сообщени{{messagesCountEnding($newMessages->count())}}</li>
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu">
                                @foreach ($newMessages as $message)
                                    <li><!-- start message -->
                                        <a href="{{route('admin.message.show', $message->id)}}">
                                            <h4>
                                                {{$message->name}}
                                                <small><i class="fa fa-clock-o"></i>{{date('H:i:s d/m/Y', strtotime($message->created_at))}}</small>
                                            </h4>
                                            <p>{{substr($message->message, 0, 30)}}...</p>
                                        </a>
                                    </li><!-- end message -->
                                @endforeach
                                                               
                            </ul>
                        </li>
                        <li class="footer"><a href="{{route('admin.message.index')}}">Смотреть все сообщения</a></li>
                    </ul>
                </li>
                <!-- Notifications: style can be found in dropdown.less -->
                <li class="dropdown notifications-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-commenting-o"></i>
                        <span class="label label-warning">{{$newReviews->count()}}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">{{$newReviews->count()}} нов{{newCountEnding($newReviews->count(), 1)}} отзыв{{reviewCountEnding($newReviews->count())}}</li>
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu">
                                @foreach ($newReviews as $review)
                                    <li><!-- start message -->
                                        <a href="#">
                                            <h4>
                                                {{$review->author}}

                                            </h4>
                                            <small><i class="fa fa-clock-o"></i> {{date('H:i:s d/m/Y', strtotime($review->created_at))}}</small>
                                            <p>{{substr($review->text, 0, 31)}}...</p>
                                        </a>
                                    </li><!-- end message -->
                                @endforeach
                            </ul>
                        </li>
                        <li class="footer"><a href="{{route('admin.review.index')}}">Смотреть все отзывы</a></li>
                    </ul>
                </li>
                
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{$userImage}}" class="user-image" alt="User Image">
                        <span class="hidden-xs">{{$authUser->name}}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="{{$userImage}}" class="img-circle" alt="User Image">
                            <p>
                                {{$authUser->name}}
                                <small>Зарегестирован {{date('H:i:s d/m/Y', strtotime($authUser->created_at))}}</small>
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="{{route('admin.user.show', $authUser->name)}}" class="btn btn-default btn-flat">Профиль</a>
                            </div>
                            <div class="pull-right">
                                <a href="{{route('logout')}}" class="btn btn-default btn-flat">Выйти</a>
                            </div>
                        </li>
                    </ul>
                </li>
                <!-- Control Sidebar Toggle Button -->
<!--                <li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li>-->
            </ul>
        </div>
    </nav>
</header>