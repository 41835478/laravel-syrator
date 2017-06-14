@extends('_layout._common')

@section('head_css')
@parent
<link rel="stylesheet" type="text/css" href="{{ _asset('assets/metronic/css/profile.css') }}" />
@stop

@section('body_attr') class="page-header-fixed" @stop

@section('content')
<div class="page-container row-fluid" style="margin-top:0px;">
	<div class="page-content" style="height:280px;min-height:220px;margin-left:0px;">
		<div class="container-fluid">
			<div class="row-fluid profile">
				<div class="span12">
					<div class="portlet-body form">
						<table class="table table-hover table-striped table-bordered" style="margin-bottom: 0px;">
							<tbody>
    							<tr>
    								<td style="width: 120px;">名称：</td>
    								<td>{{ $catalog->name }}</td>
    							</tr>
    							<tr>
    								<td>关键词：</td>
    								<td>{{ $catalog->keywords }}</td>
    							</tr>
    							<tr>
    								<td>描述：</td>
    								<td>{{ $catalog->description }}</td>
    							</tr>
    							<tr>
    								<td>所属父类：</td>
    								<td>{{ $catalog->pid_name }}</td>
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