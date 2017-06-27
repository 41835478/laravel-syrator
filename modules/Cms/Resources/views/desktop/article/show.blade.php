@extends('_layout._common')

@section('head_css')
@parent
<link href="{{ _asset('modules/cms/css/article.css') }}" rel="stylesheet" type="text/css"/>
@stop

@section('body_attr') class="page-header-fixed" @stop

@section('content-header')
@parent
@include('cms::desktop._widgets._main-header')
@stop

@section('content')
@include('cms::desktop._widgets._main-sidebar-left')
@include('cms::desktop._widgets._main-sidebar-right')
<div id="cms_article" class="page-container row-fluid">
	<div class="page-content" style="padding-top: 20px;">
		<div class="container-fluid">
			<div class="row-fluid">
				<div class="span12">
				{!!$entity->content!!}
				</div>
			</div>
		</div>
	</div>
</div>
@stop

@section('filledScript')
@parent
<script type="text/javascript" src="{{ _asset('assets/js/tree-catalog.js') }}"></script>
<script>
jQuery(document).ready(function() {    
	App.init();
});
</script>

<script type="text/javascript">
    var dData = new Array();
    @foreach ($catalogs as $k => $v)
    dData[{{$k+1}}] = $.parseJSON('{!!$v!!}');
    @endforeach
    
    var catMenuTree = new MenuTreeCatalog("sidebar_article_right", dData);
    catMenuTree.init();
</script>

@stop