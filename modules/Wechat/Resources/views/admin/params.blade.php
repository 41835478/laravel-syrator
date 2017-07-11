@extends('wechat::admin._layout._admin')

@section('page-content-bar')
@parent
<ul class="page-breadcrumb">
    <li>
        <a href="{{ site_url('admin', 'wechat') }}">首页</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <span>基本配置</span>
    </li>
</ul>
@stop

@section('page-content-title')
@parent
<small>微信接口基本配置</small>
@stop

@section('page-content-row')
@parent
<div class="row">
	<div class="col-md-12">
		<div class="portlet-body form">
			<form method="post" action="{{ _route('wechat:admin.params') }}" class="form-horizontal" accept-charset="utf-8">
				{!! method_field('put') !!} 
                {!! csrf_field() !!}
				<div class="form-body">
					<div class="form-group">
						<label class="col-md-3 control-label">AppID(应用ID)</label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="data[app_id]" autocomplete="off" value="{{ $data['app_id'] }}" placeholder="AppID(应用ID)">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">AppSecret(应用密钥)</label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="data[app_secret]" autocomplete="off" value="{{ $data['app_secret'] }}" placeholder="AppSecret(应用密钥)">
						</div>
					</div>
				</div>
                <div class="form-actions">
                    <div class="row">
                        <div class="col-md-offset-3 col-md-9">
							<button type="submit" class="btn blue"><i class="icon-ok"></i> 更新配置</button>
                        </div>
                    </div>
                </div>
			</form>        													
		</div>
	</div>
</div>
@stop