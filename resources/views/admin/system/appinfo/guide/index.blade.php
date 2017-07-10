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