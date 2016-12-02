<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="{{ trans('syrator.lang_code') }}"> <!--<![endif]-->
<head>
    <meta charset="UTF-8">
    <title>{{ cache('website_title') }}</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta name="description" content="{{ cache('website_description') }}" />
    <meta name="keywords" content="{{ cache('website_keywords') }}" />
    <meta name="author" content="{{ cache('system_author_website') }}" />
    <meta name="_token" content="{{ csrf_token() }}"/>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1" />

    @section('meta')
    @show
    <link rel="shortcut icon" href="{{ _asset('favicon.ico') }}" type="image/x-icon">{{-- favicon --}}

    @section('head_css')
    @show

    @section('head_js')
    @show

    @section('beforeStyle')
    @show

    @section('head_style')
    @show

    @section('afterStyle')
    @show{
</head>
<body @section('body_attr') class="" @show>

    @section('beforeBody')
    @show{{--在正文之后填充一些东西 --}}

    @section('body')
    @show{{-- 正文部分 --}}

    @section('afterBody')
    @show{{-- 在正文之后填充一些东西，比如统计代码之类的东东 --}}

</body>
</html>