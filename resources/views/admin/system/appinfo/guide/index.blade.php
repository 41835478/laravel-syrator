@extends('admin._layout._admin')

@section('page-content-bar')
@parent
<ul class="page-breadcrumb">
    <li>
        <a href="{{ site_url('home', 'admin') }}">首页</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <a href="{{ site_url('system/appinfo', 'admin') }}">APP管理</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
    	<span>APP欢迎页管理</span>
    </li>
</ul>
@stop

@section('page-content-row')
@parent
<div class="row">
    <div class="col-md-12">
        <div class="portlet light portlet-fit bordered">
            <div class="portlet-title">                
				<div class="caption">欢迎页列表</div>
				<div class="actions">
					<a href="{{ _route('admin:system.appinfo.guide.create') }}" class="btn blue"><i class="icon-pencil"></i> 新增</a>
				</div>
            </div>
            <div class="portlet-body">
                <div class="mt-element-card mt-element-overlay">
                    <div class="row">
                    	@foreach ($entityList as $key=>$per)
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                            <div class="mt-card-item">
                                <div class="mt-card-avatar mt-overlay-1">
                                    <img src="/assets/metronic/pages/img/avatars/team1.jpg">
                                    <div class="mt-overlay">
                                        <ul class="mt-info">
                                            <li>
                                                <a class="btn default btn-outline" href="javascript:;">
                                                    <i class="icon-magnifier"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="btn default btn-outline" href="javascript:;">
                                                    <i class="icon-link"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="mt-card-content">
                                    <h3 class="mt-card-name">Mark Anthony</h3>
                                    <p class="mt-card-desc font-grey-mint">Managing Director</p>
                                    <div class="mt-card-social">
                                        <ul>
                                            <li>
                                                <a href="javascript:;">
                                                    <i class="icon-social-facebook"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;">
                                                    <i class="icon-social-twitter"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;">
                                                    <i class="icon-social-dribbble"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('filledScript')
<script>
jQuery(document).ready(function() {
    App.init();
    
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