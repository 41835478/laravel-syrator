{{-- widget._fail-message --}}
@if(session()->has('fail'))
<div class="alert alert-warning alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
	<h4>
		<i class="icon icon fa fa-warning"></i> 提示！
	</h4>
	{{ session('fail') }}
</div>
@endif 