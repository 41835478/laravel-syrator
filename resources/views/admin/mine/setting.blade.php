@extends('admin._layout._admin')

@section('css_page_level_plugins')
@parent
<link href="{{ _asset('assets/metronic/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css') }}" rel="stylesheet" type="text/css" />
@stop

@section('css_page_level')
@parent
<link href="{{ _asset('assets/metronic/pages/css/profile.min.css') }}" rel="stylesheet" type="text/css" />
@stop

@section('js_page_level_plugins')
@parent
<script src="{{ _asset('assets/metronic/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js') }}" type="text/javascript"></script>
<script src="{{ _asset('assets/metronic/global/plugins/jquery.sparkline.min.js') }}" type="text/javascript"></script>
@stop

@section('js_page_level')
@parent
<script src="{{ _asset('assets/metronic/pages/scripts/profile.min.js') }}" type="text/javascript"></script>
<script src="{{ _asset('assets/syrator/js/upload/upload.js') }}" type="text/javascript"></script>
@stop

@section('page-content-bar')
@parent
<ul class="page-breadcrumb">
    <li>
        <a href="{{ site_url('home', 'admin') }}">首页</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
    	<span>个人中心</span>
    </li>
</ul>
@stop

@section('page-content-row')
@parent
<div class="row">
    <div class="col-md-12">
        <div class="profile-sidebar">
            <div class="portlet light profile-sidebar-portlet ">
                <div class="profile-userpic">
                    <img src="{{ $user->avatar }}" class="img-responsive" alt=""> 
                </div>
                <div class="profile-usertitle">
                    <div class="profile-usertitle-name"> {{ $user->nickname }} </div>
                    <div class="profile-usertitle-job"> {{ $user->getRoleName() }} </div>
                </div>
                <div class="profile-userbuttons">
                    <button type="button" class="btn btn-circle green btn-sm">关注</button>
                    <button type="button" class="btn btn-circle red btn-sm">消息</button>
                </div>
                <div class="profile-usermenu">
                    <ul class="nav">
                        <li>
                            <a href="{{ site_url('mine/info/overview', 'admin') }}"><i class="icon-home"></i> 概览 </a>
                        </li>
                        <li class="active">
                            <a href="{{ site_url('mine/info/setting', 'admin') }}"><i class="icon-settings"></i> 设置 </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="profile-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet light ">
                        <div class="portlet-title tabbable-line">
                            <div class="caption caption-md">
                                <i class="icon-globe theme-font hide"></i>
                                <span class="caption-subject font-blue-madison bold uppercase">账号设置</span>
                            </div>
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a href="#tab_1_1" data-toggle="tab">基本信息</a>
                                </li>
                                <li>
                                    <a href="#tab_1_2" data-toggle="tab">修改头像</a>
                                </li>
                                <li>
                                    <a href="#tab_1_3" data-toggle="tab">修改密码</a>
                                </li>
                            </ul>
                        </div>
                        <div class="portlet-body">
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab_1_1">
                                    <form role="form" method="post" action="{{ _route('admin:mine.info') }}" accept-charset="utf-8">
                                    	{!! method_field('put') !!}
                						{!! csrf_field() !!}
                						<div class="form-group">
                                            <label class="control-label">账号</label>
                                            <input name="username" type="text" class="form-control" value="{{ $user->username }}" readonly="readonly" /> 
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">昵称</label>
                                            <input name="nickname" type="text" class="form-control" value="{{ $user->nickname }}" placeholder="请输入昵称" /> 
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">真实姓名</label>
                                            <input name="realname" type="text" class="form-control" value="{{ $user->realname }}" placeholder="请输入真实姓名" /> 
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">邮箱</label>
                                            <input name="email" type="text" class="form-control" value="{{ $user->email }}" placeholder="请输入邮箱" /> 
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">电话</label>
                                            <input name="phone" type="text" class="form-control" value="{{ $user->phone }}" placeholder="请输入电话" /> 
                                        </div>
                                        <div class="margiv-top-10">
                                        	<button type="submit" class="btn blue">保存修改</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane" id="tab_1_2">
                                    <form role="form" method="post" action="{{ _route('admin:mine.avatar') }}" accept-charset="utf-8">
                                    	{!! method_field('put') !!}
                						{!! csrf_field() !!}
                                        <div class="form-group">
                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <div class="fileinput-new thumbnail" style="width: 150px; height: 150px;">
                                                @if (empty($user->avatar))
                                                    <img src="http://www.placehold.it/150x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
                                                @else
                                                	<img src="{{ $user->avatar }}" alt="" />
                                                @endif
                                                </div>
                                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 150px; max-height: 150px;">
                                                </div>
                                                <div>
                                                    <span class="btn default btn-file">
                                                        <span class="fileinput-new"> 选择图片 </span>
                                                        <span class="fileinput-exists"> 修改 </span>
                                                        <input type="file" name="file_picture_avatar" id="file_picture_avatar" accept=".jpg,.png,.gif,.bmp" >
                                                    </span>
                                                    <a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput"> 移除 </a>
													<a id="uploadSubmit_picture" class="btn default fileinput-exists">上传</a>
                                                </div>
                                                <input type="hidden" id="picture_avatar" name="avatar" value="{{ $user->avatar }}">
                                            </div>
                                        </div>
                                        <div class="margin-top-10">
                                        	<button type="submit" class="btn blue">保存修改</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane" id="tab_1_3">
                                    <form role="form" method="post" action="{{ _route('admin:mine.password') }}" accept-charset="utf-8">
                                    	{!! method_field('put') !!}
                						{!! csrf_field() !!}
										<input type="hidden" name="nickname" value="{{ $user->nickname }}">
										<input type="hidden" name="realname" value="{{ $user->realname }}">								
										<div class="form-group">
                                            <label class="control-label">当前密码</label>
                                            <input name="oldpassword" type="password" class="form-control" />
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">新密码</label>
                                            <input name="password" type="password" class="form-control" />
										</div>
                                        <div class="form-group">
                                            <label class="control-label">确认新密码</label>
                                            <input name="password_confirmation" type="password" class="form-control" />
                                        </div>
                                        <div class="margin-top-10">
                                            <button type="submit" class="btn blue">修改密码</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('filledScript')
<script>
jQuery(document).ready(function() {    
    $('#uploadSubmit_picture').click(function(){
        var resultFile = $("#file_picture_avatar").get(0).files[0];    	  	
    	var formData = new FormData();
    	formData.append("picture",resultFile,resultFile.name);
    	var options = {
	        type: 'post',
			url:'/api/upload/single',
	        dataType: 'json',
            processData: false,
            contentType: false,
            data: formData,
            timeout: 3000,
            success: function (data) {
                alert('上传成功');
                $("#picture_avatar")[0].value = data.data.uploaded_full_file_name;
            },
            error: function(){
                alert('上传失败');
            }
        };
        $.ajax(options);
    });
});
</script>
@stop