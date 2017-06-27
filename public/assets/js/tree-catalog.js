function MenuTreeCatalog(elemId, dData) {
	this.elemId = elemId;  
    this.dData = dData;
    
    var createTableTree = function(data){
    	var html = "";
    	if(data != null) {
    		if (data.pid > 0) {
    			html += '<tr data-tt-id="' + data.id +'" data-tt-parent-id="' + data.pid +'">';
    		} else {
    			html += '<tr data-tt-id="' + data.id +'">';
    		}		
    		html += '<td>' + data.name + '</td>';
    		html += '<td>' + data.description + '</td>';
    		html += '<td style="text-align:center;">' + data.sort_num + '</td>';
    		if (data.is_show==1) {
    			html += '<td class="text-red" style="text-align:center;"><i class="icon-ok"></i></td>';
    		} else {
    			html += '<td class="text-red" style="text-align:center;"><i class="icon-remove"></i></td>';
    		}
    		html += '<td style="text-align:center;">';
    		html += '</td>';
    		html += "</tr>" ;
    		if(data.sub_catalogs != null) {		
    			for(var i=0; i<data.sub_catalogs.length; i++) {
    				html += createTableTree(data.sub_catalogs[i]);				
    			}
    		}
    	}  

    	return html;  
    }
   
    this.init = function() {
//    	var html = "";
//		for(var i=0; i<this.dData.length; i++) {
//			html += createTableTree(this.dData[i]);	
//		}
//		console.log(html);
//		console.log($(elemId));
    	var objTree = $("sidebar_article_right");
    	console.log(objTree);
    	objTree.append('<li class=""><a href=""><i class="icon-home"></i><span class="title">控制台</span><span class="selected"></span></a></li>');
    };
};