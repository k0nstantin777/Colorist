{{--ADMIN.PAGES.ELEMENT.CREATE--}}
<!-- Content Header (Page header) -->
@component('admin.components.page-header')
    @slot('head')Создание элемента @endslot
    @slot('breadcrump')
        <li><a href="{{route('admin.page.index')}}">Страницы сайта</a></li>
        <li><a href="{{route('admin.page.edit', $block->page->slug)}}">Редактирование страницы "{{$block->page->name}}"</a></li>
        <li><a href="{{route('admin.block.edit', $block->slug)}}">Редактирование блока "{{$block->name}}"</a></li>
        <li class="active">Создание элемента</li>
    @endslot
@endcomponent

<section class="content">
    <div class="row">
        <div class="col-xs-12 connectedSortable">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Основные параметры</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body">
                    {{Form::open(['route' => ['admin.element.store'], 'class' => 'form-horizontal', 'role'=> 'form', 'id' => 'element_main_info'])}}
                        {{Form::hidden('blockId', $block->id)}}
                        {{Form::hidden('action', 'create')}}
                        {{ Form::adminText('elementName',
                            'Название элемента <sup><i class="fa fa-question-circle" title="Название элемента используется для администратора"></i></sup>',
                            old('elementName')) }}
                        {{ Form::adminText('elementDescription',
                            'Описание элемента <sup><i class="fa fa-question-circle" title="Описание элемента используется для администратора"></i></sup>',
                            old('elementDescription')) }}
                        {{ Form::adminText('elementHead',
                            'Заголовок элемента <sup><i class="fa fa-question-circle" title="Заголовок элемента используется для вывода в некоторых шаблонах"></i></sup>',
                            old('elementHead')) }}
                        {{ Form::adminText('elementSubHead',
                            'Подзаголовок элемента <sup><i class="fa fa-question-circle" title="Подзаголовок элемента используется для вывода в некоторых шаблонах"></i></sup>',
                            old('elementSubHead')) }}
                        {{ Form::adminSelect('elementTemplate',
                            'Шаблон элемента <sup><i class="fa fa-question-circle" title="Шаблон элемента назначается при создании элемента и далее не редактируется"></i></sup>',
                             $templates, null, ['placeholder' => 'Выбрать...']) }}
                        {{ Form::adminStatic('elementBlock',
                            'Блок отображения элемента <sup><i class="fa fa-question-circle" title="Блок, к которому привязан элемент"></i></sup>',
                             $block->name) }}
                    {{Form::close()}}
                </div> <!--/.box-body -->
                <div class="box-footer clearfix">
                    <div class="col-sm-offset-3 col-sm-9">
                        {{Form::button('Сохранить', ['type'=>'submit', 'class' => 'btn btn-primary', 'form'=>'element_main_info'])}}
                    </div>
                </div>
            </div> <!--/.box -->
        </div>
    </div>
</section>

