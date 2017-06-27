function MenuTreeCatalog(elemId, dData) {
	this.elemId = elemId;  
    this.dData = dData;
    
    alert(this.elemId);
    alert(this.dData);
    
    var onClick = function(e, treeId, treeNode) {
    	var zTree = $.fn.zTree.getZTreeObj("select_tree_items_" + elemId),
		nodes = zTree.getSelectedNodes(),
		v = "";
		nodes.sort(function compare(a,b){return a.id-b.id;});
		for (var i=0, l=nodes.length; i<l; i++) {
			v += nodes[i].name + ",";
		}
		if (v.length > 0 ) v = v.substring(0, v.length-1);
		var parentObj = $("#" + elemId);
		parentObj.attr("value", v);
		
		hideSelectTree();
	};
	
	var showSelectTree = function() {
		var parentObj = $("#" + elemId);
		var cityOffset = $("#" + elemId).offset();
		$("#select_tree_" + elemId).css({
			left:cityOffset.left + "px", 
			top:cityOffset.top + parentObj.outerHeight() + "px"}
		).slideDown("fast");
		$("#select_tree_" + elemId).addClass("active");
		
		$("body").bind("mousedown", onBodyDown);
	};
	
	var hideSelectTree = function() {
		$("#select_tree_" + elemId).fadeOut("fast");
		$("#select_tree_" + elemId).removeClass("active");
		
		$("body").unbind("mousedown", onBodyDown);
	};
	
	var onBodyDown = function(event) {
		if (!(event.target.id == "btn_" + elemId 
			|| event.target.id == "select_tree_" + elemId 
			|| $(event.target).parents("#select_tree_" + elemId).length>0)) {
			hideSelectTree();
		}
	};
   
    this.init = function() {
		
    };
};