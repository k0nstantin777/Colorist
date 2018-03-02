<section class="probootstrap-section probootstrap-bg-white">
    <div class="container">
        @if ($block->head !== null)
        <div class="row">
            <div class="col-md-6 col-md-offset-3 text-center section-heading probootstrap-animate">
                <h2>{{$block->head}}</h2>
            </div>
        </div>
        @endif
        <div class="row">
            @foreach($block->elements as $element)
                @include($element->template->template)
            @endforeach
        </div>
    </div>
</section>