@extends('mobile._layout._layer_nonav')

@section('content')
<div class="mui-content">
</div>
@stop

@section('afterBody') 
@parent
<script src="{{ _asset('wapstyle/js/mui.enterfocus.js') }}"></script>

@if (count($errors) > 0)
<script>
mui.alert('{!! $errors->first('attempt') !!}');
</script>
@endif

@stop