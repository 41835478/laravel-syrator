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
		<li class="">
			<a href="{{ site_url('home', 'admin') }}">
				<i class="icon-home"></i><span class="title">控制台</span><span class="selected"></span>
			</a>
		</li>
		<li class="">
			<a href="{{ site_url('mine/info', 'admin') }}">
				<i class="icon-bookmark-empty"></i><span class="title">个人中心</span>
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
				<li ><a href="{{ site_url('system/appinfo', 'admin') }}"><i class="icon-cogs"></i> APP管理</a></li>
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
				<i class="icon-gift"></i><span class="title">会员管理</span><span class="arrow "></span>
			</a>
			<ul class="sub-menu">
				<li ><a href="{{ site_url('member/member', 'admin') }}"><i class="icon-cogs"></i> 所有会员</a></li>
				<li ><a href="{{ site_url('member/group', 'admin') }}"><i class="icon-cogs"></i> 会员分组</a></li>
			</ul>
		</li>
		<li class="">
			<a href="{{ site_url('wechat/admin') }}">
				<i class="icon-comments"></i><span class="title">微信公众号</span>
			</a>
		</li>
		<li class="">
			<a href="javascript:;">
				<i class="icon-briefcase"></i><span class="title">应用管理</span><span class="arrow "></span>
			</a>
			<ul class="sub-menu">
				<li ><a href="{{ site_url('cms/admin', '') }}" target="_blank"><i class="icon-cogs"></i> 内容管理</a></li>
				<li ><a href="{{ site_url('shop/admin', '') }}" target="_blank"><i class="icon-cogs"></i> 商城管理</a></li>
			</ul>
		</li>
	</ul>
</div>
<script type="text/javascript">
$(document).ready(function(){
    var current_url = '//' + window.location.host + window.location.pathname;
    
    var url_path_array = window.location.pathname.split( '/' );
    if (url_path_array[url_path_array.length-1]==='create') {
    	current_url = current_url.substring(0,current_url.length-7);
    } else if (url_path_array[url_path_array.length-1]==='edit') {
    	current_url = '//' + window.location.host;
    	for(var i=1; i<url_path_array.length-2;i++){
    		current_url += '/' + url_path_array[i];
   		}
    }

    var current_li = $('ul.page-sidebar-menu>li').find('a[href="'+current_url+'"]').closest('li');
    if (current_li!=null) {
    	current_li.addClass('active');
    }

    var current_parent = current_li.parent().parent();
    if (current_parent!=null) {
        current_parent.addClass('active');

    	var current_parent_a = current_parent.children('a');
    	if (current_parent_a!=null) {
        	// 添加状态
        	var spanObj = document.createElement('span');
        	spanObj.className = "selected";
    		current_parent_a.append(spanObj);

    		// 修改箭头指向
    		current_parent_a.children('span.arrow').addClass("open");
    	}
    }
});
</script>