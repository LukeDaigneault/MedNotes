@extends('layout')

@section('head')
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">
@stop
@section('content')

<h2 class="sub-header">Create Patient</h2>
	<div class="row">
	{{ Form::open(array('route' => 'create.patient', 'method' => 'POST')) }}
		<div class="form-group">
		{{ Form::label('firstName', 'First Name') }}
		{{ Form::text('firstName', '', ['class' => 'form-control']) }}
		</div>
		<div class="form-group">
		{{ Form::label('lastName', 'Last Name') }}
		{{ Form::text('lastName', '', ['class' => 'form-control']) }}
		</div>
		<div class="form-group">
		{{ Form::label('address', 'Address') }}
		{{ Form::text('address', '', ['class' => 'form-control']) }}
		</div>
		<div class="form-group">
		{{ Form::label('dob', 'Date Of Birth') }}
		{{ Form::text('dob', '', array('class' => 'form-control', 'id' => "datepicker")) }}
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

@section('scripts')
<script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>

  <script>
  $(function() {
    $( "#datepicker" ).datepicker({ dateFormat: "dd/mm/yy" });
  });
  </script>
@stop