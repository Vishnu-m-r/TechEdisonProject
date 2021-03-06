<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/panel.css')}}">
</head>
<body>
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
	</div><br><br><br>
	
	<div class="container-full-width">
		<div class="row">
			<div class="col-sm-2"></div>
			<div class="col-sm-8 outer">
				<h3 class="text-center"><b>Upload CSV :</b></h3><br><br>
				
				<center>
				<form id="csvForm" method="POST" action="{{url('/csv')}}" enctype="multipart/form-data">
				{!! csrf_field() !!}
					<input id="csvFile" type="file" name="csvFile"><br><br><br>
					<input class="btn btn-default" type="submit" value="Upload">
				</form>
				</center>

			</div>
			<div class="col-sm-2"></div>
		</div>
	</div><br><br><br>

	<div style="background-color: white;width: 100%;"><br>
	<h2 class="text-center"><b><u>E-Mail Statistics</u></b></h2><br>
		<canvas id="myChart" width="50" height="50"></canvas>
	</div>

	<script type="text/javascript" src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>

	<script type="text/javascript" src="{{asset('jquery/jquery-3.2.1.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('jquery/jquery-3.2.1.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/panel.js')}}"></script>
	<script type="text/javascript" src="{{asset('chart/Chart.js')}}"></script>
</body>
</html>