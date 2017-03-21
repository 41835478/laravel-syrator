@extends('_layout._common')

@section('head_css')
@parent
<link rel="stylesheet" type="text/css" href="{{ _asset('assets/metronic/css/jquery.fancybox.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ _asset('assets/metronic/css/chosen.css') }}" />
@stop

@section('body_attr') class="page-header-fixed" @stop

@section('content-header')
@parent
@include('admin._widgets._main-header')
@stop

@section('content-footer')
@parent
@include('admin._widgets._main-footer')
@stop

@section('content')
<div class="page-container row-fluid">
	@include('admin._widgets._main-sidebar')
	<div class="page-content">
		<div class="container-fluid">
			<div class="row-fluid">
				<div class="span12">
					<h3 class="page-title">APP管理  <small> APP欢迎页管理</small></h3>
					<ul class="breadcrumb">
						<li>
							<i class="icon-home"></i>
							<a href="{{ site_url('home', 'admin') }}">首页</a> 
							<i class="icon-angle-right"></i>
						</li>
						<li><a href="#">APP欢迎页管理</a></li>
					</ul>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span12 responsive" data-tablet="span12 fix-offset" data-desktop="span12">
					<div class="portlet box grey">
                        @if(session()->has('fail'))
                        <div class="alert alert-warning alert-dismissable">
                        	<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                        	<h4>
                        		<i class="icon icon fa fa-warning"></i> 提示！
                        	</h4>
                        	{{ session('fail') }}
                        </div>
                        @endif 
                        
                        @if($errors->any())
                        <div class="alert alert-danger alert-dismissable">
                        	<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                        	<h4>
                        		<i class="icon fa fa-ban"></i> 警告！
                        	</h4>
                        	<ul>
                        		@foreach ($errors->all() as $error)
                        		<li>{{ $error }}</li> 
                        		@endforeach
                        	</ul>
                        </div>
                        @endif					
						<div class="portlet-title">
							<div class="caption">欢迎页列表</div>
							<div class="actions">
								<a href="{{ _route('admin:system.appinfo.guide.create') }}" class="btn blue"><i class="icon-pencil"></i> 新增</a>
							</div>
						</div>
						<div class="portlet-body">
							@foreach ($entityList as $key=>$per)
							@if ($key%4 == 0)
							<div class="row-fluid">
								<div class="span3">
									<div class="item">
										<a class="fancybox-button" data-rel="fancybox-button" title="{{$per->name}}" href="{{$per->url}}">
											<div class="zoom">
												<img src="{{$per->url}}" alt="Photo">
												<div class="zoom-icon"></div>
											</div>
										</a>
										<div class="details">
											<a href="{{$per->url}}" class="icon"><i class="icon-link"></i></a>
											<a item-id="{{ $per->id }}" href="javascript:void(0);" class="icon remove"><i class="icon-remove"></i></a>
										</div>
									</div>
								</div>
							@elseif ($key%4 == 1 || $key%4 == 2)
								<div class="span3">
									<div class="item">
										<a class="fancybox-button" data-rel="fancybox-button" title="{{$per->name}}" href="{{$per->url}}">
											<div class="zoom">
												<img src="{{$per->url}}" alt="Photo">
												<div class="zoom-icon"></div>
											</div>
										</a>
										<div class="details">
											<a href="{{$per->url}}" class="icon"><i class="icon-link"></i></a>
											<a item-id="{{ $per->id }}" href="javascript:void(0);" class="icon remove"><i class="icon-remove"></i></a>
										</div>
									</div>
								</div>
							@elseif ($key%4 == 3)
								<div class="span3">
									<div class="item">
										<a class="fancybox-button" data-rel="fancybox-button" title="{{$per->name}}" href="{{$per->url}}">
											<div class="zoom">
												<img src="{{$per->url}}" alt="Photo">
												<div class="zoom-icon"></div>
											</div>
										</a>
										<div class="details">
											<a href="{{$per->url}}" class="icon"><i class="icon-link"></i></a>
											<a item-id="{{ $per->id }}" href="javascript:void(0);" class="icon remove"><i class="icon-remove"></i></a>
										</div>
									</div>
								</div>
							</div>
							@endif
							@endforeach
							@if ($countList%4 != 0) 
							</div>
							@endif
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop

@section('extraPlugin')
@parent
<script type="text/javascript" src="{{ _asset('assets/metronic/js/jquery.fancybox.pack.js') }}"></script>
<script type="text/javascript" src="{{ _asset('assets/metronic/js/chosen.jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ _asset('assets/metronic/js/gallery.js') }}"></script>
@stop

@section('filledScript')
<script>
jQuery(document).ready(function() {    
    App.init();
    Gallery.init();

    $(document).on("click","a.remove",function(evt) {
        var itemId = $(this).attr("item-id");
    	if(confirm("删除后数据将无法恢复，您确定要删除?")){
            $.post("{{ URL('admin/system/appinfo/guide/remove') }}", {
            	 _token:$('meta[name="_token"]').attr('content'),
                 delId:itemId,
            }, function(data){
                 if(data.code == 200){
                     alert(data.message);
                     location.reload();
                 } else {
                     alert(data.message);
                 }
            },"json");
      	}
    });
});
</script>
@stop