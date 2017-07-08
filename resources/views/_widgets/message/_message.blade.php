@if(!empty($message))
<div class="alert alert-danger">
	<button class="close" data-close="alert"></button>
	<h4>
		<i class="icon icon fa fa-warning"></i> 提示！
	</h4>
	<span> {{ $message }} </span>             	
</div>
@endif