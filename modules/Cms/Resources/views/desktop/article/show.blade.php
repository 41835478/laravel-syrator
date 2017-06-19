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
<div class="page-container row-fluid">
	<div class="page-content">
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
<script>
jQuery(document).ready(function() {    
   App.init();
   jQuery('#promo_carousel').carousel({
      interval: 10000,
      pause: 'hover'
   });
});
</script>
@stop