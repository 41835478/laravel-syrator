@extends('cms::desktop._layout._desktop')

@section('css_page_level')
@parent
<link href="{{ _asset('assets/syrator/modules/cms/css/article.css') }}" rel="stylesheet" type="text/css"/>
@stop

@section('page-content-row')
<div id="cms_article" class="row">	
	<div class="span12">
	{!!$entity->content!!}
	</div>
</div>
@stop