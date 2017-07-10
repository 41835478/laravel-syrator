@extends('admin._layout._show')

@section('page-content-row')
@parent
<div class="row">
    <div class="col-xs-12 ">
        <div class="portlet-body form">
            <form class="form-horizontal" role="form">
                <div class="form-body" style="padding: 20px 20px 0px 20px !important;">
                    <div class="form-group">
                        <label class="col-xs-3 control-label" style="margin-top: 7px;">角色名</label>
                        <div class="col-xs-9">
                        	<input type="text" class="form-control" placeholder="" readonly="Readonly" value="{{ $role->name }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-3 control-label" style="margin-top: 7px;">角色展示名</label>
                        <div class="col-xs-9">
                        	<input type="text" class="form-control" placeholder="" readonly="Readonly" value="{{ $role->display_name }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-3 control-label" style="margin-top: 7px;">角色描述</label>
                        <div class="col-xs-9">
                        	<input type="text" class="form-control" placeholder="" readonly="Readonly" value="{{ $role->description }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-3 control-label" style="margin-top: 7px;">创建时间</label>
                        <div class="col-xs-9">
                        	<input type="text" class="form-control" placeholder="" readonly="Readonly" value="{{ $role->created_at }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-3 control-label" style="margin-top: 7px;">更新时间</label>
                        <div class="col-xs-9">
                        	<input type="text" class="form-control" placeholder="" readonly="Readonly" value="{{ $role->updated_at }}">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@stop