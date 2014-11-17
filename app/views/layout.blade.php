<!DOCTYPE html>
<html lang="en">
	<head>
    <meta charset="utf-8">
    <link rel="icon" href="{{ asset('favicon.ico') }}">

    <title>MedNotes</title>
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
					<a class="navbar-brand" href="{{ route('index') }}">MedNotes</a>				
				</div>
				<div class="navbar-collapse collapse">
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a id="drop1" href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Browse<span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu" aria-labelledby="drop1">
								<li role="presentation"><a role="menuitem" tabindex="-1" href="{{ route('index') }}">Patient List</a></li>
								<li role="presentation"><a role="menuitem" tabindex="-1" href="{{ route('index.doctor') }}">Doctor List</a></li>
							</ul>
						</li>
						<li class="dropdown">
							<a id="drop2" href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><span class="glyphicon glyphicon-cog"></span></a>
							<ul class="dropdown-menu" role="menu" aria-labelledby="drop1">
								<li role="presentation"><a role="menuitem" tabindex="-1" href="{{ route('edit.user') }}">Account</a></li>
								<li role="presentation"><a role="menuitem" tabindex="-1" href="{{ route('logout') }}">Log Out</a></li>
							</ul>
						</li>						
					</ul>
					{{ Form::open(['route' => 'search.patient', 'class' => 'navbar-form navbar-right', 'method' => 'POST']) }}
					{{ Form::text('search', '', ['class' => 'form-control', 'placeholder'=>'Search Patients']) }}
					{{ Form::close() }}					
				</div>
			</div>
		</div>
		
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-12 col-md-12 main">
				 
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
