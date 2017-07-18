@if($field->is_editable) 
<div class="form-group">
	<label class="control-label col-md-3">{{$field->alias}}
    	@if($field->is_request)											
    	<span class="required" aria-required="true"> * </span>
    	@endif
    </label>
	<div class="col-md-4">
		<div class="mt-radio-inline">
        	@foreach ($field->dictionary as $key => $value) 
    		<label class="mt-radio">
    			<input type="radio" name="{{$field->name}}" value="{{$key}}" {{($field->value == $key)?'checked':''}}/>{{$value}}
    			<span></span>
    		</label>
    		@endforeach
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
		<div class="mt-radio-inline">
        	@foreach ($field->dictionary as $key => $value) 
    		<label class="mt-radio">
    			<input readonly="readonly" type="radio" name="{{$field->name}}" value="{{$key}}" {{($field->value == $key)?'checked':''}}/>{{$value}}
    			<span></span>
    		</label>
    		@endforeach
        </div>
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
		<div class="mt-radio-inline">
        	@foreach ($field->dictionary as $key => $value) 
    		<label class="mt-radio">
    			<input disabled="disabled" type="radio" name="{{$field->name}}" value="{{$key}}" {{($field->value == $key)?'checked':''}}/>{{$value}}
    			<span></span>
    		</label>
    		@endforeach
        </div>
		<span class="help-block">{{$field->help}}</span>
	</div>
</div>
@endif