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
    								<td style="width: 120px;">角色名：</td>
    								<td>{{ $role->name }}</td>
    							</tr>
    							<tr>
    								<td>角色展示名：</td>
    								<td>{{ $role->display_name }}</td>
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