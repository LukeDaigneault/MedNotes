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
		{{ Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email address', 'required', 'autofocus']) }}
		{{ Form::password('password', ['class' => 'form-control', 'placeholder'=>'Password', 'required']) }}
        {{ Form::submit('Sign in', ['class' => 'btn btn-lg btn-primary btn-block']) }}
      {{ Form::close() }}

    </div> <!-- /container -->

  </body>
</html>