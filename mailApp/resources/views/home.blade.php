<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/home.css')}}">
</head>
<body>
<h1 align="center">Hi!,<font></font><br>Subscribe to our Newsletter</h1>
<div class="well" id="cover">
<div id="formCover">
	<form method="POST" action="{{url('subscribe')}}">
	{!! csrf_field() !!}
		<input id="name" type="text" name="name">
		<input type="email" name="email">
		<input style="color: black;" value="Subscribe" type="submit">
	</form>
	</div>
</div>
<a class="text-right" href="{{url('panel')}}"><h3>Click for Panel</h3></a>
<script type="text/javascript" src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('jquery/jquery-3.2.1.min.js')}}"></script>
<script type="text/javascript" src="{{asset('jquery/jquery-3.2.1.js')}}"></script>
<script type="text/javascript" src="{{asset('js/home.js')}}"></script>
</body>
</html>