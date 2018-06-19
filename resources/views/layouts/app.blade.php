<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>WebTech2</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" ></script>
       

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        
        @include ('inc.navbar')

        <div class="container">
        	@if(Request::is('/'))
				@include('inc.showcase')
			@endif
			@if(Request::is('videos'))
				@include('inc.showcase')
			@endif
			
			@if(Request::is('/'))
			<div class="row">
				<div class="col-md-8 col-lg-8">
	        	@include('inc.messages')
	            @yield('content')
	         </div>
			<div class="col-md-4 col-lg-4">
				@include ('inc.sidebar')
			</div>
			@else
	        	@include('inc.messages')
	            @yield('content')

	         @endif
			
        </div>

    </div>
    <footer id="footer" class="text-center">
			<p>Copyright 2018 &copy; Krišjānis Beitāns</p>
	</footer>
	 <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'article-ckeditor' );
    </script>   
    
</body>
</html>
