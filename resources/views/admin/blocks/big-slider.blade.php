<section class="col-xs-12">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Контент блока</h3> <sup><i class="fa fa-question-circle" title="Для сортировки слайдов, удерживая мышкой перетащите его вверх или вниз"></i></sup>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div><!-- /.box-tools -->
        </div><!-- /.box-header -->
        <div class="box-body">
            <div class="box-group connectedSortable slider-sort" id="accordion" data-block="{{$block->id}}">
                @if (empty($block['content']))
                    <p>Слайдов пока нет</p>
                @else
                    @for($i=0; $i<count($block['content']['texts']); $i++)
                        <div class="panel box box-default" id="contents_{{$i}}">
                            <div class="box-header with-border">
                                <h4 class="box-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse{{$i}}">
                                        Слайд {{$i+1}}
                                    </a>
                                </h4>
                                <div class="box-tools pull-right">
                                    {{Form::open(['route' => ['admin.block.content.delete', $block->slug]])}}
                                        {{Form::hidden('action', 'slideDelete')}}
                                        {{Form::hidden('sort', $block['content']['texts'][$i]->sort)}}
                                        {{Form::button('<i class="fa fa-trash"></i>', ['type'=>'submit', 'class' => 'btn btn-sm btn-default', 'onclick'=>'return confirm("Удалить слайд?")', 'title'=> 'Удалить слайд'])}}

                                    {{Form::close()}}

                                </div><!-- /.box-tools -->
                            </div><!-- /.box-header -->
                            <div id="collapse{{$i}}" class="panel-collapse collapse">
                                <div class="box-body">
                                    {{Form::open(['route' => ['admin.block.content.update'], 'class' => 'form-horizontal', 'role'=> 'form', 'id' => 'slide_'.$i, 'files' => true])}}
                                        <div class="col-sm-2">
                                        {{Form::adminImage('images_'.$block['content']['images'][$i]->id,'Загрузить изображение', config('imagestorage.originalImagesPath').'small/'.$block['content']['images'][$i]->path )}}
                                        </div>
                                        <div class="col-sm-10">
                                        {{Form::adminTextareaCK('texts_'.$block['content']['texts'][$i]->id, 'Текст', $block['content']['texts'][$i]->text)}}
                                        </div>
                                    {{Form::close()}}

                                </div> <!--/.box-body -->
                                <div class="box-footer clearfix">
                                    <button class="btn btn-primary" form="slide_{{$i}}" type="submit">Сохранить</button>
                                    <div class="info" id="response_{{$i}}"></div>
                                </div>
                            </div>
                        </div> <!--/.box -->
                    @endfor
                @endif
            </div>
        </div>
        <div class="box-footer clearfix">
            {{Form::open(['route' => ['admin.block.content.create', $block->slug]])}}
                {{Form::hidden('action', 'slideCreate')}}
                {{Form::button('Добавить слайд', ['type'=>'submit', 'class' => 'btn btn-primary col-xs-2', 'onclick'=>'return confirm("Добавить слайд?")'])}}

            {{Form::close()}}
        </div>
    </div>
   
</section>

