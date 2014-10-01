@extends('layout')

@section('head')
<link href="{{ asset('css/createpatient.css') }}" rel="stylesheet">
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">
@stop
@section('content')

<h2 class="sub-header">Create Patient</h2>
<div class="container">
	<div class="stepwizard">
		<div class="stepwizard-row setup-panel">
			<div class="stepwizard-step">
				<a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
				<p>Details</p>
			</div>
			<div class="stepwizard-step">
				<a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
				<p>History</p>
			</div>
			<div class="stepwizard-step">
				<a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
				<p>Condition</p>
			</div>
		</div>
	</div>
		<div class="row setup-content" id="step-1">
			<div class="col-md-6">
			{{ Form::open(array('route' => 'create.patient', 'method' => 'POST')) }}
				<div class="form-group">
				{{ Form::label('firstName', 'First Name') }}
				{{ Form::text('firstName', '', ['class' => 'form-control', 'required' => "required"]) }}
				</div>
				<div class="form-group">
				{{ Form::label('lastName', 'Last Name') }}
				{{ Form::text('lastName', '', ['class' => 'form-control']) }}
				</div>
				<div class="form-group">
				{{ Form::label('homePhone', 'Home Phone Number') }}
				{{ Form::text('homePhone', '', ['class' => 'form-control']) }}
				</div>
				<div class="form-group">
				{{ Form::label('mobilePhone', 'Mobile Phone Number') }}
				{{ Form::text('mobilePhone', '', ['class' => 'form-control']) }}
				</div>
			</div>
			<div class="col-md-6">
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
			</div>
			<button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
		</div>
		<div class="row setup-content" id="step-2">
		<button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
		</div>
		<div class="row setup-content" id="step-3">
				{{ Form::submit('Create', ['class' => 'btn btn-primary']) }}
				<a href="/" class="btn btn-link">Cancel</a>
				{{ Form::close() }}
		</div>
</div>	
@stop

@section('scripts')
<script src="{{ asset('js/createpatient.js') }}"></script>
<script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>

  <script>
  $(function() {
    $( "#datepicker" ).datepicker({ dateFormat: "dd/mm/yy" });
  });
  </script>
@stop