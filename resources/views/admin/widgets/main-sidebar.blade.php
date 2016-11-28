{{-- widget.main-sidebar --}}

<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

	<!-- sidebar: style can be found in sidebar.less -->
	<section class="sidebar">

		<!-- Sidebar user panel (optional) -->
		<div class="user-panel">
			<div class="pull-left image">
				<img src="{{ _asset('back/dist/img/20150417113714.jpg') }}" class="img-circle" alt="User Image" />
			</div>
			<div class="pull-left info">
				<p>{{ auth()->user()->realname }}</p>
				<!-- Status -->
				<a href="#"><i class="fa fa-circle text-success"></i> 在线</a>
			</div>
		</div>

		<!-- search form (Optional) -->
		<form action="#" method="get" class="sidebar-form">
			<div class="input-group">
				<input type="text" name="q" class="form-control" placeholder="搜索..." />
				<span class="input-group-btn">
					<button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
				</span>
			</div>
		</form>
		<!-- /.search form -->

		<!-- Sidebar Menu -->
		<ul class="sidebar-menu">
			<li class="header">主导航栏</li>

			<li><a href="{{ site_url('home', 'admin') }}"><i class="fa fa-home"></i><span>控制台</span> </a></li>

			<!--系统管理 treeview-->
			<li class="treeview">
				<a href="#"> 
					<i class='fa fa-cogs'></i> 
					<span>系统管理</span>
					<i class="fa fa-angle-left pull-right"></i>
				</a>
				<ul class="treeview-menu">
					<li><a href="{{ site_url('system/cache', 'admin') }}"><i class="fa fa-eraser"></i>重建缓存</a></li>
					<li><a href="{{ site_url('system/option', 'admin') }}"><i class="fa fa-cog"></i>参数配置</a></li>
					<li><a href="{{ site_url('system/log', 'admin') }}"><i class="fa fa-sticky-note"></i>系统日志</a></li>
					<li><a href="{{ site_url('system/theme', 'admin') }}"><i class="fa fa-cubes"></i>模板管理</a></li>
				</ul>
			</li>

			<!--个人设置 treeview-->
			<li class="treeview">
				<a href="#"> <i class='fa fa-heartbeat'></i> <span>用户中心</span><i class="fa fa-angle-left pull-right"></i></a>
				<ul class="treeview-menu">
					@can('meinforation')
					<li><a href="{{ site_url('mine/inforation', 'admin') }}"><i class="fa fa-user"></i>个人资料</a></li> 
					@endcan 
					@can('mepassword')
					<li><a href="{{ site_url('mine/password', 'admin') }}"><i class="fa fa-shield"></i>修改密码</a></li> 
					@endcan
				</ul>
			</li>

			<!--权限管理 treeview-->
			<li class="treeview">
				<a href="#"> <i class='fa fa-user-secret'></i> <span>权限管理</span><i class="fa fa-angle-left pull-right"></i></a>
				<ul class="treeview-menu">
					@can('@user')
					<li><a href="{{ site_url('permission/user', 'admin') }}"><i class="fa fa-users"></i>管理员</a></li> 
					@endcan 
					@can('@role')
					<li><a href="{{ site_url('permission/role', 'admin') }}"><i class="fa fa-user-md"></i>角色</a></li> 
					@endcan 
					@can('@permission')
					<li><a href="{{ site_url('permission/permission', 'admin') }}"><i class="fa fa-yelp"></i>权限</a></li> 
					@endcan
				</ul>
			</li>

			<!--应用管理 treeview-->
			<li class="treeview">
				<a href="#"> <i class='fa fa-chrome'></i> <span>应用管理</span><i class="fa fa-angle-left pull-right"></i></a>
				<ul class="treeview-menu">
					<li><a href="{{ site_url('cms', 'admin') }}"><i class="fa fa-square-o"></i>CMS应用</a></li>
					<li><a href="{{ site_url('mygz', 'admin') }}"><i class="fa fa-square-o"></i>蚂蚁公装</a></li>
				</ul>
			</li>

			<!--会员管理 treeview-->
			<li class="treeview">
				<a href="#"> <i class='fa fa-user'></i> <span>会员管理</span><i class="fa fa-angle-left pull-right"></i></a>
				<ul class="treeview-menu">
					<li><a href="{{ site_url('member', 'admin') }}"><i class="fa fa-square-o"></i>所有会员</a></li>
					<li><a href="{{ site_url('member/group', 'admin') }}"><i class="fa fa-square-o"></i>会员分组</a></li>
				</ul>
			</li>

		</ul>
		<!-- /.sidebar-menu -->
	</section>
	<!-- /.sidebar -->
</aside>