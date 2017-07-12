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
    			<a href="{{ site_url('admin', 'cms') }}" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">控制台</span>
                </a>
    		</li>
    		<li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-settings"></i>
                    <span class="title">文章管理</span>
                    <span class="arrow"></span>
                </a>
    			<ul class="sub-menu">
    				<li class="nav-item  ">
    					<a class="nav-link " href="{{ site_url('admin/article/article', 'cms') }}">
                            <span class="title">文章管理</span>
    					</a>
					</li>
    				<li class="nav-item  ">
    					<a class="nav-link " href="{{ site_url('admin/article/catalog', 'cms') }}">
    						<span class="title">类别管理</span>
    					</a>
    				</li>
    			</ul>
    		</li>
    	</ul>
    </div>
</div>