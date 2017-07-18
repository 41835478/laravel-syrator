<div class="tabbable-line boxless tabbable-reversed">
	<ul class="nav nav-tabs">
		@foreach ($editStructGroup as $key => $perGroup) 
			@if ($key==0)
			<li class="active">
				<a href="#{{$perGroup['id']}}" data-toggle="tab" aria-expanded="true">{{$perGroup['name']}}</a>
			</li>
			@else
			<li>
				<a href="#{{$perGroup['id']}}" data-toggle="tab" aria-expanded="true">{{$perGroup['name']}}</a>
			</li>			
			@endif
		@endforeach
	</ul>
	<div class="tab-content">
		@foreach ($editStructGroup as $key => $perGroup) 	
			@if ($key==0)
    		<div class="tab-pane active" id="{{$perGroup['id']}}">
			@else			
    		<div class="tab-pane" id="{{$perGroup['id']}}">		
			@endif
			
			@if (isset($perGroup['section']))
				@section($perGroup['section']) @show
			@else 
    			@foreach ($perGroup['fields'] as $perField)  
                    @if($editStruct[$perField]->type=='text')
                		@include('_widgets.edit.form-group-text', ['field' => $editStruct[$perField]]) 
                	@elseif($editStruct[$perField]->type=='textarea')
                		@include('_widgets.edit.form-group-textarea', ['field' => $editStruct[$perField]]) 
                	@elseif($editStruct[$perField]->type=='radio')
                		@include('_widgets.edit.form-group-radio', ['field' => $editStruct[$perField]]) 
                	@elseif($editStruct[$perField]->type=='select')
                		@include('_widgets.edit.form-group-select', ['field' => $editStruct[$perField]]) 
                	@elseif($editStruct[$perField]->type=='select_tree')
                		@include('_widgets.edit.form-group-select_tree', ['field' => $editStruct[$perField]]) 
                	@elseif($editStruct[$perField]->type=='date' || $editStruct[$perField]->type=='datetime')
                		@include('_widgets.edit.form-group-date', ['field' => $editStruct[$perField]]) 
                	@elseif($editStruct[$perField]->type=='image')
                		@include('_widgets.edit.form-group-image', ['field' => $editStruct[$perField]]) 
                	@else
                		@include('_widgets.edit.form-group-text', ['field' => $editStruct[$perField]])
                	@endif	
                @endforeach
			@endif  
			</div>
		@endforeach
	</div>
</div>