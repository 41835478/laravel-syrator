{{-- widget._main-header --}}
<div class="header navbar navbar-inverse navbar-fixed-top">
	<div class="navbar-inner">
		<div class="container-fluid">
			<a class="brand" href="{{ site_url('home', 'admin') }}"> 
				<img src="{{ _asset('/assets/metronic/image/logo.png') }}" alt="logo" />
			</a> 
			<a href="javascript:;" class="btn-navbar collapsed" data-toggle="collapse" data-target=".nav-collapse"> 
				<img src="{{ _asset('/assets/metronic/image/menu-toggler.png') }}" alt="" />
			</a>
			<ul class="nav pull-right">
				<li class="dropdown user">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"> 
						<img style="width: 29px; height: 29px;" alt="{{ auth()->user()->username }}" src="{{ auth()->user()->avatar }}" /> 
						<span class="username">{{auth()->user()->username }}</span> 
						<i class="icon-angle-down"></i>
					</a>
					<ul class="dropdown-menu">
						<li>
							<a href="{{ site_url('mine/inforation', 'admin') }}"><i class="icon-user"></i> 个人资料</a>
						</li>
						<li>
							<a href="#"><i class="icon-tasks"></i> 我的任务</a>
						</li>
						<li class="divider"></li>
						<li>
							<a href="{{ site_url('auth/logout', 'admin') }}"><i class="icon-key"></i> 退出</a>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</div>