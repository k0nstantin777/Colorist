<div class="form-group">
    {{ Form::label($name, $label, ['class' => 'col-sm-3 control-label'], false)}}
    
    <div class="col-sm-9">
        {{ Form::select($name, $options, $selected, array_merge(['class' => 'form-control'], $attributes))}}
        
    </div>
    
</div>