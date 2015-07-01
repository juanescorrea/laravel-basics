@extends('layouts.main')
@section('content')
	<div class="large-12 columns">
		<h2>{{{ $list->name}}}</h2>
		<p>{!! link_to_route('todos.index','Back') !!}</p>
	</div>
@stop