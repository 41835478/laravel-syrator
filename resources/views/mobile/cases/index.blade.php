@extends('mobile._layout._layer_main') 

@section('body_attr') class="mui-fullscreen" @stop

@section('beforeBody')
<header class="mui-bar mui-bar-nav" style="height:70px;">
	<div style="padding: 10px 10px;">
		<div id="segmentedControl" class="mui-segmented-control">
			<a class="mui-control-item mui-active" href="#case">案例</a> 
			<a class="mui-control-item" href="#gallery">图库</a>
		</div>
	</div>
</header>
@stop

@section('content')
<div class="mui-content">
	<div id="case" class="mui-page-content mui-control-content mui-active" style="margin-top:70px;">		
		<div id="sliderCase" class="mui-slider">
			<div id="sliderSegmentedControl" class="table-sort-by mui-slider-indicator mui-segmented-control mui-segmented-control-inverted">
				<a class="mui-control-item mui-active" href="#sortby_default1">综合<span class="arrow_up active_up"></span><span class="arrow_down"></span></a>
				<a class="mui-control-item" href="#sortby_price1">价格<span class="arrow_up active_up"></span><span class="arrow_down"></span></a>
				<a class="mui-control-item" href="#sortby_sales1">销量<span class="arrow_up active_up"></span><span class="arrow_down"></span></a>
				<a class="mui-control-item" href="#about1">筛选</a>
			</div>			
		</div>
		<div class="mui-scroll-wrapper" style="margin-top: 39px;margin-bottom:120px;">
			<div class="mui-scroll">
				<ul class="mui-table-view mui-grid-view" id="mui-table-view-list1">
    		        <li class="mui-table-view-cell mui-media mui-col-xs-6">
    		        	<a href="" class="item">    					
    		                <img class="mui-media-object" src="http://yibuzhimei.com/images/201607/thumb_img/278_thumb_G_1468706920602.jpg">
    		                <div class="mui-media-body">案例</div>
    					</a>
            		</li>
    		    </ul>
			</div>
		</div>
    </div>
    <div id="gallery" class="mui-page-content mui-control-content" style="margin-top:70px;">
		<div id="sliderGallery" class="mui-slider">
			<div id="sliderSegmentedControl" class="table-sort-by mui-slider-indicator mui-segmented-control mui-segmented-control-inverted">
				<a class="mui-control-item mui-active" href="#sortby_default2">综合<span class="arrow_up active_up"></span><span class="arrow_down"></span></a>
				<a class="mui-control-item" href="#sortby_price2">收藏<span class="arrow_up active_up"></span><span class="arrow_down"></span></a>
				<a class="mui-control-item" href="#sortby_sales2">点赞<span class="arrow_up active_up"></span><span class="arrow_down"></span></a>
				<a class="mui-control-item" href="#about2">筛选</a>
			</div>
		</div>
		<div class="mui-scroll-wrapper" style="margin-top: 39px;margin-bottom:120px;">
			<div class="mui-scroll">
				<ul class="mui-table-view mui-grid-view" id="mui-table-view-list2">
				</ul>
			</div>
		</div>
    </div>
</div>
@stop

@section('afterBody')
@parent
<script src="{{ _asset('assets/syrator/wap/js/mui.view.js') }}"></script>
<script>
//初始化单页的区域滚动
mui('.mui-scroll-wrapper').scroll();

loadData();
function loadData() {
	$.ajax({
		type:'post',
		url:'/api/device/list',
		dataType:'json',
		async:true,
		success:function(data) {
			var code = data['code'];
			if(code == "200") {
				var d = data['data'];
				if(d.length == 0) {
					index--;
				}
				for(var i=0; i<d.length; i++) {
					var html = "";

					html += '<li class="mui-table-view-cell mui-media mui-col-xs-6">';
					html += '<a href="" class="item">';
					html += '<img class="mui-media-object" src="http://yibuzhimei.com/images/201607/thumb_img/278_thumb_G_1468706920602.jpg">'
					html += '<div class="mui-media-body">' + d[i].goods_name + '</div>'
					html += '</a>';
					html += '</li>';
					
					$("#mui-table-view-list1").append(html);
					$("#mui-table-view-list2").append(html);
				}
			} else {
				alert("读取内容失败");
			}
		}
	});
}
</script>
@stop
