<div class="col-md-6">
    <div class="probootstrap-service-2 probootstrap-animate">
        <div class="image" style="height:250px">
            @if(!empty ($element->content['images']))
            <div class="image-bg">
                <img src="{{'images/original/small/'.$element->content['images'][0]->path}}" alt="image" width="250" height="250">
            </div>
            @endif
        </div>
        <div class="text">
            <h3>{{$element->head}}</h3>
            @if (!empty($element->content['images']))
                {!! $element->content['texts'][0]->text !!}
            @endif
        </div>
    </div>
</div>
