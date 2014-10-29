<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">

    <title>MedNotes</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/signin.css') }}" rel="stylesheet">

     
  </head>

  <body>

    <div class="container">
      {{ Form::open(['route' => 'create.user', 'method' => 'POST', 'class' => 'form-signin']) }}
      <h2 class="form-signin-heading">Register</h2>
	     @if (!($errors->isEmpty()))
			<div class="row alert alert-warning">
				@foreach($errors->all() as $error)
					<h4>{{ $error }}</h4>
				@endforeach
			</div>
		@endif
		 <div class="form-group">
                    {{ Form::label('username', 'Username:') }}
                    {{ Form::text('username', null, ['class' => 'form-control', 'required' => 'required']) }}
                </div>

                <!--- Email Field --->
                <div class="form-group">
                    {{ Form::label('email', 'Email:') }}
                    {{ Form::text('email', null, ['class' => 'form-control', 'required' => 'required']) }}
                </div>

                <!--- Password Field --->
                <div class="form-group">
                    {{ Form::label('password', 'Password:') }}
                    {{ Form::password('password', ['class' => 'form-control', 'required' => 'required']) }}
                </div>

                <!--- Confirm Password Field --->
                <div class="form-group">
                    {{ Form::label('password_confirmation', 'Confirm Password:') }}
                    {{ Form::password('password_confirmation', ['class' => 'form-control', 'required' => 'required']) }}
                </div>

                <!--- Sign Up Field --->
                <div class="form-group">
                    {{ Form::submit('Sign Up', ['class' => 'btn btn-lg btn-primary btn-block']) }}
					<a href = "{{ route('login') }}" class="btn btn-lg btn-primary btn-block">Return to Login</a>
                </div>
      {{ Form::close() }}
		
    </div> <!-- /container -->
	
  </body>
</html>