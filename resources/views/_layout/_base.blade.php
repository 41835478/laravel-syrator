<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> 
<html lang="{{ trans('syrator.lang_code') }}"> 
<!--<![endif]-->
<head>
    <meta charset="UTF-8">
    <title>{{ cache('website_title') }}</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="{{ cache('website_description') }}" name="description" />
    <meta content="{{ cache('website_keywords') }}" name="keywords" />
    <meta content="{{ cache('author_name') }}" name="author" />
    <meta content="{{ csrf_token() }}" name="_token" />
    <meta content="webkit" name="renderer" >
    <meta property="wb:webmaster" content="6a9cf8c6a5ca67c3" />
   
    @section('meta')
    @show
    
    <link rel="shortcut icon" href="{{ _asset('favicon.ico') }}" type="image/x-icon">

    @section('head_css')
    @show

    @section('head_js')
    @show
    
    @section('head_style')
    @show
    
    @section('head_script')
    @show
    
</head>
<body @section('body_attr') class="" @show>

    @section('beforeBody')
    @show

    @section('body')
    @show

    @section('afterBody')
    @show
    
</body>
</html>