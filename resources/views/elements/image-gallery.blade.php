<div class="owl-carousel owl-work probootstrap-animate">
    @for($i=0; $i<count($element->content['images']); $i++)
    <div class="item">
        <img src="{{config('imagestorage.originalImagesPath').'small/'.$element->content['images'][$i]->path}}" alt="#foto">
    </div>
    @endfor    
</div>