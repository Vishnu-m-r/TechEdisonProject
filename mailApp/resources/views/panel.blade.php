<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/panel.css')}}">
</head>
<body >

	<div class="container-full-width" style="margin-top: 5%;">
		<div class="row" style="margin: 0 auto;">
			<div class="col-sm-1"></div>
			<div class="col-sm-5 inner" style="background-color: red;">
				<h3 style="color: white"><b>Our Subscribers:</b></h3>
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Email</th>
							<th>Name</th>
						</tr>
					</thead>
					<tbody>
						
					</tbody>
				</table>
			</div>

			<div class="col-sm-5 inner" style="background-color: black;">
				<h3 style="color: white;"><b>Send Mail :</b></h3>
				<form method="POST" action="{{url('/sendmail')}}">
					{!! csrf_field() !!}
					<input class="btn btn-default" style="width: 100%;" placeholder="subject" type="text" name="subject"><br><br><br>
					<textarea class="btn-default" name="message" placeholder="Message" style="height: 100px;width:100%;"></textarea><br><br>
					<input class="btn btn-primary" type="submit" value="Send"><br><br>
				</form>
			</div>
			<div class="col-sm-1"></div>
		</div>
	</div>

	<script type="text/javascript" src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>

	<script type="text/javascript" src="{{asset('jquery/jquery-3.2.1.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('jquery/jquery-3.2.1.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/panel.js')}}"></script>
</body>
</html>