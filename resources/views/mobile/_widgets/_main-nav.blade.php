<nav class="mui-bar mui-bar-tab">
	<a class="mui-tab-item" href="{{ site_url('', 'mobile') }}" id="index">
		<span class="mui-icon mui-icon-home"></span>
		<span class="mui-tab-label">首页</span>
	</a>
	<a class="mui-tab-item" href="{{ site_url('forum', 'mobile') }}" id="cases">
		<span class="mui-icon mui-icon-image"></span>
		<span class="mui-tab-label">论坛</span>
	</a>
	<a class="mui-tab-item" href="{{ site_url('message', 'mobile') }}" id="message">
		<span class="mui-icon mui-icon-chatbubble"><span class="mui-badge">9</span></span>
		<span class="mui-tab-label">沟通</span>
	</a>
	<a class="mui-tab-item" href="{{ site_url('mine', 'mobile') }}" id="mine">
		<span class="mui-icon mui-icon-person"></span>
		<span class="mui-tab-label">我的</span>
	</a>
</nav>
<script type="text/javascript" charset="utf-8">
mui.init();
$(document).ready(function(){
    /*导航高亮*/
    var path_array = window.location.pathname.split( '/' );
    var scheme_less_url = '//' + window.location.host + window.location.pathname;
    if(path_array[2] === undefined || path_array[2] === 'index') {
        scheme_less_url = '//' + window.location.host + '/' + path_array[1] + '/';
    } else if(path_array[3] === undefined || parseInt(path_array[3]) == path_array[3]) {
      scheme_less_url = '//' + window.location.host + '/' + path_array[1] + '/' + path_array[2];
    }    
	$('nav').find('a[href="'+scheme_less_url+'"]').addClass('mui-active');
});
    
mui('.mui-bar-tab').on('tap', '.mui-tab-item', function() {  	  
	if (!mui.os.plus) {
    	//获取id
    	var id = this.getAttribute("id");
    	if (id==='index') {
    		mui.openWindow({
    			url: "{{ site_url('index', 'mobile') }}",
    			id: "index",
    		});
    		return;
    	} else if (id==='cases') {
    		mui.openWindow({
    			url: "{{ site_url('forum', 'mobile') }}",
    			id: "cases",
    		});
    		return;
    	} else if (id==='message') {
    		mui.openWindow({
    			url: "{{ site_url('message', 'mobile') }}",
    			id: "message",
    		});
    		return;
    	} else if (id==='mine') {
    		mui.openWindow({
    			url: "{{ site_url('mine', 'mobile') }}",
    			id: "mine",
    		});
    		return;
    	}
	}
});
</script> 