@extends('_layout._common')

@section('head_css')
@parent
<style type="text/css">

body {
    color: #999;
    font: 14px/22px "Arial",sans-serif;
}
body, html {
    height: 100%;
    width: 100%;
}
html, body, body div, span, object, iframe, h1, h2, h3, h4, h5, h6, p, blockquote, pre, abbr, address, cite, code, del, dfn, em, img, ins, kbd, q, samp, small, strong, sub, sup, var, b, i, dl, dt, dd, ol, ul, li, fieldset, form, label, legend, table, caption, tbody, tfoot, thead, tr, th, td, article, aside, figure, footer, header, hgroup, menu, nav, section, time, mark, audio, video {
    background: transparent none repeat scroll 0 0;
    border: 0 none;
    font-size: 100%;
    margin: 0;
    outline: 0 none;
    padding: 0;
    vertical-align: baseline;
}

*, *::before, *::after {
    box-sizing: border-box;
}
*, *::before, *::after {
    box-sizing: border-box;
}
.blog_left {
    background: rgba(0, 0, 0, 0) url("/modules/cms/images/blog_left.jpg") no-repeat scroll 0 0 / 100% 100%;
    color: #333;
    height: 100%;
    padding: 30px 60px 50px 30px;
    position: fixed;
    width: 250px;
}
.blog_left {
    width: 300px;
}
.blog_left .blog_copyright {
    bottom: 25px;
    left: 30px;
    position: fixed;
}

.blog_left .blog_l_c .blog_l_t {
    color: #333;
    font-size: 24px;
}
h1, h2, p, ul {
    margin: 0 0 22px;
}
h2 {
    font-size: 22px;
}
h1, h2 {
    color: #666;
    font-weight: bold;
}
.blog_left .blog_l_c .blog_l_sign {
    color: #333;
    font-size: 14px;
    padding: 10px 0 30px;
}
.blog_left .blog_l_c .item_wrap {
    margin-left: -15px;
    overflow: hidden;
    padding-bottom: 20px;
}
.blog_left .blog_l_c .item_wrap .item_l {
    float: left;
    margin: 0 20px 20px 0;
    text-align: center;
    width: 50px;
}
ul, li, ol, dl, dd, dt, form {
    list-style: outside none none;
    margin: 0;
    padding: 0;
}
.blog_left .blog_l_c .item_wrap .item_l .item {
    color: #333;
    font-size: 24px;
    font-weight: bold;
}
dt {
    font-weight: bold;
}
dt, dd {
    line-height: 1.42857;
}
.blog_left .blog_l_c .item_wrap .item_l .item_name {
    font-size: 12px;
}
dt, dd {
    line-height: 1.42857;
}

.blog_left .blog_copyright {
    bottom: 25px;
    left: 30px;
    position: fixed;
}
.blog_left .blog_copyright p {
    color: #8a8a8a;
    font-size: 12px;
    line-height: 20px;
}
h1, h2, p, ul {
    margin: 0 0 22px;
}
</style>
@stop

@section('body_attr') class="page-header-fixed" @stop

@section('content-header')
@parent
@include('_widgets._main-header')
@stop

@section('content')
@include('cms::desktop._widgets._main-sidebar')
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