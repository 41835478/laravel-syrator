@if(session()->has('message'))
<div class="alert alert-danger">
	<button class="close" data-close="alert"></button>
	<h4>
		<i class="fa fa-hand-peace-o"></i> 提示！
	</h4>
	<span> {{ session('message') }} </span>             	
</div>
@endif