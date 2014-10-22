<!DOCTYPE html>
<html lang="en">
	<head>
    <meta charset="utf-8">
    <link rel="icon" href="{{ asset('favicon.ico') }}">

    <title>MedNotes App</title>
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
	@yield('head')
	</head>
	<body>
		
		<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="{{ route('index') }}">Med Notes</a>				
				</div>
				<div class="navbar-collapse collapse">
					<ul class="nav navbar-nav navbar-right">
						<li><a href="{{ route('logout') }}">Log Out</a></li>
					</ul>
					{{ Form::open(['route' => 'search.patient', 'class' => 'navbar-form navbar-right', 'method' => 'POST']) }}
					{{ Form::text('search', '', ['class' => 'form-control', 'placeholder'=>'Search Patients']) }}
					{{ Form::close() }}					
				</div>
			</div>
		</div>
		
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-3 col-md-1 sidebar">
					<ul class="nav nav-sidebar">
						<li id="PatientIndex"><a href="{{ route('index') }}">Patient Index</a></li>
						<li id="DoctorIndex"><a href="{{ route('index.doctor') }}">Doctor Index</a></li>
						<li><a href="#">Reports</a></li>
						<li><a href="#">Index</a></li>
					</ul>
					<ul class="nav nav-sidebar">
						<li><a href="">Nav item</a></li>
					</ul>
				</div>
				<div class="col-sm-9 col-sm-offset-3 col-md-11 col-md-offset-1 main">
				 
				  @yield('content')
				
				 
				</div>
			</div>
		</div>

		 <!-- Bootstrap core JavaScript
		 ================================================== -->
		 <!-- Placed at the end of the document so the pages load faster -->
		<script src="{{ asset('js/jquery-1.11.1.min.js') }}"></script>
		<script src="{{ asset('js/bootstrap.min.js') }}"></script>
		@yield('scripts')
	</body>
</html>
