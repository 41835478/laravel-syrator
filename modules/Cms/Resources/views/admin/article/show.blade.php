@extends('_layout._common')

@section('head_css')
@parent
<link rel="stylesheet" type="text/css" href="{{ _asset('assets/metronic/css/select2_metro.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ _asset('assets/metronic/css/DT_bootstrap.css') }}" />
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
<div class="docs-wrapper" style="margin:60px 20px 10px 20px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-7 col-sm-6">
                <article id="article">
					{{ $entity->content }}
                </article>
            </div>
            <div class="col-lg-4 col-md-5 col-sm-6">
                <div class="docs-nav bg-info">
                    <h3>目录</h3>
                    <section>
                    </section>
                </div>

            </div>
        </div>
    </div>
</div>
@stop

@section('filledScript')

	$(function() {
        $("#content").html(noEscapeHtml($("#content").html()));
    });

    $(function() {
        $("#article").html(noEscapeHtml($("#content").html()));
    });

   function noEscapeHtml(html) {
        return html.replace(/(\&|\&)gt;/g, ">")
                .replace(/(\&|\&)lt;/g, "<")
                .replace(/(\&|\&)quot;/g, "\"");
    }

@stop
