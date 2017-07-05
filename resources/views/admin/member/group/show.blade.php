@extends('admin._layout._show')

@section('page-content-row')
@parent
<div class="row">
    <div class="col-xs-12 ">
        <div class="portlet-body form">
            <form class="form-horizontal" role="form">
                <div class="form-body">
                    <div class="form-group">
                        <label class="col-xs-3 control-label" style="margin-top: 7px;">名称</label>
                        <div class="col-xs-9">
                        	<input type="text" class="form-control" placeholder="Readonly" readonly="" value="{{ $group->name }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-3 control-label" style="margin-top: 7px;">创建时间</label>
                        <div class="col-xs-9">
                        	<input type="text" class="form-control" placeholder="Readonly" readonly="" value="{{ $group->created_at }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-3 control-label" style="margin-top: 7px;">更新时间</label>
                        <div class="col-xs-9">
                        	<input type="text" class="form-control" placeholder="Readonly" readonly="" value="{{ $group->updated_at }}">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@stop