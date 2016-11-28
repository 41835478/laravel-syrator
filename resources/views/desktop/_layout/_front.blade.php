@extends('desktop._layout._base')

@section('head_css')
    <!-- Bootstrap Core CSS -->
    <link href="{{ _asset(ref('bootstrap.css')) }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ _asset('assets/css/landing-page.css') }}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{ _asset(ref('font-awesome.css')) }}" rel="stylesheet" type="text/css">
    <link href="{{ _asset('assets/Lato_300,400,700,300italic,400italic,700italic.css') }}" rel="stylesheet" type="text/css">
@stop

@section('head_js')
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="{{ _asset(ref('html5shiv.js')) }}"></script>
        <script src="{{ _asset(ref('respond.js')) }}"></script>
    <![endif]-->
@parent
@stop

@section('body')

<!--侦测是否启用JavaScript脚本-->
<noscript>
<style type="text/css">
.noscript{ width:100%;height:100%;overflow:hidden;background:#000;color:#fff;position:absolute;z-index:99999999; background-color:#000;opacity:1.0;filter:alpha(opacity=100);margin:0 auto;top:0;left:0;}
.noscript h1{font-size:36px;margin-top:50px;text-align:center;line-height:40px;}
html {overflow-x:hidden;overflow-y:hidden;}/*禁止出现滚动条*/
</style>
<div class="noscript">
<h1>
您的浏览器不支持JavaScript，请启用后重试！
</h1>
</div>
</noscript>

<!--wrapper start-->
    <div class="wrapper">

      @include('desktop.widgets.main-header')

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">

          @section('content-header')
          @show{{-- 内容导航头部 --}}

        </section>

        <!-- Main content -->
        <section class="content">

          @section('content')
          @show{{-- 内容主体区域 --}}

        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
    
    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="list-inline">
                        <li>
                            <a href="http://www.syrator.com">{{ trans('syrator.bottom_nav.home') }}</a>
                        </li>
                        <li class="footer-menu-divider">&sdot;</li>
                        <li>
                            <a href="http://www.syrator.com/documents/index">{{ trans('syrator.bottom_nav.doc') }}</a>
                        </li>
                        <li class="footer-menu-divider">&sdot;</li>
                        <li>
                            <a href="http://www.syrator.com/blog">{{ trans('syrator.bottom_nav.blog') }}</a>
                        </li>
                        <li class="footer-menu-divider">&sdot;</li>
                        <li>
                            <a href="https://github.com/syrator/base">{{ trans('syrator.bottom_nav.source') }}</a>
                        </li>
                        <li class="footer-menu-divider">&sdot;</li>
                        <li>
                            <a href="http://shang.qq.com/wpa/qunwpa?idkey=c43a551e4bc0ff5c5051ec8f6d901ab21c1e89e3001d6cf0b0b4a28c0fa4d4f8" alt="云应用网络开发交流群：260655062" title="云应用网络开发交流群：260655062">{{ trans('syrator.bottom_nav.qq_group') }}</a>
                        </li>
                    </ul>
                    <p class="copyright text-muted small">{!! trans('syrator.copyright_text', ['yas' => trans('syrator.yas'), 'yas_url' => trans('syrator.yas_url')]) !!}  ICP : <a href="http://www.miibeian.gov.cn/">{{ cache('website_icp', '鄂ICP备15014910号-3') }}</a></p>
                </div>
            </div>
        </div>
    </footer>

@stop

@section('afterBody')

    <!-- REQUIRED JS SCRIPTS -->

    <!-- jQuery 2.1.3 -->
    <script src="{{ _asset(ref('jquery.js')) }}"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="{{ _asset(ref('bootstrap.js')) }}" type="text/javascript"></script>
    <!-- AdminLTE App -->
    <script src="{{ _asset('back/dist/js/app.min.js') }}" type="text/javascript"></script>
    <!-- Slimscroll -->
    <script src="{{ _asset(ref('jquery.slimscroll.min.js')) }}" type="text/javascript"></script>
    
    @section('extraPlugin')
    @show{{-- 引入额外依赖JS插件 --}}

    <!-- AdminLTE for demo purposes -->
    <script src="{{ _asset('back/dist/js/syrator.js') }}" type="text/javascript"></script>
    
    <script type="text/javascript">
      $(document).ready(function(){
          @section('filledScript')
          @show
      });
    </script>

    @section('extraSection')
    @show{{-- 补充额外的一些东东，不一定是JS，可能是HTML --}}

@stop

@section('front_footer')

@stop
