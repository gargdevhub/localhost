@extends('layouts.master')
@section('title','Home')
@section('content')
	<div class="row">
		<div class="col-md-12">
			<h2 class="text-center mb-4">Rohan PC</h2>
			@if(session()->has('success'))
				<div class="alert alert-success alert-dismissible fade show">
					{{ session()->get('success') }}
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
			@endif
			@if(!empty($accordians))
				<div class="accordion">
					@foreach($accordians as $accordian_title => $accordian_data)
						<div class="accordion-item mb-2">
							<h2 class="accordion-header"><button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#{{ $accordian_title }}">{{ $accordian_title }}</button></h2>
							<div id="{{ $accordian_title }}" class="accordion-collapse collapse">
								<div class="accordion-body">
									@if(!empty($accordian_data['links']))
										<div class="row justify-content-center">
											@foreach($accordian_data['links'] as $link)
												<div class="col-3">
													<a href="{{ $link['href'] }}" class="d-block btn btn-primary btn-lg">{{ $link['text'] ?? 'Link' }}</a>
												</div>
											@endforeach
										</div>
									@endif
								</div>
							</div>
						</div>
					@endforeach
				</div>
			@endif
		</div>
	</div>
@endsection