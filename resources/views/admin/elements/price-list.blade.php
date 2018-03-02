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
                        @foreach($element->content['elements'] as $elem)
                            <ul class="list-group price-sort" data-block="{{$elem->id}}">
                                <li class="list-group-item active">
                                    {{Form::open(['route' => ['admin.element.content.delete', $elem->id]])}}
                                        {{Form::hidden('action', 'priceGroupDelete')}}
                                         <b>{{$elem->head}}</b>
                                         {{Form::button('&times;', ['type'=>'submit', 'class' => 'close', 'onclick'=>'return confirm("Удалить группу?")', 'title'=> 'Удалить группу цен'])}}
                                    {{Form::close()}}

                                </li>
                                @for($i=0; $i<count($elem->content['texts']); $i+=2)
                                    <li class="list-group-item price" id="contents_{{$i}}">
                                        <div class="sort">
                                            {{Form::open(['route' => ['admin.element.content.delete', $elem->id]])}}
                                                {{Form::hidden('action', 'priceDelete')}}
                                                {{Form::hidden('sort', $elem->content['texts'][$i]->sort)}}
                                                {!! $elem->content['texts'][$i]->text!!} ............. {!! $elem->content['texts'][$i+1]->text!!}
                                                {{Form::button('&times;', ['type'=>'submit', 'class' => 'close', 'onclick'=>'return confirm("Удалить позицию?")', 'title'=> 'Удалить позицию'])}}
                                            {{Form::close()}}
                                        </div>
                                    </li>
                                @endfor
                                <li class="list-group-item"><a href="#addPosition{{$elem->id}}" data-toggle="modal" class="btn btn-sm btn-primary">Добавить позицию в группу</a></li>
                                @component('admin.components.modal', ['id' => 'addPosition'.$elem->id, 'head' => 'Добавление позиции'])
                                    @slot('body')
                                        {{Form::open(['route' => ['admin.element.content.create', $elem->id], 'class' => 'form-horizontal', 'role'=> 'form'])}}
                                            {{Form::hidden('action','elementContentCreate')}}
                                            {{Form::adminText('texts_0', 'Название позиции')}}
                                            {{Form::adminText('texts_1', 'Стоимость')}}
                                            {{Form::adminSubmit('Сохранить', ['class' => 'btn btn-primary col-sm-offset-1', 'type'=> 'submit'])}}
                                        {{Form::close()}}
                                    @endslot
                                @endcomponent
                            </ul>
                        @endforeach
                    </div>

                    <div class="col-sm-12">
                        <div class="panel panel-default" id="contact">
                            <div class="panel-heading"><b>Добавить группу цен в прайс-лист</b></div>
                            <div class="panel-body">

                                {{Form::open(['route' => ['admin.element.content.create', $element->id], 'class' => 'form-horizontal', 'role'=> 'form', 'id' => 'element'.$element->id])}}
                                    {{Form::hidden('action','elementCreate')}}
                                    {{Form::hidden('elementTemplate', '15')}}

                                    {{Form::adminText('head', 'Название группы')}}

                                <div class="col-sm-12">
                                    {{Form::button('Добавить', ['type'=>'submit', 'class' => 'btn btn-primary col-sm-offset-3', 'form' => 'element'.$element->id])}}
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