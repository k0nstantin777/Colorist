<div class="box box-solid collapsed-box">
    <div class="box-header">
        <h3 class="box-title">Основная информация элемента</h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
        </div><!-- /.box-tools -->
    </div><!-- /.box-header -->
    <div class="box-body">
        {{Form::open(['route' => ['admin.element.update', $element->id], 'class' => 'form-horizontal', 'role'=> 'form', 'method' => 'PUT', 'id' => 'element_main_info'.$element->id])}}
            {{Form::hidden('elementId', $element->id)}}
            {{Form::hidden('action', 'update')}}
            {{ Form::adminText('elementName',
                'Название элемента <sup><i class="fa fa-question-circle" title="Название элемента используется для администратора"></i></sup>',
                old('elementName') ? old('elementName') : $element->name) }}
            {{ Form::adminText('elementDescription',
                'Описание элемента <sup><i class="fa fa-question-circle" title="Описание элемента используется для администратора"></i></sup>',
                old('elementDescription') ? old('elementDescription') : $element->description) }}
            {{ Form::adminText('elementHead',
                'Заголовок элемента <sup><i class="fa fa-question-circle" title="Заголовок элемента используется для вывода в некоторых шаблонах"></i></sup>',
                old('elementHead') ? old('elementHead') : $element->head) }}
            {{ Form::adminText('elementSubHead',
                'Подзаголовок элемента <sup><i class="fa fa-question-circle" title="Подзаголовок элемента используется для вывода в некоторых шаблонах"></i></sup>',
                old('elementSubHead') ? old('elementSubHead') : $element->sub_head) }}
            {{ Form::adminStatic('elementTemplate',
                'Шаблон элемента <sup><i class="fa fa-question-circle" title="Шаблон элемента назначается при создании элемента и далее не редактируется"></i></sup>',
                 $element->template->name) }}
            {{ Form::adminStatic('elementStatus',
                'Статус элемента <sup><i class="fa fa-question-circle" title="Видимость элемента на странице"></i></sup>',
                 $element->is_active ? 'Активен' : 'Неактивен' ) }}
            {{Form::adminSubmit('Сохранить', ['type'=>'submit', 'class' => 'btn btn-sm btn-primary col-xs-offset-3'])}}
        {{Form::close()}}
    </div>
</div>