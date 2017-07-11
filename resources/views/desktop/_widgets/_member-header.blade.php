<div class="page-header navbar navbar-fixed-top">
	<div class="page-header-inner">
    	<div class="page-logo">
            <a href="{{ site_url('home', 'admin') }}">
                <img src="{{ _asset('assets/syrator/image/logo.png') }}" alt="logo" class="logo-default" /> 
            </a>
            <div class="menu-toggler sidebar-toggler">
                <span></span>
            </div>
        </div>
        <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
            <span></span>
        </a>
		<div class="top-menu">
			<ul class="nav navbar-nav pull-right">
				<li class="dropdown dropdown-user">
					<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                        <img alt="" class="img-circle" src="{{ auth()->guard('member')->user()->headimg }}" />
                        <span class="username username-hide-on-mobile"> {{ auth()->guard('member')->user()->nickname }} </span>
                        <i class="fa fa-angle-down"></i>
                    </a>
					<ul class="dropdown-menu dropdown-menu-default">
						<li>
							<a href="{{ site_url('mine/info/overview', 'member') }}"><i class="icon-user"></i> 个人资料</a>
						</li>
						<li>
							<a href="{{ site_url('mine/task', 'member') }}"><i class="icon-rocket"></i> 我的任务</a>
						</li>
						<li class="divider"></li>
						<li>
							<a href="{{ site_url('auth/logout', 'member') }}"><i class="icon-key"></i> 退出</a>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</div>