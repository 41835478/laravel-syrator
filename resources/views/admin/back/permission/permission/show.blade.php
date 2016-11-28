<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <title>角色查看</title>
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
                        	<label>权限名</label>
                        	<input readonly="true" type="text" class="form-control" name="name" autocomplete="off" value="{{ old('name', isset($permission) ? $permission->name : null) }}" placeholder="权限名">
                      	</div>
                      	<div class="form-group">
                        	<label>权限展示名</label>
                        	<input readonly="true" type="text" class="form-control" name="display_name" autocomplete="off" value="{{ old('display_name', isset($permission) ? $permission->display_name : null) }}" placeholder="权限展示名">
                      	</div>
                      	<div class="form-group">
                        	<label>权限描述</label>
                        	<textarea readonly="true" class="form-control" name="description" cols="45" rows="2" maxlength="200" placeholder="权限描述" autocomplete="off">{{ old('description', isset($permission) ? $permission->description : null) }}</textarea>
                      	</div>                      
                	</div>
				</div>                  
			</div>
	</div>   
</div>
</body>
</html>