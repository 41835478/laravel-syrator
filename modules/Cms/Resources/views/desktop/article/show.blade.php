@extends('cms::desktop._layout._desktop')

@section('css_page_level')
@parent
<link href="{{ _asset('assets/syrator/modules/cms/css/article.css') }}" rel="stylesheet" type="text/css"/>
@stop

@section('page-content-row')
<div id="cms_article" class="row">
	<div class="page-content" style="padding-top: 20px;">
		<div class="container-fluid">
			<div class="row-fluid">
				<div class="span12">
				{!!$entity->content!!}
				</div>
			</div>
		</div>
	</div>
</div>
@stop