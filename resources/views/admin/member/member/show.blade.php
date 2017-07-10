@extends('admin._layout._show')

@section('page-content-row')
@parent
<div class="row">
    <div class="col-xs-12 ">
        <div class="portlet-body form">
            <form class="form-horizontal" role="form">
                <div class="form-body" style="padding: 20px 20px 0px 20px !important;">
                    <div class="form-group">
                        <label class="col-xs-3 control-label" style="margin-top: 7px;">账号</label>
                        <div class="col-xs-9">
                        	<input type="text" class="form-control" placeholder="" readonly="Readonly" value="{{ $entity->account }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-3 control-label" style="margin-top: 7px;">手机号</label>
                        <div class="col-xs-9">
                        	<input type="text" class="form-control" placeholder="" readonly="Readonly" value="{{ $entity->phone }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-3 control-label" style="margin-top: 7px;">邮箱</label>
                        <div class="col-xs-9">
                        	<input type="text" class="form-control" placeholder="" readonly="Readonly" value="{{ $entity->email }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-3 control-label" style="margin-top: 7px;">昵称</label>
                        <div class="col-xs-9">
                        	<input type="text" class="form-control" placeholder="" readonly="Readonly" value="{{ $entity->nickname }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-3 control-label" style="margin-top: 7px;">角色</label>
                        <div class="col-xs-9">
                        	<input type="text" class="form-control" placeholder="" readonly="Readonly" value="{{ $entity->getRoleName() }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-3 control-label" style="margin-top: 7px;">创建时间</label>
                        <div class="col-xs-9">
                        	<input type="text" class="form-control" placeholder="" readonly="Readonly" value="{{ $entity->created_at }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-3 control-label" style="margin-top: 7px;">更新时间</label>
                        <div class="col-xs-9">
                        	<input type="text" class="form-control" placeholder="" readonly="Readonly" value="{{ $entity->updated_at }}">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@stop