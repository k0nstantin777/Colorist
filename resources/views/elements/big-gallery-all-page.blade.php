<div class="col-md-12">
    <div class="portfolio-feed three-cols">
        <div class="grid-sizer"></div>
        <div class="gutter-sizer"></div>
        <div class="probootstrap-gallery">
            @if(!empty($element->content['images']))
                @for($i=0; $i<count($element->content['images']); $i++)
                    <figure itemprop="associatedMedia" itemscope class="grid-item probootstrap-animate">
                        <a href="{{config('imagestorage.originalImagesPath').'big/'.$element->content['images'][$i]->path}}"
                                itemprop="contentUrl"
                                data-size="{{getimagesize(config('imagestorage.originalImagesPath').'big/'.$element->content['images'][$i]->path)[0].'x'.
                                             getimagesize(config('imagestorage.originalImagesPath').'big/'.$element->content['images'][$i]->path)[1]}}"
                        >
                            <img src="{{config('imagestorage.originalImagesPath').'small/'.$element->content['images'][$i]->path}}" itemprop="thumbnail" alt="#foto" />
                        </a>

                    </figure>

                @endfor
            @endif
        </div>
    </div>
</div>

<!-- Photoswipe Modal -->
<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="pswp__bg"></div>
    <div class="pswp__scroll-wrap">

        <div class="pswp__container">
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
        </div>

        <div class="pswp__ui pswp__ui--hidden">
            <div class="pswp__top-bar">
                <div class="pswp__counter"></div>
                <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
                <button class="pswp__button pswp__button--share" title="Share"></button>
                <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
                <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
                <div class="pswp__preloader">
                    <div class="pswp__preloader__icn">
                        <div class="pswp__preloader__cut">
                            <div class="pswp__preloader__donut"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                <div class="pswp__share-tooltip"></div>
            </div>
            <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
            </button>
            <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
            </button>
            <div class="pswp__caption">
                <div class="pswp__caption__center"></div>
            </div>
        </div>
    </div>
</div>
