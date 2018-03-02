{{--ADMIN.PAGES.BLOCK.CREATE--}}
<!-- Content Header (Page header) -->
@component('admin.components.page-header')
    @slot('head')Создание блока @endslot
    @slot('breadcrump')
        <li><a href="{{route('admin.page.index')}}">Страницы сайта</a></li>
        <li><a href="{{route('admin.page.edit', $pageModel->slug)}}">Редактирование страницы "{{$pageModel->name}}"</a></li>
        <li class="active">Создание блока</li>
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
                    {{Form::open(['route' => ['admin.block.store'], 'class' => 'form-horizontal', 'role'=> 'form', 'id' => 'block_main_info'])}}
                        {{Form::hidden('blockPage', $pageModel->id)}}
                        {{Form::hidden('action', 'create')}}
                        {{ Form::adminText('blockName',
                            'Название блока <sup><i class="fa fa-question-circle" title="Название блока используется для администратора"></i></sup>',
                            old('blockName')) }}
                        {{ Form::adminText('blockDescription',
                            'Описание блока <sup><i class="fa fa-question-circle" title="Описание блока используется для администратора"></i></sup>',
                            old('blockDescription')) }}
                        {{ Form::adminText('blockHead',
                            'Заголовок блока <sup><i class="fa fa-question-circle" title="Заголовок блока используется для вывода в некоторых шаблонах"></i></sup>',
                            old('blockHead')) }}
                        {{ Form::adminText('blockSubHead',
                            'Подзаголовок блока <sup><i class="fa fa-question-circle" title="Подзаголовок блока используется для вывода в некоторых шаблонах"></i></sup>',
                            old('blockSubHead')) }}
                        {{ Form::adminSelect('blockTemplate',
                            'Шаблон блока <sup><i class="fa fa-question-circle" title="Шаблон блока назначается при создании блока и далее не редактируется"></i></sup>',
                             $templates, null, ['placeholder' => 'Выбрать...']) }}
                        {{ Form::adminStatic('blockPage',
                            'Страница отображения блока <sup><i class="fa fa-question-circle" title="Страница, на которой отображатеся блок"></i></sup>',
                             $pageModel->name) }}
                    {{Form::close()}}
                </div> <!--/.box-body -->
                <div class="box-footer clearfix">
                    <div class="col-sm-offset-3 col-sm-9">
                        {{Form::button('Сохранить', ['type'=>'submit', 'class' => 'btn btn-primary', 'form'=>'block_main_info'])}}
                    </div>
                </div>
            </div> <!--/.box -->
        </div>
    </div>
</section>

