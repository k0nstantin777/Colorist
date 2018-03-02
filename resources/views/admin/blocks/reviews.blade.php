<section class="col-xs-12">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Контент блока</h3> <sup><i class="fa fa-question-circle" title="Для сортировки отзывов, удерживая мышкой перетащите его вверх или вниз"></i></sup>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div><!-- /.box-tools -->
        </div><!-- /.box-header -->
        <div class="box-body">
            <div class="box-group connectedSortable review-sort" id="accordion" data-block="{{$block->id}}">
                @if (empty($block['content']))
                    <p>Отзывов пока нет</p>
                @else
                    @for($i=0; $i<count($block['content']['reviews']); $i++)
                        <div class="panel box box-default" id="reviews_{{$block['content']['reviews'][$i]->id}}">
                            <div class="box-header with-border">
                                <h4 class="box-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse{{$i}}">
                                        Отзыв {{$i+1}}
                                    </a>
                                </h4>
                                <div class="box-tools pull-right">
                                    {{Form::open(['route' => ['admin.review.detach', $block['content']['reviews'][$i]->id]])}}
                                        {{Form::button('<i class="fa fa-chain-broken"></i>', ['type'=>'submit', 'class' => 'btn btn-sm btn-default', 'onclick'=>'return confirm("Открепить отзыв?")', 'title'=> 'Открепить'])}}
                                    {{Form::close()}}

                                </div><!-- /.box-tools -->
                            </div><!-- /.box-header -->
                            <div id="collapse{{$i}}" class="panel-collapse collapse">
                                <div class="box-body">
                                    <div class="attachment-block clearfix">
                                        <img class="attachment-img img-responsive img-circle" src="{{$block['content']['reviews'][$i]->image ? config('imagestorage.userFilesPath').$block['content']['reviews'][$i]->image->path : config('imagestorage.defaultUserImage') }}" alt="image">
                                        <div class="attachment-pushed">
                                            <h4 class="attachment-heading">Автор</h4>
                                            <div class="attachment-text">
                                                <p>{{$block['content']['reviews'][$i]->author ?: 'N/A'}}</p>
                                            </div><!-- /.attachment-text -->
                                            <h4 class="attachment-heading">Текст</h4>
                                            <div class="attachment-text">
                                                <p>{{$block['content']['reviews'][$i]->text ?: 'N/A'}}</p>
                                            </div><!-- /.attachment-text -->
                                            <h4 class="attachment-heading">Дата создания</h4>
                                            <div class="attachment-text">
                                                <p>{{$block['content']['reviews'][$i]->created_at ? date('d F Y',strtotime($block['content']['reviews'][$i]->created_at)) : 'N/A'}}</p>
                                            </div><!-- /.attachment-text -->
                                            <h4 class="attachment-heading">Статус</h4>
                                            <div class="attachment-text">
                                                <p>{{$block['content']['reviews'][$i]->is_active ? 'Активен' : 'Неактивен'}}</p>
                                            </div><!-- /.attachment-text -->
                                        </div><!-- /.attachment-pushed -->
                                    </div><!-- /.attachment-block -->

                                </div> <!--/.box-body -->

                            </div>
                        </div> <!--/.box -->
                    @endfor
                @endif
            </div>
        </div>
        <div class="box-footer clearfix">
            <a href="#attachReview" data-toggle="modal" class="btn btn-primary"><i class="fa fa-plus"></i> Добавить отзыв</a>


        </div>
    </div>

</section>

<div class="modal fade" id="attachReview" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Выбор отзывов, не привязанных к данному блоку</h4>
        </div>
        <div class="modal-body">
            <div class="row">
            {{Form::open(['route' => ['admin.review.attach'], 'id' => 'attach'])}}
                {{Form::hidden('blockId', $block->id)}}

                @foreach($reviews as $review)
                    @if($review->block_id !== $block->id)
                        <div class="col-sm-6">
                        {{Form::checkbox('reviews[]', $review->id, false, ['id' => $review->id])}}
                        {{Form::label($review->id, $review->author.', '.date('d F Y', strtotime($review->created_at)).', '.substr($review->text,0,25).'...')}}
                        </div>
                    @endif

                @endforeach
            {{Form::close()}}
            </div>
        </div>
        <div class="modal-footer">
            {{Form::button('Добавить', ['type'=>'submit', 'class' => 'btn btn-primary', 'form'=>'attach'])}}

        </div>

    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

