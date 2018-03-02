@for($i=0; $i<count($element->content['images']); $i++)
    <div class="col-md-4 probootstrap-animate mb20">
        <img src="{{'/images/original/small/'.$element->content['images'][$i]->path}}" class="img-thumbnail" alt="#foto" width="370" height="400">
    </div>
@endfor