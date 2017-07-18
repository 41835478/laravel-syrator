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
	<div class="col-md-9">
		<textarea class="form-control" rows="6" 
			type="text" 
			id="{{$per->name}}" 
			name="{{$per->name}}" 
			autocomplete="{{$per->autocomplete}}" 
			placeholder="{{$per->placeholder}}" >{{$per->value}}</textarea>
		<span class="help-block">{{$per->help}}</span>
	</div>
	@elseif($per->type=='select_tree')
	<div class="col-md-4">
		<div class="input-group">
    		<input class="form-control" 
    			type="text"
    			id="{{$per->name}}" 
    			name="{{$per->name}}" 
    			autocomplete="{{$per->autocomplete}}" 
    			value="{{$per->value}}" 
    			placeholder="{{$per->placeholder}}">
    		<span class="input-group-btn">
    			<button type="button" class="btn blue" id="btn_{{$per->name}}">选择</button>
            </span>
		</div>
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
    			<input type="radio" name="{{$per->name}}" value="{{$key}}" {{($per->value == $key)?'checked':''}}/>{{$value}}
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
        	<option value="{{$key}}" {{($per->value == $key)?'selected':''}}>{{$value}}</option>
      	@endforeach
      	</select>
		<span class="help-block">{{$per->help}}</span>
	</div>
    @elseif($per->type=='datetime' || $per->type=='date')
	<div class="col-md-4">
		<div id="form_datetime_{{$per->name}}"  class="input-group date form_datetime">
			<input type="text" size="16" readonly class="form-control" id="{{$per->name}}" name="{{$per->name}}" value="{{$per->value}}">
			<span class="input-group-btn">
                <button class="btn default date-reset" type="button">
                    <i class="fa fa-times"></i>
                </button>
                <button class="btn default date-set" type="button">
                    <i class="fa fa-calendar"></i>
                </button>
            </span>
		</div>
		<span class="help-block">{{$per->help}}</span>
	</div>	
	@elseif($per->type=='image')
	<div class="col-md-4">
        <div class="fileinput fileinput-new" data-provides="fileinput">
            <div class="fileinput-new thumbnail" style="width: 150px; height: 150px;">
            @if (empty($per->value))
                <img src="http://www.placehold.it/150x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
            @else
            	<img src="{{ $per->value }}" alt="" />
            @endif
            </div>
            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 150px; max-height: 150px;">
            </div>
            <div>
                <span class="btn default btn-file">
                    <span class="fileinput-new"> 选择图片 </span>
                    <span class="fileinput-exists"> 修改 </span>
                    <input type="file" name="file_picture_{{$per->name}}" id="file_picture_{{$per->name}}" accept=".jpg,.png,.gif,.bmp" >
                </span>
                <a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput"> 移除 </a>
				<a id="submit_upload_picture_{{$per->name}}" class="btn default fileinput-exists">上传</a>
            </div>
            <input type="hidden" id="picture_thumb_{{$per->name}}" name="{{$per->name}}" value="{{ $per->value }}">
        </div>
    </div>
	@else
	<div class="col-md-4">
		<input class="form-control" 
			type="{{$per->type}}"  
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
	<div class="col-md-9">
		<textarea readonly="readonly" class="form-control" rows="6" 
			type="text" 
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
    			<input readonly="readonly" type="radio" name="{{$per->name}}" value="{{$key}}" {{($per->value == $key)?'checked':''}}/>{{$value}}
    			<span></span>
    		</label>
    		@endforeach
        </div>
		<span class="help-block">{{$per->help}}</span>
	</div>	
	@else
	<div class="col-md-4">
		<input readonly="readonly" class="form-control" 
			type="{{$per->type}}"  
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
	<div class="col-md-9">
		<textarea disabled="disabled" class="form-control" rows="6" 
			type="text" 
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
    			<input disabled="disabled" type="radio" name="{{$per->name}}" value="{{$key}}" {{($per->value == $key)?'checked':''}}/>{{$value}}
    			<span></span>
    		</label>
    		@endforeach
        </div>
		<span class="help-block">{{$per->help}}</span>
	</div>	
	@else
	<div class="col-md-4">
		<input disabled="disabled" class="form-control" 
			type="{{$per->type}}"  
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