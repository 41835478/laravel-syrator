{{-- widget._edit_group-control-group --}}
<div class="tabbable tabbable-custom">
	<ul class="nav nav-tabs">
		@foreach ($editStructGroup as $key => $perGroup) 
			@if ($key==0)
			<li class="active">
				<a href="#{{$perGroup['id']}}" data-toggle="tab">{{$perGroup['name']}}</a>
			</li>
			@else
			<li>
				<a href="#{{$perGroup['id']}}" data-toggle="tab">{{$perGroup['name']}}</a>
			</li>			
			@endif
		@endforeach
	</ul>
	<div class="tab-content">
		@foreach ($editStructGroup as $key => $perGroup) 
			@if ($key==0)
    		<div class="tab-pane row-fluid active" id="{{$perGroup['id']}}">
			@else			
    		<div class="tab-pane row-fluid" id="{{$perGroup['id']}}">		
			@endif
			
			@foreach ($perGroup['fields'] as $perField)  
                @if($editStruct[$perField]->is_editable)                              
                <div class="control-group">
                	<label class="control-label">{{$editStruct[$perField]->alias}}</label>
                	<div class="controls">
                		@if($editStruct[$perField]->type=='text')
                			<input style="box-sizing: content-box;" 
                				type="text" class="m-wrap large" 
                				id="{{$editStruct[$perField]->name}}" 
                				name="{{$editStruct[$perField]->name}}" 
                				autocomplete="{{$editStruct[$perField]->autocomplete}}" 
                				value="{{$editStruct[$perField]->value}}" 
                				placeholder="{{$editStruct[$perField]->placeholder}}">											
                			<span class="help-inline text-green">
                				{{$editStruct[$perField]->help}}
                				@if($editStruct[$perField]->is_request)											
                				<small>*</small>
                            	@endif
                			</span>
                		@elseif($editStruct[$perField]->type=='textarea')
                			<textarea style="width:100%" type="text" 
                				id="{{$editStruct[$perField]->name}}" 
                				name="{{$editStruct[$perField]->name}}" 
                				autocomplete="{{$editStruct[$perField]->autocomplete}}" 
                				placeholder="{{$editStruct[$perField]->placeholder}}" >{{$editStruct[$perField]->value}}</textarea>
                		@elseif($editStruct[$perField]->type=='select_tree')
                			<input style="box-sizing: content-box;" 
                				type="text" class="m-wrap large" 
                				id="{{$editStruct[$perField]->name}}" 
                				name="{{$editStruct[$perField]->name}}" 
                				autocomplete="{{$editStruct[$perField]->autocomplete}}" 
                				value="{{$editStruct[$perField]->value}}" 
                				placeholder="{{$editStruct[$perField]->placeholder}}">
                			<span class="input-group-btn">
                				<button type="button" class="btn btn-info btn-flat" id="btn_{{$editStruct[$perField]->name}}">选择</button>
                            </span>
                            <div id="select_tree_{{$editStruct[$perField]->name}}" class="menuContent" style="display:none;margin-right:55px;">
                            	<ul id="select_tree_items_{{$editStruct[$perField]->name}}" class="ztree" style="margin-top:0; width:160px;"></ul>
                            </div>
                        @elseif($editStruct[$perField]->type=='radio')
                        	@foreach ($editStruct[$perField]->dictionary as $key => $value) 
                        		<label class="radio">
                        			<input type="radio" name="{{$editStruct[$perField]->name}}" value="{{$key}}" {{($editStruct[$perField]->value === $key)?'checked':''}}/>{{$value}}
                        		</label>
                        	@endforeach
                        @elseif($editStruct[$perField]->type=='select')
                        	<select class="large m-wrap" tabindex="1" name="{{$editStruct[$perField]->name}}">
                        	@foreach ($editStruct[$perField]->dictionary as $key => $value) 
                            	<option value="{{$key}}" {{($editStruct[$perField]->value === $key)?'selected':''}}>{{$value}}</option>
                          	@endforeach
                          	</select>
                        @endif
                	</div>
                </div> 
                @endif	
                @endforeach
			</div>
		@endforeach
	</div>
</div>