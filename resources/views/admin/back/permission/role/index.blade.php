@extends('admin.layout._back')

@section('content-header')
@parent
<h1>权限管理<small>角色</small></h1>
<ol class="breadcrumb">
	<li><a href="{{ site_url('home', 'admin') }}"><i class="fa fa-home"></i> 主页</a></li>
	<li class="active">权限管理 - 角色</li>
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
	
	@can('role-write')
		<a href="{{ _route('admin:permission.role.create') }}" class="btn btn-primary margin-bottom">新增角色</a>
	@endcan
	
	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">角色列表</h3>
			<div class="box-tips clearfix">
				<p class="text-red"> 请在超级管理员协助下完成增改角色（用户组）操作。</p>
			</div>
		</div>
		<div class="box-body table-responsive">
			<table class="table table-hover table-bordered">
				<tbody>
					<tr>
						<th>编号</th>
                        <th>角色名</th>
                        <th>角色展示名</th>
                        <th>创建日期</th>
                        <th>更新日期</th>
                        <th>操作</th>
                    </tr>
                    
                    @foreach ($roles as $role)
                    <tr>
                        <td class="text-muted">{{ $role->id }}</td>
                        <td class="text-green">{{ $role->name }}</td>
                        <td class="text-red">{{ $role->display_name }}</td>
                        <td>{{ $role->created_at }}</td>
                        <td>{{ $role->updated_at }}</td>
                        <td>
                        	@can('role-write')
                            <a href="{{ _route('admin:permission.role.edit', $role->id) }}"><i class="fa fa-fw fa-pencil" title="修改"></i></a>
                            @endcan
                            <a href="{{ _route('admin:permission.role.show', $role->id) }}" class="layer_open" data-title="查看" data-width="400"><i class="fa fa-fw fa-link" title="查看"></i></a>
                            <a href="javascript:void(0);" delid="{{ $role->id }}" class="removeRole" ><i class="fa fa-fw fa-remove" title="删除"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
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
        layer.tips('这是你当前查看的角色', that);
        layer.open({
        	type: 2,
            title: title,
            shadeClose: false,
            shade: 0,
            area: ['600px', '360px'],
            content: src //iframe的url
        });
    });
    
    $('a.removeRole').on('click', function(evt){
        var delId = $(this).attr("delId");
    	if(confirm("删除后数据将无法恢复，您确定要删除?")){
            $.post("{{ URL('admin/permission/role/remove') }}", {
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
