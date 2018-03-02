<div class="modal fade" id="createAlbum" tabindex="-1" role="dialog" aria-labelledby="createAlbum" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Создать альбом</h4>

                </div>
                <div class="modal-body">
                    <form class="form-horizontal album-create" method="post" action="" id="album-create">
                    
                        <div class="form-group{{ $errors->has('name_ru') ? ' has-error' : '' }}">
                            <label for="name_ru" class="col-md-4 control-label">Название на русском<i class="required"> *</i></label>

                            <div class="col-sm-6">
                                <input id="name_ru" type="text" class="form-control" name="name_ru" value="{{ old('name_ru') }}" required autofocus placeholder="Название альбома на Русском">
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('name_es') ? ' has-error' : '' }}">
                            <label for="name_es" class="col-md-4 control-label">Название на испанском<i class="required"> *</i></label>

                            <div class="col-sm-6">
                                <input id="name_es" type="text" class="form-control" name="name_es" value="{{ old('name_es') }}" required placeholder="Название альбома на Испанском">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="discription" class="col-md-4 control-label">Описание</label>

                            <div class="col-sm-6">
                                <input id="discription" type="text" class="form-control" name="discription" value="{{ old('discription') }}" placeholder="Введите описание альбома">
                            </div>
                        </div>
                    </form>

                </div>

                <div class="modal-footer col-sm-12">
                    <div class="col-sm-5 info" id="responseAlbumCreate"></div>
                    
                    <button class="btn btn-primary" form="album-create" type="submit">Создать</button>
                </div>
            
        </div>
    </div>
</div>