@extends('admin._layout._show')

@section('page-content-row')
@parent
<div class="row">
    <div class="col-xs-12 ">
        <div class="portlet-body form">
            <form class="form-horizontal" role="form">
                <div class="form-body" style="padding: 20px 20px 0px 20px !important;">
                    <div class="form-group">
                        <label class="col-xs-3 control-label" style="margin-top: 7px;">编码</label>
                        <div class="col-xs-9">
                        	<input type="text" class="form-control" placeholder="Readonly" readonly="" value="{{ $theme->code }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-3 control-label" style="margin-top: 7px;">名称</label>
                        <div class="col-xs-9">
                        	<input type="text" class="form-control" placeholder="Readonly" readonly="" value="{{ $theme->name }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-3 control-label" style="margin-top: 7px;">描述</label>
                        <div class="col-xs-9">
                        	<input type="text" class="form-control" placeholder="Readonly" readonly="" value="{{ $theme->description }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-3 control-label" style="margin-top: 7px;">版本</label>
                        <div class="col-xs-9">
                        	<input type="text" class="form-control" placeholder="Readonly" readonly="" value="{{ $theme->version }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-3 control-label" style="margin-top: 7px;">作者</label>
                        <div class="col-xs-9">
                        	<input type="text" class="form-control" placeholder="Readonly" readonly="" value="{{ $theme->author }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-3 control-label" style="margin-top: 7px;">是否使用</label>
                        <div class="col-xs-9">
        					<div class="mt-radio-inline">
                        		<label class="mt-radio">
                        			<input disabled="disabled" type="radio" name="is_current" value="0" {{($theme->is_current == '0')?'checked':''}}/>否
                        			<span></span>
                        		</label>
                        		<label class="mt-radio">
                        			<input disabled="disabled" type="radio" name="is_current" value="1" {{($theme->is_current == '1')?'checked':''}}/>是
                        			<span></span>
                        		</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-3 control-label" style="margin-top: 7px;">创建时间</label>
                        <div class="col-xs-9">
                        	<input type="text" class="form-control" placeholder="Readonly" readonly="" value="{{ $theme->created_at }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-3 control-label" style="margin-top: 7px;">更新时间</label>
                        <div class="col-xs-9">
                        	<input type="text" class="form-control" placeholder="Readonly" readonly="" value="{{ $theme->updated_at }}">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@stop