<div class="modal fade" id="modal{{$img->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="form-inline img-album-edit" method="post" action="" id="{{$img->id}}">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Привязка фото</h4>

                </div>
                <div class="modal-body">

                        <input type="hidden" name="imageId" value="{{$img->id}}">
                        <div class="form-group col-sm-12">
                            <h5>Альбомы</h5>
                            @foreach($albums as $album)

                              <label for="album{{$album->id}}" class="checkbox col-sm-3 text-center">{{$album->name}} 

                                  <input type="checkbox" class="form-control" id="album{{$album->id}}" name="albums[]" value="{{$album->id}}"
                                  @if(in_array($album->id, $img->albums->pluck('id')->toArray()))
                                      checked
                                  @endif 
                                  >

                              </label>
                             @endforeach

                        </div> 
                        <hr> 
                        <div class="form-group col-sm-12">
                            <h5>Слайдеры</h5>
                            @foreach($sliders as $slider)
                                <label for="slider{{$slider->id}}" class="checkbox col-sm-3 text-center">{{$slider->name}} 

                                  <input type="checkbox" class="form-control" id="slider{{$slider->id}}" name="sliders[]" value="{{$slider->id}}"
                                  @if(in_array($slider->id, $img->sliders->pluck('id')->toArray()))
                                      checked
                                  @endif 
                                  >

                              </label>
                            @endforeach
                        </div>    

                </div>
                <div class="modal-footer col-sm-12">
                    <div class="col-sm-5 info" id="response{{$img->id}}"></div>
                    <button data-dismiss="modal" class="btn btn-default" type="button">Закрыть</button>
                    <button class="btn btn-primary" type="submit">Сохранить</button>
                </div>
            </form>    
        </div>
    </div>
</div>