@extends('_layout._base')

@section('head_css')    
    <link href="{{ _asset(ref('bootstrap.css')) }}" rel="stylesheet" type="text/css"/>
	<link href="{{ _asset(ref('bootstrap-responsive.css')) }}" rel="stylesheet" type="text/css"/>
	<link href="{{ _asset(ref('font-awesome.css')) }}" rel="stylesheet" type="text/css"/>
	<link href="{{ _asset(ref('style-metro.css')) }}" rel="stylesheet" type="text/css"/>
	<link href="{{ _asset(ref('style.css')) }}" rel="stylesheet" type="text/css"/>
	<link href="{{ _asset(ref('style-responsive.css')) }}" rel="stylesheet" type="text/css"/>
	<link href="{{ _asset(ref('default.css')) }}" rel="stylesheet" type="text/css" id="style_color"/>
	<link href="{{ _asset(ref('uniform.default.css')) }}" rel="stylesheet" type="text/css"/>

	<link href="{{ _asset(ref('syrator.css')) }}" rel="stylesheet" type="text/css"/>
@stop

@section('head_js')
@parent
    <script src="{{ _asset(ref('jquery.js')) }}" type="text/javascript"></script>
	<script src="{{ _asset(ref('jquery-migrate.js')) }}" type="text/javascript"></script>
	<script src="{{ _asset(ref('jquery-ui.custom.js')) }}" type="text/javascript"></script>
	<script src="{{ _asset(ref('bootstrap.js')) }}" type="text/javascript"></script>
	<!--[if lt IE 9]>
	<script src="{{ _asset(ref('excanvas.js')) }}"></script>
	<script src="{{ _asset(ref('respond.js')) }}"></script>  
	<![endif]-->   
	<script src="{{ _asset(ref('jquery.slimscroll.js')) }}" type="text/javascript"></script>
	<script src="{{ _asset(ref('jquery.blockui.js')) }}" type="text/javascript"></script>
	<script src="{{ _asset(ref('jquery.cookie.js')) }}" type="text/javascript"></script>
	<script src="{{ _asset(ref('jquery.uniform.js')) }}" type="text/javascript" ></script>
	  
	<script src="http://res.wx.qq.com/open/js/jweixin-1.1.0.js" type="text/javascript"></script>	
	
	<script src="{{ _asset(ref('syrator.js')) }}" type="text/javascript" ></script>
@stop

@section('body')
    <!--侦测是否启用JavaScript脚本-->
    <noscript>
        <style type="text/css">
            .noscript{ 
                width:100%;
                height:100%;
                overflow:
            	hidden;
                background:#000;
                color:#fff;
                position:absolute;
                z-index:99999999;
                background-color:#000;
                opacity:1.0;
                filter:alpha(opacity=100);
                margin:0 auto;
                top:0;
                left:0;
            }
            .noscript h1{
                font-size:36px;
                margin-top:50px;
                text-align:center;
                line-height:40px;
            }
            html {
            	overflow-x:hidden;
            	overflow-y:hidden;
            }
        </style>
        <div class="noscript">
            <h1>您的浏览器不支持JavaScript，请启用后重试！</h1>
        </div>
    </noscript>

    @section('content-header')
    @show
    
    @section('content')
    @show
        
    @section('content-footer')
    @show

@stop

@section('afterBody')
    
    @section('extraPlugin')
	<script src="{{ _asset(ref('app.js')) }}"></script>
    @show

    @section('filledScript')
    @show

    @section('extraSection')
    @show

@stop

@section('front_footer')
@stop
