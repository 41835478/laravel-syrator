@extends('admin._layout._admin')

@section('page-content-bar')
@parent
<ul class="page-breadcrumb">
    <li>
        <a href="{{ site_url('home', 'admin') }}">首页</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <a href="{{ site_url('system/theme', 'admin') }}">模板管理</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
    	<span>编辑会员分组</span>
    </li>
</ul>
@stop

@section('page-content-row')
@parent
<div class="row">
    <div class="col-md-12">
        <div class="portlet box blue ">
        	<div class="portlet-title">
        		<div class="caption"><i class="fa fa-gift"></i>模板编辑</div>
        	</div>
			<div class="portlet-body form">
				<form method="post" action="{{ _route('admin:system.theme.update', $entity->id) }}" accept-charset="utf-8" class="form-horizontal" role="form">
                    {!! method_field('put') !!} 
                    {!! csrf_field() !!}
                    <div class="form-body">
                        @include('_widgets.edit.control-group')
    					<div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-9">
    								<button type="submit" class="btn blue" id="updateOptions1"><i class="icon-ok"></i> 更新模板</button>
                                </div>
                            </div>
                        </div>
					</div>
				</form>
			</div>
		</div>
    </div>
</div>
@stop