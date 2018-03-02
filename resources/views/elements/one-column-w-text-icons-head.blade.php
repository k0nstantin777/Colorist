<div class="col-md-6">
    <div class="service left-icon probootstrap-animate">
        @if (!empty($element->content['icons']))
        <div class="icon">{!! $element->content['icons'][0]->icon !!}</div>
        @endif
        <div class="text center-block">
            <h3>{{$element->head}}</h3>
            @if (!empty($element->content['texts']))
            {!! $element->content['texts'][0]->text !!}
            @endif
        </div>  
    </div>
</div> 