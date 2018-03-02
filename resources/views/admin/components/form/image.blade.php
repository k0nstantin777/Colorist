<div class="form-group {{ session('errorUpload') ? ' has-error' : '' }} {{$errors->has($name) ? ' has-error' : '' }}">


        <div class="attachment-block margin-bottom" id="div-preview" style="overflow: hidden; ">
            <p>Предпросмотр</p>
            <img id="preview_{{$name}}" class="img-responsive" src="{{$image_src}}" width="200" height="200" />
        </div>


    {{Form::label(
        $name, $label .
        Form::file($name, ['id' => $name, 'class' => 'hidden image', 'accept'=> 'image/*']),
        ['class' => 'btn btn-success control-label'], false
    )}}

    @if (session('errorUpload'))
        <span class="help-block">
            <i>{{ session('errorUpload') }}</i>
        </span>
    @elseif ($errors->has($name))
        <span class="help-block">
            <i>{{ $errors->first($name) }}</i>
        </span>
    @endif

</div>