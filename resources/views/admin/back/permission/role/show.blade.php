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
    <link href="{{ _asset(ref('icheck_all.css')) }}" rel="stylesheet" type="text/css" />

    <!-- jQuery 2.1.3 -->
    <script src="{{ _asset(ref('jquery.js')) }}"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="{{ _asset(ref('bootstrap.js')) }}" type="text/javascript"></script>
    <!-- AdminLTE App -->
    <script src="{{ _asset('back/dist/js/app.min.js') }}" type="text/javascript"></script>
    
    <!--引入iCheck组件-->
  	<script src="{{ _asset(ref('icheck.js')) }}" type="text/javascript"></script>
    
    <script type="text/javascript">
      $(document).ready(function(){
    	  <!--启用iCheck响应checkbox与radio表单控件-->
          $('input[name="permissions[]"]').iCheck({
            checkboxClass: 'icheckbox_flat-blue',
            increaseArea: '20%', // optional
          });
          
          $('input[name="permissions[]"]').iCheck('disable');

          <!--响应点击label 选中或者取消选中-->
          $('label.choice').click(function() {
              var value = $(this).data('value');
              $('input[name="permissions[]"][value='+value+']').iCheck('toggle');
          });
      });
    </script>
</head>
<body>
<div class="wrapper">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        	<div class="nav-tabs-custom" style="margin-bottom: 0px;">
        		<ul class="nav nav-tabs">
        			<li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">主要内容</a></li>
                    <li ><a href="#tab_2" data-toggle="tab" aria-expanded="false">关联权限</a></li>
                </ul>
                <div class="tab-content">                    
                    <div class="tab-pane active" id="tab_1">
                    	<div class="form-group">
                        	<label>角色名</label>
                        	<input readonly="true" type="text" class="form-control" name="name" autocomplete="off" value="{{ old('name', isset($role) ? $role->name : null) }}" placeholder="角色(用户组)名">
                      	</div>
                      	<div class="form-group">
                        	<label>角色展示名</label>
                        	<input readonly="true" type="text" class="form-control" name="display_name" autocomplete="off" value="{{ old('display_name', isset($role) ? $role->display_name : null) }}" placeholder="角色(用户组)展示名">
                      	</div>
                      	<div class="form-group">
                        	<label>角色描述</label>
                        	<textarea readonly="true" class="form-control" name="description" cols="45" rows="2" maxlength="200" placeholder="角色(用户组)描述" autocomplete="off">{{ old('description', isset($role) ? $role->description : null) }}</textarea>
                      	</div>                      
                	</div>
                    <div class="tab-pane" id="tab_2">
                    	<div class="form-group">
                        	<div class="input-group">
                          	@foreach($permissions as $index => $per)
                            	@if(starts_with($per->name, '@') && $index !== 0)
                            	<br>
                            	@endif
                            	<input state="true" type="checkbox" name="permissions[]" value="{{ $per->id }}" {{ (check_array($cans,'id', $per->id) === true) ? 'checked' : '' }}>
                            	<label class="choice" for="permissions[]" data-value="{{ $per->id }}" style="cursor: pointer;"><span class="text-green">{{ $per->name }}</span>[<span class="text-red">{{ $per->display_name }}</span>]</label>
                          	@endforeach
                        	</div>
						</div>
					</div>
				</div>                  
			</div>
	</div>   
</div>
</body>
</html>