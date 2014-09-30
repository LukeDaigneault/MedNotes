@extends('layout')

@section('content')

<h2 class="sub-header">Create New Patient</h2>
 
<div class="row">	
	<div class="panel panel-default">
		<div class="panel-body">
			{{ Form::open(array('route' => 'create.patient', 'method' => 'POST')) }}
			{{ Form::label('firstName', 'FirstName:') }}
			{{ Form::text('firstName') }}
			{{ Form::label('lastName', 'LastName:') }}
			{{ Form::text('lastName') }}
			{{ Form::label('address', 'Address:') }}
			{{ Form::text('address') }}
			{{ Form::label('dob', 'Dob:') }}
			{{ Form::text('dob') }}
			{{ Form::label('consentform', 'Consentform:') }}
			{{ Form::text('consentform') }}
		<!--	{{ Form::label('user_id', 'User_id:') }}
			{{ Form::text('user_id') }}
			{{ Form::label('doctor_id', 'Doctor_id:') }}
			{{ Form::text('doctor_id') }}
			{{ Form::label('history_id', 'History_id:') }}
			{{ Form::text('history_id') }}-->
			{{ Form::submit('Submit', ['class' => 'btn btn-lg btn-primary btn-block']) }}

{{ Form::close() }}
		</div>
	</div>
</div>
	
@stop