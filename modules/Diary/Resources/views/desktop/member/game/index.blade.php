@extends('diary::desktop._layout._member')

@section('css_page_level_plugins')
@parent
<link href="{{ _asset('assets/metronic/global/plugins/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ _asset('assets/metronic/global/plugins/select2/css/select2-bootstrap.min.css') }}" rel="stylesheet" type="text/css" />

<link href="{{ _asset('assets/metronic/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ _asset('assets/metronic/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ _asset('assets/metronic/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ _asset('assets/metronic/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ _asset('assets/metronic/global/plugins/clockface/css/clockface.css') }}" rel="stylesheet" type="text/css" />
@stop

@section('js_page_level_plugins')
@parent
<script src="{{ _asset('assets/metronic/global/plugins/amcharts/amcharts/amcharts.js') }}" type="text/javascript"></script>
<script src="{{ _asset('assets/metronic/global/plugins/amcharts/amcharts/serial.js') }}" type="text/javascript"></script>
<script src="{{ _asset('assets/metronic/global/plugins/amcharts/amcharts/pie.js') }}" type="text/javascript"></script>
<script src="{{ _asset('assets/metronic/global/plugins/amcharts/amcharts/radar.js') }}" type="text/javascript"></script>
<script src="{{ _asset('assets/metronic/global/plugins/amcharts/amcharts/themes/light.js') }}" type="text/javascript"></script>
<script src="{{ _asset('assets/metronic/global/plugins/amcharts/amcharts/themes/patterns.js') }}" type="text/javascript"></script>
<script src="{{ _asset('assets/metronic/global/plugins/amcharts/amcharts/themes/chalk.js') }}" type="text/javascript"></script>
<script src="{{ _asset('assets/metronic/global/plugins/amcharts/ammap/ammap.js') }}" type="text/javascript"></script>
<script src="{{ _asset('assets/metronic/global/plugins/amcharts/ammap/maps/js/worldLow.js') }}" type="text/javascript"></script>
<script src="{{ _asset('assets/metronic/global/plugins/amcharts/amstockcharts/amstock.js') }}" type="text/javascript"></script>

<script src="{{ _asset('assets/metronic/global/plugins/select2/js/select2.full.min.js') }}" type="text/javascript"></script>

<script src="{{ _asset('assets/metronic/global/plugins/moment.min.js') }}" type="text/javascript"></script>
<script src="{{ _asset('assets/metronic/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js') }}" type="text/javascript"></script>
<script src="{{ _asset('assets/metronic/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}" type="text/javascript"></script>

@stop

@section('page-content-bar')
@parent
<ul class="page-breadcrumb">
    <li>
        <a href="{{ site_url('game', 'member') }}">首页</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <span>控制台</span>
    </li>
</ul>
@stop

@section('page-content-title')
@parent
{{cache('website_title')}}<small>会员中心</small>
@stop

@section('page-content-row')
@parent
<div class="row">
	<div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-body">                
                <div class="form-group">
                    <label for="multiple" class="control-label">请选择角色：（可多选）</label>
                    <div class="input-group select2-bootstrap-prepend">
                        <select id="multiple_select_role" class="form-control select2-multiple" multiple>
                        @foreach ($roles as $role) 
                            <option value="{{$role->id}}">{{$role->name}}</option>
                        @endforeach
                        </select>
                        <span class="input-group-btn">
                            <button id="btn_select_role" class="btn btn-default" type="button" data-select2-open="single-prepend-text">
                                <span class="glyphicon glyphicon-search"></span>
                            </button>
                        </span>
                    </div>
                </div>                
                <div class="form-group">
                    <label class="control-label">选择起始时间</label>
                    <div class="input-group">
                        <div class="input-group input-large date-picker input-daterange" data-date="10/11/2012" data-date-format="mm/dd/yyyy">
                            <input type="text" class="form-control" name="from" id="date_start">
                            <span class="input-group-addon"> 至 </span>
                            <input type="text" class="form-control" name="to" id="date_end"> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-12">
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="icon-bar-chart font-green-haze"></i>
                            <span class="caption-subject bold uppercase font-green-haze"> 汇总统计</span>
                            <span class="caption-helper">汇总统计</span>
                        </div>
                        <div class="tools">
                            <a href="javascript:;" class="collapse"> </a>
                            <a href="javascript:;" class="fullscreen"> </a>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div id="chart_stat" class="chart" style="height: 400px;"> </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('filledScript')
