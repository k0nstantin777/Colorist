<div class="form-group">
    {{ Form::label($name, $label, ['class' => 'col-sm-2 control-label'], false)}}

    <div class="col-sm-2">
        {{ Form::select($name, $options, $selected, ['class' => "form-control selectbs"], $dataContent)}}

    </div>

</div>