@extends('_layout._common')

@section('head_css')
@parent
@stop

@section('body_attr') class="page-header-fixed" @stop

@section('content-header')
@parent
@include('admin._widgets._main-header')
@stop

@section('content-footer')
@parent
@include('admin._widgets._main-footer')
@stop

@section('content')
<div class="page-container row-fluid">
	@include('admin._widgets._main-sidebar')
	<div class="page-content">
		<div id="portlet-config" class="modal hide">
			<div class="modal-header">
				<button data-dismiss="modal" class="close" type="button"></button>
				<h3>Widget Settings</h3>
			</div>
			<div class="modal-body">
				Widget settings form goes here
			</div>
		</div>
		<div class="container-fluid">
			<div class="row-fluid">
				<div class="span12">
					<h3 class="page-title">模板编辑  <small> 编辑系统前台显示模板相关信息</small></h3>
					<ul class="breadcrumb">
						<li>
							<i class="icon-home"></i>
							<a href="{{ site_url('home', 'admin') }}">首页</a> 
							<i class="icon-angle-right"></i>
						</li>
						<li><a href="#">模板编辑</a></li>
						<li class="pull-right no-text-shadow">
							<div id="dashboard-report-range" class="dashboard-date-range tooltips no-tooltip-on-touch-device responsive" data-tablet="" data-desktop="tooltips" data-placement="top" data-original-title="Change dashboard date range">
								<i class="icon-calendar"></i>
								<span></span>
								<i class="icon-angle-down"></i>
							</div>
						</li>
					</ul>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span12">
        			@if(session()->has('fail'))
                    <div class="alert alert-warning alert-dismissable">
                    	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    	<h4>
                    		<i class="icon icon fa fa-warning"></i> 提示！
                    	</h4>
                    	{{ session('fail') }}
                    </div>
                    @endif 
                    
                    @if($errors->any())
                    <div class="alert alert-danger alert-dismissable">
                    	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    	<h4>
                    		<i class="icon fa fa-ban"></i> 警告！
                    	</h4>
                    	<ul>
                    		@foreach ($errors->all() as $error)
                    		<li>{{ $error }}</li> 
                    		@endforeach
                    	</ul>
                    </div>
                    @endif   
                    

									<div class="portlet box blue ">

										<div class="portlet-title">

											<div class="caption">模板编辑</div>

										</div>

										<div class="portlet-body form">

											<!-- BEGIN FORM-->

											<form action="#" class="form-horizontal form-bordered form-label-stripped">

												<div class="control-group">

													<label class="control-label">First Name</label>

													<div class="controls">

														<input placeholder="small" class="m-wrap span12" type="text">

														<span class="help-inline">This is inline help</span>

													</div>

												</div>

												<div class="control-group">

													<label class="control-label">Last Name</label>

													<div class="controls">

														<input placeholder="medium" class="m-wrap span12" type="text">

														<span class="help-inline">This is inline help</span>

													</div>

												</div>

												<div class="control-group">

													<label class="control-label">Gender</label>

													<div class="controls">

														<select class="m-wrap span12">

															<option value="">Male</option>

															<option value="">Female</option>

														</select>

														<span class="help-block">Select your gender.</span>

													</div>

												</div>

												<div class="control-group">

													<label class="control-label">Date of Birth</label>

													<div class="controls">

														<input class="m-wrap span12" placeholder="dd/mm/yyyy" type="text">

													</div>

												</div>

												<div class="control-group">

													<label class="control-label">Category</label>

													<div class="controls">

														<div class="select2-wrapper">

															<div class="select2-container span12 select2_category" id="s2id_autogen11"><a href="javascript:void(0)" onclick="return false;" class="select2-choice select2-default" tabindex="-1">   <span>Select an option</span><abbr class="select2-search-choice-close" style="display: none;"></abbr>   <div><b></b></div></a><input class="select2-focusser select2-offscreen" id="s2id_autogen12" type="text"><div class="select2-drop select2-with-searchbox" style="display:none">   <div class="select2-search">       <input autocomplete="off" class="select2-input" type="text">   </div>   <ul class="select2-results">   </ul></div></div><select class="span12 select2_category select2-offscreen" tabindex="-1">

																<option value=""></option>

																<option value="Category 1">Category 1</option>

																<option value="Category 2">Category 2</option>

																<option value="Category 3">Category 5</option>

																<option value="Category 4">Category 4</option>

															</select>

														</div>

													</div>

												</div>

												<div class="control-group">

													<label class="control-label">Multi-Value Select</label>

													<div class="controls">

														<div class="select2-wrapper">

															<div class="select2-container select2-container-multi span12 select2_sample1" id="s2id_autogen19">    <ul class="select2-choices">  <li class="select2-search-field">    <input autocomplete="off" class="select2-input select2-default" id="s2id_autogen20" style="width: 0px;" type="text">  </li></ul><div class="select2-drop select2-drop-multi" style="display:none;">   <ul class="select2-results">   </ul></div></div><select class="span12 select2_sample1 select2-offscreen" multiple="" tabindex="-1">

																<option value=""></option>

																<optgroup label="NFC EAST">

																	<option>Dallas Cowboys</option>

																	<option>New York Giants</option>

																	<option>Philadelphia Eagles</option>

																	<option>Washington Redskins</option>

																</optgroup>

																<optgroup label="NFC NORTH">

																	<option>Chicago Bears</option>

																	<option>Detroit Lions</option>

																	<option>Green Bay Packers</option>

																	<option>Minnesota Vikings</option>

																</optgroup>

																<optgroup label="NFC SOUTH">

																	<option>Atlanta Falcons</option>

																	<option>Carolina Panthers</option>

																	<option>New Orleans Saints</option>

																	<option>Tampa Bay Buccaneers</option>

																</optgroup>

																<optgroup label="NFC WEST">

																	<option>Arizona Cardinals</option>

																	<option>St. Louis Rams</option>

																	<option>San Francisco 49ers</option>

																	<option>Seattle Seahawks</option>

																</optgroup>

																<optgroup label="AFC EAST">

																	<option>Buffalo Bills</option>

																	<option>Miami Dolphins</option>

																	<option>New England Patriots</option>

																	<option>New York Jets</option>

																</optgroup>

																<optgroup label="AFC NORTH">

																	<option>Baltimore Ravens</option>

																	<option>Cincinnati Bengals</option>

																	<option>Cleveland Browns</option>

																	<option>Pittsburgh Steelers</option>

																</optgroup>

																<optgroup label="AFC SOUTH">

																	<option>Houston Texans</option>

																	<option>Indianapolis Colts</option>

																	<option>Jacksonville Jaguars</option>

																	<option>Tennessee Titans</option>

																</optgroup>

																<optgroup label="AFC WEST">

																	<option>Denver Broncos</option>

																	<option>Kansas City Chiefs</option>

																	<option>Oakland Raiders</option>

																	<option>San Diego Chargers</option>

																</optgroup>

															</select>

														</div>

													</div>

												</div>

												<div class="control-group">

													<label class="control-label">Loading Data</label>

													<div class="controls">

														<div class="select2-wrapper">

															<div class="select2-container span12 select2_sample2" id="s2id_autogen27"><a href="javascript:void(0)" onclick="return false;" class="select2-choice select2-default" tabindex="-1">   <span>Type to select an option</span><abbr class="select2-search-choice-close" style="display:none;"></abbr>   <div><b></b></div></a><input class="select2-focusser select2-offscreen" id="s2id_autogen28" type="text"><div class="select2-drop select2-with-searchbox" style="display:none">   <div class="select2-search">       <input autocomplete="off" class="select2-input" type="text">   </div>   <ul class="select2-results">   </ul></div></div><input class="span12 select2_sample2 select2-offscreen" tabindex="-1" type="hidden">

														</div>

													</div>

												</div>

												<div class="control-group">

													<label class="control-label">Tags Support List</label>

													<div class="controls">

														<div class="select2-wrapper">

															<div class="select2-container select2-container-multi span12 select2_sample3" id="s2id_autogen35">    <ul class="select2-choices">  <li class="select2-search-choice">    <div>red</div>    <a href="#" onclick="return false;" class="select2-search-choice-close" tabindex="-1"></a></li><li class="select2-search-choice">    <div>blue</div>    <a href="#" onclick="return false;" class="select2-search-choice-close" tabindex="-1"></a></li><li class="select2-search-field">    <input autocomplete="off" class="select2-input" id="s2id_autogen36" style="width: 10px;" type="text">  </li></ul><div class="select2-drop select2-drop-multi" style="display:none;">   <ul class="select2-results">   </ul></div></div><input class="span12 select2_sample3 select2-offscreen" value="red,blue" tabindex="-1" type="hidden">

														</div>

													</div>

												</div>

												<div class="control-group">

													<label class="control-label">Membership</label>

													<div class="controls">                                                

														<label class="radio">

														<div class="radio"><span><input name="optionsRadios2" value="option1" type="radio"></span></div>

														Free

														</label>

														<label class="radio">

														<div class="radio"><span class="checked"><input name="optionsRadios2" value="option2" checked="" type="radio"></span></div>

														Professional

														</label>  

													</div>

												</div>

												<div class="control-group">

													<label class="control-label">Street</label>

													<div class="controls">

														<input class="m-wrap span12" type="text">

													</div>

												</div>

												<div class="control-group">

													<label class="control-label">City</label>

													<div class="controls">

														<input class="m-wrap span12" type="text"> 

													</div>

												</div>

												<div class="control-group">

													<label class="control-label">State</label>

													<div class="controls">

														<input class="m-wrap span12" type="text"> 

													</div>

												</div>

												<div class="control-group">

													<label class="control-label">Post Code</label>

													<div class="controls">

														<input class="m-wrap span12" type="text"> 

													</div>

												</div>

												<div class="control-group last">

													<label class="control-label">Country</label>

													<div class="controls">

														<select class="m-wrap span12"></select>

													</div>

												</div>

												<div class="form-actions">

													<button type="submit" class="btn blue"><i class="icon-ok"></i> Save</button>

													<button type="button" class="btn">Cancel</button>

												</div>

											</form>

											<!-- END FORM-->  

										</div>

									</div>

								                 
					
				</div>
			</div>
		</div>
	</div>
</div>
@stop

@section('extraPlugin')
@parent
@stop

@section('filledScript')
<script>
jQuery(document).ready(function() {    
    App.init();
});
</script>
@stop