@foreach($blocks as $block)
    @include($block->template->template)
@endforeach
