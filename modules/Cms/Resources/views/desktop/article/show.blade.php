@extends('cms::desktop._layout._desktop')

@section('page-content-row')
<div id="cms_article" class="row">	
	<div class="span12">
	{!!$entity->content!!}
	</div>
</div>
@stop