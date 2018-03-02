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
                    <h3 class="box-title">Контент элемента</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body">
                    <p>Элемент не редактируется</p>
                </div>
            </div>

        </div> <!--/.box-body -->

    </div>
</div> <!--/.box -->