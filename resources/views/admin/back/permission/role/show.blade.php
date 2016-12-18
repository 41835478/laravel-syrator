@extends('_layout._common')

@section('head_css')
@parent
<link rel="stylesheet" type="text/css" href="{{ _asset('assets/metronic/css/profile.css') }}" />
@stop

@section('body_attr') class="page-header-fixed" @stop

@section('content')
<div class="page-container row-fluid" style="margin-top:0px;">
	<div class="page-content" style="height:auto;min-height:220px;margin-left:0px;">
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
    							<tr>
    								<td>关联权限 ：</td>
    								<td>     
    									<div class="portlet box ">
                							<div class="control-group">
                                                <div class="controls">                      			
                                               	@foreach($permissions as $index => $per)                                          
                                                	@if(starts_with($per->name, '@'))
                                                	<div class="row-fluid" style="border: 1px solid #eee;padding:0px;">
                                                		<div class="span3" style="padding:5px 0px 0px 10px;">                             
                    										<label class="checkbox" data-value="{{ $per->id }}" style="margin-top: 0;padding-left:20px !important;">
                    											<input data-name="{{ $per->name }}" type="checkbox" name="permissions[]" value="{{ $per->id }}" {{ (check_array($cans,'id', $per->id) === true) ? 'checked' : '' }} disabled="true"/>
                    											{{ $per->display_name }}
                    										</label>
                    									</div>
                    									<div class="span9" style="border-left: 1px solid #eee; padding:5px 0px 0px 10px;">
                    									<?php $count = 0; ?>              
                										@foreach($permissions as $index_sub => $per_sub)
                                                        	@if(stripos('@'.$per_sub->name, $per->name.'-') !== false)  
                                                            	@if($count%3==0)                                              	                    
                        										<label class="checkbox" data-value="{{ $per_sub->id }}" style="width:31%;float:left;margin-top: 0;padding-left:20px !important;">
                        											<input data-name="{{ $per_sub->name }}" data-parent-name="{{ $per->name }}" type="checkbox" name="permissions[]" value="{{ $per_sub->id }}" {{ (check_array($cans,'id', $per_sub->id) === true) ? 'checked' : '' }} disabled="true"/>
                        											{{ $per_sub->display_name }}
                        										</label>
                        										@else
                        										<label class="checkbox" data-value="{{ $per_sub->id }}" style="width:31%;float:left;margin-top: 0;">
                        											<input data-name="{{ $per_sub->name }}" data-parent-name="{{ $per->name }}" type="checkbox" name="permissions[]" value="{{ $per_sub->id }}" {{ (check_array($cans,'id', $per_sub->id) === true) ? 'checked' : '' }} disabled="true"/>
                        											{{ $per_sub->display_name }}
                        										</label>
                    											@endif
                    											<?php $count++; ?> 
                                                            @endif   
                                                      	@endforeach
                    									</div>
                                                	</div>
                                                    @endif   
                                              	@endforeach
                                                </div>
                                            </div>
                    					</div>
    								</td>
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