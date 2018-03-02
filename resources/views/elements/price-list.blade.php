<div class="col-md-6 col-md-offset-3 menuItem mb20 probootstrap-animate">
    <ul class="menu mb20">
        @foreach($element->content['elements'] as $elem)
            @include($elem->template->template)
        @endforeach

    </ul>

</div>
<div class="col-sm-2 col-sm-offset-5">
    <a href="https://beauty.dikidi.net/ru/record/113831" target="_blank" class="btn btn-primary btn-lg">Записаться</a>
</div>