<div class="modal fade" id="upload" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Загрузить фото</h4>

                </div>
                <div class="modal-body">

                    <form class="dropzone" method="post" action="{{route('upload')}}" id="fileupload" enctype="multipart/form-data">
                        {{$form_body}}
                    </form>

                </div>

                <div class="modal-footer col-sm-12">
                    <div class="col-sm-5 info" id="response"></div>
                    
                    <button class="btn btn-primary" data-dismiss="modal" type="button">Закрыть</button>
                </div>

        </div>
    </div>
</div>