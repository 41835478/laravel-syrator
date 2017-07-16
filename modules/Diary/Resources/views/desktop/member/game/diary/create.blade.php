@extends('diary::desktop._layout._member')

@section('js_page_level')
@parent
<script src="{{ _asset('assets/lib/ztree/js/jquery.ztree.core.js') }}"></script>
<script src="{{ _asset('assets/syrator/js/tree/ztree-expand.js') }}"></script>
@stop

@section('style_head')
@parent
<style>
.form-horizontal .form-group {
	padding-right:5px;
}
</style>
@stop

@section('page-content-bar')
@parent
<ul class="page-breadcrumb">
    <li>
        <a href="{{ site_url('game', 'member') }}">首页</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <span>控制台</span>
    </li>
</ul>
@stop

@section('page-content-row')
@parent
<div class="row">
    <div class="col-md-12">
        <div class="portlet light portlet-fit portlet-form bordered ">
        	<div class="portlet-title">
        		<div class="caption"><i class="fa fa-gift"></i>新增角色</div>
        	</div>
			<div class="portlet-body form">
				<form method="post" action="{{ _route('member:game.role.store') }}" accept-charset="utf-8" class="form-horizontal" role="form">
                    {!! csrf_field() !!}
                    <div class="form-body">
                        @include('_widgets.edit.control-group')
    					<div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-9">
    								<button type="submit" class="btn blue"><i class="icon-ok"></i> 新增</button>
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
