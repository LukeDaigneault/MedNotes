<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">

    <title>Med Notes</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/signin.css') }}" rel="stylesheet">

     
  </head>

  <body>

    <div class="container">

      {{ Form::open(['route' => 'authenticate', 'method' => 'POST', 'class' => 'form-signin']) }}
      <h2 class="form-signin-heading">MedNote</h2>
		@if (isset($message))
			<div class="row alert alert-success">
				<h4>{{ $message }}</h4>
			</div>
		@endif
		 @if (!($errors->isEmpty()))
			<div class="row alert alert-warning">
				@foreach($errors->all() as $error)
					<h4>{{ $error }}</h4>
				@endforeach
			</div>
		@endif
		<div class="form-group">
		{{ Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email address', 'required', 'autofocus']) }}
		{{ Form::password('password', ['class' => 'form-control', 'placeholder'=>'Password', 'required']) }}
		</div>
		 <div class="form-group">
        {{ Form::submit('Sign in', ['class' => 'btn btn-lg btn-primary btn-block']) }}
		<a href = "{{ route('register') }}" class="btn btn-lg btn-primary btn-block">Create Account</a>
		</div>
      {{ Form::close() }}
		
    </div> <!-- /container -->

  </body>
</html>