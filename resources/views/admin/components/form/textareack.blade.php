<div class="form-group {{ $errors->has($name) ? ' has-error' : '' }}">

    {{Form::label($name, $label, ['class'=> 'control-label col-sm-2'], false)}}
    <div class="col-sm-10">
        {{Form::textarea($name, $value, array_merge(['class' => 'form-control ckeditor'], $attributes))}}
        @if ($errors->has($name))
            <span class="help-block">
            <i>{{ $errors->first($name) }}</i>
        </span>
        @endif
    </div>
</div>