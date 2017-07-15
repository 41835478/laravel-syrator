@extends('diary::desktop._layout._member')

@section('page-content-bar')
@parent
<ul class="page-breadcrumb">
    <li>
        <a href="{{ site_url('game', 'member') }}">首页</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <span>控制台</span>
    </li>
</ul>
@stop

@section('page-content-row')
@parent
<div class="row">
    <div class="col-xs-12 ">
        <div class="portlet-body form">
            <form class="form-horizontal" role="form">
                <div class="form-body" style="padding: 20px 20px 0px 20px !important;">
                    <div class="form-group">
                        <label class="col-xs-3 control-label" style="margin-top: 7px;">名称</label>
                        <div class="col-xs-9">
                        	<input type="text" class="form-control" placeholder="" readonly="Readonly" value="{{ $catalog->name }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-3 control-label" style="margin-top: 7px;">关键词</label>
                        <div class="col-xs-9">
                        	<input type="text" class="form-control" placeholder="" readonly="Readonly" value="{{ $catalog->keywords }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-3 control-label" style="margin-top: 7px;">描述</label>
                        <div class="col-xs-9">
                        	<input type="text" class="form-control" placeholder="" readonly="Readonly" value="{{ $catalog->description }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-3 control-label" style="margin-top: 7px;">所属父类</label>
                        <div class="col-xs-9">
                        	<input type="text" class="form-control" placeholder="" readonly="Readonly" value="{{ $catalog->pid_name }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-3 control-label" style="margin-top: 7px;">创建时间</label>
                        <div class="col-xs-9">
                        	<input type="text" class="form-control" placeholder="" readonly="Readonly" value="{{ $catalog->created_at }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-3 control-label" style="margin-top: 7px;">更新时间</label>
                        <div class="col-xs-9">
                        	<input type="text" class="form-control" placeholder="" readonly="Readonly" value="{{ $catalog->updated_at }}">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@stop