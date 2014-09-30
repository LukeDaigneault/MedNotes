@extends('layout')

@section('content')
<!--
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
			{{ Form::label('user_id', 'User_id:') }}
			{{ Form::text('user_id') }}
			{{ Form::label('doctor_id', 'Doctor_id:') }}
			{{ Form::text('doctor_id') }}
			{{ Form::label('history_id', 'History_id:') }}
			{{ Form::text('history_id') }}
			

{{ Form::close() }}
		</div>
	</div>
</div>
-->
<h2 class="sub-header">Create Patient</h2>
	<div class="row">
	{{ Form::open(array('route' => 'create.patient', 'method' => 'POST')) }}
		<div class="form-group">
		{{ Form::label('lastName', 'Last Name') }}
		{{ Form::text('lastName', '', ['class' => 'form-control']) }}
		</div>
		<div class="form-group">
		{{ Form::label('firstName', 'First Name') }}
		{{ Form::text('firstName', '', ['class' => 'form-control']) }}
		</div>
		<div class="form-group">
		{{ Form::label('address', 'Address') }}
		{{ Form::text('address', '', ['class' => 'form-control']) }}
		</div>
		<div class="form-group">
		{{ Form::label('dob', 'Date Of Birth') }}
		{{ Form::text('dob', '', array('class' => 'form-control datepicker','data-datepicker' => 'datepicker')) }}
		</div>
		<div class="checkbox">
			<label for="consentform">
				<input type="checkbox" name="consentform" /> Consent Given?
			</label>
		</div>
		{{ Form::submit('Create', ['class' => 'btn btn-primary']) }}
		<a href="/" class="btn btn-link">Cancel</a>
	{{ Form::close() }}
	</div>
	
@stop