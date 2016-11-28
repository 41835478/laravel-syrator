{{-- widget.mygz-sidebar --}}

<!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top">    
    <div class="navbar-default" role="navigation">
    	<div class="sidebar-nav navbar-collapse">
    	    <ul class="nav" id="mygz-side-menu">
    	        <li>
    				<a href="{{ site_url('mygz', 'admin') }}"><i class="fa fa-dashboard fa-fw"></i> 蚂蚁公装后台管理</a>
				</li>
                <li>
                    <a href="#"><i class="fa fa-sitemap fa-fw"></i> 施工材料管理<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                        	<a href="{{ site_url('mygz/material', 'admin') }}"><i class="fa fa-sitemap fa-fw"></i> 施工材料</a>   
                        	<a href="{{ site_url('mygz/material/cat', 'admin') }}"><i class="fa fa-sitemap fa-fw"></i> 材料分类</a>                   	
                		</li>
                    </ul>
                </li>
    	    </ul>
    	</div>
    	<!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>