<div class="modal fade" id="{{$id}}" tabindex="-1" role="dialog" aria-hidden="true"">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">{{$head}}</h4>
            </div>
            <div class="modal-body">
                @if (isset ($body))
                    {{$body}}
                @endif
            </div>

            @if (isset ($footer))
                <div class="modal-footer">
                    {{$footer}}
                    <!--                              <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Закрыть</button>-->
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Сохранить</button>

                </div>
            @endif

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->