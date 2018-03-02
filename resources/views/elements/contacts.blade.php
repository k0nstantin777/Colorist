<div class="col-md-6 col-md-push-1 probootstrap-animate">

    <h4>{{$element->head}}</h4>
    <ul class="probootstrap-contact-info">
        @if(!empty($element->content['texts']))
            @for($i=0; $i<count($element->content['texts']); $i++)
                <li>{!! $element->content['icons'][$i]->icon !!}<span>{!! $element->content['texts'][$i]->text !!}</span></li>
            @endfor
        @endif
    </ul>
</div>