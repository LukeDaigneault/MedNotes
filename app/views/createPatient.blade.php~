@extends('layout')

@section('head')
<link href="{{ asset('css/jquery-ui.min.css') }}" rel="stylesheet">

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
				{{ Form::text('firstName', '', ['class' => 'form-control', 'required' => 'required', ]) }}
				</div>
				<div class="form-group">
				{{ Form::label('lastName', 'Last Name') }}
				{{ Form::text('lastName', '', ['class' => 'form-control', 'required' => 'required']) }}
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
				{{ Form::text('dob', '', ['class' => 'form-control', 'required' => 'required', 'id' => 'datepicker']) }}
				</div>
			</div>
			<button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
		</div>
		<div class="row setup-content" id="step-2">
			<div class="col-md-6">
				<div class="form-group">
					{{ Form::label('social', 'Social') }}
					{{ Form::textarea('social', '', ['class' => 'form-control', 'style' => 'resize:vertical']) }}
				</div>
				<div class="form-group">
					{{ Form::label('drug', 'Drug') }}
					{{ Form::textarea('drug', '', ['class' => 'form-control', 'style' => 'resize:vertical']) }}
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					{{ Form::label('conditions', 'Conditions') }}
					{{ Form::textarea('conditions', '', ['class' => 'form-control', 'style' => 'resize:vertical']) }}
				</div>
				<div class="form-group">
					{{ Form::label('details', 'Details') }}
					{{ Form::textarea('details', '', ['class' => 'form-control', 'style' => 'resize:vertical']) }}
				</div>
			</div>		
			<button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
		</div>
		<div class="row setup-content" id="step-3">
		
			<div class="col-md-6">
				<div class="form-group">
				{{ Form::label('doctorsname', 'Doctors Name') }}
				{{ Form::text('doctorsname', '', ['class' => 'form-control']) }}
				</div>
				<div class="form-group">
				{{ Form::label('doctorsphoneNumber', 'Doctors Phone Number') }}
				{{ Form::text('doctorsphoneNumber', '', ['class' => 'form-control']) }}
				</div>
				<div class="form-group">
				{{ Form::label('doctorsaddress', 'Doctors Address') }}
				{{ Form::text('doctorsaddress', '', ['class' => 'form-control']) }}
				</div>
				<div class="form-group">
				{{ Form::submit('Create', ['class' => 'btn btn-primary']) }}
				<a href="/" class="btn btn-link">Cancel</a>
				{{ Form::close() }}
				</div>
			</div>
			<div class="col-md-6">
			</div>
				
		</div>
</div>	
@stop

@section('scripts')

<script src="{{ asset('js/jquery-ui.min.js') }}"></script>
<script src="{{ asset('js/createpatient.js') }}"></script>
  <script>
  $(function() {
    $( "#datepicker" ).datepicker({ dateFormat: "dd/mm/yy", changeYear: true, changeMonth: true, yearRange: "-100:-0", minDate: "-100Y", maxDate: "+0D" });
  });
  </script>
@stop