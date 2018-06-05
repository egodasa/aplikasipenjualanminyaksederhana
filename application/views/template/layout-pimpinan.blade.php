<!DOCTYPE html>
<html>
<head>
	<title>@yield('judul')</title>
	<link rel="stylesheet" type="text/css" href="{{ base_url() }}assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="{{ base_url() }}assets/js/jquery-ui/jquery-ui.css">
	<script type="text/javascript" src="{{ base_url() }}assets/js/jquery.js"></script>
	<script type="text/javascript" src="{{ base_url() }}assets/js/jquery.js"></script>
	<script type="text/javascript" src="{{ base_url() }}assets/js/bootstrap.js"></script>
	<script type="text/javascript" src="{{ base_url() }}assets/js/jquery-ui/jquery-ui.js"></script>	
</head>
<body>
<div class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand">@yield('header')</a>
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<div class="collapse navbar-collapse">				
				<ul class="nav navbar-nav navbar-right">
					<li><a class="dropdown-toggle" data-toggle="dropdown" role="button" href="#">Hy, <?=$_SESSION['username']?> <span class="glyphicon glyphicon-user"></span></a></li>
					<li><a href="{{ base_url() }}login/out">Logout<span class="glyphicon glyphicon-sign-out"></span></a></li>
				</ul>
			</div>
		</div>
	</div>

	
	@include('template/sidebar-pimpinan')
	
	
	<div class="col-md-10">
<!-- CONTENT -->
	@yield('content')
<!-- EOF CONTENT -->
</div>
	</body>
</html>
