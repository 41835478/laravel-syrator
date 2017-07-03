@if(session()->has('fail'))
<div class="alert alert-danger">
	<button class="close" data-close="alert"></button>
	<h4>
		<i class="icon icon fa fa-warning"></i> 提示！
	</h4>
	<span> {{ session('fail') }} </span>             	
</div>
@endif