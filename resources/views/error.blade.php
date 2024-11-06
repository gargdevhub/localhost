@extends('layouts.master')
@section('title','Error Occured')
@section('content')
	<div class="row">
		<div class="col-md-12 text-center">
			<h2 class="text-danger">{{ $message ?? 'Unknown Error' }}</h2>
		</div>
	</div>
@endsection