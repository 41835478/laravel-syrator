@extends('desktop._layout._front') 

@section('title') 
{{ trans('syrator.framework_name') }} - {{ trans('syrator.alias') }} 
@stop

@section('body_attr') 
@stop

@section('meta')
@stop

@section('content-header') 

@parent

@stop 

@section('content') 

<div class="intro-header" style="min-height:200px;">
</div>
<!-- /.intro-header -->

<div class="box box-primary" style="margin:1px 60px 10px 60px;">
	<div class="box-header with-border">
		<h3 class="box-title">文章列表</h3>
	</div>	
	<div class="box-body">
		<table id="catalogs" class="table table-bordered table-striped">
			<thead>
                <tr>
					<th>编号</th>
					<th>文章标题</th>
					<th>文章分类</th>
                </tr>
            </thead>
			<tbody>                    
				@foreach($articles as $index => $per) 
				<tr>
					<td class="text-muted">{{ $per->id }}</td>
					<td class="text-green"><a href="{{ _route('desktop:article.show', $per->id) }}">{{ $per->title }}</a></td>
					<td class="text-green">{{ $per->getCatName() }}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
    </div>
</div>
@stop

@section('extraPlugin')
  <!--引入layer插件-->
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

@stop
