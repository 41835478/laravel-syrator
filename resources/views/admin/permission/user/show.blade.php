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
    								<td style="width: 120px;">登录名：</td>
    								<td>{{ $user->username }}</td>
    							</tr>
    							<tr>
    								<td>昵称：</td>
    								<td>{{ $user->nickname }}</td>
    							</tr>
    							<tr>
    								<td>真实姓名：</td>
    								<td>{{ $user->realname }}</td>
    							</tr>
    							<tr>
    								<td>电子邮件：</td>
    								<td>{{ $user->email }}</td>
    							</tr>
    							<tr>
    								<td>手机号码：</td>
    								<td>{{ $user->phone }}</td>
    							</tr>
    							<tr>
    								<td>状态：</td>
    								<td>{{ ($user->is_locked === 0) ? '正常' : '锁定' }}</td>
    							</tr>
    							<tr>
    								<td>角色(用户组)：</td>
    								<td>{{ $own_role->display_name }}</td>
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