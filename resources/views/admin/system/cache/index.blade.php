@extends('admin._layout._admin')

@section('page-content-bar')
@parent
<ul class="page-breadcrumb">
    <li>
        <a href="{{ site_url('home', 'admin') }}">首页</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
    	<span>重建缓存</span>
    </li>
</ul>
@stop

@section('page-content-row')
@parent
<div class="row">
	<div class="col-md-12">
        <div class="portlet box blue ">
        	<div class="portlet-title">
        		<div class="caption"><i class="fa fa-gift"></i>重建缓存</div>
        	</div>
			<div class="portlet-body form">
				<form method="post" action="{{ site_url('system/cache', 'admin') }}" accept-charset="utf-8" class="form-horizontal" role="form">
                    {!! csrf_field() !!}
                    <div class="form-body">                        
						<div class="clearfix margin-bottom-10">
							<input type="checkbox" name="isCache" checked="">  重新建立缓存(更新内容或者刚安装完本系统之后，如果数据显示异常，请执行本方法)
						</div>
						<button type="submit" class="btn purple">立即更新缓存 </button>
					</div>
				</form>
			</div>
		</div>
    </div>
</div>
@stop