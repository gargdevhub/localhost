@extends('layouts.master')
@section('title','Running Tasks')
@section('content')
	<div class="row">
		<div class="col-md-12 text-center mb-5">
			<a href="{{ url('/') }}" class="btn btn-primary px-5">Home</a>
		</div>
		<div class="col-md-12">
			<h2 class="mb-4">Tasks<a href="{{ url('task-list') }}" class="btn btn-primary px-5 float-end">Refresh</a></h2>
			<ol class="list-group list-group-numbered">
				@foreach(($tasks ?? []) as $task)
				<li class="list-group-item">{{ $task }}</li>
				@endforeach
			</ol>
		</div>
	</div>
@endsection