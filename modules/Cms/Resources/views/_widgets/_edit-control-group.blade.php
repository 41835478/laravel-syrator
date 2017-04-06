{{-- widget._edit-control-group --}}
@foreach ($editStruct as $per)                                
<div class="control-group">
	<label class="control-label">{{$per['alias']}}</label>
	<div class="controls">
		@if($per['type']=='text')
			<input style="box-sizing: content-box;" 
				type="text" class="m-wrap large" 
				name="{{$per['name']}}" 
				autocomplete="{{$per['autocomplete']}}" 
				value="{{$per['value']}}" 
				placeholder="{{$per['placeholder']}}">											
			<span class="help-inline text-green">
				{{$per['help']}}
				@if($per['is_request'])											
				<small>*</small>
            	@endif
			</span>
		@elseif($per['type']=='textarea')
			<textarea style="width:100%" type="text" 
				id={{$per['name']}} 
				name="{{$per['name']}}" 
				autocomplete="{{$per['autocomplete']}}" 
				placeholder="{{$per['placeholder']}}" >
				{{$per['value']}}
			</textarea>
        @endif
	</div>
</div> 	
@endforeach