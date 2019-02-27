<!doctype html>
<html lang="{{ app()->getLocale() }}">
	@include('layouts.head')

	<body>
		@if (Request::is('/'))
			@include('layouts.nav-home')
		@else
			@include('layouts.nav')
		@endif

		@yield('content')

		@include('layouts.footer')

		@include('layouts.scripts')
	</body>
</html>
