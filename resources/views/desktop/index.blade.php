@extends('_layout._common')

@section('body_attr') class="page-header-fixed page-full-width" @stop

@section('content')
@parent
@include('widgets.main-header')
@stop

@section('content')
@parent
@include('widgets.main-footer')
@stop

@section('content')

@stop

@section('filledScript')
<script>
	jQuery(document).ready(function() {    
	   App.init();
	   jQuery('#promo_carousel').carousel({
	      interval: 10000,
	      pause: 'hover'
	   });
	});
</script>
@show