<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>
	<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous"> -->
    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700"> -->
	<link href="{!! asset('css/bootstrap.min.css') !!}" rel="stylesheet">
	<link href="{!! asset('css/bootstrap-theme.min.css') !!}" rel="stylesheet">
	<link href="{!! asset('css/main.css') !!}" rel="stylesheet">
	<link href="{!! asset('css/font-awesome.min.css') !!}" rel="stylesheet">
</head>
<body id="app-layout">
	<div class="">
		<header>
			@include('shared.header')
		</header>
		<section class = 'container'>
			@yield('bodycontain')
		</section>
		<fooetr>
			@include('shared.footer')
		</fooetr>
	</div>
	<script src="{!! asset('js/jquery.js') !!}"></script>
	<script src="{!! asset('js/bootstrap.min.js') !!}"></script>
	<script src="{!! asset('js/script.js') !!}"></script>
</body>
</html>