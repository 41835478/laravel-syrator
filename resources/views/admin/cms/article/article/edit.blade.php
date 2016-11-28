@extends('admin.cms.layout._back')

@include('UEditor::head')

@section('content-header')
@parent

    <h1>文章管理<small>文章</small></h1>
    <ol class="breadcrumb">
    	<li><a href="{{ site_url('home', 'admin') }}"><i class="fa fa-home"></i> 主页</a></li>
    	<li><a href="{{ _route('admin:cms.article.index') }}">文章管理 - 文章列表</a></li>
    	<li class="active">修改文章</li>
    </ol>

@stop

@section('content')

	@if(session()->has('fail'))
	<div class="alert alert-warning alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<h4>  <i class="icon icon fa fa-warning"></i> 提示！</h4>
		{{ session('fail') }}
	</div>
	@endif

	@if($errors->any())
	<div class="alert alert-danger alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<h4><i class="icon fa fa-ban"></i> 警告！</h4>
		<ul>
		@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
		</ul>
	</div>
	@endif

	<h2 class="page-header">修改文章</h2>
	<form method="post" action="{{ _route('admin:article.update', $article->id) }}" accept-charset="utf-8">
		{!! method_field('put') !!}
		{!! csrf_field() !!}
        <div class="nav-tabs-custom">
        	<ul class="nav nav-tabs">
        		<li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">主要内容</a></li>
    			<li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">文章内容</a></li>
        	</ul>
        	
        	<div class="tab-content">
        	
        		<div class="tab-pane active" id="tab_1">
        			<div class="form-group">
        				<label>角色名 <small class="text-red">*</small>  <span class="text-green small">只能为英文单词，建议首字母大写</span></label>
                        <input type="text" class="form-control" name="name" autocomplete="off" value="{{ old('name', isset($role) ? $role->name : null) }}" placeholder="角色(用户组)名">
                    </div>
                    <div class="form-group">
                        <label>角色展示名 <small class="text-red">*</small> <span class="text-green small">展示名可以为中文</span></label>
                        <input type="text" class="form-control" name="display_name" autocomplete="off" value="{{ old('display_name', isset($role) ? $role->display_name : null) }}" placeholder="角色(用户组)展示名">
                    </div>
                    <div class="form-group">
                        <label>角色描述</label>
                        <textarea class="form-control" name="description" cols="45" rows="2" maxlength="200" placeholder="角色(用户组)描述" autocomplete="off">{{ old('description', isset($role) ? $role->description : null) }}</textarea>
                    </div>
               	</div><!-- /.tab-pane -->
			<div class="tab-pane" id="tab_2">
				<div class="form-group" >
					<textarea style="width:100%" name="content" id="content" placeholder="文章详情" >{{ $article->content }}</textarea>
				</div>
			</div>
               	
               	<button type="submit" class="btn btn-primary">保存修改</button>
               	
			</div><!-- /.tab-content -->
		</div>
	</form>

@stop

@section('extraPlugin')
  <!--引入layer插件-->
  <script src="{{ _asset(ref('jquery.dataTables.min.js')) }}"></script>
  <script src="{{ _asset(ref('dataTables.bootstrap.min.js')) }}"></script>
  <link href="{{ _asset(ref('dataTables.bootstrap.css')) }}" rel="stylesheet" type="text/css" />
@stop

@section('filledScript')

    var ue = UE.getEditor('content');   
    ue.ready(function() {
    	//此处为支持laravel5 csrf ,根据实际情况修改,目的就是设置 _token 值.
        ue.execCommand('serverparam', '_token', '{{ csrf_token() }}');
    });

@stop
