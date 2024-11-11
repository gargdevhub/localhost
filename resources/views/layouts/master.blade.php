<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,shrink-to-fit=no">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>@yield('title') - Rohan PC</title>
	<link rel="icon" type="image/x-icon" href="{{ url('favicon.ico') }}">
	<link href="{{ url('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ url('assets/css/utilities.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ url('assets/css/style.css') }}" rel="stylesheet" type="text/css">
	@yield('styles')
</head>
<body>
	<div class="container-fluid pt-3">
		<div class="container">
			<a href="{{ url('/') }}" class="d-block h1 mb-5"><img src="{{ url('assets/img/computer.png') }}" class="mawh-100p me-4">Rohan PC</a>
			@if(session()->has('success'))
				<div class="alert alert-success alert-dismissible fade show">
					{{ session()->get('success') }}
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
			@endif
			@yield('content')
		</div>
	</div>
	<script src="{{ url('assets/js/jquery.min.js') }}"></script>
	<script src="{{ url('assets/js/bootstrap.bundle.min.js') }}"></script>
	<script src="{{ url('assets/js/functions.js') }}"></script>
	<script src="{{ url('assets/js/app.js') }}"></script>
	@yield('scripts')
</body>
</html>