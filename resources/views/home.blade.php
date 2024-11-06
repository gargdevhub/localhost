@extends('layouts.master')
@section('title','Home')
@section('content')
	<div class="row">
		<div class="col-md-12">
			@if(session()->has('success'))
				<div class="alert alert-success alert-dismissible fade show">
					{{ session()->get('success') }}
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
			@endif
			<div class="accordion">
				@if(!empty($commands))
					<div class="accordion-item">
						<h2 class="accordion-header"><button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#commands">Commands</button></h2>
						<div id="commands" class="accordion-collapse collapse">
							<div class="accordion-body">
								@foreach($commands as $command_name => $command)
									<div class="my-3">
										<a href="{{ url('command/'.$command_name) }}" class="d-block btn btn-primary btn-lg">{{ $command_name }}</a>
									</div>
								@endforeach
							</div>
						</div>
					</div>
				@endif
			</div>
		</div>
	</div>
@endsection