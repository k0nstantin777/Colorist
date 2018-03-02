<div class="panel box box-default" id="elements_{{$element->id}}">
    <div class="box-header with-border">
        <h4 class="box-title">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapse{{$element->id}}">
                Элемент "{{$element->name}}"
            </a>
        </h4>
        <div class="box-tools pull-right">
            {{Form::open(['route' => ['admin.element.destroy', $element->id], 'method'=> 'DELETE'])}}
            @if($element->is_active)
                <a href="{{route('admin.element.activate', $element->id)}}" class="btn btn-sm btn-primary" title="Деактивировать элемент"><i class="fa fa-toggle-on"></i></a>
            @else
                <a href="{{route('admin.element.activate', $element->id)}}" class="btn btn-sm btn-default" title="Активировать элемент"><i class="fa fa-toggle-off"></i></a>
            @endif
            {{Form::button('<i class="fa fa-trash"></i>', ['type'=>'submit', 'class' => 'btn btn-sm btn-danger', 'onclick'=>'return confirm("Удалить элемент?")', 'title'=> 'Удалить элемент'])}}
            {{Form::close()}}

        </div><!-- /.box-tools -->
    </div><!-- /.box-header -->
    <div id="collapse{{$element->id}}" class="panel-collapse collapse">
        <div class="box-body">
            @include('admin.widgets.forms.elements-main-info')
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Контент элемента</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div><!-- /.box-tools -->
                </div><!-- /.box-header -->

                <div class="box-body" id="content">
                    <div class="col-sm-6">
                        <ul class="list-group contact-sort" data-block="{{$element->id}}">
                            @for($i=0; $i<count($element->content['texts']); $i++)

                                <li class="list-group-item" id="contents_{{$i}}">
                                    <div class="sort">
                                    {{Form::open(['route' => ['admin.element.content.delete', $element->id]])}}
                                        {{Form::hidden('action', 'contactDelete')}}
                                        {{Form::hidden('sort', $element->content['texts'][$i]->sort)}}
                                        {!! $element->content['icons'][$i]->icon!!} {!! $element->content['texts'][$i]->text!!}
                                        {{Form::button('&times;', ['type'=>'submit', 'class' => 'close', 'onclick'=>'return confirm("Удалить контакт?")', 'title'=> 'Удалить контакт'])}}
                                    {{Form::close()}}
                                    </div>
                                </li>

                            @endfor
                        </ul>
                    </div>

                    <div class="col-sm-12">
                        <div class="panel panel-default" id="contact">
                            <div class="panel-heading"><b>Добавить контакт</b></div>
                            <div class="panel-body">

                                {{Form::open(['route' => ['admin.element.content.create', $element->id], 'class' => 'form-horizontal', 'role'=> 'form', 'id' => 'element'.$element->id, 'files' => true])}}
                                    {{Form::hidden('action','elementContentCreate')}}
                                <div class="col-sm-12">
                                    {{ Form::adminSelectBs('icons_',
                                        'Иконка <sup><i class="fa fa-question-circle" title="Вы можете выбрать иконку из доступных"></i></sup>',
                                         config('icons.icons'), null, config('icons.data')) }}
                                </div>
                                <div class="col-sm-12">
                                    {{Form::adminTextareaCK('texts_', 'Текст')}}
                                </div>
                                <div class="col-sm-12">
                                    {{Form::adminSubmit('Сохранить', ['type'=>'submit', 'class' => 'btn btn-primary', 'form' => 'element'.$element->id])}}
                                </div>
                                {{Form::close()}}
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div> <!--/.box-body -->

    </div>
</div> <!--/.box -->