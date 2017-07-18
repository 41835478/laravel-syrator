@if($field->is_editable) 
<div class="form-group">
	<label class="control-label col-md-3">{{$field->alias}}
    	@if($field->is_request)											
    	<span class="required" aria-required="true"> * </span>
    	@endif
    </label>
	<div class="col-md-4">
		<div class="input-group">
    		<input class="form-control" type="text" id="{{$field->name}}" name="{{$field->name}}" autocomplete="{{$field->autocomplete}}" value="{{$field->value}}" placeholder="{{$field->placeholder}}">
    		<span class="input-group-btn">
    			<button type="button" class="btn blue" id="btn_{{$field->name}}">选择</button>
            </span>
		</div>
        <div id="select_tree_{{$field->name}}" class="menuContent" style="display:none;margin-right:55px;">
        	<ul id="select_tree_items_{{$field->name}}" class="ztree" style="margin-top:0; width:160px;"></ul>
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