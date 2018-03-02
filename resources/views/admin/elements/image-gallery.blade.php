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
                <div class="box-header">
                    <h3 class="box-title">Контент элемента</h3> <sup><i class="fa fa-question-circle" title="Для сортировки изображений, удерживая мышкой перетащите его"></i></sup>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body">
                @if(empty($element->content['images']))
                    {{Form::open(['route' => ['admin.element.content.create', $element->id], 'class' => 'form-horizontal', 'role'=> 'form', 'id' => 'element'.$element->id, 'files' => true])}}
                        {{Form::hidden('action','elementContentCreate')}}
                @else
                        {{Form::open(['route' => ['admin.element.content.update', $element->id], 'class' => 'form-horizontal', 'role'=> 'form', 'id' => 'element'.$element->id, 'files' => true])}}
                        <div class="col-sm-12 image-sort" data-block="{{$element->id}}">
                        @for($i=0; $i<count($element->content['images']); $i++)
                            <div class="col-sm-2 pad" id="images_{{$element->content['images'][$i]->id}}">
                                <img class="sort" src="{{config('imagestorage.originalImagesPath').'small/'.$element->content['images'][$i]->path}}" width="150" height="150">
                                <a href="{{route('admin.image.delete', $element->content['images'][$i]->id)}}" style="position:absolute; top:5px; right:10px; color:#ff1552" title="Удалить изображение" onclick='return confirm("Удалить изображение?")'><i class="fa fa-remove"></i></a>
                            </div>
                        @endfor
                        </div>
                @endif
                        {{Form::hidden('table', 'elements')}}
                        {{Form::hidden('table_id', $element->id)}}
                        <div class="clearfix margin-bottom"></div>
                        <div class="col-sm-2">
                            {{Form::adminImage('images_','Загрузить изображение')}}
                        </div>
                    {{Form::close()}}
                </div>
                <div class="box-footer clearfix">
                    {{Form::adminSubmit('Сохранить', ['type'=>'submit', 'class' => 'btn btn-primary', 'form' => 'element'.$element->id])}}
                </div>
            </div>

        </div> <!--/.box-body -->

    </div>
</div> <!--/.box -->