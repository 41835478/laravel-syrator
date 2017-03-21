@extends('_layout._common')

@section('head_css')
@parent
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
		<div class="container-fluid">
			<div class="row-fluid">
				<div class="span12">
					<h3 class="page-title">会员编辑  <small> 编辑系统会员</small></h3>
					<ul class="breadcrumb">
						<li>
							<i class="icon-home"></i>
							<a href="{{ site_url('home', 'admin') }}">首页</a> 
							<i class="icon-angle-right"></i>
						</li>
						<li>
							<a href="{{ site_url('member/member', 'admin') }}">会员管理</a> 
							<i class="icon-angle-right"></i>
						</li>
						<li><a href="#">会员编辑</a></li>
					</ul>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span12">
        			@if(session()->has('fail'))
                    <div class="alert alert-warning alert-dismissable">
                    	<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                    	<h4>
                    		<i class="icon icon fa fa-warning"></i> 提示！
                    	</h4>
                    	{{ session('fail') }}
                    </div>
                    @endif 
                    
                    @if($errors->any())
                    <div class="alert alert-danger alert-dismissable">
                    	<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                    	<h4>
                    		<i class="icon fa fa-ban"></i> 警告！
                    	</h4>
                    	<ul>
                    		@foreach ($errors->all() as $error)
                    		<li>{{ $error }}</li> 
                    		@endforeach
                    	</ul>
                    </div>
                    @endif
                    <div class="portlet box blue ">
                    	<div class="portlet-title">
                    		<div class="caption">会员编辑</div>
                    	</div>
						<div class="portlet-body form">
							<form method="post" action="{{ _route('admin:member.member.update', $member->id) }}" accept-charset="utf-8" class="form-horizontal form-bordered form-label-stripped">
                                {!! method_field('put') !!} 
                                {!! csrf_field() !!}
								<div class="control-group">
									<label class="control-label">手机号</label>
									<div class="controls">										
										<input type="text" class="m-wrap large" name="phone" autocomplete="off" value="{{ old('phone', isset($member) ? $member->phone : null) }}" placeholder="手机号" readOnly="true">
										<span class="help-inline"><small class="text-red">*</small>（创建后手机号无法修改）</span>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">用户名</label>
									<div class="controls">										
										<input type="text" class="m-wrap large" name="account" autocomplete="off" value="{{ old('account', isset($member) ? $member->account : null) }}" placeholder="用户名">
										<span class="help-inline"><small class="text-red">*</small>（必须以英文字母开头并且是英文字母或数字的组合）</span>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">昵称</label>
									<div class="controls">										
										<input type="text" class="m-wrap large" name="nickname" autocomplete="off" value="{{ old('nickname', isset($member) ? $member->nickname : null) }}" placeholder="昵称">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Email</label>
									<div class="controls">										
										<input type="text" class="m-wrap large" name="email" autocomplete="off" value="{{ old('email', isset($member) ? $member->email : null) }}" placeholder="Email">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">初始密码</label>
									<div class="controls">										
										<input type="password" class="m-wrap large" name="password" autocomplete="off" value="">
									</div>
								</div>
								<div class="control-group">
    								<label class="control-label">用户角色</label>
    								<div class="controls">
    									<select id="select_role" class="small m-wrap" tabindex="1" name="role">
    									@foreach ($roles as $role)
                                        	<option value="{{ $role->id }}">{{ $role->name }}</option>
                                      	@endforeach
    									</select>
    								</div>
    							</div>
								<div class="form-actions">
									<button type="submit" class="btn blue" id="updateOptions1"><i class="icon-ok"></i> 更新会员</button>
								</div>
							</form>
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
@stop

@section('filledScript')
<script>
jQuery(document).ready(function() {    
    App.init();

    $("#select_role option[value={{$member->role}}]").attr('selected',true);
});
</script>
@stop