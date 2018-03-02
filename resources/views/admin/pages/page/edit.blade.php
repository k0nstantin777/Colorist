{{--ADMIN.PAGES.PAGE.EDIT--}}
<!-- Content Header (Page header) -->
@component('admin.components.page-header')
    @slot('head')Редактирование страницы "{{$pageModel->name}}" @endslot
    @slot('breadcrump')
    <li><a href="{{route('admin.page.index')}}">Страницы</a></li>
    <li class="active">Редактирование страницы</li>
    @endslot
@endcomponent

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-default collapsed-box">
                <div class="box-header with-border">
                    <h3 class="box-title">Основные параметры</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                    </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body">
                    @include('admin.widgets.forms.page-params')
                </div><!-- /.box-body -->
            </div><!-- /.box -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <i class="ion ion-clipboard"></i>
                    <h3 class="box-title">Блоки на странице</h3> <sup><i class="fa fa-question-circle" title="Для сортировки блоков, удерживая мышкой перетащите блок вверх или вниз"></i></sup>
              
                </div><!-- /.box-header -->
                <div class="box-body">
                    @if($blocks->count() === 0)
                        <p>На данной странице пока нет ни одного блока</p>
                    @else

                        <div class="box-group connectedSortable page-blocks" id="accordion" data-block="{{$pageModel->id}}">
                            @foreach($blocks as $block)
                                <div class="panel box box-default" id="blocks_{{$block->id}}">
                                    <div class="box-header with-border">
                                        <h5 class="box-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse{{$block->id}}">
                                                {{$block->name}}
                                            </a>
                                        </h5>
                                        <span>({{$block->description}})</span>
                                        <div class="box-tools pull-right">
                                            {{Form::open(['route' => ['admin.block.destroy', $block->slug], 'method'=> 'DELETE'])}}
                                            @if($block->is_active)
                                                <a href="{{route('admin.block.activate', $block->slug)}}" class="btn btn-sm btn-primary" title="Деактивировать"><i class="fa fa-toggle-on"></i></a>
                                            @else
                                                <a href="{{route('admin.block.activate', $block->slug)}}" class="btn btn-sm btn-default" title="Активировать"><i class="fa fa-toggle-off"></i></a>
                                            @endif
                                                <a href="{{route('admin.block.edit', $block->slug)}}" class="btn btn-sm btn-success" title="Редактировать блок"><i class="fa fa-edit "></i></a>
                                                {{Form::button('<i class="fa fa-trash"></i>', ['type'=>'submit', 'class' => 'btn btn-sm btn-danger', 'onclick'=>'return confirm("Удалить блок '.$block->name.' и все связанные объекты?")', 'title'=> 'Удалить блок'])}}
                                            {{Form::close()}}

                                        </div><!-- /.box-tools -->
                                    </div><!-- /.box-header -->
                                    <div id="collapse{{$block->id}}" class="panel-collapse collapse">
                                        <div class="box-body">

                                        </div> <!--/.box-body -->

                                    </div>
                                </div> <!--/.box -->
                            @endforeach

                        </div>
                    @endif
                </div><!-- /.box-body -->
                <div class="box-footer clearfix no-border">
                   <a href="{{route('admin.block.page.create', $pageModel->slug)}}" class="btn btn-primary"><i class="fa fa-plus"></i> Добавить блок</a>
                </div>
            </div><!-- /.box -->
            
            
        </div>
    </div>
</section>    

