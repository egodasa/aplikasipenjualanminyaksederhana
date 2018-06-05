<!DOCTYPE html>
<html>
<head>
	<title>KIOS MALASNGODING</title>
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
				<a href="http://www.malasngoding.com" class="navbar-brand">KIOS MALASNGODING</a>
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<div class="collapse navbar-collapse">				
				<ul class="nav navbar-nav navbar-right">
					<li><a id="pesan_sedia" href="#" data-toggle="modal" data-target="#modalpesan" style="color: rgb(255, 0, 0);"><span class="glyphicon glyphicon-comment"></span>  Pesan<span class="glyphicon glyphicon-asterisk"></span></a></li>
					<li><a class="dropdown-toggle" data-toggle="dropdown" role="button" href="#">Hy , malasngoding&nbsp;&nbsp;<span class="glyphicon glyphicon-user"></span></a></li>
				</ul>
			</div>
		</div>
	</div>

	
	@include('template/sidebar-admin')
	
	
	<div class="col-md-10">
<!-- CONTENT -->
	@yield('content')
<!-- EOF CONTENT -->
</div>
	</body>
</html>
