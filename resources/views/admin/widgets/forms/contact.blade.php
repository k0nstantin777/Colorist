<div class="panel panel-default">
    <div class="panel-body">
        <div class="col-sm-12">
            {{ Form::adminSelectBs('icons_'.(isset($element->content['icons'][0]->id) ? $element->content['icons'][0]->id : '0'),
                'Иконка <sup><i class="fa fa-question-circle" title="Вы можете выбрать иконку из доступных"></i></sup>',
                 config('icons.icons'), isset($element->content['icons'][0]->icon) ? $element->content['icons'][0]->icon : false, config('icons.data')) }}
        </div>
        <div class="col-sm-12">
            {{Form::adminTextareaCK('texts_'.(isset($element->content['texts'][0]->id) ? $element->content['texts'][0]->id : '0'), 'Текст', isset($element->content['texts'][0]->text) ? $element->content['texts'][0]->text : '')}}
        </div>
    </div>
</div>