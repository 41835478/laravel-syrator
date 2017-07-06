@foreach ($editStruct as $per)  
@if($per->is_editable)                              
<div class="form-group">
	<label class="control-label col-md-3">{{$per->alias}}
    	@if($per->is_request)											
    	<span class="required" aria-required="true"> * </span>
    	@endif
    </label>
	@if($per->type=='text')
	<div class="col-md-4">
		<input class="form-control" 
			type="text" 
			id="{{$per->name}}" 
			name="{{$per->name}}" 
			autocomplete="{{$per->autocomplete}}" 
			value="{{$per->value}}" 
			placeholder="{{$per->placeholder}}">
		<span class="help-block">{{$per->help}}</span>
	</div>
	@elseif($per->type=='textarea')
	<div class="col-md-6">
		<textarea class="form-control" rows="3" 
			id="{{$per->name}}" 
			name="{{$per->name}}" 
			autocomplete="{{$per->autocomplete}}" 
			placeholder="{{$per->placeholder}}" >{{$per->value}}</textarea>
		<span class="help-block">{{$per->help}}</span>
	</div>
	@elseif($per->type=='select_tree')
	<div class="col-md-4">
		<input class="form-control" 
			type="text" class="m-wrap large" 
			id="{{$per->name}}" 
			name="{{$per->name}}" 
			autocomplete="{{$per->autocomplete}}" 
			value="{{$per->value}}" 
			placeholder="{{$per->placeholder}}">
		<span class="input-group-btn">
			<button type="button" class="btn btn-info btn-flat" id="btn_{{$per->name}}">选择</button>
        </span>
        <div id="select_tree_{{$per->name}}" class="menuContent" style="display:none;margin-right:55px;">
        	<ul id="select_tree_items_{{$per->name}}" class="ztree" style="margin-top:0; width:160px;"></ul>
        </div>
		<span class="help-block">{{$per->help}}</span>
	</div>
    @elseif($per->type=='radio')
	<div class="col-md-4">
		<div class="mt-radio-inline">
        	@foreach ($per->dictionary as $key => $value) 
    		<label class="mt-radio">
    			<input type="radio" name="{{$per->name}}" value="{{$key}}" {{($per->value === $key)?'checked':''}}/>{{$value}}
    			<span></span>
    		</label>
    		@endforeach
        </div>
		<span class="help-block">{{$per->help}}</span>
	</div>
    @elseif($per->type=='select')
	<div class="col-md-4">
    	<select class="form-control" tabindex="1" name="{{$per->name}}">
    	@foreach ($per->dictionary as $key => $value) 
        	<option value="{{$key}}" {{($per->value === $key)?'selected':''}}>{{$value}}</option>
      	@endforeach
      	</select>
		<span class="help-block">{{$per->help}}</span>
	</div>
    @elseif($per->type=='datetime' || $per->type=='date')
	<div class="col-md-4">
		<div id="form_datetime_{{$per->name}}" class="input-append date form_datetime">
			<input size="16" type="text" id="{{$per->name}}" name="{{$per->name}}" value="{{$per->value}}" readonly class="input_form_datetime">
			<span class="add-on"><i class="icon-remove"></i></span>
			<span class="add-on"><i class="icon-calendar"></i></span>
		</div>
		<span class="help-block">{{$per->help}}</span>
	</div>	
	@else
	<div class="col-md-4">
		<input class="form-control" 
			type="{{$per->type}}" class="m-wrap large" 
			id="{{$per->name}}" 
			name="{{$per->name}}" 
			autocomplete="{{$per->autocomplete}}" 
			value="{{$per->value}}" 
			placeholder="{{$per->placeholder}}">
		<span class="help-block">{{$per->help}}</span>
	</div>
    @endif
</div>
@elseif($per->show_type=="readonly")
<div class="form-group">
	<label class="control-label col-md-3">{{$per->alias}}
    	@if($per->is_request)											
    	<span class="required" aria-required="true"> * </span>
    	@endif
    </label>
	@if($per->type=='text')
	<div class="col-md-4">
		<input readonly="readonly" class="form-control" 
			type="text" 
			id="{{$per->name}}" 
			name="{{$per->name}}" 
			autocomplete="{{$per->autocomplete}}" 
			value="{{$per->value}}" 
			placeholder="{{$per->placeholder}}">
		<span class="help-block">{{$per->help}}</span>
	</div>
	@elseif($per->type=='textarea')
	<div class="col-md-6">
		<textarea readonly="readonly" class="form-control" rows="3" 
			id="{{$per->name}}" 
			name="{{$per->name}}" 
			autocomplete="{{$per->autocomplete}}" 
			placeholder="{{$per->placeholder}}" >{{$per->value}}</textarea>
		<span class="help-block">{{$per->help}}</span>
	</div>
    @elseif($per->type=='radio')
	<div class="col-md-4">
		<div class="mt-radio-inline">
        	@foreach ($per->dictionary as $key => $value) 
    		<label class="mt-radio">
    			<input readonly="readonly" type="radio" name="{{$per->name}}" value="{{$key}}" {{($per->value === $key)?'checked':''}}/>{{$value}}
    			<span></span>
    		</label>
    		@endforeach
        </div>
		<span class="help-block">{{$per->help}}</span>
	</div>
    @elseif($per->type=='datetime' || $per->type=='date')
	<div class="col-md-4">
		<div id="form_datetime_{{$per->name}}" class="input-append date form_datetime">
			<input readonly="readonly" size="16" type="text" id="{{$per->name}}" name="{{$per->name}}" value="{{$per->value}}" readonly class="input_form_datetime">
			<span class="add-on"><i class="icon-remove"></i></span>
			<span class="add-on"><i class="icon-calendar"></i></span>
		</div>
		<span class="help-block">{{$per->help}}</span>
	</div>	
	@else
	<div class="col-md-4">
		<input readonly="readonly" class="form-control" 
			type="{{$per->type}}" class="m-wrap large" 
			id="{{$per->name}}" 
			name="{{$per->name}}" 
			autocomplete="{{$per->autocomplete}}" 
			value="{{$per->value}}" 
			placeholder="{{$per->placeholder}}">
		<span class="help-block">{{$per->help}}</span>
	</div>
    @endif
