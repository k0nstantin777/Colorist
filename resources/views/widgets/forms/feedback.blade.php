<form class="form-horizontal feedback-form" role="form" action="" method="post">
     {{ csrf_field() }}
    <div class="form-group col-sm-12">
        <label for="contact-name" class="control-label">@lang('app.name')<i class="required"> *</i></label>
        <input type="text" name="name" placeholder="Enter your name..." class="contact-name form-control" id="contact-name" required autofocus>
        @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group col-sm-12">
        <label for="contact-email" class="control-label">@lang('app.email')<i class="required"> *</i></label>
        <input type="text" name="email" placeholder="Enter your email..." class="contact-email form-control" id="contact-email" required>
        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group col-sm-12">
        <label for="contact-subject" class="control-label">@lang('app.subject')</label>
        <input type="text" name="subject" placeholder="Your subject..." class="contact-subject form-control" id="contact-subject">
        @if ($errors->has('subject'))
            <span class="help-block">
                <strong>{{ $errors->first('subject') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group col-sm-12">
        <label for="contact-message" class="control-label">@lang('app.message')<i class="required"> *</i></label>
        <textarea name="message" placeholder="Your message..." cols="3" class="contact-message form-control" id="contact-message"></textarea>
        @if ($errors->has('message'))
            <span class="help-block">
                <strong>{{ $errors->first('message') }}</strong>
            </span>
        @endif
    </div>
    <div class="clearfix"></div>
    <div class="col-sm-1 col-sm-offset-6" id="before"></div>
    <div class="col-sm-2">
        <button type="submit" class="btn">@lang('app.send')</button>
    </div>    
</form>