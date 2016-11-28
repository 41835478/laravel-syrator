{{-- widget.cms-sidebar --}}

<!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top">    
    <div class="navbar-default" role="navigation">
    	<div class="sidebar-nav navbar-collapse">
    	    <ul class="nav" id="cms-side-menu">
    	        <li>
    				<a href="{{ site_url('cms', 'admin') }}"><i class="fa fa-dashboard fa-fw"></i> 内容管理（CMS）</a>
				</li>
                <li>
                    <a href="#"><i class="fa fa-sitemap fa-fw"></i> 文章管理<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                        	<a href="{{ site_url('cms/article-cat', 'admin') }}"><i class="fa fa-sitemap fa-fw"></i> 文章分类</a>
                        	<a href="{{ site_url('cms/article', 'admin') }}"><i class="fa fa-sitemap fa-fw"></i> 文章列表</a>                      	
                		</li>
                    </ul>
                </li>
    	    </ul>
    	</div>
    	<!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>