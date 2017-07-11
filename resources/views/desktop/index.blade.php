@extends('desktop._layout._desktop')

@section('page-content-row')
@parent
<div class="note note-info">
    <p>{{cache('website_title')}}</p>
</div>
@stop