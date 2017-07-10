@extends('admin._layout._show')

@section('page-content-row')
@parent
<div class="row">
    <div class="col-xs-12 ">
        <div class="portlet-body form">
            <form class="form-horizontal" role="form">
                <div class="form-body" style="padding: 20px 20px 0px 20px !important;">
                    <div class="form-group">
                        <label class="col-xs-3 control-label" style="margin-top: 7px;">登录名</label>
                        <div class="col-xs-9">
                        	<input type="text" class="form-control" placeholder="" readonly="Readonly" value="{{ $user->username }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-3 control-label" style="margin-top: 7px;">昵称</label>
                        <div class="col-xs-9">
                        	<input type="text" class="form-control" placeholder="" readonly="Readonly" value="{{ $user->nickname }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-3 control-label" style="margin-top: 7px;">真实姓名</label>
                        <div class="col-xs-9">
                        	<input type="text" class="form-control" placeholder="" readonly="Readonly" value="{{ $user->realname }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-3 control-label" style="margin-top: 7px;">Email</label>
                        <div class="col-xs-9">
                        	<input type="text" class="form-control" placeholder="" readonly="Readonly" value="{{ $user->email }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-3 control-label" style="margin-top: 7px;">手机号码</label>
                        <div class="col-xs-9">
                        	<input type="text" class="form-control" placeholder="" readonly="Readonly" value="{{ $user->phone }}">
                        </div>
                    </div>                    
                    <div class="form-group">
                        <label class="col-xs-3 control-label" style="margin-top: 7px;">状态</label>
                        <div class="col-xs-9">
                        	<input type="text" class="form-control" placeholder="" readonly="Readonly" value="{{ ($user->is_locked === 0) ? '正常' : '锁定' }}">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-xs-3 control-label" style="margin-top: 7px;">角色</label>
                        <div class="col-xs-9">
                        	<input type="text" class="form-control" placeholder="" readonly="Readonly" value="{{ $own_role->display_name }}">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@stop