@if (Session::has('success'))
	<div class="alert alert-danger" role="alert">
		{{ Session::get('success') }}
	</div>

@elseif(Session::has('error'))
	<div class="alert alert-danger" role="alert">
		{{ Session::get('error') }}
	</div>
@endif

@if (count($errors) > 0)
	<div class="alert alert-danger" role="alert">
		<strong>Errors:</strong>
		<ul style="list-style:none">
			@foreach ($errors -> all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
@endif
