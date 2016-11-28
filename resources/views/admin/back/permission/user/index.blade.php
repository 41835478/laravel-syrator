@extends('admin.layout._back')

@section('content-header')
@parent
          
<h1>权限管理<small>管理员</small></h1>
<ol class="breadcrumb">
	<li><a href="{{ site_url('home', 'admin') }}"><i class="fa fa-home"></i> 主页</a></li>
	<li class="active">权限管理 - 管理员</li>
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

  @can('user-write')
  <a href="{{ _route('admin:permission.user.create') }}" class="btn btn-primary margin-bottom">新增管理员(用户)</a>
  @endcan

  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">管理员列表</h3>
      @can('user-search')
      <div class="box-tools">
        <form action="{{ _route('admin:permission.user.index') }}" method="get" class="form-inline">
          <div class="form-group">
            <select data-placeholder="选择角色 ..." class="form-control input-sm chosen-select" name="s_role">
              <option value="">选择角色</option>
            @foreach ($roles as $k => $v)
              <option value="{{ $v->id }}" {{ (request('s_role') == $v->id) ? 'selected' : '' }}>{{ $v->display_name }}</option>
            @endforeach
            </select>
          </div>
          <div class="form-group">
            <input type="text" class="form-control input-sm" name="s_name" value="{{ request('s_name') }}" style="width: 200px;" placeholder="搜索用户登录名或昵称或真实姓名">
          </div>
          <div class="form-group">
            <input type="text" class="form-control input-sm" name="s_phone" value="{{ request('s_phone') }}" style="width: 150px;" placeholder="搜索用户手机号">
          </div>
          <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
        </form>
      </div>
      @endcan
    </div><!-- /.box-header -->
    <div class="box-body table-responsive">
      <table class="table table-hover table-bordered">
        <tbody>
          <!--tr-th start-->
          <tr>
            <th>编号</th>
            <th>登录名 / 昵称</th>
            <th>真实姓名</th>
            <th>角色</th>
            <th>状态</th>
            <th>最后一次登录时间</th>
            <th>操作</th>
          </tr>
          <!--tr-th end-->
          @foreach ($users as $user)
          <tr>
            <td>{{ $user->id }}</td>
            <td class="text-muted">{{ $user->username }} / {{ $user->nickname }}</td>
            <td class="text-green">{{ $user->realname }}</td>
            <td class="text-red">
              @if(null !== $user->roles->first())
              	{{ $user->roles->first()->name }}({{ $user->roles->first()->display_name }})
              @else
              	NULL(空)
              @endif
            </td>
            <td class="text-yellow">
              @if($user->is_locked)
              	锁定
              @else
              	正常
              @endif
            </td>
            <td>{{ $user->updated_at }}</td>
            <td>
              @can('user-write')
              <a href="{{ _route('admin:permission.user.edit', $user->id) }}"><i class="fa fa-fw fa-pencil" title="修改"></i></a>
              @endcan
              <a href="{{ _route('admin:permission.user.show', $user->id) }}" class="layer_open" data-title="查看" data-width="400"><i class="fa fa-fw fa-link" title="查看"></i></a>
              <a href="javascript:void(0);" delid="{{ $user->id }}" class="remove" ><i class="fa fa-fw fa-remove" title="删除"></i></a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div><!-- /.box-body -->
    <div class="box-footer clearfix">
      {!! $users->appends(['s_name' => request('s_name'), 's_phone' => request('s_phone'), 's_role' => request('s_role')])->render() !!}
    </div>
</div>

@stop

@section('extraPlugin')
  <!--引入layer插件-->
  <script src="{{ _asset(ref('layer.js')) }}"></script>
@stop

@section('filledScript')

	$('a.layer_open').on('click', function(evt){
    	evt.preventDefault();
        var that = this;
        var src = $(this).attr("href");
        var title = $(this).data('title');
        layer.tips('这是你当前查看的用户', that);
        layer.open({
        	type: 2,
            title: title,
            shadeClose: false,
            shade: 0,
            area: ['600px', '360px'],
            content: src //iframe的url
        });
    });
    
    $('a.remove').on('click', function(evt){
        var delId = $(this).attr("delId");
    	if(confirm("删除后数据将无法恢复，您确定要删除?")){
            $.post("{{ URL('admin/permission/user/remove') }}", {
            	 _token:$('meta[name="_token"]').attr('content'),
                 delId:delId,
            }, function(data){
                 if(data.code == 200){
                     alert(data.message);
                     location.reload();
                 } else {
                     alert(data.message);
                 }
            },"json");
      	}
    });

@stop

