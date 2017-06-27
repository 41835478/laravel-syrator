function MenuTreeCatalog(elemId, dData) {
	this.elemId = elemId;  
    this.dData = dData;
    
    var createTableTree = function(data){
    	var html = "";
    	if(data != null) {
    		if(data.sub_catalogs != null && data.sub_catalogs.length>0) {
        		html += '<li class="">';
    			html += '<a href="">';
    			html += '<i class="icon-home"></i><span class="title">' + data.name + '</span><span class="arrow "></span>';
    			html += '</a>';
				html += '<ul class="sub-menu">';
    			for(var i=0; i<data.sub_catalogs.length; i++) {
    				html += createTableTree(data.sub_catalogs[i]);
    			}
				html += '</ul>';
				html += '</li>';
    		} else {
        		html += '<li class="">';
    			html += '<a href="">';
    			html += '<i class="icon-home"></i><span class="title">' + data.name + '</span></span>';
    			html += '</a>';
				html += '</li>';
    		}
    	}  

    	return html;  
    }
   
    this.init = function() {
    	var html = "";
		for(var i=0; i<this.dData.length; i++) {
			html += createTableTree(this.dData[i]);	
		}
    	$(this.elemId).append(html);
    };
};