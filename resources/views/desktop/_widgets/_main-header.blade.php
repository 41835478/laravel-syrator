<div class="page-header navbar navbar-fixed-top">
    <div class="page-header-inner ">
        <div class="page-logo">
            <a href="">
                <img src="/assets/metronic/layouts/layout/img/logo.png" alt="logo" class="logo-default" />
            </a>
        </div>
        <div class="hor-menu hidden-sm hidden-xs">
            <ul class="nav navbar-nav">
            	<li class="classic-menu-dropdown active">
                    <a href="">首页<span class="selected"></span></a>
                </li>
                <li class="classic-menu-dropdown">                    
                    <a href="documents">文档</a>
                </li>                
                <li class="classic-menu-dropdown">                    
                    <a href="">应用</a>
                </li>
                <li class="classic-menu-dropdown">
                    <a href="javascript:;" data-hover="megamenu-dropdown" data-close-others="true">扩展<i class="fa fa-angle-down"></i></a>
                    <ul class="dropdown-menu pull-left">
                        <li>
                            <a href=""><i class="fa fa-user"></i> 关于我们 </a>
                        </li>
                        <li>
                            <a href=""><i class="fa fa-gift"></i> 问题与反馈 </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <form class="search-form" action="" method="GET">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="搜索..." name="query">
                <span class="input-group-btn">
                    <a href="javascript:;" class="btn submit">
                        <i class="icon-magnifier"></i>
                    </a>
                </span>
            </div>
        </form>
        <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
            <span></span>
        </a>
        @if(null !== auth()->user() && !empty(auth()->user()))
        <div class="top-menu">
            <ul class="nav navbar-nav pull-right">
            	<li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                        <i class="icon-bell"></i>
                        <span class="badge badge-default"> 7 </span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="external">
                            <h3><span class="bold">12 未读</span> 通知</h3>
                            <a href="">查看所有</a>
                        </li>
                        <li>
                            <ul class="dropdown-menu-list scroller" style="height: 250px;" data-handle-color="#637283">
                                <li>
                                    <a href="javascript:;">
                                        <span class="time">刚刚</span>
                                        <span class="details">
                                            <span class="label label-sm label-icon label-success">
                                                <i class="fa fa-plus"></i>
                                            </span>
                                            <span>新用户注册</span> 
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <span class="time">3分钟前</span>
                                        <span class="details">
                                            <span class="label label-sm label-icon label-danger">
                                                <i class="fa fa-bolt"></i>
                                            </span>
                                            <span>服务重载</span>
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="dropdown dropdown-extended dropdown-inbox" id="header_inbox_bar">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                        <i class="icon-envelope-open"></i>
                        <span class="badge badge-default"> 4 </span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="external">
                            <h3>您有<span class="bold">7条新</span>信息</h3>
                            <a href="">查看所有</a>
                        </li>
                        <li>
                            <ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">
                                <li>
                                    <a href="#">
                                        <span class="photo">
                                            <img src="/assets/metronic/layouts/layout3/img/avatar2.jpg" class="img-circle" alt=""> </span>
                                        <span class="subject">
                                            <span class="from"> Lisa Wong </span>
                                            <span class="time">刚刚 </span>
                                        </span>
                                        <span class="message"> Vivamus sed auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="photo">
                                            <img src="/assets/metronic/layouts/layout3/img/avatar3.jpg" class="img-circle" alt=""> </span>
                                        <span class="subject">
                                            <span class="from"> Richard Doe </span>
                                            <span class="time">16 分钟前 </span>
                                        </span>
                                        <span class="message"> Vivamus sed congue nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="photo">
                                            <img src="/assets/metronic/layouts/layout3/img/avatar1.jpg" class="img-circle" alt=""> </span>
                                        <span class="subject">
                                            <span class="from"> Bob Nilson </span>
                                            <span class="time">2 小时前 </span>
                                        </span>
                                        <span class="message"> Vivamus sed nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="dropdown dropdown-extended dropdown-tasks" id="header_task_bar">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                        <i class="icon-calendar"></i>
                        <span class="badge badge-default"> 3 </span>
                    </a>
                    <ul class="dropdown-menu extended tasks">
                        <li class="external">
                            <h3>您有<span class="bold">12项待处理</span>任务</h3>
                            <a href="">查看所有</a>
                        </li>
                        <li>
                            <ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">
                                <li>
                                    <a href="javascript:;">
                                        <span class="task">
                                            <span class="desc">新版本发布 v1.2 </span>
                                            <span class="percent">30%</span>
                                        </span>
                                        <span class="progress">
                                            <span style="width: 40%;" class="progress-bar progress-bar-success" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">
                                                <span class="sr-only">40% 已完成</span>
                                            </span>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <span class="task">
                                            <span class="desc">应用程序部署</span>
                                            <span class="percent">65%</span>
                                        </span>
                                        <span class="progress">
                                            <span style="width: 65%;" class="progress-bar progress-bar-danger" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100">
                                                <span class="sr-only">65% 已完成</span>
                                            </span>
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="dropdown dropdown-user">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                        <img alt="" class="img-circle" src="{{ auth()->user()->avatar }}" />
                        <span class="username username-hide-on-mobile"> {{auth()->user()->username }} </span>
                        <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-default">
                        <li>
                            <a href="{{ site_url('mine/info', 'admin') }}"><i class="icon-user"></i>个人资料</a>
                        </li>
                        <li>
                            <a href=""><i class="icon-rocket"></i>我的任务<span class="badge badge-success"> 7 </span></a>
                        </li>
                        <li class="divider"> </li>
                        <li>
                            <a href="{{ site_url('auth/logout', 'admin') }}"><i class="icon-key"></i>退出</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        @endif
    </div>
</div>