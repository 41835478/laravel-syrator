@extends('admin._layout._admin')

@section('page-content-bar')
@parent
<ul class="page-breadcrumb">
    <li>
        <a href="{{ site_url('home', 'admin') }}">首页</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <a href="{{ site_url('member/group', 'admin') }}">会员分组管理</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
    	<span>新增会员分组</span>
    </li>
</ul>
@stop

@section('page-content-row')
@parent
<div class="row">
    <div class="col-md-12">
        <div class="portlet box blue ">
        	<div class="portlet-title">
        		<div class="caption"><i class="fa fa-gift"></i>新增会员分组</div>
        	</div>
			<div class="portlet-body form">
				<form method="post" action="{{ _route('admin:member.group.store') }}" accept-charset="utf-8" class="form-horizontal" role="form">
                    {!! csrf_field() !!}
                    <div class="form-body">
                        @include('_widgets.edit.control-group')
    					<div class="form-group">
    						<label class="col-md-1 control-label">分组名<span class="required" aria-required="true"> * </span></label>
    						<div class="col-md-11">										
    							<input type="text" class="form-control" name="name" autocomplete="off" value="{{ old('name', isset($group) ? $group->name : null) }}" placeholder="分组名">
    							<span class="help-block"> (select at least two) </span>
    						</div>
    					</div>
    					<div class="form-actions">
    						<button type="submit" class="btn blue" id="updateOptions1"><i class="icon-ok"></i> 新增会员分组</button>
    					</div>
					</div>
				</form>
			</div>
		</div>
    </div>
</div>
@stop

@section('filledScript')
<script>

</script>
@stop