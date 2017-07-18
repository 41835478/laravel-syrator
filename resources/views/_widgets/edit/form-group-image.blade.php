@if($field->is_editable) 
<div class="form-group">
	<label class="control-label col-md-3">{{$field->alias}}
    	@if($field->is_request)											
    	<span class="required" aria-required="true"> * </span>
    	@endif
    </label>
	<div class="col-md-4">
        <div class="fileinput fileinput-new" data-provides="fileinput">
            <div class="fileinput-new thumbnail" style="width: 150px; height: 150px;">
            @if (empty($field->value))
                <img src="http://www.placehold.it/150x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
            @else
            	<img src="{{ $field->value }}" alt="" />
            @endif
            </div>
            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 150px; max-height: 150px;">
            </div>
            <div>
                <span class="btn default btn-file">
                    <span class="fileinput-new"> 选择图片 </span>
                    <span class="fileinput-exists"> 修改 </span>
                    <input type="file" name="file_picture_{{$field->name}}" id="file_picture_{{$field->name}}" accept=".jpg,.png,.gif,.bmp" >
                </span>
                <a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput"> 移除 </a>
				<a id="submit_upload_picture_{{$field->name}}" class="btn default fileinput-exists">上传</a>
            </div>
            <input type="hidden" id="picture_thumb_{{$field->name}}" name="{{$field->name}}" value="{{ $field->value }}">
        </div>
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
        <div class="fileinput fileinput-new" data-provides="fileinput">
            <div class="fileinput-new thumbnail" style="width: 150px; height: 150px;">
            @if (empty($field->value))
                <img src="http://www.placehold.it/150x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
            @else
            	<img src="{{ $field->value }}" alt="" />
            @endif
            </div>
            <input readonly="readonly" type="hidden" id="picture_thumb_{{$field->name}}" name="{{$field->name}}" value="{{ $field->value }}">
        </div>
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
        <div class="fileinput fileinput-new" data-provides="fileinput">
            <div class="fileinput-new thumbnail" style="width: 150px; height: 150px;">
            @if (empty($field->value))
                <img src="http://www.placehold.it/150x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
            @else
            	<img src="{{ $field->value }}" alt="" />
            @endif
            </div>
            <input disabled="disabled" type="hidden" id="picture_thumb_{{$field->name}}" name="{{$field->name}}" value="{{ $field->value }}">
        </div>
    </div>
</div>
@endif