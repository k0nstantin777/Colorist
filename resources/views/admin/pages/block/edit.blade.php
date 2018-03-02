{{--ADMIN.PAGES.BLOCK.EDIT--}}
<!-- Content Header (Page header) -->
@component('admin.components.page-header')
    @slot('head')Редактирование блока "{{$block->name}}" @endslot
    @slot('breadcrump')
    <li><a href="{{route('admin.page.index')}}">Страницы сайта</a></li>
    <li><a href="{{route('admin.page.edit', $block->page->slug)}}">Редактирование страницы "{{$block->page->name}}"</a></li>
    <li class="active">Редактирование блока</li>
    @endslot
@endcomponent

@section('local-scripts')
    <!-- ck editor -->
    <script type="text/javascript" src="admin/assets/ckeditor/ckeditor.js"></script>
    <script>

        $('.image').change(function () {
            var input = $(this)[0];
            var id = $(this).attr('id');
            if (input.files && input.files[0]) {
                if (input.files[0].type.match('image.*')) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#preview_'+id).attr('src', e.target.result).show();

                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }
        });

        $('.selectbs').selectpicker({
           size: 10,
        });

        $(document).on('click', '#contact_plus', function(){
            var panel = $(this).parents('#contact');
            var clone = panel.clone(true);
            $(clone).appendTo('#content');
        });

    </script>
@endsection

@section('local-styles')
    <style>
        .selectbs span{
            text-align:center !important;
        }
    </style>
@endsection

<section class="content">
    <div class="row">
        <div class="col-xs-12 margin-bottom">
            {{Form::open(['route' => ['admin.block.destroy', $block->slug], 'method'=> 'DELETE'])}}
                @if($block->is_active)
                    <a href="{{route('admin.block.activate', $block->slug)}}" class="btn btn-primary"><i class="fa fa-toggle-on"></i> Деактивировать блок</a>
                @else
                    <a href="{{route('admin.block.activate', $block->slug)}}" class="btn btn-default"><i class="fa fa-toggle-off"></i> Активировать блок</a>
                @endif

                <button type="submit" class="btn btn-danger" onclick='return confirm("Удалить блок {{$block->name}} и все связанные объекты?")'><i class="fa fa-trash-o"></i> Удалить блок</button>
            {{Form::close()}}
        </div>
        <div class="col-xs-12">
            <div class="box box-primary collapsed-box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Основные параметры</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                        </div><!-- /.box-tools -->
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        {{Form::open(['route' => ['admin.block.update', $block->slug], 'class' => 'form-horizontal', 'role'=> 'form', 'method' => 'PUT', 'id' => 'block_main_info'])}}
                            {{Form::hidden('blockId', $block->id)}}
                            {{Form::hidden('action', 'update')}}
                            {{ Form::adminText('blockName',
                                'Название блока <sup><i class="fa fa-question-circle" title="Название блока используется для администратора"></i></sup>',
                                old('blockName') ? old('blockName') : $block->name) }}
                            {{ Form::adminText('blockDescription',
                                'Описание блока <sup><i class="fa fa-question-circle" title="Описание блока используется для администратора"></i></sup>',
                                old('blockDescription') ? old('blockDescription') : $block->description) }}
                            {{ Form::adminText('blockHead',
                                'Заголовок блока <sup><i class="fa fa-question-circle" title="Заголовок блока используется для вывода в некоторых шаблонах"></i></sup>',
                                old('blockHead') ? old('blockHead') : $block->head) }}
                            {{ Form::adminText('blockSubHead',
                                'Подзаголовок блока <sup><i class="fa fa-question-circle" title="Подзаголовок блока используется для вывода в некоторых шаблонах"></i></sup>',
                                old('blockSubHead') ? old('blockSubHead') : $block->sub_head) }}
                            {{ Form::adminSelect('blockPage',
                                'Страница отображения блока <sup><i class="fa fa-question-circle" title="Страница, на которой отображатеся блок"></i></sup>',
                                 $pages, $block->page_id) }}
                            {{ Form::adminStatic('blockTemplate',
                                'Шаблон блока <sup><i class="fa fa-question-circle" title="Шаблон блока назначается при создании блока и далее не редактируется"></i></sup>',
                                 $block->template->name) }}
                            {{ Form::adminStatic('blockStatus',
                                'Статус блока <sup><i class="fa fa-question-circle" title="Видимость блока на странице"></i></sup>',
                                 $block->is_active ? 'Активен' : 'Неактивен' ) }}
                        {{Form::close()}}
                    </div> <!--/.box-body -->
                    <div class="box-footer clearfix">
                        <div class="col-sm-offset-3 col-sm-9">
                            <button class="btn btn-primary" form="block_main_info" type="submit">Сохранить</button>
                            <div class="info" id="response"></div>
                        </div>
                    </div>
            </div> <!--/.box --> 
     </div>
    

       @include('admin.'.$block->template->template)
    </div>
</section>

