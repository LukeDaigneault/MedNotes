@extends('layout')
@section('head')

@stop

@section('content')

 <h2 class="sub-header">Account Details</h2>
	@if (!($errors->isEmpty()))
		<div class="row alert alert-warning">
			@foreach($errors->all() as $error)
				<h4>{{ $error }}</h4>
			@endforeach
		</div>
	@endif
	<div class="row">
		<div class="col-md-6">
		 {{ Form::open(['route' => 'edit.user', 'method' => 'POST']) }}
			<div class="form-group">
						{{ Form::label('username', 'Username:') }}
						{{ Form::text('username', $user->username, ['class' => 'form-control']) }}
					</div>

					<!--- Email Field --->
					<div class="form-group">
						{{ Form::label('email', 'Email:') }}
						{{ Form::text('email', $user->email, ['class' => 'form-control']) }}
					</div>

					<!--- Password Field --->
					<div class="form-group">
						{{ Form::label('password', 'Password:') }}
						{{ Form::password('password', ['class' => 'form-control']) }}
					</div>

					<!--- Confirm Password Field --->
					<div class="form-group">
						{{ Form::label('password_confirmation', 'Confirm Password:') }}
						{{ Form::password('password_confirmation', ['class' => 'form-control']) }}
					</div>

					<!--- buttons Field --->
					<div class="form-group">
						{{ Form::submit('Update Details', ['class' => 'btn btn-primary']) }}
						<a href = "{{ route('index') }}" class="btn btn-default">Return To Index</a>
					</div>
		  {{ Form::close() }}
		</div>
	</div>

@stop

@section ('scripts')

@stop