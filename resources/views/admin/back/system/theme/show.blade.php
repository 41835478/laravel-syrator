<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <title>模板查看</title>
    <meta name="description" content="{{ isset($description) ? $description : 'SYRATOR AdminLTE' }}" />
    <meta name="keywords" content="SYRATOR,AdminLTE,{{ cache('website_keywords') }}" />
    <meta name="author" content="{{ cache('system_author_website') }}" />
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1" />

    <link rel="shortcut icon" href="{{ _asset('favicon.ico') }}" type="image/x-icon">
    
    <link href="{{ _asset(ref('bootstrap.css')) }}" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="{{ _asset(ref('font-awesome.css')) }}" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="{{ _asset(ref('ionicons.css')) }}" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="{{ _asset('back/dist/css/syrator.css') }}" rel="stylesheet" type="text/css" />

 
</head>
<body>
<div class="wrapper">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        	<div class="nav-tabs-custom" style="margin-bottom: 0px;">
        		<ul class="nav nav-tabs">
        			<li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">主要内容</a></li>
                </ul>
                <div class="tab-content">                    
                    <div class="tab-pane active" id="tab_1">
                    	<div class="form-group">
                        	<label>模板编码</label>
                        	<input readonly="true" type="text" class="form-control" name="code" autocomplete="off" value="{{ old('code', isset($theme) ? $theme->code : null) }}" placeholder="模板编码">
                      	</div>
                    	<div class="form-group">
                        	<label>模板名称</label>
                        	<input readonly="true" type="text" class="form-control" name="name" autocomplete="off" value="{{ old('name', isset($theme) ? $theme->name : null) }}" placeholder="模板名称">
                      	</div>
        				<div class="form-group">
        					<label>模板描述</label>
        					<textarea readonly="true" class="form-control" name="description" cols="45" rows="2" maxlength="200" placeholder="模板描述" autocomplete="off">{{ old('description', isset($theme) ? $theme->description : null) }}</textarea>
        				</div>
        				<div class="form-group">
        					<label>作者 </label> 
        					<input readonly="true" type="text" class="form-control" name="author" autocomplete="off" value="{{ old('author', isset($theme) ? $theme->author : null) }}" placeholder="作者">
        				</div>
        				<div class="form-group">
        					<label>版本 </label> 
        					<input readonly="true" type="text" class="form-control" name="version" autocomplete="off" value="{{ old('version', isset($theme) ? $theme->version : null) }}" placeholder="版本">
        				</div>
                        <div class="form-group">
                          	<label>是否使用 <small class="text-red">*</small></label>
                          	<div class="input-group">
                                <input readonly="true" type="radio" name="is_current" value="0" {{ ($theme->is_current === '0') ? 'checked' : '' }} disabled>
                                <label class="choice" for="radiogroup">否</label>
                                <input readonly="true" type="radio" name="is_current" value="1" {{ ($theme->is_current === '1') ? 'checked' : '' }} disabled>
                                <label class="choice" for="radiogroup">是</label>
                          	</div>
                        </div>                    
                	</div>
				</div>                  
			</div>
	</div>   
</div>
</body>
</html>