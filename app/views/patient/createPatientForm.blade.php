@extends('layout')

@section('head')
<link href="{{ asset('css/jquery-ui.min.css') }}" rel="stylesheet">

@stop
@section('content')

<h2 class="sub-header">Create Patient</h2>
<div class="container">
	@if (!($errors->isEmpty()))
	<div class="row alert alert-warning">
		@foreach($errors->all() as $error)
		<h4>{{ $error }}</h4>
		@endforeach
	</div>
	@endif
	
	<div class="stepwizard">
		<div class="stepwizard-row setup-panel">
			<div class="stepwizard-step">
				<a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
				<p>Patient Details</p>
			</div>
			<div class="stepwizard-step">
				<a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
				<p>Patient History</p>
			</div>
			<div class="stepwizard-step">
				<a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
				<p>Referral Details</p>
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
				{{ Form::label('email', 'Email Address') }}
				{{ Form::text('email', '', ['class' => 'form-control', 'required' => 'required']) }}
				</div>
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
				{{ Form::label('doctorsName', 'Doctors Name') }}
				{{ Form::text('doctorsName', '', ['class' => 'form-control']) }}
				</div>
				<div class="form-group">
				{{ Form::label('doctorsPhoneNumber', 'Doctors Phone Number') }}
				{{ Form::text('doctorsPhoneNumber', '', ['class' => 'form-control']) }}
				</div>
				<div class="form-group">
				{{ Form::label('doctorsAddress', 'Doctors Address') }}
				{{ Form::text('doctorsAddress', '', ['class' => 'form-control']) }}
				</div>
				<div class="form-group">
				{{ Form::submit('Create', ['class' => 'btn btn-primary btn-lg']) }}
				<a href="/" class="btn btn-link">Cancel</a>
				
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
				{{ Form::label('doctorsID', 'Select From List') }}
				<select class="form-control" id="doctorsID" name="doctorsID" onchange="populateData(this.value)">
					<option selected value="0">Select From List Or Enter Details</option>
					@foreach($doctors as $doctor)
					<option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
					@endforeach
				</select>
				{{ Form::close() }}
				 </div>
				
				
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
  
  function populateData(value){
		if(value==0){
        $('#doctorsName').val("");
		$('#doctorsPhoneNumber').val("");
		$('#doctorsAddress').val("");
		$('#doctorsID').val("");
		document.getElementById('doctorsName').disabled = false;
		document.getElementById('doctorsPhoneNumber').disabled = false;
		document.getElementById('doctorsAddress').disabled = false;
    }else{
		document.getElementById('doctorsName').disabled = true;
		document.getElementById('doctorsPhoneNumber').disabled = true;
		document.getElementById('doctorsAddress').disabled = true;
	
	}
		@foreach($doctors as $doctor)
		if(value=={{ $doctor->id }}){
        $('#doctorsName').val("{{ $doctor->name }}");
		$('#doctorsPhoneNumber').val("{{ $doctor->phoneNumber }}");
		$('#doctorsAddress').val("{{ $doctor->address }}");
		$('#doctorsID').val("{{ $doctor->id }}");
    }
	@endforeach
		
  }
    </script>
@stop