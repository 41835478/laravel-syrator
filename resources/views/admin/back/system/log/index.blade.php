@extends('admin.layout._back')

@section('content-header')
@parent
          <h1>
            系统管理
            <small>系统日志</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{ site_url('home', 'admin') }}"><i class="fa fa-home"></i> 主页</a></li>
            <li class="active">系统管理 - 系统日志</li>
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

              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">日志列表</h3>
                  @can('log-search')
                  <div class="box-tools">                    
                      <div class="tablebox-controls">
                        <button class="btn btn-default btn-sm"><i class="fa fa-file-excel-o" title="导出为excel文件"></i></button>
                        <button class="btn btn-default btn-sm"><i class="fa fa-file-text-o" title="导出为log文本文件"></i></button>                  
                      </div>
                  </div>
                  @endcan
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="system_logs" class="table table-hover table-bordered">
        			<thead>
                      <!--tr-th start-->
                      <tr>
                        <th>类型</th>
                        <th>操作者</th>
                        <th>操作者IP</th>
                        <th>操作URL</th>
                        <th>操作内容</th>
                        <th>操作时间</th>
                        <th>查阅</th>
                      </tr>
                      <!--tr-th end-->
                    </thead>
                    <tbody>

                      @foreach ($system_logs as $sys_log)
                      <tr>
                        <td class="text-red">{{ dict('log_type.'.$sys_log->type) }}</td>
                        <td class="text-green">{{ $sys_log->username or '--' }} / {{ $sys_log->realname or '--' }}</td>
                        <td class="text-yellow">{{ $sys_log->operator_ip }}</td>
                        <td class="overflow-hidden" title="{{ $sys_log->url }}">{{ $sys_log->url }}</td>
                        <td class="overflow-hidden" title="{{ $sys_log->content }}">{{ str_limit($sys_log->content, 70, '...') }}</td>
                        <td>{{ $sys_log->created_at }}</td>
                        <td>
                            @can('log-show')
                            <a href="{{ _route('admin:system.log.show', $sys_log->id) }}" class="layer_open" data-title="查看" data-width="400"><i class="fa fa-fw fa-link" title="查看"></i></a>
                            @endcan
                        </td>
                      </tr>
                      @endforeach

                    </tbody>
                  </table>
                </div><!-- /.box-body -->
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

    	$("#system_logs").DataTable({
        	"language": {            
        		"url": "{{ _asset('lib/datatables/Chinese.json') }}"
    		}
    	});

        $(document).on("click","a.layer_open",function(evt) {
            evt.preventDefault();
            var that = this;
            var src = $(this).attr("href");
            var title = $(this).data('title');
            layer.tips('这是你当前查看的日志', that);
            layer.open({
                type: 2,
                title: title,
                shadeClose: false,
                shade: 0,
                area: ['600px', '360px'],
                content: src //iframe的url
            });
        });

@stop
