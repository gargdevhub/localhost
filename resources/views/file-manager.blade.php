@extends('layouts.master')
@section('title','File Manager')
@section('content')
	<a class="d-block h2 mb-5" href="{{ url('file-manager') }}">File Manager</a>
	@if(!empty($disks))
		<div class="my-5">
			<div class="row justify-content-start">
				@foreach($disks as $disk)
					<div class="col">
						<a href="{{ url()->query('file-manager',['path'=>$disk.':/']) }}" class="d-block">
							<img src="{{ url('assets/img/disk.png') }}" class="mawh-50p me-4">
							{{ StringHelper::pathToDiskLetter($disk) }}
						</a>
					</div>
				@endforeach
			</div>
		</div>
	@endif
	@if(!empty($folders) || !empty($files))
		<div class="my-5">
			<div class="row justify-content-start">
				@if(!empty($folders))
					@foreach($folders as $folder)
						<div class="col-6">
							<a href="{{ url()->query('file-manager',['path'=>StringHelper::makePath($target_path,$folder)]) }}" class="d-block py-3">
								<img src="{{ url('assets/img/folder.png') }}" class="mawh-50p me-4">
								{{ $folder }}
							</a>
						</div>
					@endforeach
				@endif
				@if(!empty($files))
					@foreach($files as $file)
						<div class="col-6">
							<a href="{{ url()->query('file-manager',['path'=>StringHelper::makePath($target_path,$file)]) }}" class="d-block py-3">
								<img src="{{ IconHelper::forFile($file) }}" class="mawh-50p me-4">
								{{ $file }}
							</a>
						</div>
					@endforeach
				@endif
			</div>
		</div>
	@endif
@endsection