@foreach ($editStruct as $per) 
	@if($per->type=='text')
		@include('_widgets.edit.form-group-text', ['field' => $per]) 
	@elseif($per->type=='textarea')
		@include('_widgets.edit.form-group-textarea', ['field' => $per]) 
	@elseif($per->type=='radio')
		@include('_widgets.edit.form-group-radio', ['field' => $per]) 
	@elseif($per->type=='select')
		@include('_widgets.edit.form-group-select', ['field' => $per]) 
	@elseif($per->type=='select_tree')
		@include('_widgets.edit.form-group-select_tree', ['field' => $per]) 
	@elseif($per->type=='date' || $per->type=='datetime')
		@include('_widgets.edit.form-group-date', ['field' => $per]) 
	@elseif($per->type=='image')
		@include('_widgets.edit.form-group-image', ['field' => $per]) 
	@else
		@include('_widgets.edit.form-group-text', ['field' => $per])
	@endif	
@endforeach