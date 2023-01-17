

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <meta name="csrf-token" content="{{ csrf_token() }}">
      <title>@yield('title')</title>
      
		{{-- Style --}}
		@include('admin.components.style')

	</head>
  <body class="">
    <!-- loader Start -->
    <div id="loading">
          <div id="loading-center">
          </div>
    </div>
    <!-- loader END -->
    <!-- Wrapper Start -->
    <div class="wrapper">
		@include('admin.components.left-header')
		@include('admin.components.new-order')

      	@yield('content')
    </div>
    
	{{-- footer --}}
    @include('admin.components.footer')

	{{-- Scripts --}}
    @include('admin.components.script')
  </body>
</html>