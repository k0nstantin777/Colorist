<div class="form-group{{ $errors->has($name) ? ' has-error' : '' }}">
    {{ Form::label($name, $label, ['class' => 'col-sm-3 control-label'], false)}}
    <div class="col-sm-9">
        {{ Form::text($name, $value, array_merge(['class' => 'form-control'], $attributes)) }}

        @if ($errors->has($name))
        <span class="help-block">
            <i>{{ $errors->first($name) }}</i>
        </span>
        @endif
    </div>
</div>