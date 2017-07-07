{{-- widget.main-header --}}
<div class="header navbar navbar-inverse navbar-fixed-top">
	<div class="navbar-inner">
		<div class="container-fluid">
			<a class="brand" href="">
				<img src="{{ _asset('assets/syrator/image/logo.png') }}" alt="logo" />
			</a>
			<div class="navbar hor-menu hidden-phone hidden-tablet">
				<div class="navbar-inner">
					<ul class="nav">
						<li class="visible-phone visible-tablet">
							<form class="sidebar-search">
								<div class="input-box">
									<a href="javascript:;" class="remove"></a>
									<input type="text" placeholder="搜索..." />
									<input type="button" class="submit" value=" " />
								</div>
							</form>
						</li>
						<li>
							<a href="">首页</a>
						</li>
						<li>
							<a href="documents">文档</a>
						</li>
						<li>
							<a href="">表格</a>
						</li>
						<li>
							<a data-toggle="dropdown" class="dropdown-toggle" href="">扩展
								<span class="arrow"></span>
							</a>
							<ul class="dropdown-menu">
								<li><a href="">关于我们</a></li>
								<li><a href="">问题与反馈</a></li>
							</ul>
							<b class="caret-out"></b>
						</li>
						<li>
							<span class="hor-menu-search-form-toggler">&nbsp;</span>
							<div class="search-form hidden-phone hidden-tablet">
								<form class="form-search">
									<div class="input-append">
										<input type="text" placeholder="搜索..." class="m-wrap">
										<button type="button" class="btn"></button>
									</div>
								</form>
							</div>
						</li>
					</ul>
				</div>
			</div>
			@if(null !== auth()->user() && !empty(auth()->user()))
			<a href="javascript:;" class="btn-navbar collapsed" data-toggle="collapse" data-target=".nav-collapse">
				<img src="/assets/metronic/image/menu-toggler.png" alt="" />
			</a>
			<ul class="nav pull-right">
				<li class="dropdown" id="header_notification_bar">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
					<i class="icon-bell"></i>
					<span class="badge">2</span>
					</a>
					<ul class="dropdown-menu extended notification">
						<li>
							<p>您有2条未读通知</p>
						</li>
						<li>
							<a href="#">
							<span class="label label-success"><i class="icon-plus"></i></span>
							王思聪投标了您的项目.
							<span class="time">刚刚</span>
							</a>
						</li>
						<li>
							<a href="#">
							<span class="label label-important"><i class="icon-bolt"></i></span>
							马云发布了新的项目需求，赶快去看看吧. 
							<span class="time">15分钟前</span>
							</a>
						</li>
						<li class="external">
							<a href="#">查看所有通知 <i class="m-icon-swapright"></i></a>
						</li>
					</ul>
				</li>
				<li class="dropdown" id="header_inbox_bar">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
    					<i class="icon-envelope"></i>
    					<span class="badge">1</span>
					</a>
					<ul class="dropdown-menu extended inbox">
						<li>
							<p>您有1条新信息</p>
						</li>
						<li>
							<a href="inbox.html?a=view">
							<span class="photo"><img src="/assets/metronic/image/avatar2.jpg" alt="" /></span>
							<span class="subject">
							<span class="from">王思聪</span>
							<span class="time">刚刚</span>
							</span>
							<span class="message">
							您好，我是王思聪...
							</span>  
							</a>
						</li>
						<li class="external">
							<a href="">查看所有消息 <i class="m-icon-swapright"></i></a>
						</li>
					</ul>
				</li>
				<li class="dropdown" id="header_task_bar">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
					<i class="icon-calendar"></i>
					<span class="badge">2</span>
					</a>
					<ul class="dropdown-menu extended tasks">
						<li>
							<p>您有2个待处理任务</p>
						</li>
						<li>
							<a href="#">
							<span class="task">
							<span class="desc">新版本发布 v1.2</span>
							<span class="percent">30%</span>
							</span>
							<span class="progress progress-success ">
							<span style="width: 30%;" class="bar"></span>
							</span>
							</a>
						</li>
						<li>
							<a href="#">
							<span class="task">
							<span class="desc">应用开发</span>
							<span class="percent">65%</span>
							</span>
							<span class="progress progress-danger progress-striped active">
							<span style="width: 65%;" class="bar"></span>
							</span>
							</a>
						</li>
						<li class="external">
							<a href="#">查看所有任务 <i class="m-icon-swapright"></i></a>
						</li>
					</ul>
				</li>
				<li class="dropdown user">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
    					<img class="img-circle" alt="{{ auth()->user()->username }}" src="{{ auth()->user()->avatar }}" />
    					<span class="username">{{auth()->user()->username }}</span>
    					<i class="icon-angle-down"></i>
					</a>
					<ul class="dropdown-menu">
						<li>
							<a href="{{ site_url('mine/info', 'admin') }}"><i class="icon-user"></i> 个人资料</a>
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
            @else
            @endif
		</div>
	</div>
</div>