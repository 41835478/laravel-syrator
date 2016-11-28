@extends('admin.layout._back')

@section('content-header')
@parent

	<h1>系统管理<small>重建缓存</small></h1>
	<ol class="breadcrumb">
		<li><a href="{{ site_url('home', 'admin') }}"><i class="fa fa-home"></i> 主页</a></li>
		<li class="active">系统管理 - 重建缓存</li>
	</ol>
	
@stop

@section('content')
    @if(!empty($message))
    <div class="alert alert-success alert-dismissable">
    	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    	<h4>
    		<i class="icon fa fa-check"></i> 提示！
    	</h4>
    	{{ $message }}
    </div>
    @endif
    
    <form method="post" action="{{ site_url('system/cache', 'admin') }}" accept-charset="utf-8">
    	{!! csrf_field() !!}
    	<div class="nav-tabs-custom">
    		
    		<ul class="nav nav-tabs">
    			<li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">重建缓存</a></li>
    		</ul>
    		
    		<div class="tab-content">    		
    			<div class="tab-pane active" id="tab_1">                    
                    <div class="form-group">
                        <div class="input-group">
                            <input type="checkbox" name="isCache" checked="">  重新建立缓存(更新内容或者刚安装完本系统之后，如果数据显示异常，请执行本方法)
                        </div>
                    </div>
                </div><!-- /.tab-pane -->
                
                <button type="submit" class="btn btn-primary">立即更新缓存</button>
            </div><!-- /.tab-content -->
        </div>
    </form>
    
@stop


