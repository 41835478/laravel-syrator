@if(session()->has('errors'))
<div class="alert alert-danger">
	<button class="close" data-close="alert"></button>
	<h4>
		<i class="icon fa fa-ban"></i> 警告！
	</h4>
	<ul>
		@foreach ($errors->all() as $error)
		<li>{{ $error }}</li> 
		@endforeach
	</ul>
</div>
@endif