</div>
@elseif($per->show_type=="disabled")
<div class="form-group">
	<label class="control-label col-md-3">{{$per->alias}}
    	@if($per->is_request)											
    	<span class="required" aria-required="true"> * </span>
    	@endif
    </label>
	@if($per->type=='text')
	<div class="col-md-4">
		<input disabled="disabled" class="form-control" 
			type="text" 
			id="{{$per->name}}" 
			name="{{$per->name}}" 
			autocomplete="{{$per->autocomplete}}" 
			value="{{$per->value}}" 
			placeholder="{{$per->placeholder}}">
		<span class="help-block">{{$per->help}}</span>
	</div>
	@elseif($per->type=='textarea')
	<div class="col-md-6">
		<textarea disabled="disabled" class="form-control" rows="3" 
			id="{{$per->name}}" 
			name="{{$per->name}}" 
			autocomplete="{{$per->autocomplete}}" 
			placeholder="{{$per->placeholder}}" >{{$per->value}}</textarea>
		<span class="help-block">{{$per->help}}</span>
	</div>
	@elseif($per->type=='select_tree')
	<div class="col-md-4">
		<input disabled="disabled" class="form-control" 
			type="text" class="m-wrap large" 
			id="{{$per->name}}" 
			name="{{$per->name}}" 
			autocomplete="{{$per->autocomplete}}" 
			value="{{$per->value}}" 
			placeholder="{{$per->placeholder}}">
		<span class="input-group-btn">
			<button type="button" class="btn btn-info btn-flat" id="btn_{{$per->name}}">选择</button>
        </span>
        <div id="select_tree_{{$per->name}}" class="menuContent" style="display:none;margin-right:55px;">
        	<ul id="select_tree_items_{{$per->name}}" class="ztree" style="margin-top:0; width:160px;"></ul>
        </div>
		<span class="help-block">{{$per->help}}</span>
	</div>
    @elseif($per->type=='radio')
	<div class="col-md-4">
		<div class="mt-radio-inline">
        	@foreach ($per->dictionary as $key => $value) 
    		<label class="mt-radio">
    			<input disabled="disabled" type="radio" name="{{$per->name}}" value="{{$key}}" {{($per->value === $key)?'checked':''}}/>{{$value}}
    			<span></span>
    		</label>
    		@endforeach
        </div>
		<span class="help-block">{{$per->help}}</span>
	</div>
    @elseif($per->type=='select')
	<div class="col-md-4">
    	<select disabled="disabled" class="form-control" tabindex="1" name="{{$per->name}}">
    	@foreach ($per->dictionary as $key => $value) 
        	<option value="{{$key}}" {{($per->value === $key)?'selected':''}}>{{$value}}</option>
      	@endforeach
      	</select>
		<span class="help-block">{{$per->help}}</span>
	</div>
    @elseif($per->type=='datetime' || $per->type=='date')
	<div class="col-md-4">
		<div id="form_datetime_{{$per->name}}" class="input-append date form_datetime">
			<input disabled="disabled" size="16" type="text" id="{{$per->name}}" name="{{$per->name}}" value="{{$per->value}}" readonly class="input_form_datetime">
			<span class="add-on"><i class="icon-remove"></i></span>
			<span class="add-on"><i class="icon-calendar"></i></span>
		</div>
		<span class="help-block">{{$per->help}}</span>
	</div>	
	@else
	<div class="col-md-4">
		<input disabled="disabled" class="form-control" 
			type="{{$per->type}}" class="m-wrap large" 
			id="{{$per->name}}" 
			name="{{$per->name}}" 
			autocomplete="{{$per->autocomplete}}" 
			value="{{$per->value}}" 
			placeholder="{{$per->placeholder}}">
		<span class="help-block">{{$per->help}}</span>
	</div>
    @endif
</div>
@endif	
@endforeach