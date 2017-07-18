@extends('diary::desktop._layout._member')

@section('css_page_level_plugins')
@parent
<link href="{{ _asset('assets/metronic/global/plugins/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ _asset('assets/metronic/global/plugins/select2/css/select2-bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
@stop

@section('js_page_level_plugins')
@parent
<script src="{{ _asset('assets/metronic/global/plugins/amcharts/amcharts/amcharts.js') }}"></script>
<script src="{{ _asset('assets/metronic/global/plugins/amcharts/amcharts/serial.js') }}"></script>
<script src="{{ _asset('assets/metronic/global/plugins/amcharts/amcharts/pie.js') }}"></script>
<script src="{{ _asset('assets/metronic/global/plugins/amcharts/amcharts/radar.js') }}"></script>
<script src="{{ _asset('assets/metronic/global/plugins/amcharts/amcharts/themes/light.js') }}"></script>
<script src="{{ _asset('assets/metronic/global/plugins/amcharts/amcharts/themes/patterns.js') }}"></script>
<script src="{{ _asset('assets/metronic/global/plugins/amcharts/amcharts/themes/chalk.js') }}"></script>
<script src="{{ _asset('assets/metronic/global/plugins/amcharts/ammap/ammap.js') }}"></script>
<script src="{{ _asset('assets/metronic/global/plugins/amcharts/ammap/maps/js/worldLow.js') }}"></script>
<script src="{{ _asset('assets/metronic/global/plugins/amcharts/amstockcharts/amstock.js') }}"></script>

<script src="{{ _asset('assets/metronic/global/plugins/select2/js/select2.full.min.js') }}"></script>
@stop

