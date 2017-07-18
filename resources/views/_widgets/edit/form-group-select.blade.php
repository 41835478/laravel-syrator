@if($field->is_editable) 
<div class="form-group">
	<label class="control-label col-md-3">{{$field->alias}}
    	@if($field->is_request)											
    	<span class="required" aria-required="true"> * </span>
    	@endif
    </label>
	<div class="col-md-4">
    	<select class="form-control" tabindex="1" name="{{$field->name}}">
    	@foreach ($field->dictionary as $key => $value) 
        	<option value="{{$key}}" {{($field->value == $key)?'selected':''}}>{{$value}}</option>
      	@endforeach
      	</select>
		<span class="help-block">{{$field->help}}</span>
	</div>
</div>
@elseif($field->show_type=="readonly")
<div class="form-group">
	<label class="control-label col-md-3">{{$field->alias}}
    	@if($field->is_request)											
    	<span class="required" aria-required="true"> * </span>
    	@endif
    </label>
	<div class="col-md-4">
		<input readonly="readonly" class="form-control" type="text" id="{{$field->name}}" name="{{$field->name}}" autocomplete="{{$field->autocomplete}}" value="{{$field->value}}" placeholder="{{$field->placeholder}}">
		<span class="help-block">{{$field->help}}</span>
	</div>
</div>
@elseif($field->show_type=="disabled")
<div class="form-group">
	<label class="control-label col-md-3">{{$field->alias}}
    	@if($field->is_request)											
    	<span class="required" aria-required="true"> * </span>
    	@endif
    </label>
	<div class="col-md-4">
		<input disabled="disabled" class="form-control" type="text" id="{{$field->name}}" name="{{$field->name}}" autocomplete="{{$field->autocomplete}}" value="{{$field->value}}" placeholder="{{$field->placeholder}}">
		<span class="help-block">{{$field->help}}</span>
	</div>
</div>
@endif