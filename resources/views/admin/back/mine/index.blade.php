@extends('_layout._common')

@section('head_css')
@parent
<link rel="stylesheet" type="text/css" href="{{ _asset('assets/metronic/css/bootstrap-fileupload.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ _asset('assets/metronic/css/chosen.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ _asset('assets/metronic/css/profile.css') }}" />
@stop

@section('body_attr') class="page-header-fixed" @stop

@section('content-header')
@parent
@include('admin._widgets._main-header')
@stop

@section('content-footer')
@parent
@include('admin._widgets._main-footer')
@stop

@section('content')
<div class="page-container row-fluid">
	@include('admin._widgets._main-sidebar')
	<div class="page-content">
		<div id="portlet-config" class="modal hide">
			<div class="modal-header">
				<button data-dismiss="modal" class="close" type="button"></button>
				<h3>Widget Settings</h3>
			</div>
			<div class="modal-body">
				Widget settings form goes here
			</div>
		</div>
		<div class="container-fluid">
			<div class="row-fluid">
				<div class="span12">
					<h3 class="page-title">
						个人中心 <small>个人信息管理中心</small>
					</h3>
					<ul class="breadcrumb">
						<li>
							<i class="icon-home"></i>
							<a href="{{ site_url('home', 'admin') }}">首页</a> 
							<i class="icon-angle-right"></i>
						</li>
						<li><a href="#">个人中心</a></li>
					</ul>
				</div>
			</div>
			<div class="row-fluid profile">
				<div class="span12">
					<!--BEGIN TABS-->
					<div class="tabbable tabbable-custom tabbable-full-width">
						<ul class="nav nav-tabs">
							<li class="active"><a href="#tab_1_1" data-toggle="tab">概述</a></li>
							<li><a href="#tab_1_2" data-toggle="tab">账号</a></li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane profile-classic row-fluid active" id="tab_1_1">
								<div class="span2">
									<img src="{{ _asset('assets/metronic/image/profile-img.png') }}" alt="" />
								</div>
								<ul class="unstyled span10">
									<li><span>账号:</span> {{ $me->username }}</li>
									<li><span>昵称:</span> {{ $me->nickname }}</li>
									<li><span>真实姓名:</span> {{ $me->realname }}</li>
									<li><span>Email:</span> {{ $me->email }}</li>
									<li><span>手机号码:</span> {{ $me->phone }}</li>
								</ul>
							</div>
							<div class="tab-pane row-fluid profile-account" id="tab_1_2">
								<div class="row-fluid">
									<div class="span12">
										<div class="span3">
											<ul class="ver-inline-menu tabbable margin-bottom-10">
												<li class="active">
													<a data-toggle="tab" href="#tab_1-1">
														<i class="icon-cog"></i>个人信息
													</a> 
													<span class="after"></span>                                    
												</li>
												<li class="">
													<a data-toggle="tab" href="#tab_2-2">
														<i class="icon-picture"></i>编辑头像
													</a>
												</li>
												<li class="">
													<a data-toggle="tab" href="#tab_3-3">
														<i class="icon-lock"></i>修改密码
													</a>
												</li>
											</ul>
										</div>
										<div class="span9">
											<div class="tab-content">
												<div id="tab_1-1" class="tab-pane active">
													<div style="height: auto;" id="accordion1-1" class="accordion collapse">
														<form method="post" action="{{ _route('admin:mine.inforation') }}" accept-charset="utf-8">
															{!! method_field('put') !!}
                											{!! csrf_field() !!}
															<label class="control-label">昵称</label>
															<input type="text" class="m-wrap span8" name="nickname" value="{{ $me->nickname }}" placeholder="昵称"/>
															<label class="control-label">真实姓名</label>
															<input type="text" class="m-wrap span8" name="realname" value="{{ $me->realname }}" placeholder="真实姓名"/>
															<label class="control-label">手机号码</label>
															<input type="text" class="m-wrap span8" name="phone" value="{{ $me->phone }}" placeholder="手机号码"/>
															<div class="submit-btn">															
																<button type="submit" class="btn blue">保存</button>
															</div>
														</form>
													</div>
												</div>
												<div id="tab_2-2" class="tab-pane">
													<div style="height: auto;" id="accordion2-2" class="accordion collapse">
														<form method="post" action="{{ _route('admin:mine.avatar') }}" accept-charset="utf-8">	
															{!! method_field('put') !!}
                											{!! csrf_field() !!}														
                        									<div class="control-group">
                        										<div class="controls">
                        											<div class="fileupload fileupload-new" data-provides="fileupload">
                        												<div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                        													<img src="{{ $me->avatar }}" alt="" />
                        												</div>
                        												<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                        												<div>
                        													<span class="btn btn-file"><span class="fileupload-new">选择图片</span>
                        													<span class="fileupload-exists">修改</span>
                        													<input type="file" class="default" name="file_picture_avatar" id="file_picture_avatar" accept=".jpg,.png,.gif,.bmp" /></span>
                        													<a href="#" class="btn fileupload-exists" data-dismiss="fileupload">移除</a>
                        													<a id="uploadSubmit_picture" class="btn fileupload-exists">上传</a>
                        												</div>
                        												<input type="hidden" id="picture_avatar" name="avatar" value="{{ $me->avatar }}">
                        											</div>                                                	
                        										</div>
                        									</div>
															<div class="space10"></div>
															<div class="submit-btn">															
																<button type="submit" class="btn blue">保存</button>
															</div>
														</form>
													</div>
												</div>
												<div id="tab_3-3" class="tab-pane">
													<div style="height: auto;" id="accordion3-3" class="accordion collapse">
														<form method="post" action="{{ _route('admin:mine.password') }}" accept-charset="utf-8">
															{!! method_field('put') !!}
                											{!! csrf_field() !!}                											
                    										<input type="hidden" class="m-wrap span8" name="nickname" value="{{ $me->nickname }}" placeholder="昵称">
                    										<input type="hidden" class="m-wrap span8" name="realname" autocomplete="off" value="{{ $me->realname }}" placeholder="真实姓名">
															<label class="control-label">当前密码</label>
															<input type="password" class="m-wrap span8" name="oldpassword" value="" autocomplete="off" placeholder="当前密码"/>
															<label class="control-label">新密码</label>
															<input type="password" class="m-wrap span8" name="password" value="" autocomplete="off" placeholder="新密码"/>
															<label class="control-label">确认新密码</label>
															<input type="password" class="m-wrap span8" name="password_confirmation" value="" autocomplete="off" placeholder="确认新密码"/>
															<div class="submit-btn">							
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
				</div>
			</div>			
		</div>
	</div>
</div>
@stop

@section('extraPlugin')
@parent
<script type="text/javascript" src="{{ _asset('assets/metronic/js/bootstrap-fileupload.js') }}"></script>
<script type="text/javascript" src="{{ _asset('assets/metronic/js/form-components.js') }}"></script>
<script type="text/javascript" src="{{ _asset('assets/metronic/js/chosen.jquery.min.js') }}"></script>
@stop

@section('filledScript')
<script>
jQuery(document).ready(function() {    
    App.init();
    FormComponents.init();

    //ajax
    $('#uploadSubmit_picture').click(function(){
        var resultFile = $("#file_picture_avatar").get(0).files[0];    	  	
    	var formData = new FormData();
    	formData.append("_token",$('meta[name="_token"]').attr('content'));
    	formData.append("picture",resultFile,resultFile.name);
    	var options = {
            type: 'post', 
            url: "{{ _route('admin:upload.picture.store') }}", 
            dataType: 'json',
            processData: false,
            contentType: false,
            data: formData,
            timeout: 3000,
            success: function (data) {
                alert('上传成功');
                $("#picture_avatar")[0].value = data.info;
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