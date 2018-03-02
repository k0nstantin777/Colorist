<div class="col-md-6 probootstrap-animate text-center">
    <h2 class="mb0">{{$element->head}}</h2>

</div>
@if (!empty($element->content['texts']))
    <div class="col-md-6 probootstrap-animate">
        {!! $element->content['texts'][0]->text !!}
    </div>
@endif