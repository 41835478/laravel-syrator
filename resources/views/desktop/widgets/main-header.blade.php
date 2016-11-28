{{-- widget.main-header --}}

<!-- Navigation -->
<nav class="navbar navbar-default navbar-fixed-top topnav" role="navigation">
<div class="container topnav">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand topnav" href="http://www.syrator.com">SYRATOR</a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
            <li>
                <a href="http://www.syrator.com/documents/index">{{ trans('syrator.bottom_nav.doc') }}</a>
            </li>
            <li>
                <a href="http://www.syrator.com/blog">{{ trans('syrator.bottom_nav.blog') }}</a>
            </li>
            <li>
                <a href="http://shang.qq.com/wpa/qunwpa?idkey=c43a551e4bc0ff5c5051ec8f6d901ab21c1e89e3001d6cf0b0b4a28c0fa4d4f8" alt="云应用网络开发交流群：260655062" title="云应用网络开发交流群：260655062">{{ trans('syrator.bottom_nav.qq_group') }}</a>
            </li>
            <li>
                <a href="#intro">{{ trans('syrator.top_nav.intro') }}</a>
            </li>
            <li>
                <a href="#feature">{{ trans('syrator.top_nav.feature') }}</a>
            </li>
            <li>
                <a href="#contact">{{ trans('syrator.top_nav.contact') }}</a>
            </li>
            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-globe"></i>  {{ trans('syrator.lang.text') }}<b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="{{ _route('desktop:lang?lng=zh-CN') }}">{{ trans('syrator.lang.zh-CN') }}</a></li>
                  <li><a href="{{ _route('desktop:lang?lng=en') }}">{{ trans('syrator.lang.en') }}</a></li>
                </ul>
            </li>
        </ul>
    </div>
    <!-- /.navbar-collapse -->
</div>
<!-- /.container -->
</nav>
