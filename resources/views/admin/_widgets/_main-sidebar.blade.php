{{-- widget._main-sidebar --}}
<div class="page-sidebar nav-collapse collapse">    
	<ul class="page-sidebar-menu">
		<li>
			<div class="sidebar-toggler hidden-phone"></div>
		</li>
		<li>
			<form class="sidebar-search">
				<div class="input-box">
					<a href="javascript:;" class="remove"></a>
					<input type="text" placeholder="搜索..." />
					<input type="button" class="submit" value=" " />
				</div>
			</form>
		</li>
		<li class="start active ">
			<a href="{{ site_url('home', 'admin') }}">
				<i class="icon-home"></i><span class="title">控制台</span><span class="selected"></span>
			</a>
		</li>
		<li class="">
			<a href="javascript:;">
				<i class="icon-cogs"></i><span class="title">系统管理</span><span class="arrow "></span>
			</a>
			<ul class="sub-menu">
				<li ><a href="{{ site_url('system/cache', 'admin') }}"><i class="icon-cogs"></i> 重建缓存</a></li>
				<li ><a href="{{ site_url('system/option', 'admin') }}"><i class="icon-cogs"></i> 参数配置</a></li>
				<li ><a href="{{ site_url('system/log', 'admin') }}"><i class="icon-cogs"></i> 系统日志</a></li>
				<li ><a href="{{ site_url('system/theme', 'admin') }}"><i class="icon-cogs"></i> 模板管理</a></li>
			</ul>
		</li>
		<li class="">
			<a href="javascript:;">
				<i class="icon-bookmark-empty"></i><span class="title">个人中心</span><span class="arrow "></span>
			</a>
			<ul class="sub-menu">
				<li ><a href="{{ site_url('mine/inforation', 'admin') }}"><i class="icon-cogs"></i> 个人资料</a></li>
				<li ><a href="{{ site_url('mine/password', 'admin') }}"><i class="icon-cogs"></i> 修改密码</a></li>
			</ul>
		</li>
		<li class="">
			<a href="javascript:;">
				<i class="icon-table"></i><span class="title">权限管理</span><span class="arrow "></span>
			</a>
			<ul class="sub-menu">
				<li ><a href="{{ site_url('permission/user', 'admin') }}"><i class="icon-cogs"></i> 管理员</a></li>
				<li ><a href="{{ site_url('permission/role', 'admin') }}"><i class="icon-cogs"></i> 角色</a></li>
				<li ><a href="{{ site_url('permission/permission', 'admin') }}"><i class="icon-cogs"></i> 权限</a></li>
			</ul>
		</li>
		<li class="">
			<a href="javascript:;">
				<i class="icon-briefcase"></i><span class="title">应用管理</span><span class="arrow "></span>
			</a>
			<ul class="sub-menu">
				<li ><a href="{{ site_url('cms', 'admin') }}"><i class="icon-cogs"></i> CMS应用</a></li>
				<li ><a href="{{ site_url('mygz', 'admin') }}"><i class="icon-cogs"></i> 蚂蚁公装</a></li>
			</ul>
		</li>
		<li class="">
			<a href="javascript:;">
				<i class="icon-gift"></i><span class="title">会员管理</span><span class="arrow "></span>
			</a>
			<ul class="sub-menu">
				<li ><a href="{{ site_url('member', 'admin') }}"><i class="icon-cogs"></i> 所有会员</a></li>
				<li ><a href="{{ site_url('member/group', 'admin') }}"><i class="icon-cogs"></i> 会员分组</a></li>
			</ul>
		</li>
	</ul>
</div>