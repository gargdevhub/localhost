@extends('layouts.master')
@section('title','Running Tasks')
@section('content')
	<div id="task-list" class="my-3">
		<a href="{{ url('task-manager') }}" class="d-block h2 mb-4">Tasks</a>
		<ol class="list-group list-group-numbered">
			@foreach(($tasks ?? []) as $task)
			<li class="list-group-item">{{ $task }}</li>
			@endforeach
		</ol>
	</div>
@endsection