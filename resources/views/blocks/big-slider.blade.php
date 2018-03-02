<section class="flexslider">
    <ul class="slides">
        @for($i=0; $i<count($block['content']['images']); $i++)
        <li style="background-image: url({{'images/original/big/'.$block['content']['images'][$i]->path}});" class="overlay">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="probootstrap-slider-text text-center">
                            <h1 class="probootstrap-heading probootstrap-animate">{{$block['content']['texts'][$i]->text}}</h1>
                        </div>
                    </div>
                </div>
            </div>
        </li>
        @endfor
    </ul>
</section>