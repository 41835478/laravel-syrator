@extends('diary::desktop._layout._member')

@section('css_page_level')
@parent
<link href="{{ _asset('assets/metronic/pages/css/profile.min.css') }}" rel="stylesheet" type="text/css" />
@stop

@section('js_page_level_plugins')
@parent
<script src="{{ _asset('assets/metronic/global/plugins/amcharts/amcharts/amcharts.js') }}"></script>
<script src="{{ _asset('assets/metronic/global/plugins/amcharts/amcharts/radar.js') }}"></script>
<script src="{{ _asset('assets/metronic/global/plugins/amcharts/amcharts/themes/light.js') }}"></script>
<script src="{{ _asset('assets/metronic/global/plugins/amcharts/amcharts/themes/patterns.js') }}"></script>
<script src="{{ _asset('assets/metronic/global/plugins/amcharts/amcharts/themes/chalk.js') }}"></script>
@stop

@section('js_page_level')
@parent
<!-- <script src="{{ _asset('assets/metronic/pages/scripts/charts-amcharts.min.js') }}"></script> -->
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
{{$entity->name}}
@stop

@section('page-content-row')
@parent
<div class="row">
    <div class="col-md-12">
        <div class="profile-sidebar">
            <div class="portlet light profile-sidebar-portlet " style="padding: 0px 0 0!important;">
                <div class="portlet light " style="padding: 0px 20px 15px!important;">
                    <div class="row list-separated profile-stat">
                        <div class="col-md-4 col-sm-4 col-xs-6">
                            <div class="uppercase profile-stat-title"> {{$entity->position}} </div>
                            <div class="uppercase profile-stat-text"> 位置 </div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-6">
                            <div class="uppercase profile-stat-title"> {{$entity->quality}} </div>
                            <div class="uppercase profile-stat-text"> 资质 </div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-6">
                            <div class="uppercase profile-stat-title"> {{$entity->type}} </div>
                            <div class="uppercase profile-stat-text"> 角色定位 </div>
                        </div>
                    </div>
                    <div>
                        <h4 class="profile-desc-title">描述</h4>
                        <span class="profile-desc-text"> {{$entity->desc}} </span>
                        <div class="margin-top-20 profile-desc-link">
                            <i class="fa fa-globe"></i>
                            <span>星级：{{empty($curDiary)?'':$curDiary->getStar()}}</span>
                        </div>
                        <div class="margin-top-20 profile-desc-link">
                            <i class="fa fa-globe"></i>
                            <span>觉醒：{{empty($curDiary)?'':$curDiary->wake_stone}}</span>
                        </div>
                        <div class="margin-top-20 profile-desc-link">
                            <i class="fa fa-globe"></i>
                            <span>小宇宙：{{empty($curDiary)?'':$curDiary->universe_star.'('.$curDiary->universe_6.','.$curDiary->universe_7.','.$curDiary->universe_8.','.$curDiary->universe_9.')'}}</span>
                        </div>
                        <div class="margin-top-20 profile-desc-link">
                            <i class="fa fa-globe"></i>
                            <span>圣衣：{{empty($curDiary)?'':$curDiary->cloth_star.'('.$curDiary->cloth_header.','.$curDiary->cloth_shoulder.','.$curDiary->cloth_chest.','.$curDiary->cloth_waist.','.$curDiary->cloth_arm.','.$curDiary->cloth_leg.')'}}</span>
                        </div>
                        <div class="margin-top-20 profile-desc-link">
                            <i class="fa fa-globe"></i>
                            <span>好感度：{{empty($curDiary)?'':$curDiary->favor}}</span>
                        </div>
                        <div class="margin-top-20 profile-desc-link">
                            <i class="fa fa-globe"></i>
                            <span>圣器：{{empty($curDiary)?'':$curDiary->equipment}}</span>
                        </div>
                        <div class="margin-top-20 profile-desc-link">
                            <i class="fa fa-globe"></i>
                            <span>等级：{{empty($curDiary)?'':$curDiary->level}}</span>
                        </div>
                        <div class="margin-top-20 profile-desc-link">
                            <i class="fa fa-globe"></i>
                            <span>战力：{{empty($curDiary)?'':$curDiary->score}}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="profile-content">
            <div class="row">            
                <div class="col-md-12">
                    <div class="portlet light bordered">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="icon-bar-chart font-green-haze"></i>
                                <span class="caption-subject bold uppercase font-green-haze"> 总战力：{{empty($curDiary)?'':$curDiary->score.'('.$curDiary->equipment.')'}}</span>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div id="chart_radar" class="chart" style="height: 400px;"> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('filledScript')
<script>
jQuery(document).ready(function() {
    var chart = AmCharts.makeChart("chart_radar", {
        "type": "radar",
        "theme": "light",
        "fontFamily": 'Open Sans',        
        "color": '#888',
        "dataProvider": [{
            "country": "星级",
            "litres": {{empty($curDiary)?'0':sprintf("%.2f",$curDiary->getStar()/7*100)}}
        }, {
            "country": "觉醒",
            "litres": {{empty($curDiary)?'0':sprintf("%.2f",$curDiary->wake_stone/30*100)}}
        }, {
            "country": "小宇宙",
            "litres": {{empty($curDiary)?'0':sprintf("%.2f",($curDiary->universe_6+$curDiary->universe_7+$curDiary->universe_8+$curDiary->universe_9)/360*100)}}
        }, {
            "country": "圣衣",
            "litres": {{empty($curDiary)?'0':sprintf("%.2f",($curDiary->cloth_header+$curDiary->cloth_shoulder+$curDiary->cloth_chest+$curDiary->cloth_waist+$curDiary->cloth_arm+$curDiary->cloth_leg)/720*100)}}
        }, {
            "country": "好感度",
            "litres": {{empty($curDiary)?'0':sprintf("%.2f",$curDiary->favor/32000*100)}}
        }, {
            "country": "等级",
            "litres": {{empty($curDiary)?'0':sprintf("%.2f",$curDiary->level/140*100)}}
        }],
        "valueAxes": [{
            "axisTitleOffset": 20,
            "minimum": 0,
            "axisAlpha": 0.15
        }],
        "startDuration": 2,
        "graphs": [{
            "balloonText": "[[value]]%",
            "bullet": "round",
            "valueField": "litres"
        }],
        "categoryField": "country",
        "exportConfig": {
            "menuTop": "10px",
            "menuRight": "10px",
            "menuItems": [{
                "icon": '/lib/3/images/export.png',
                "format": 'png'
            }]
        }
    });

    $('#chart_radar').closest('.portlet').find('.fullscreen').click(function() {
        chart.invalidateSize();
    });
});
</script>
@stop