<table id="table-pages" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th style="width:40px">Сортировка</th>
            <th style="width:10px"></th>
            <th>Наименование</th>
            <th>Описание</th>
            <th>Действия</th>
        </tr>
    </thead>
    <tbody>

        <tr>
            <td></td>

            <td></td>
            <td>{{$mainPage->name}}</td>
            <td>{{$mainPage->hint}}</td>
            <td>
                <div class="btn-group">
                    <a class="btn btn-primary btn-xs" href="{{route('home')}}" title="Просмотреть в новом окне" target="_blank"><i class="fa fa-eye"></i></a>
                    <a class="btn btn-success btn-xs" href="{{route('admin.page.edit', $mainPage->slug)}}" title="Редактировать"><i class="fa fa-edit"></i></a>
                </div>
            </td>
        </tr>
            @foreach($pages as $page)
                 <tr {{!$page->is_active ? 'style=opacity:0.3' : ''}}>
                        <td>
                            {{Form::open(['url'=>'', 'class'=> 'col-sm-1 page-sort'])}}

                                <input type="hidden" name="pageId" value="{{$page->id}}">
                                {{Form::hidden('move', '', ['id'=> 'move'.$page->id])}}
                            @if($page->sort == 1)
                                {{Form::button('<i class="fa fa-arrow-down"></i>', ['type'=>'submit','title'=> 'Переместить вниз', 'id' => 'down'.$page->id, 'class'=> 'btn bg-purple btn-xs sort'])}}
                            @elseif ($page->sort == $pages->count())
                                {{Form::button('<i class="fa fa-arrow-up"></i>', ['type'=>'submit','title'=> 'Переместить вверх', 'id' => 'up'.$page->id, 'class'=> 'btn bg-purple btn-xs sort'])}}
                                {{Form::button('<i class="fa fa-arrow-right"></i>', ['type'=>'submit','title'=> 'Вложить страницу в предыдущую', 'id' => 'right'.$page->id, 'class'=> 'btn bg-maroon btn-xs sort'])}}
                            @elseif ($page->childrens>0)
                                {{Form::button('<i class="fa fa-arrow-up"></i>', ['type'=>'submit','title'=> 'Переместить вверх', 'id' => 'up'.$page->id, 'class'=> 'btn bg-purple btn-xs sort'])}}
                                {{Form::button('<i class="fa fa-arrow-down"></i>', ['type'=>'submit','title'=> 'Переместить вниз', 'id' => 'down'.$page->id, 'class'=> 'btn bg-purple btn-xs sort'])}}
                            @else
                                {{Form::button('<i class="fa fa-arrow-up"></i>', ['type'=>'submit','title'=> 'Переместить вверх', 'id' => 'up'.$page->id, 'class'=> 'btn bg-purple btn-xs sort'])}}
                                {{Form::button('<i class="fa fa-arrow-right"></i>', ['type'=>'submit','title'=> 'Вложить страницу в предыдущую', 'id' => 'right'.$page->id, 'class'=> 'btn bg-maroon btn-xs sort'])}}
                                {{Form::button('<i class="fa fa-arrow-down"></i>', ['type'=>'submit','title'=> 'Переместить вниз', 'id' => 'down'.$page->id, 'class'=> 'btn bg-purple btn-xs sort'])}}
                            @endif
                            {{Form::close()}}
                        </td>

                        <td> @if ($page->childrens > 0)
                                <button class="have_child closed btn btn-primary btn-xs" title="Вложенные страницы" id="{{$page->id}}"><i class="fa fa-plus-square"></i></button>
                            @endif

                        </td>
                        <td>{{$page->name}}</td>
                        <td>{{$page->hint}}</td>
                        <td>
                            {{Form::open(['route'=> ['admin.page.destroy', $page->slug], 'method' => 'DELETE'])}}
                            <div class="btn-group">
                                @if ($page->childrens == 0)
                                    <a class="btn btn-primary btn-xs" href="{{route('page', $page->slug)}}" title="Просмотреть в новом окне" target="_blank"><i class="fa fa-eye"></i></a>
                                @endif
                                <a class="btn btn-success btn-xs" href="{{route('admin.page.edit', $page->slug)}}" title="Редактировать"><i class="fa fa-edit"></i></a>
                                @if($page->is_active)
                                    <a class="btn btn-info btn-xs" href="{{route('admin.page.activate', $page->slug)}}" title="Деактивировать"><i class="fa fa-toggle-on"></i></a>
                                @else
                                    <a class="btn btn-default btn-xs" href="{{route('admin.page.activate', $page->slug)}}" title="Активировать"><i class="fa fa-toggle-off"></i></a>
                                @endif
                                <a class="btn btn-warning btn-xs" href="{{route('admin.page.child.create', $page->slug)}}" title="Добавить вложенную страницу"><i class="fa fa-plus"></i></a>
                                @if ($page->childrens == 0)
                                    {{Form::button('<i class="fa fa-close"></i>', ['type'=>'submit', 'class' => 'btn btn-danger btn-xs', 'title' => 'Удалить', 'onclick'=>'return confirm("Удалить страницу '.$page->name.' ?")' ])}}
                                @endif
                            </div>
                            {{Form::close()}}
                        </td>
                    </tr>

                @if($page->childrens > 0)
                    @foreach($page->childs as $child)
                        <tr class="page"
                            id="{{$child->parent_id}}"
                            style="display:none; background-color:rgba(192,233,242,0.27); {{!$child->is_active ? 'opacity:0.3;' : ''}}"

                        >
                            <td></td>
                            <td>

                                {{Form::open(['url'=>'', 'class'=> 'col-sm-1 page-sort'])}}

                                <input type="hidden" name="pageId" value="{{$child->id}}">
                                {{Form::hidden('move', '', ['id'=> 'move'.$child->id])}}
                                @if($child->sort == 1)
                                    @if($page->childs->count() != 1)
                                        {{Form::button('<i class="fa fa-arrow-down"></i>', ['type'=>'submit','title'=> 'Переместить вниз', 'id' => 'down'.$child->id, 'class'=> 'btn bg-purple btn-xs sort'])}}
                                        {{Form::button('<i class="fa fa-arrow-left"></i>', ['type'=>'submit','title'=> 'Поднять на уровень вверх', 'id' => 'left'.$child->id, 'class'=> 'btn bg-maroon btn-xs sort'])}}
                                    @else
                                        {{Form::button('<i class="fa fa-arrow-left"></i>', ['type'=>'submit','title'=> 'Поднять на уровень вверх', 'id' => 'left'.$child->id, 'class'=> 'btn bg-maroon btn-xs sort'])}}
                                    @endif
                                @elseif ($child->sort == $page->childs->count())
                                    {{Form::button('<i class="fa fa-arrow-up"></i>', ['type'=>'submit','title'=> 'Переместить вверх', 'id' => 'up'.$child->id, 'class'=> 'btn bg-purple btn-xs sort'])}}
                                    {{Form::button('<i class="fa fa-arrow-left"></i>', ['type'=>'submit','title'=> 'Поднять на уровень вверх', 'id' => 'left'.$child->id, 'class'=> 'btn bg-maroon btn-xs sort'])}}
                                @else
                                    {{Form::button('<i class="fa fa-arrow-up"></i>', ['type'=>'submit','title'=> 'Переместить вверх', 'id' => 'up'.$child->id, 'class'=> 'btn bg-purple btn-xs sort'])}}
                                    {{Form::button('<i class="fa fa-arrow-left"></i>', ['type'=>'submit','title'=> 'Поднять на уровень вверх', 'id' => 'left'.$child->id, 'class'=> 'btn bg-maroon btn-xs sort'])}}
                                    {{Form::button('<i class="fa fa-arrow-down"></i>', ['type'=>'submit','title'=> 'Переместить вниз', 'id' => 'down'.$child->id, 'class'=> 'btn bg-purple btn-xs sort'])}}
                                @endif
                                {{Form::close()}}
                            </td>

                            <td>{{$child->name}}</td>
                            <td>{{$child->hint}}</td>
                            <td>
                                {{Form::open(['route'=> ['admin.page.destroy', $child->slug], 'method' => 'DELETE'])}}
                                <div class="btn-group">
                                    <a class="btn btn-primary btn-xs" href="{{route('page', $child->slug)}}" title="Просмотреть в новом окне" target="_blank"><i class="fa fa-eye"></i></a>
                                    <a class="btn btn-success btn-xs" href="{{route('admin.page.edit', $child->slug)}}" title="Редактировать"><i class="fa fa-edit"></i></a>
                                    @if($child->is_active)
                                        <a class="btn btn-info btn-xs" href="{{route('admin.page.activate', $child->slug)}}" title="Деактивировать"><i class="fa fa-toggle-on"></i></a>
                                    @else
                                        <a class="btn btn-default btn-xs" href="{{route('admin.page.activate', $child->slug)}}" title="Активировать"><i class="fa fa-toggle-off"></i></a>
                                    @endif
                                    {{Form::button('<i class="fa fa-close"></i>', ['type'=>'submit', 'class' => 'btn btn-danger btn-xs', 'title' => 'Удалить', 'onclick'=>'return confirm("Удалить страницу '.$child->name.' ?")' ])}}
                                </div>
                                {{Form::close()}}
                            </td>
                        </tr>
                    @endforeach
                @endif

            @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th>Сортировка</th>

            <th></th>
            <th>Наименование</th>
            <th>Описание</th>
            <th>Действия</th>
        </tr>
    </tfoot>
</table>

