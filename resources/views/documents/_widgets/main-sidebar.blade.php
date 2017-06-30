      {{-- widget.main-sidebar --}}

      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

          <!-- Sidebar Menu -->
          <ul class="sidebar-menu">
            <li class="header">文档导航</li>
            
            <li><a href="#"><i class="fa fa-home"></i> <span>概论</span> </a></li>
            
            <li class="treeview">
              <a href="#">
                <i class='fa fa-square'></i>
                <span>1、简介</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
            	<li><a href="#"><i class="fa fa-square"></i>1.1、第一节</a></li>
                <li>
                  <a href="#"><i class="fa fa-square"></i>1.2、第一节
                  <i class="fa fa-angle-left pull-right"></i></a>
                  <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-file-o"></i>1.2.1、XXX</a></li>
                    <li><a href="#"><i class="fa fa-file-o"></i>1.2.2、XXX</a></li>
                  </ul>
                </li>
              </ul>
            </li>
            
            <li class="treeview">
              <a href="#">
                <i class="fa fa-edit"></i>
                <span>开发演示</span>
                <span class="label label-primary pull-right">3</span>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{ site_url('demo/form', 'document') }}"><i class="fa fa-file-o"></i>表单</a></li>
                <li><a href="{{ site_url('demo/icon', 'document') }}"><i class="fa fa-file-o"></i>图标</a></li>
                <li><a href="https://almsaeedstudio.com/" title="AdminLTE官网"><i class="fa fa-file-o"></i>AdminLTE官网</a></li>
              </ul>
            </li>

          </ul><!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
      </aside>