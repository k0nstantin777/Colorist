<section class="probootstrap-section probootstrap-border-top probootstrap-bg-white">
    <div class="container">
        @if ($block->head !== null)
        <div class="row">
            <div class="col-md-6 col-md-offset-3 text-center section-heading probootstrap-animate">
                <h2>{{$block->head}}</h2>
            </div>
        </div>
        @endif
        <div class="row">
            <div class="col-md-12 probootstrap-animate">
                <div class="owl-carousel owl-carousel-testimony owl-carousel-fullwidth">
                    @for($i=0; $i<count($block['content']['reviews']); $i++)
                    <div class="item">

                        <div class="probootstrap-testimony-wrap text-center">
                            <figure>
                                <img src="{{$block['content']['reviews'][$i]->image ? config('imagestorage.userFilesPath').$block['content']['reviews'][$i]->image->path : config('imagestorage.defaultUserImage') }}" alt="foto">
                            </figure>
                            <blockquote class="quote">
                                {!! $block['content']['reviews'][$i]->text !!}
                                <cite class="author">{!! $block['content']['reviews'][$i]->author !!} <br></cite>
                            </blockquote>
                        </div>

                    </div>
                    @endfor
                </div>
            </div>
        </div>
        <div class="row">
            <div class="text-center" id="review_button">
                <button class="btn btn-primary btn-lg">Оставить отзыв</button>
            </div>
            <div class="col-md-6 col-md-offset-3 probootstrap-animate hide text-center" id="review">
                <form action="#" method="post" class="probootstrap-form" id="review_form">
                    <div class="form-group text-center">
                        <label for="review-name">Имя</label>
                        <input type="text" class="form-control" id="review-name" name="review-name" placeholder="Введите ваше имя">
                    </div>
                    <div class="form-group text-center">
                        <label for="review-text">Отзыв</label>
                        <textarea cols="10" rows="4" class="form-control" id="review-text" name="review-text" placeholder="Введите ваш отзыв"></textarea>
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary btn-lg" id="submit" name="submit">Отправить</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</section>