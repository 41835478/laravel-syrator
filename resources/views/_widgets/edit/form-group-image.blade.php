@if($field->is_editable) 
<div class="form-group">
	<label class="control-label col-md-3">{{$field->alias}}
    	@if($field->is_request)											
    	<span class="required" aria-required="true"> * </span>
    	@endif
    </label>
	<div class="col-md-9">
		<textarea class="form-control" rows="6" type="text" id="{{$field->name}}" name="{{$field->name}}" autocomplete="{{$field->autocomplete}}" placeholder="{{$field->placeholder}}" >{{$field->value}}</textarea>
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
	<div class="col-md-9">
		<textarea readonly="readonly" class="form-control" rows="6" type="text" id="{{$field->name}}" name="{{$field->name}}" autocomplete="{{$field->autocomplete}}" placeholder="{{$field->placeholder}}" >{{$field->value}}</textarea>
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
	<div class="col-md-9">
		<textarea disabled="disabled" class="form-control" rows="6" type="text" id="{{$field->name}}" name="{{$field->name}}" autocomplete="{{$field->autocomplete}}" placeholder="{{$field->placeholder}}" >{{$field->value}}</textarea>
		<span class="help-block">{{$field->help}}</span>
	</div>
</div>
@endif