@section('js_page_level')
@parent
<script src="{{ _asset('assets/metronic/pages/scripts/charts-amcharts.min.js') }}"></script>
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
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <!-- BEGIN ROW -->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN CHART PORTLET-->
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="icon-bar-chart font-green-haze"></i>
                            <span class="caption-subject bold uppercase font-green-haze"> Bar Charts</span>
                            <span class="caption-helper">column and line mix</span>
                        </div>
                        <div class="tools">
                            <a href="javascript:;" class="collapse"> </a>
                            <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                            <a href="javascript:;" class="reload"> </a>
                            <a href="javascript:;" class="fullscreen"> </a>
                            <a href="javascript:;" class="remove"> </a>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div id="chart_1" class="chart" style="height: 500px;"> </div>
                    </div>
                </div>
                <!-- END CHART PORTLET-->
            </div>
        </div>
        <!-- END ROW -->
        <!-- BEGIN ROW -->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN CHART PORTLET-->
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="icon-bar-chart font-green-haze"></i>
                            <span class="caption-subject bold uppercase font-green-haze"> Line & Area</span>
                            <span class="caption-helper">duration on value axis</span>
                        </div>
                        <div class="tools">
                            <a href="javascript:;" class="collapse"> </a>
                            <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                            <a href="javascript:;" class="reload"> </a>
                            <a href="javascript:;" class="fullscreen"> </a>
                            <a href="javascript:;" class="remove"> </a>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div id="chart_2" class="chart" style="height: 400px;"> </div>
                    </div>
                </div>
                <!-- END CHART PORTLET-->
            </div>
        </div>
        <!-- END ROW -->
        <!-- BEGIN ROW -->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN CHART PORTLET-->
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="icon-bar-chart font-green-haze"></i>
                            <span class="caption-subject bold uppercase font-green-haze"> Line & Area</span>
                            <span class="caption-helper">with changing color</span>
                        </div>
                        <div class="tools">
                            <a href="javascript:;" class="collapse"> </a>
                            <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                            <a href="javascript:;" class="reload"> </a>
                            <a href="javascript:;" class="fullscreen"> </a>
                            <a href="javascript:;" class="remove"> </a>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div id="chart_3" class="chart" style="height: 400px;"> </div>
                    </div>
                </div>
                <!-- END CHART PORTLET-->
            </div>
        </div>
        <!-- END ROW -->
        <!-- BEGIN ROW -->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN CHART PORTLET-->
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="icon-bar-chart font-green-haze"></i>
                            <span class="caption-subject bold uppercase font-green-haze"> Bar & Line</span>
                            <span class="caption-helper">bar and line chart mix</span>
                        </div>
                        <div class="tools">
                            <a href="javascript:;" class="collapse"> </a>
                            <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                            <a href="javascript:;" class="reload"> </a>
                            <a href="javascript:;" class="fullscreen"> </a>
                            <a href="javascript:;" class="remove"> </a>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div id="chart_4" class="chart" style="height: 400px;"> </div>
                    </div>
                </div>
                <!-- END CHART PORTLET-->
            </div>
        </div>
        <!-- END ROW -->
        <!-- BEGIN ROW -->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN CHART PORTLET-->
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="icon-bar-chart font-green-haze"></i>
                            <span class="caption-subject bold uppercase font-green-haze"> 3D Chart</span>
                            <span class="caption-helper">3d cylinder chart</span>
                        </div>
                        <div class="tools">
                            <a href="javascript:;" class="collapse"> </a>
                            <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                            <a href="javascript:;" class="reload"> </a>
                            <a href="javascript:;" class="fullscreen"> </a>
                            <a href="javascript:;" class="remove"> </a>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div id="chart_5" class="chart" style="height: 400px;"> </div>
                        <div class="well margin-top-20">
                            <div class="row">
                                <div class="col-sm-3">
                                    <label class="text-left">Top Radius:</label>
                                    <input class="chart_5_chart_input" data-property="topRadius" type="range" min="0" max="1.5" value="1" step="0.01" /> </div>
                                <div class="col-sm-3">
                                    <label class="text-left">Angle:</label>
                                    <input class="chart_5_chart_input" data-property="angle" type="range" min="0" max="89" value="30" step="1" /> </div>
                                <div class="col-sm-3">
                                    <label class="text-left">Depth:</label>
                                    <input class="chart_5_chart_input" data-property="depth3D" type="range" min="1" max="120" value="40" step="1" /> </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END CHART PORTLET-->
            </div>
        </div>
        <!-- END ROW -->
        <!-- BEGIN ROW -->
        <div class="row">
            <div class="col-md-6">
                <!-- BEGIN CHART PORTLET-->
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="icon-bar-chart font-green-haze"></i>
                            <span class="caption-subject bold uppercase font-green-haze"> Simple Pie Chart</span>
                        </div>
                        <div class="tools">
                            <a href="javascript:;" class="collapse"> </a>
                            <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                            <a href="javascript:;" class="reload"> </a>
                            <a href="javascript:;" class="fullscreen"> </a>
                            <a href="javascript:;" class="remove"> </a>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div id="chart_6" class="chart" style="height: 525px;"> </div>
                    </div>
                </div>
                <!-- END CHART PORTLET-->
            </div>
            <div class="col-md-6">
                <!-- BEGIN CHART PORTLET-->
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="icon-bar-chart font-green-haze"></i>
                            <span class="caption-subject bold uppercase font-green-haze"> 3D Pie Chart</span>
                            <span class="caption-helper">bar and line chart mix</span>
                        </div>
                        <div class="tools">
                            <a href="javascript:;" class="collapse"> </a>
                            <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                            <a href="javascript:;" class="reload"> </a>
                            <a href="javascript:;" class="fullscreen"> </a>
                            <a href="javascript:;" class="remove"> </a>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div id="chart_7" class="chart" style="height: 400px;"> </div>
                        <div class="well margin-top-20">
                            <div class="row">
                                <div class="col-sm-3">
                                    <label class="text-left">Top Radius:</label>
                                    <input class="chart_7_chart_input" data-property="topRadius" type="range" min="0" max="1.5" value="1" step="0.01" /> </div>
                                <div class="col-sm-3">
                                    <label class="text-left">Angle:</label>
                                    <input class="chart_7_chart_input" data-property="angle" type="range" min="0" max="89" value="30" step="1" /> </div>
                                <div class="col-sm-3">
                                    <label class="text-left">Depth:</label>
                                    <input class="chart_7_chart_input" data-property="depth3D" type="range" min="1" max="120" value="40" step="1" /> </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END CHART PORTLET-->
            </div>
        </div>
        <!-- END ROW -->
        <!-- BEGIN ROW -->
        <div class="row">
            <div class="col-md-6">
                <!-- BEGIN CHART PORTLET-->
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="icon-bar-chart font-green-haze"></i>
                            <span class="caption-subject bold uppercase font-green-haze"> Polar Chart</span>
                        </div>
                        <div class="tools">
                            <a href="javascript:;" class="collapse"> </a>
                            <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                            <a href="javascript:;" class="reload"> </a>
                            <a href="javascript:;" class="fullscreen"> </a>
                            <a href="javascript:;" class="remove"> </a>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div id="chart_8" class="chart" style="height: 400px;"> </div>
                    </div>
                </div>
                <!-- END CHART PORTLET-->
            </div>
            <div class="col-md-6">
                <!-- BEGIN CHART PORTLET-->
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="icon-bar-chart font-green-haze"></i>
                            <span class="caption-subject bold uppercase font-green-haze"> Radar Chart</span>
                            <span class="caption-helper">bar and line chart mix</span>
                        </div>
                        <div class="tools">
                            <a href="javascript:;" class="collapse"> </a>
                            <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                            <a href="javascript:;" class="reload"> </a>
                            <a href="javascript:;" class="fullscreen"> </a>
                            <a href="javascript:;" class="remove"> </a>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div id="chart_9" class="chart" style="height: 400px;"> </div>
                    </div>
                </div>
                <!-- END CHART PORTLET-->
            </div>
        </div>
        <!-- END ROW -->
        <!-- BEGIN ROW -->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN CHART PORTLET-->
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="icon-bar-chart font-green-haze"></i>
                            <span class="caption-subject bold uppercase font-green-haze"> Map with Bubbles</span>
                            <span class="caption-helper">world population</span>
                        </div>
                        <div class="tools">
                            <a href="javascript:;" class="collapse"> </a>
                            <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                            <a href="javascript:;" class="reload"> </a>
                            <a href="javascript:;" class="fullscreen"> </a>
                            <a href="javascript:;" class="remove"> </a>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div id="chart_10" class="chart" style="height: 600px;"> </div>
                    </div>
                </div>
                <!-- END CHART PORTLET-->
            </div>
        </div>
        <!-- END ROW -->
        <!-- BEGIN ROW -->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN CHART PORTLET-->
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="icon-bar-chart font-green-haze"></i>
                            <span class="caption-subject bold uppercase font-green-haze"> Flight Routes Map</span>
                            <span class="caption-helper">interactive flight routes map</span>
                        </div>
                        <div class="tools">
                            <a href="javascript:;" class="collapse"> </a>
                            <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                            <a href="javascript:;" class="reload"> </a>
                            <a href="javascript:;" class="fullscreen"> </a>
                            <a href="javascript:;" class="remove"> </a>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div id="chart_11" class="chart" style="height: 500px;"> </div>
                    </div>
                </div>
                <!-- END CHART PORTLET-->
            </div>
        </div>
        <!-- END ROW -->
        <!-- BEGIN ROW -->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN CHART PORTLET-->
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="icon-bar-chart font-green-haze"></i>
                            <span class="caption-subject bold uppercase font-green-haze"> Stock Charts</span>
                            <span class="caption-helper">with stock events</span>
                        </div>
                        <div class="tools">
                            <a href="javascript:;" class="collapse"> </a>
                            <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                            <a href="javascript:;" class="reload"> </a>
                            <a href="javascript:;" class="fullscreen"> </a>
                            <a href="javascript:;" class="remove"> </a>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div id="chart_12" class="chart" style="height: 500px;"> </div>
                    </div>
                </div>
                <!-- END CHART PORTLET-->
            </div>
        </div>
        <!-- END ROW -->
    </div>
</div>
@stop

@section('filledScript')
<script>
jQuery(document).ready(function() {
	$("#multiple_select_role").select2({
        placeholder: "请选择角色",
        width: null
    });

	$("#btn_select_role").click(function(){
		alert($("#multiple_select_role").val());
    });
});
</script>
@stop