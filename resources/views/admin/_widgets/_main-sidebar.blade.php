<div class="page-sidebar-wrapper">
	<div class="page-sidebar navbar-collapse collapse">
    	<ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
    		<li class="sidebar-toggler-wrapper hide">
                <div class="sidebar-toggler">
                    <span></span>
                </div>
            </li>
            <li class="sidebar-search-wrapper">
                <form class="sidebar-search" action="" method="POST">
                    <a href="javascript:;" class="remove">
                        <i class="icon-close"></i>
                    </a>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="搜索...">
                        <span class="input-group-btn">
                            <a href="javascript:;" class="btn submit">
                                <i class="icon-magnifier"></i>
                            </a>
                        </span>
                    </div>
                </form>
            </li>
            <li class="nav-item start">
    			<a href="{{ site_url('home', 'admin') }}" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">控制台</span>
                </a>
    		</li>
    		<li class="nav-item  ">
    			<a href="{{ site_url('mine/info/overview', 'admin') }}" class="nav-link nav-toggle">
                    <i class="icon-user"></i>
                    <span class="title">个人中心</span>
                </a>
    		</li>
    		<li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-settings"></i>
                    <span class="title">系统管理</span>
                    <span class="arrow"></span>
                </a>
    			<ul class="sub-menu">
    				<li class="nav-item  ">
    					<a class="nav-link " href="{{ site_url('system/cache', 'admin') }}">
                            <span class="title">重建缓存</span>
    					</a>
					</li>
    				<li class="nav-item  ">
    					<a class="nav-link " href="{{ site_url('system/option', 'admin') }}">
    						<span class="title">参数配置</span>
    					</a>
    				</li>
    				<li class="nav-item  ">
    					<a class="nav-link " href="{{ site_url('system/log', 'admin') }}">
    						<span class="title">系统日志</span>
						</a>
					</li>
    				<li class="nav-item  ">
    					<a class="nav-link " href="{{ site_url('system/theme', 'admin') }}">
    						<span class="title">模板管理</span>
						</a>
					</li>
    				<li class="nav-item  ">
    					<a class="nav-link " href="{{ site_url('system/appinfo', 'admin') }}">
    						<span class="title">APP管理</span>
						</a>
					</li>
    			</ul>
    		</li>
    		<li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-diamond"></i>
                    <span class="title">权限管理</span>
                    <span class="arrow"></span>
                </a>
    			<ul class="sub-menu">
    				<li class="nav-item  ">
    					<a class="nav-link " href="{{ site_url('permission/user', 'admin') }}">
    						<span class="title">管理员</span>
						</a>
					</li>
    				<li class="nav-item  ">
    					<a class="nav-link " href="{{ site_url('permission/role', 'admin') }}">
    						<span class="title">角色</span>
						</a>
					</li>
    				<li class="nav-item  ">
    					<a class="nav-link " href="{{ site_url('permission/permission', 'admin') }}">
    						<span class="title">权限</span>
						</a>
					</li>
    			</ul>
    		</li>
    		<li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-users"></i>
                    <span class="title">会员管理</span>
                    <span class="arrow"></span>
                </a>
    			<ul class="sub-menu">
    				<li class="nav-item  ">
    					<a class="nav-link " href="{{ site_url('member/member', 'admin') }}">
    						<span class="title">所有会员</span>
						</a>
					</li>
    				<li class="nav-item  ">
    					<a class="nav-link " href="{{ site_url('member/group', 'admin') }}">
    						<span class="title">会员分组</span>
						</a>
					</li>
    			</ul>
    		</li>   		
    		<li class="nav-item  ">
    			<a href="{{ site_url('wechat/admin') }}" class="nav-link nav-toggle">
                    <i class="fa fa-wechat"></i>
                    <span class="title">微信公众号</span>
                </a>
    		</li>    		
    		<li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-docs"></i>
                    <span class="title">应用管理</span>
                    <span class="arrow"></span>
                </a>
    			<ul class="sub-menu">
    				<li class="nav-item  ">
    					<a class="nav-link " href="{{ site_url('admin', 'cms') }}" target="_blank">
    						<span class="title">内容管理</span>
						</a>
					</li>
    				<li class="nav-item  ">
    					<a class="nav-link " href="{{ site_url('admin', 'shop') }}" target="_blank">
    						<span class="title">商城管理</span>
						</a>
					</li>
    			</ul>
    		</li>
    	</ul>
    </div>
</div>