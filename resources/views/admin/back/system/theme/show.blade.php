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
    								<td style="width: 80px;">模板编码：</td>
    								<td>{{ $theme->code }}</td>
    							</tr>
    							<tr>
    								<td>模板名称：</td>
    								<td>{{ $theme->name }}</td>
    							</tr>
    							<tr>
    								<td>模板描述：</td>
    								<td>{{ $theme->description }}</td>
    							</tr>
    							<tr>
    								<td>作者：</td>
    								<td>{{ $theme->author }}</td>
    							</tr>
    							<tr>
    								<td>版本：</td>
    								<td>{{ $theme->version }}</td>
    							</tr>
    							<tr>
    								<td>是否使用：</td>
    								@if($theme->is_current === '1')
                					<td class="text-red"><i class="icon-ok"></i></td>
                					@else
                					<td class="text-red"><i class="icon-remove"></i></td>
                					@endif
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
