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

<script src="{{ _asset('assets/metronic/pages/scripts/components-select2.min.js') }}"></script>
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
                    <label for="multiple" class="control-label">Select2 multi select</label>
                    <select id="multiple" class="form-control select2-multiple" multiple>
                        <optgroup label="Alaskan">
                            <option value="AK">Alaska</option>
                            <option value="HI" disabled="disabled">Hawaii</option>
                        </optgroup>
                        <optgroup label="Pacific Time Zone">
                            <option value="CA">California</option>
                            <option value="NV">Nevada</option>
                            <option value="OR">Oregon</option>
                            <option value="WA">Washington</option>
                        </optgroup>
                        <optgroup label="Mountain Time Zone">
                            <option value="AZ">Arizona</option>
                            <option value="CO">Colorado</option>
                            <option value="ID">Idaho</option>
                            <option value="MT">Montana</option>
                            <option value="NE">Nebraska</option>
                            <option value="NM">New Mexico</option>
                            <option value="ND">North Dakota</option>
                            <option value="UT">Utah</option>
                            <option value="WY">Wyoming</option>
                        </optgroup>
                        <optgroup label="Central Time Zone">
                            <option value="AL">Alabama</option>
                            <option value="AR">Arkansas</option>
                            <option value="IL">Illinois</option>
                            <option value="IA">Iowa</option>
                            <option value="KS">Kansas</option>
                            <option value="KY">Kentucky</option>
                            <option value="LA">Louisiana</option>
                            <option value="MN">Minnesota</option>
                            <option value="MS">Mississippi</option>
                            <option value="MO">Missouri</option>
                            <option value="OK">Oklahoma</option>
                            <option value="SD">South Dakota</option>
                            <option value="TX">Texas</option>
                            <option value="TN">Tennessee</option>
                            <option value="WI">Wisconsin</option>
                        </optgroup>
                        <optgroup label="Eastern Time Zone">
                            <option value="CT">Connecticut</option>
                            <option value="DE">Delaware</option>
                            <option value="FL">Florida</option>
                            <option value="GA">Georgia</option>
                            <option value="IN">Indiana</option>
                            <option value="ME">Maine</option>
                            <option value="MD">Maryland</option>
                            <option value="MA">Massachusetts</option>
                            <option value="MI">Michigan</option>
                            <option value="NH">New Hampshire</option>
                            <option value="NJ">New Jersey</option>
                            <option value="NY">New York</option>
                            <option value="NC">North Carolina</option>
                            <option value="OH">Ohio</option>
                            <option value="PA">Pennsylvania</option>
                            <option value="RI">Rhode Island</option>
                            <option value="SC">South Carolina</option>
                            <option value="VT">Vermont</option>
                            <option value="VA">Virginia</option>
                            <option value="WV">West Virginia</option>
                        </optgroup>
                    </select>
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