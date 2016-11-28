@extends('admin.cms.layout._back') 

@section('content-header') 

@parent
<h1>
	文章管理<small>文章分类</small>
</h1>
<ol class="breadcrumb">
	<li><a href="{{ site_url('home', 'admin') }}"><i class="fa fa-home"></i> 主页</a></li>
	<li class="active">文章管理 - 文章分类</li>
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

<a href="{{ _route('admin:cms.article-cat.create') }}" class="btn btn-primary margin-bottom">新增分类</a>

<div class="box box-primary">
	<div class="box-header with-border">
		<h3 class="box-title">分类列表</h3>
	</div>	
	<div class="box-body">
		<table id="catalogs" class="table table-bordered table-striped">
			<thead>
                <tr>
					<th>编号</th>
					<th>分类名称</th>
					<th>创建日期</th>
					<th>更新日期</th>
					<th>操作</th>
                </tr>
            </thead>
			<tbody>                    
				@foreach($catalogs as $index => $per) 
				<tr>
					<td class="text-muted">{{ $per->id }}</td>
					<td class="text-green">{{ $per->name }}</td>
					<td>{{ $per->created_at }}</td>
					<td>{{ $per->updated_at }}</td>
					<td>
						<a href="{{ _route('admin:article-cat.edit', $per->id) }}"><i class="fa fa-fw fa-pencil" title="修改"></i></a>
						<a href="{{ _route('admin:article-cat.show', $per->id) }}" class="layer_open" data-title="查看" data-width="400"><i class="fa fa-fw fa-link" title="查看"></i></a>
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

    $("#catalogs").DataTable({
    	"language": {            
    		"url": "{{ _asset('lib/datatables/Chinese.json') }}"
		}
	});

	$(document).on("click","a.layer_open",function(evt) {
    	evt.preventDefault();
        var that = this;
        var src = $(this).attr("href");
        var title = $(this).data('title');
        layer.tips('这是你当前查看的分类', that);
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
            $.post("{{ URL('admin/article-cat/remove') }}", {
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
