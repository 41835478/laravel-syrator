@if($field->is_editable) 
<div class="form-group">
	<label class="control-label col-md-3">{{$field->alias}}
    	@if($field->is_request)											
    	<span class="required" aria-required="true"> * </span>
    	@endif
    </label>
	<div class="col-md-4">
		<div id="form_datetime_{{$field->name}}"  class="input-group date form_datetime">
			<input type="text" size="16" readonly class="form-control" id="{{$field->name}}" name="{{$field->name}}" value="{{$field->value}}">
			<span class="input-group-btn">
                <button class="btn default date-reset" type="button">
                    <i class="fa fa-times"></i>
                </button>
                <button class="btn default date-set" type="button">
                    <i class="fa fa-calendar"></i>
                </button>
            </span>
		</div>
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