<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>WebTech2</title>
		<link rel= "stylesheet" href="/css/app.css">
	</head>
	<body>
		@include('inc.navbar')
		<div class="container">
			@if(Request::is('/'))
				@include('inc.showcase')
			@endif
			@if(Request::is('videos'))
				@include('inc.showcase')
			@endif
			<div class="row">
				<div class="col-md-8 col-lg-8">
					@yield('content')
				</div>
				<div class="col-md-4 col-lg-4">
					@include ('inc.sidebar')
				</div>
			</div>
		</div>
		
		<footer id="footer" class="text-center">
			<p>Copyright 2018 &copy; Krišjānis Beitāns</p>
			
		</footer>
		
	</body>

</html>