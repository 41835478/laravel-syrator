@extends('admin.layout._back') 

@section('content-header') 

@parent
<h1>
	系统管理<small>模板</small>
</h1>
<ol class="breadcrumb">
	<li><a href="{{ site_url('home', 'admin') }}"><i class="fa fa-home"></i> 主页</a></li>
	<li class="active">系统管理 - 模板</li>
</ol>
@stop 

@section('content') 

@if(session()->has('message'))
<div class="alert alert-success alert-dismissable">
	<button type="button" class="close" data-dismiss="alert"
		aria-hidden="true">×</button>
	<h4>
		<i class="icon fa fa-check"></i> 提示！
	</h4>
	{{ session('message') }}
</div>
@endif

<a href="{{ _route('admin:system.theme.create') }}" class="btn btn-primary margin-bottom">新增模板</a>

<div class="box box-primary">
	<div class="box-header with-border">
		<h3 class="box-title">模板列表</h3>
	</div>	
	<div class="box-body">
		<table id="themes" class="table table-bordered table-striped">
			<thead>
                <tr>
					<th>编号</th>
					<th>编码</th>
					<th>名称</th>
					<th>作者</th>
					<th>版本</th>
					<th>是否使用</th>
					<th>创建日期</th>
					<th>更新日期</th>
					<th>操作</th>
                </tr>
            </thead>
			<tbody>                    
				@foreach($themes as $index => $per) 
				<tr>
					<td class="text-muted">{{ $per->id }}</td>
					<td class="text-green">{{ $per->code }}</td>
					<td class="text-red">{{ $per->name }}</td>
					<td class="text-red">{{ $per->author }}</td>
					<td class="text-red">{{ $per->version }}</td>
					@if($per->is_current === '1')
					<td class="text-red"><i class="fa fa-check"><span style="display:none">是</span></td>
					@else
					<td class="text-red"><i class="fa fa-close"><span style="display:none">否</span></td>
					@endif
					<td>{{ $per->created_at }}</td>
					<td>{{ $per->updated_at }}</td>
					<td>
						<a href="{{ _route('admin:system.theme.edit', $per->id) }}"><i class="fa fa-fw fa-pencil" title="修改"></i></a>
						<a href="{{ _route('admin:system.theme.show', $per->id) }}" class="layer_open" data-title="查看" data-width="400"><i class="fa fa-fw fa-link" title="查看"></i></a>
						<a href="javascript:void(0);" delid="{{ $per->id }}" class="remove" ><i class="fa fa-fw fa-remove" title="删除"></i></a>
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
  <script src="{{ _asset(ref('jquery.dataTables.min.js')) }}"></script>
  <script src="{{ _asset(ref('dataTables.bootstrap.min.js')) }}"></script>
  <link href="{{ _asset(ref('dataTables.bootstrap.css')) }}" rel="stylesheet" type="text/css" />
@stop

@section('filledScript')

    $("#themes").DataTable({
    	"language": {            
    		"url": "{{ _asset('lib/datatables/Chinese.json') }}"
		}
	});

	$(document).on("click","a.layer_open",function(evt) {
    	evt.preventDefault();
        var that = this;
        var src = $(this).attr("href");
        var title = $(this).data('title');
        layer.tips('这是你当前查看的权限', that);
        layer.open({
        	type: 2,
            title: title,
            shadeClose: false,
            shade: 0,
            area: ['600px', '360px'],
            content: src //iframe的url
        });
    });
    
    $(document).on("click","a.remove",function(evt) {
        var delId = $(this).attr("delId");
    	if(confirm("删除后数据将无法恢复，您确定要删除?")){
            $.post("{{ URL('admin/system/theme/remove') }}", {
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
