@extends('_layout._common')

@section('head_css')
@parent
<link href="{{ _asset('assets/metronic/css/promo.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ _asset('assets/metronic/css/animate.css') }}" rel="stylesheet" type="text/css" />
@stop

@section('body_attr') class="page-header-fixed page-full-width" @stop

@section('content-header')
@parent
@include('_widgets._main-header')
@stop

@section('content-footer')
@parent
@include('_widgets._main-footer')
@stop

@section('content')
<div class="page-container row-fluid">
	<div class="page-content no-min-height">
		<div class="container-fluid promo-page">
			<div class="row-fluid">
				<div class="span12">
					<a href="{{ $code_url }}">ddd</a>
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