<script src="{{ _asset('assets/metronic/global/plugins/bootstrap-datepicker/locales/bootstrap-datepicker.zh-CN.min.js') }}" type="text/javascript"></script>
<script>
jQuery(document).ready(function() {
	$("#multiple_select_role").select2({
        placeholder: "请选择角色",
        width: null
    });

    $('.date-picker').datepicker({
        rtl: App.isRTL(),
        orientation: "bottom left",
        autoclose: true,
    	language: 'zh-CN', 
        format: 'yyyy-mm-dd',
    });

	$("#btn_select_role").click(function(){
		var idsRole = $("#multiple_select_role").val();
		var dateStrat = $("#date_start").val();
		var dateEnd = $("#date_end").val();		
		$.ajax({
			type:'post',
			url:'/member/game/stat',
			data: {
	           	 _token:$('meta[name="_token"]').attr('content'),
				role_ids: idsRole,
				date_start: dateStrat,
				date_end: dateEnd,
	    	}, 
			dataType:'json',
			async:true,
			success:function(data) {
				var code = data['code'];
				if(code == "200") {					
					setCharts("chart_stat",data['data']);
				} else {
					alert(data['description']);
				}
			}
		});
    });
});

function setCharts(divId,data) {
	var chart = AmCharts.makeChart(divId, {
        "type": "serial",
        "theme": "light",

        "fontFamily": 'Open Sans',
        "color":    '#888888',

        "legend": {
            "equalWidths": false,
            "useGraphSettings": true,
            "valueAlign": "left",
            "valueWidth": 120
        },
        "dataProvider": data,
        "valueAxes": [{
            "id": "scoreAxis",
            "axisAlpha": 0,
            "gridAlpha": 0,
            "position": "left",
            "title": "总战力"
        }, {
            "id": "favorAxis",
            "axisAlpha": 0,
            "gridAlpha": 0,
            "position": "right",
            "title": "好感度"
        }, {
            "id": "stoneAxis",
            "axisAlpha": 0,
            "gridAlpha": 0,
            "labelsEnabled": false,
            "position": "right"
        }],
        "graphs": [{
            "alphaField": "alpha",
            "balloonText": "[[value]]",
            "dashLengthField": "dashLength",
            "fillAlphas": 0.7,
            "legendValueText": "[[value]]",
            "title": "总战力",
            "type": "column",
            "valueField": "score",
            "valueAxis": "scoreAxis"
        }, {
            "bullet": "round",
            "bulletBorderAlpha": 1,
            "bulletBorderThickness": 1,
            "dashLengthField": "dashLength",
            "legendValueText": "[[value]]",
            "title": "好感度",
            "fillAlphas": 0,
            "valueField": "favor",
            "valueAxis": "favorAxis"
        }, {
            "bullet": "square",
            "bulletBorderAlpha": 1,
            "bulletBorderThickness": 1,
            "dashLengthField": "dashLength",
            "legendValueText": "[[value]]",
            "title": "魂石",
            "fillAlphas": 0,
            "valueField": "stone",
            "valueAxis": "stoneAxis"
        }],
        "chartCursor": {
            "categoryBalloonDateFormat": "DD",
            "cursorAlpha": 0.1,
            "cursorColor": "#000000",
            "fullWidth": true,
            "valueBalloonsEnabled": false,
            "zoomable": false
        },
        "dataDateFormat": "YYYY-MM-DD",
        "categoryField": "date",
        "categoryAxis": {
            "dateFormats": [{
                "period": "DD",
                "format": "DD"
            }, {
                "period": "WW",
                "format": "MMM DD"
            }, {
                "period": "MM",
                "format": "MMM"
            }, {
                "period": "YYYY",
                "format": "YYYY"
            }],
            "parseDates": true,
            "autoGridCount": false,
            "axisColor": "#555555",
            "gridAlpha": 0.1,
            "gridColor": "#FFFFFF",
            "gridCount": 50
        },
        "exportConfig": {
            "menuBottom": "20px",
            "menuRight": "22px",
            "menuItems": [{
                "icon": App.getGlobalPluginsPath() + "amcharts/amcharts/images/export.png",
                "format": 'png'
            }]
        }
    });

    $('#'+divId).closest('.portlet').find('.fullscreen').click(function() {
        chart.invalidateSize();
    });
}

</script>
@stop