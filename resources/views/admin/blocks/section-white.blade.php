<section class="col-xs-12">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Контент блока</h3> <sup><i class="fa fa-question-circle" title="Для сортировки элементов, удерживая мышкой перетащите его вверх или вниз"></i></sup>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div><!-- /.box-tools -->
        </div><!-- /.box-header -->
        <div class="box-body">
            <div class="box-group connectedSortable element-sort" id="accordion" data-block="{{$block->id}}">
                @if ($block->elements->count() === 0)
                    <p>Элементов пока нет</p>
                @else
                    @foreach($block->elements as $element)
                        @include('admin.'.$element->template->template)
                    @endforeach
                @endif
            </div>
        </div>
        <div class="box-footer clearfix">
            <a href="{{route('admin.element.create', $block->slug)}}" class="btn btn-primary"><i class="fa fa-plus"></i> Добавить элемент</a>
        </div>
    </div>

</section>