@extends('admin.layout._back')

@section('content-header')
@parent
          <h1>
            权限管理
            <small>修改密码</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{ site_url('home', 'admin') }}"><i class="fa fa-home"></i> 主页</a></li>
            <li class="active">用户中心 - 修改密码</li>
          </ol>
@stop

@section('content')

            @if(session()->has('message'))
              <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4>  <i class="icon fa fa-check"></i> 提示！</h4>
                {{ session('message') }}
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

              <div class="box box-primary">

                <form method="post" action="{{ _route('admin:mine.inforation') }}" accept-charset="utf-8">
                {!! method_field('put') !!}
                {!! csrf_field() !!}
                  <div class="box-body">
                    <input type="hidden" class="form-control" name="nickname" value="{{ $me->nickname }}" placeholder="昵称">
                    <input type="hidden" class="form-control" name="realname" autocomplete="off" value="{{ $me->realname }}" placeholder="真实姓名">
                    <div class="form-group">
                      <label>登录密码</label>
                      <input type="password" class="form-control" name="password" value="" autocomplete="off" placeholder="登录密码">
                    </div>
                    <div class="form-group">
                      <label>确认登录密码</label>
                      <input type="password" class="form-control" name="password_confirmation" value="" autocomplete="off" placeholder="登录密码">
                    </div>
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">修改密码</button>
                  </div>
                </form>

              </div>

@stop
