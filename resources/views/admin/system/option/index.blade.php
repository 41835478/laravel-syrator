@extends('admin._layout._admin')

@section('page-content-bar')
@parent
<ul class="page-breadcrumb">
    <li>
        <a href="{{ site_url('home', 'admin') }}">首页</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
    	<span>参数配置</span>
    </li>
</ul>
@stop

@section('page-content-row')
@parent
<div class="row">
	<div class="col-md-12">
		<div class="tabbable-line boxless tabbable-reversed">
			<ul class="nav nav-tabs">
                <li class="active"><a href="#tab_0" data-toggle="tab"> 网站信息 </a></li>
                <li><a href="#tab_1" data-toggle="tab"> 公司信息 </a></li>
                <li><a href="#tab_2" data-toggle="tab"> 系统信息 </a></li>
            </ul>
    		<div class="tab-content">
    			<div class="tab-pane active" id="tab_0">
    				<div class="portlet-body form">
        				<form method="post" action="{{ _route('admin:system.option') }}" class="form-horizontal" accept-charset="utf-8">
        					{!! method_field('put') !!} 
                            {!! csrf_field() !!}
        					<div class="form-body">
            					<div class="form-group">
            						<label class="col-md-3 control-label">网站标题</label>
            						<div class="col-md-9">
            							<input type="text" class="form-control" name="data[website_title]" autocomplete="off" value="{{ $data['website_title'] }}" placeholder="网站标题">
            						</div>
            					</div>
            					<div class="form-group">
            						<label class="col-md-3 control-label">网站关键词</label>
            						<div class="col-md-9">
            							<input type="text" class="form-control" name="data[website_keywords]" autocomplete="off" value="{{ $data['website_keywords'] }}" placeholder="网站关键词，多个词请以英文逗号分隔">
            						</div>
            					</div>
            					<div class="form-group">
            						<label class="col-md-3 control-label">网站描述</label>
            						<div class="col-md-9">
            							<input type="text" class="form-control" name="data[website_description]" autocomplete="off" value="{{ $data['website_description'] }}" placeholder="网站描述">
            						</div>
            					</div>
            					<div class="form-group">
            						<label class="col-md-3 control-label">网站备案号</label>
            						<div class="col-md-9">   
            							<input type="text" class="form-control" name="data[website_icp]" autocomplete="off" value="{{ $data['website_icp'] }}" placeholder="网站备案号">
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
    			<div class="tab-pane " id="tab_1">
    				<div class="portlet-body form">
        				<form method="post" action="{{ _route('admin:system.option') }}" class="form-horizontal" accept-charset="utf-8">
        					{!! method_field('put') !!} 
                            {!! csrf_field() !!}
        					<div class="form-body">        					
            					<div class="form-group">
            						<label class="col-md-3 control-label">公司全称</label>
            						<div class="col-md-9">
            							<input type="text" class="form-control" name="data[organization_fullname]" autocomplete="off" value="{{ $data['organization_fullname'] }}" placeholder="公司全称">
            						</div>
            					</div>
            					<div class="form-group">
            						<label class="col-md-3 control-label">公司简称</label>
            						<div class="col-md-9">
            							<input type="text" class="form-control" name="data[organization_nickname]" autocomplete="off" value="{{ $data['organization_nickname'] }}" placeholder="公司简称">
            						</div>
            					</div>
            					<div class="form-group">
            						<label class="col-md-3 control-label">公司电话</label>
            						<div class="col-md-9">   
            							<input type="text" class="form-control" name="data[organization_telephone]" autocomplete="off" value="{{ $data['organization_telephone'] }}" placeholder="公司电话">
            						</div>
            					</div>
            					<div class="form-group">
            						<label class="col-md-3 control-label">公司地址</label>
            						<div class="col-md-9">   
            							<input type="text" class="form-control" name="data[organization_address]" autocomplete="off" value="{{ $data['organization_address'] }}" placeholder="公司地址">
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
    			<div class="tab-pane " id="tab_2">
    				<div class="portlet-body form">
        				<form method="post" action="{{ _route('admin:system.option') }}" class="form-horizontal" accept-charset="utf-8">
        					{!! method_field('put') !!} 
                            {!! csrf_field() !!}
        					<div class="form-body">
            					<div class="form-group">
            						<label class="col-md-3 control-label">系统版本号</label>
            						<div class="col-md-9">
            							<input type="text" class="form-control" name="data[version_code]" autocomplete="off" value="{{ $data['version_code'] }}" placeholder="系统版本号">
            						</div>
            					</div>
            					<div class="form-group">
            						<label class="col-md-3 control-label">系统版本名</label>
            						<div class="col-md-9">
            							<input type="text" class="form-control" name="data[version_name]" autocomplete="off" value="{{ $data['version_name'] }}" placeholder="系统版本名">
            						</div>
            					</div>
            					<div class="form-group">
            						<label class="col-md-3 control-label">版本更新说明</label>
            						<div class="col-md-9">
            							<input type="text" class="form-control" name="data[version_log]" autocomplete="off" value="{{ $data['version_log'] }}" placeholder="版本更新说明">
            						</div>
            					</div>
            					<div class="form-group">
            						<label class="col-md-3 control-label">系统开发者</label>
            						<div class="col-md-9">
            							<input type="text" class="form-control" name="data[author_name]" autocomplete="off" value="{{ $data['author_name'] }}" placeholder="系统开发者">
            						</div>
            					</div>
            					<div class="form-group">
            						<label class="col-md-3 control-label">开发者网站</label>
            						<div class="col-md-9">
            							<input type="text" class="form-control" name="data[author_url]" autocomplete="off" value="{{ $data['author_url'] }}" placeholder="系统开发者网站">
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
		</div>
	</div>
</div>
@stop