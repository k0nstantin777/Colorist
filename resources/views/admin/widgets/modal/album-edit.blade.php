<div class="modal fade" id="editAlbum" tabindex="-1" role="dialog" aria-labelledby="createAlbum" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Редактировать альбом</h4>

                </div>
                <div class="modal-body">
                    <form class="form-horizontal album-edit" method="post" action="{{route('admin.album.edit', $album->slug)}}" id="album-edit">
                        {{ csrf_field() }}
                        <input type="hidden" name="albumId" id="albumId" value="{{$album->id}}">
                        <div class="form-group{{ $errors->has('name_ru') ? ' has-error' : '' }}">
                            <label for="name_ru" class="col-sm-4 control-label">Название на русском<i class="required"> *</i></label>
                            <div class="col-sm-8">
                            
                                <input id="name_ru" type="text" class="form-control" name="name_ru" value="{{ $album->name_ru }}" required autofocus>
                            </div>
                            @if ($errors->has('name_ru'))
                                <p class="help-block col-sm-8 col-sm-offset-4">
                                    <i>{{ $errors->first('name_ru') }}</i>
                                </p>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('name_es') ? ' has-error' : '' }}">
                            <label for="name_es" class="col-sm-4 control-label">Название на испанском<i class="required"> *</i></label>
                            <div class="col-sm-8">
                            
                                <input id="name_es" type="text" class="form-control" name="name_es" value="{{ $album->name_es }}" required>
                            </div>
                            @if ($errors->has('name_es'))
                                <p class="help-block col-sm-8 col-sm-offset-4">
                                    <i>{{ $errors->first('name_es') }}</i>
                                </p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="discription" class="col-sm-4 control-label">Описание</label>

                            <div class="col-sm-8">
                                <input id="discription" type="text" class="form-control" name="discription" value="{{ $album->discription }}">
                            </div>
                        </div>
                    </form>

                </div>

                <div class="modal-footer col-sm-12">
                    <div class="col-sm-5 info" id="responseAlbumEdit"></div>
                    
                    <button class="btn btn-primary" form="album-edit" type="submit">Сохранить</button>
                </div>
            
        </div>
    </div>
</div>