@extends('admin.layout._back') 

@section('content-header') 
@parent
<h1>
	系统管理 <small>模板</small>
</h1>
<ol class="breadcrumb">
	<li><a href="{{ site_url('home', 'admin') }}"><i class="fa fa-home"></i> 主页</a></li>
	<li><a href="{{ _route('admin:system.theme.index') }}">系统管理 - 模板</a></li>
	<li class="active">新增模板</li>
</ol>
@stop 

@section('content') 
@if(session()->has('fail'))
<div class="alert alert-warning alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	<h4>
		<i class="icon icon fa fa-warning"></i> 提示！
	</h4>
	{{ session('fail') }}
</div>
@endif 

@if($errors->any())
<div class="alert alert-danger alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
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

<h2 class="page-header">新增模板</h2>
<form method="post" action="{{ _route('admin:system.theme.store') }}"
	accept-charset="utf-8">
	{!! csrf_field() !!}
	<div class="nav-tabs-custom">

		<ul class="nav nav-tabs">
			<li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">主要内容</a></li>
		</ul>

		<div class="tab-content">

			<div class="tab-pane active" id="tab_1">
				<div class="form-group">
					<label>模板编码 <small class="text-red">*</small></label> 
					<input type="text" class="form-control" name="code" autocomplete="off" value="{{ old('code') }}" placeholder="模板编码 ">
				</div>
				<div class="form-group">
					<label>模板名称 <small class="text-red">*</small></label> 
					<input type="text" class="form-control" name="name" autocomplete="off" value="{{ old('name') }}" placeholder="模板名称">
				</div>
				<div class="form-group">
					<label>模板描述</label>
					<textarea class="form-control" name="description" cols="45" rows="2" maxlength="200" placeholder="模板描述" autocomplete="off"></textarea>
				</div>
				<div class="form-group">
					<label>作者 </label> 
					<input type="text" class="form-control" name="author" autocomplete="off" value="{{ old('author') }}" placeholder="作者">
				</div>
				<div class="form-group">
					<label>版本 </label> 
					<input type="text" class="form-control" name="version" autocomplete="off" value="{{ old('version') }}" placeholder="版本">
				</div>
                <div class="form-group">
                  	<label>是否使用 <small class="text-red">*</small></label>
                  	<div class="input-group">
                        <input type="radio" name="is_current" value="0" checked>
                        <label class="choice" for="radiogroup">否</label>
                        <input type="radio" name="is_current" value="1">
                        <label class="choice" for="radiogroup">是</label>
                  	</div>
                </div>
			</div>
			<!-- /.tab-pane -->

			<button type="submit" class="btn btn-primary">新增模板</button>

		</div>
		<!-- /.tab-content -->

	</div>
</form>

@stop 
