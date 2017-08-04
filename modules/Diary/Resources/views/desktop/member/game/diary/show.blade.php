@extends('diary::desktop._layout._member')

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
        		<div class="caption"><i class="fa fa-gift"></i>日志浏览</div>
        	</div>
			<div class="portlet-body form">
				<form method="post" action="{{ _route('member:game.diary.update', $entity->id) }}" accept-charset="utf-8" class="form-horizontal" role="form">
                    {!! method_field('put') !!}
                    {!! csrf_field() !!}
                    <div class="form-body">
                        @include('_widgets.edit.form-group')
					</div>
				</form>
			</div>
		</div>
    </div>
</div>
@stop
