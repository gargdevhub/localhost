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
	<link href="{{ url('assets/css/style.css') }}" rel="stylesheet" type="text/css">
	@yield('styles')
</head>
<body>
	<div class="container-fluid mt-3">
		@yield('content')
	</div>
	<script src="{{ url('assets/js/bootstrap.bundle.min.js') }}"></script>
	@yield('scripts')
</body>
</html>