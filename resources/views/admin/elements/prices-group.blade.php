<li>
    {{$elem->head}}
</li>
@for ($i=0; $i<count($elem->content['texts']); $i+=2)
<li>
    <div class="detail">{{$elem->content['texts'][$i]->text}} <span class="price">{{$elem->content['texts'][$i+1]->text}}</span>
    </div>
</li>
@endfor