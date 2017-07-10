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
					<h3 class="page-title">管理员编辑  <small> 编辑系统管理员</small></h3>
					<ul class="breadcrumb">
						<li>
							<i class="icon-home"></i>
							<a href="{{ site_url('home', 'admin') }}">首页</a> 
							<i class="icon-angle-right"></i>
						</li>
						<li>
							<a href="{{ site_url('permission/user', 'admin') }}">管理员管理</a> 
							<i class="icon-angle-right"></i>
						</li>
						<li><a href="#">编辑管理员</a></li>
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
                    		<div class="caption">编辑管理员</div>
                    	</div>
						<div class="portlet-body form">
							<form method="post" action="{{ _route('admin:permission.user.update', $user->id) }}" accept-charset="utf-8" class="form-horizontal form-bordered form-label-stripped">
                                {!! method_field('put') !!}
                                {!! csrf_field() !!}
								<div class="control-group">
									<label class="control-label">昵称</label>
									<div class="controls">										
										<input type="text" class="m-wrap large" name="nickname" autocomplete="off" value="{{ old('nickname', isset($user) ? $user->nickname : null) }}" placeholder="昵称">
										<span class="help-inline text-green"><small>*</small></span>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">真实姓名</label>
									<div class="controls">										
										<input type="text" class="m-wrap large" name="realname" autocomplete="off" value="{{ old('realname', isset($user) ? $user->realname : null) }}" placeholder="真实姓名">
										<span class="help-inline text-green"><small>*</small> 用于身份确认，必须为2字以上的中文</span>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">用户状态（是否锁定）</label>
									<div class="controls">									
										<label class="radio"><input type="radio" name="is_locked" value="0" {{($user->is_locked === 0)?'checked':''}}/>否</label>
										<label class="radio"><input type="radio" name="is_locked" value="1" {{($user->is_locked === 1)?'checked':''}}/>是</label> 
									</div>
								</div>
								<div class="control-group">
    								<label class="control-label">角色(用户组)</label>
    								<div class="controls">
    									<select id="select_role" class="large m-wrap" tabindex="1" name="role">
    									@foreach ($roles as $role)
                                        	<option value="{{ $role->id }}">{{ $role->name }}({{ $role->display_name }})</option>
                                      	@endforeach
    									</select>
    								</div>
    							</div>
								<div class="control-group">
									<label class="control-label">初始化登录密码</label>
									<div class="controls">										
										<input type="password" class="m-wrap large" name="password" autocomplete="off" value="" placeholder="登录密码">
										<span class="help-inline text-green"><small>*</small> 只能6-16位数字、字母和部分特殊符号（0-9a-zA-Z~@#%）组合</span>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">确认登录密码</label>
									<div class="controls">										
										<input type="password" class="m-wrap large" name="password_confirmation" autocomplete="off" value="" placeholder="重复上面登录密码">
										<span class="help-inline text-green"><small>*</small></span>
									</div>
								</div>
								<div class="form-actions">
									<button type="submit" class="btn blue"><i class="icon-ok"></i> 更新管理员</button>
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

    $("#select_role option[value={{$own_role->id}}]").attr('selected',true);
});
</script>
@stop