@extends('admin.layout._back')

@section('content-header')
@parent
          <h1>
            权限管理
            <small>权限</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{ site_url('home', 'admin') }}"><i class="fa fa-home"></i> 主页</a></li>
            <li><a href="{{ _route('admin:permission.permission.index') }}">权限管理 - 权限</a></li>
            <li class="active">修改权限</li>
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

              <h2 class="page-header">修改角色</h2>
              <form method="post" action="{{ _route('admin:permission.permission.update', $permission->id) }}" accept-charset="utf-8">
              {!! method_field('put') !!}
              {!! csrf_field() !!}
              <div class="nav-tabs-custom">
                  
                  <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">主要内容</a></li>
                  </ul>

                  <div class="tab-content">
                    
                    <div class="tab-pane active" id="tab_1">
                      <div class="form-group">
                        <label>权限名 <small class="text-red">*</small>  <span class="text-green small">只能为英文单词,'-'字符，首字母可以为'@'</span></label>
                        <input type="text" class="form-control" name="name" autocomplete="off" value="{{ old('name', isset($permission) ? $permission->name : null) }}" placeholder="权限名">
                      </div>
                      <div class="form-group">
                        <label>权限展示名 <small class="text-red">*</small> <span class="text-green small">展示名可以为中文</span></label>
                        <input type="text" class="form-control" name="display_name" autocomplete="off" value="{{ old('display_name', isset($permission) ? $permission->display_name : null) }}" placeholder="权限展示名">
                      </div>
                      <div class="form-group">
                        <label>权限描述</label>
                        <textarea class="form-control" name="description" cols="45" rows="2" maxlength="200" placeholder="权限描述" autocomplete="off">{{ old('description', isset($permission) ? $permission->description : null) }}</textarea>
                      </div>
                    </div><!-- /.tab-pane -->

                    <button type="submit" class="btn btn-primary">修改权限</button>

                  </div><!-- /.tab-content -->
                  
              </div>
              </form>

@stop
