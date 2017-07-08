@extends('admin._layout._show')

@section('page-content-row')
@parent
<div class="row">
    <div class="col-xs-12 ">
        <div class="portlet-body form">
            <form class="form-horizontal" role="form">
                <div class="form-body" style="padding: 20px 20px 0px 20px !important;">
                    <div class="form-group">
                        <label class="col-xs-3 control-label" style="margin-top: 7px;">ID</label>
                        <div class="col-xs-9">
                        	<input type="text" class="form-control" placeholder="Readonly" readonly="" value="{{ $sys_log->id }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-3 control-label" style="margin-top: 7px;">类型</label>
                        <div class="col-xs-9">
                        	<input type="text" class="form-control" placeholder="Readonly" readonly="" value="{{ dict('log_type.'.$sys_log->type) }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-3 control-label" style="margin-top: 7px;">操作者</label>
                        <div class="col-xs-9">
                        	<input type="text" class="form-control" placeholder="Readonly" readonly="" value="{{ $sys_log->user->username or '--' }} / {{ $sys_log->user->realname or '--' }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-3 control-label" style="margin-top: 7px;">操作URL</label>
                        <div class="col-xs-9">
                        	<input type="text" class="form-control" placeholder="Readonly" readonly="" value="{{ $sys_log->url }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-3 control-label" style="margin-top: 7px;">操作者IP</label>
                        <div class="col-xs-9">
                        	<input type="text" class="form-control" placeholder="Readonly" readonly="" value="{{ $sys_log->operator_ip }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-3 control-label" style="margin-top: 7px;">操作内容</label>
                        <div class="col-xs-9">
                        	<input type="text" class="form-control" placeholder="Readonly" readonly="" value="{{ $sys_log->content }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-3 control-label" style="margin-top: 7px;">操作时间</label>
                        <div class="col-xs-9">
                        	<input type="text" class="form-control" placeholder="Readonly" readonly="" value="{{ $sys_log->created_at }}">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@stop
