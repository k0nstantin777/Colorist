<nav class="navbar navbar-default navbar-fixed-top probootstrap-navbar">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Меню</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <a class="navbar-brand" href="{{route('home')}}" title="На главную страницу"><img class="mb5" src="img/Logo52x52.png" width="37" height="37"> Colorist</a>
        </div>

        <div id="navbar-collapse" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="{{route('home')}}">Главная</a></li>
                @foreach($pages_level1 as $page)
                    @if ($page->childrens > 0)
                        <li class="dropdown">
                            <a href="#" data-toggle="dropdown" class="dropdown-toggle">{{$page->name}}</a>
                            <ul class="dropdown-menu">
                               @foreach($pages_level2 as $page2)
                                    @if($page2->parent_id == $page->id)
                                        <li><a href="{{route('page', $page2->slug)}}">{{$page2->name}}</a></li>
                                    @endif
                               @endforeach
                            </ul>
                        </li>
                    @else
                        <li><a href="{{route('page', $page->slug)}}">{{$page->name}}</a></li>
                    @endif    
                @endforeach
                    
            </ul>
        </div>
    </div>
</nav>