@extends('_layout._common')

@section('head_css')
@parent
<link rel="stylesheet" type="text/css" href="{{ _asset('assets/metronic/css/profile.css') }}" />
@stop

@section('body_attr') class="page-header-fixed" @stop

@section('content')
<div class="page-container row-fluid">
	<div class="page-content" style="height:220px;min-height:220px;">
		<div class="container-fluid">
			<div class="row-fluid profile">
				<div class="span12">
					<div class="portlet-body form">
						<table class="table table-hover table-striped table-bordered" style="margin-bottom: 0px;">
							<tbody>
    							<tr>
    								<td style="width: 80px;">ID：</td>
    								<td>{{ $sys_log->id }}</td>
    							</tr>
    							<tr>
    								<td>操作者：</td>
    								<td>{{ $sys_log->user->username or '--' }} / {{ $sys_log->user->realname or '--' }}</td>
    							</tr>
    							<tr>
    								<td>类型：</td>
    								<td>{{ dict('log_type.'.$sys_log->type) }}</td>
    							</tr>
    							<tr>
    								<td>操作URL：</td>
    								<td>{{ $sys_log->url }}</td>
    							</tr>
    							<tr>
    								<td>操作内容：</td>
    								<td>{{ $sys_log->content }}</td>
    							</tr>
    							<tr>
    								<td>操作时间：</td>
    								<td>{{ $sys_log->created_at }}</td>
    							</tr>
    						</tbody>
						</table>					
					</div>					
				</div>
			</div>
		</div>
	</div>  
</div>
@stop
