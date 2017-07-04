@foreach ($editStruct as $per)  
@if($per->is_editable)                              
<div class="control-group">
	<label class="control-label">{{$per->alias}}</label>
	<div class="controls">
		@if($per->type=='text')
			<input style="box-sizing: content-box;" 
				type="text" class="m-wrap large" 
				id="{{$per->name}}" 
				name="{{$per->name}}" 
				autocomplete="{{$per->autocomplete}}" 
				value="{{$per->value}}" 
				placeholder="{{$per->placeholder}}">											
			<span class="help-inline text-green">
				{{$per->help}}
				@if($per->is_request)											
				<small>*</small>
            	@endif
			</span>
		@elseif($per->type=='textarea')
			<textarea style="width:100%" type="text" 
				id="{{$per->name}}" 
				name="{{$per->name}}" 
				autocomplete="{{$per->autocomplete}}" 
				placeholder="{{$per->placeholder}}" >{{$per->value}}</textarea>
		@elseif($per->type=='select_tree')
			<input style="box-sizing: content-box;" 
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
        @elseif($per->type=='radio')
        	@foreach ($per->dictionary as $key => $value) 
        		<label class="radio">
        			<input type="radio" name="{{$per->name}}" value="{{$key}}" {{($per->value === $key)?'checked':''}}/>{{$value}}
        		</label>
        	@endforeach
        @elseif($per->type=='select')
        	<select class="large m-wrap" tabindex="1" name="{{$per->name}}">
        	@foreach ($per->dictionary as $key => $value) 
            	<option value="{{$key}}" {{($per->value === $key)?'selected':''}}>{{$value}}</option>
          	@endforeach
          	</select>
        @elseif($per->type=='datetime' || $per->type=='date')
			<div id="form_datetime_{{$per->name}}" class="input-append date form_datetime">
				<input size="16" type="text" id="{{$per->name}}" name="{{$per->name}}" value="{{$per->value}}" readonly class="input_form_datetime">
				<span class="add-on"><i class="icon-remove"></i></span>
				<span class="add-on"><i class="icon-calendar"></i></span>
			</div>			
		@else
			<input style="box-sizing: content-box;" 
				type="text" class="m-wrap large" 
				id="{{$per->name}}" 
				name="{{$per->name}}" 
				autocomplete="{{$per->autocomplete}}" 
				value="{{$per->value}}" 
				placeholder="{{$per->placeholder}}">											
			<span class="help-inline text-green">
				{{$per->help}}
				@if($per->is_request)											
				<small>*</small>
            	@endif
			</span>
        @endif
	</div>
</div> 
@endif	
@endforeach