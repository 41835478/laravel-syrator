@extends('_layout._common')

@section('head_css')
@parent
<link rel="stylesheet" type="text/css" href="{{ _asset('assets/metronic/css/profile.css') }}" />
@stop

@section('body_attr') class="page-header-fixed" @stop

@section('content')
<div class="page-container row-fluid" style="margin-top:0px;">
	<div class="page-content" style="height:220px;min-height:220px;margin-left:0px;">
		<div class="container-fluid">
			<div class="row-fluid profile">
				<div class="span12">
					<div class="portlet-body form">
						<table class="table table-hover table-striped table-bordered" style="margin-bottom: 0px;">
							<tbody>
    							<tr>
    								<td style="width: 80px;">账号：</td>
    								<td>{{ $member->account }}</td>
    							</tr>
    							<tr>
    								<td>手机号：</td>
    								<td>{{ $member->phone }}</td>
    							</tr>
    							<tr>
    								<td>角色：</td>
    								<td>{{ $member->getRoleName() }}</td>
    							</tr>
    							<tr>
    								<td>昵称：</td>
    								<td>{{ $member->nickname }}</td>
    							</tr>
    							<tr>
    								<td>邮箱：</td>
    								<td>{{ $member->email }}</td>
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