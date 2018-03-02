<div class="col-md-6 col-md-offset-3 text-center section-heading probootstrap-animate">
    <h2>{{$element->head}}</h2>
</div>

@if(!empty($element->content['texts']))
<!-- END row -->
<div class="col-md-6 probootstrap-animate">
    {!! $element->content['texts'][0]->text !!}
</div>
<div class="col-md-6 probootstrap-animate">
    {!! $element->content['texts'][1]->text !!}
</div>
@endif


