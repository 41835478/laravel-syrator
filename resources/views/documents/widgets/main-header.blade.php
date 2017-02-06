      {{-- widget.main-header --}}

      <!-- Main Header -->
      <header class="main-header">

        <!-- Logo -->
        <a href="#" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>SYR</b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>{{cache('website_title')}}</b></span>
        </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <li>
                <a href="{{ site_url('documents', '') }}" target="_blank">
                  <span class="hidden-xs">系统设计文档</span>
                </a>
              </li>
              <li>
                <a href="{{ site_url('documents', '') }}" target="_blank">
                  <span class="hidden-xs">二次开发文档</span>
                </a>
              </li>
              <li>
                <a href="{{ site_url('documents', '') }}" target="_blank">
                  <span class="hidden-xs">数据库文档</span>
                </a>
              </li>
              <li>
                <a href="{{ site_url('docs', 'api') }}" target="_blank">
                  <span class="hidden-xs">API文档</span>
                </a>
              </li>
            </ul>
          </div>
        </nav>
      </header>
