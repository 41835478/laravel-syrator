<div id="sidebar_article_right" class="page-sidebar nav-collapse">    
	<ul id="catalog_tree_menu" class="page-sidebar-menu">
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
	</ul>
</div>
<script type="text/javascript" src="{{ _asset('assets/js/tree-catalog.js') }}"></script>
<script type="text/javascript">
    var dData = new Array();
    @foreach ($catalogs as $k => $v)
    dData[{{$k+1}}] = $.parseJSON('{!!$v!!}');
    @endforeach
    
    var catMenuTree = new MenuTreeCatalog("#catalog_tree_menu", dData);
    catMenuTree.init();
</script>