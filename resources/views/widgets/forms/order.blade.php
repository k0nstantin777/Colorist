<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel">@lang('app.order_fotosesion')</h4>
      </div>
      <div class="modal-body">
            <form class="form-horizontal order-form" method="POST" action="">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name" class="col-md-4 control-label">@lang('app.name')<i class="required"> *</i></label>

                    <div class="col-sm-6">
                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus placeholder="Elena">

                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="col-md-4 control-label">@lang('app.email')<i class="required"> *</i></label>

                    <div class="col-sm-6">
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required placeholder="elena@gmail.com">

                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                    <label for="phone" class="col-md-4 control-label">@lang('app.phone')</label>

                    <div class="col-sm-6">
                        <input id="phone" type="tel" class="form-control" name="phone" value="{{ old('phone') }}" placeholder="+34 999 99 99 99 ">

                        @if ($errors->has('phone'))
                            <span class="help-block">
                                <strong>{{ $errors->first('phone') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('service') ? ' has-error' : '' }}">
                    <label for="service" class="col-md-4 control-label">@lang('app.service')<i class="required"> *</i></label>

                    <div class="col-sm-6">
                        <textarea id="service" class="form-control" name="service" required placeholder="Fotosession in Barcelona">{{ old('service') }}</textarea>

                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('service') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    
                    <div class="col-sm-3 col-md-offset-5">
                        
                        <button type="submit" class="btn btn-primary">
                            @lang('app.send')
                        </button>
                    </div>
                    <div class="col-sm-1" id="before-order"></div>
                    
                </div>
            </form>
      </div>

<!--      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>-->
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

