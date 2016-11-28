@extends('admin.layout._back')

@section('content-header')
@parent

<h1>会员管理<small>会员列表</small></h1>
<ol class="breadcrumb">
	<li><a href="{{ site_url('home', 'admin') }}"><i class="fa fa-home"></i> 主页</a></li>
	<li class="active">会员管理 - 会员</li>
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
<a href="{{ _route('admin:member.create') }}" class="btn btn-primary margin-bottom">新增会员</a>
@endcan

<div class="box box-primary">
	<div class="box-header with-border">
		<h3 class="box-title">会员列表</h3>
		@can('user-search')
		<div class="box-tools">
			<form action="{{ _route('admin:member.index') }}" method="get" class="form-inline">
				<div class="form-group">
					<select data-placeholder="选择分组 ..." class="form-control input-sm chosen-select" name="m_group">
                        <option value="">选择分组</option>
                        @foreach ($groups as $k => $v)
                          <option value="{{ $v->id }}" {{ (request('m_group') == $v->id) ? 'selected' : '' }}>{{ $v->name }}</option>
                        @endforeach
                    </select>
                </div>
				<button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
			</form>
		</div>
		@endcan		
	</div>
	<div class="box-body">
		<table id="member_list" class="table table-hover table-bordered">			
			<thead>
				<tr>
					<th width="30px;">编号</th>
					<th>名称</th>
                    <th width="100px;">操作</th>
              	</tr>
            </thead>
          	<tbody>
          		@foreach ($members as $per)
          		<tr>
          			<td class="text-red">{{ $per->id }}</td>
          			<td class="text-red">{{ $per->username }}</td>
                    <td>
                    	<a href="{{ _route('admin:member.edit', $per->id) }}"><i class="fa fa-fw fa-pencil" title="修改"></i></a>
                    	<a href="{{ _route('admin:member.show', $per->id) }}" class="layer_open" data-title="查看" data-width="400"><i class="fa fa-fw fa-link" title="查看"></i></a>
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
  <script src="{{ _asset(ref('fastclick.min.js')) }}"></script>
  <link href="{{ _asset(ref('dataTables.bootstrap.css')) }}" rel="stylesheet" type="text/css" />
@stop

@section('filledScript')

	$("#member_list").DataTable({
       	"language": {            
       		"url": "{{ _asset('lib/datatables/Chinese.json') }}"
    	},
   		"zeroRecords": "没有查询数据",
        "columns": [    
    		{title: "编号", orderable: true},
    		{title: "名称", orderable: true},
    		{title: "操作", orderable: false},
        ],
    });

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
            $.post("{{ URL('admin/member/remove') }}", {
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

