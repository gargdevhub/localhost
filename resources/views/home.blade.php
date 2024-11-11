@extends('layouts.master')
@section('title','Home')
@section('content')
	<div id="tools" class="my-3">
		<h3 class="mb-4">Tools</h3>
		<div class="row justify-content-center">
			<div class="col-auto">
				<a href="{{ url('task-manager') }}" class="d-block btn btn-primary px-5">Task Manager</a>
			</div>
			<div class="col-auto">
				<a href="{{ url('file-manager') }}" class="d-block btn btn-primary px-5">File Manager</a>
			</div>
		</div>
	</div>
	@if(!empty($commands))
		<div id="commands" class="my-3">
			<h3 class="mb-4">Commands</h3>
			<div class="row justify-content-center">
				@foreach($commands as $command)
					<div class="col-auto">
						<a href="javascript:void(0)" confirm-href="{{ url('command/'.$command) }}" confirm-text="Execute {{ StringHelper::kebabToWordCase($command) }}?" class="d-block btn btn-primary px-5">{{ StringHelper::kebabToWordCase($command) }}</a>
					</div>
				@endforeach
			</div>
		</div>
	@endif
@endsection