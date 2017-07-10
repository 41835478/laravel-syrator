$(document).ready(function(){
    var current_url = '//' + window.location.host + window.location.pathname;
    
    var url_path_array = window.location.pathname.split( '/' );
    if (url_path_array[url_path_array.length-2]==='info' && url_path_array[url_path_array.length-1]==='setting') {
    	current_url = current_url.substring(0,current_url.length-7) + 'overview';
    } else if (url_path_array[url_path_array.length-2]==='appinfo' && url_path_array[url_path_array.length-1]==='guide') {
    	current_url = current_url.substring(0,current_url.length-6);
    } else if (url_path_array[url_path_array.length-3]==='appinfo' && url_path_array[url_path_array.length-2]==='guide') {
    	current_url = '//' + window.location.host;
    	for(var i=1; i<url_path_array.length-2;i++){
    		current_url += '/' + url_path_array[i];
   		}
    } else if (url_path_array[url_path_array.length-1]==='create') {
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