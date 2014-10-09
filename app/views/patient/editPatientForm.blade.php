@extends('patient.patientTemplate')

@section('head')
<link href="{{ asset('css/jquery-ui.min.css') }}" rel="stylesheet">

@stop
@section('content')

<h2 class="sub-header">Edit {{ $patient->lastName }}, {{$patient->firstName }}</h2>
		<div class="col-md-6">
			{{ Form::open(array('route' => 'edit.patient', 'method' => 'POST')) }}
				<div class="form-group">
				{{ Form::label('firstName', 'First Name') }}
				{{ Form::text('firstName', $patient->firstName, ['class' => 'form-control', 'required' => 'required', ]) }}
				</div>
				<div class="form-group">
				{{ Form::label('lastName', 'Last Name') }}
				{{ Form::text('lastName', $patient->lastName, ['class' => 'form-control', 'required' => 'required']) }}
				</div>
				<div class="form-group">
				{{ Form::label('homePhone', 'Home Phone Number') }}
				{{ Form::text('homePhone', $patient->homePhone, ['class' => 'form-control']) }}
				</div>
				<div class="form-group">
				{{ Form::label('mobilePhone', 'Mobile Phone Number') }}
				{{ Form::text('mobilePhone', $patient->mobilePhone, ['class' => 'form-control']) }}
				</div>
				<div class="form-group">
				{{ Form::label('email', 'Email Address') }}
				{{ Form::text('email', $patient->email, ['class' => 'form-control', 'required' => 'required']) }}
				</div>
				<div class="form-group">
				{{ Form::label('address', 'Address') }}
				{{ Form::text('address', $patient->address, ['class' => 'form-control']) }}
				</div>
				<div class="form-group">
				{{ Form::label('dob', 'Date Of Birth') }}
				{{ Form::text('dob', $patient->dob, ['class' => 'form-control', 'required' => 'required', 'id' => 'datepicker']) }}
				</div>
			</div>

		<div class="col-md-6">
		@if (is_object($refDoctor) )
				<div class="form-group">
				{{ Form::label('doctorsName', 'Doctors Name') }}
				{{ Form::text('doctorsName', $refDoctor->name, ['class' => 'form-control']) }}
				</div>
				<div class="form-group">
				{{ Form::label('doctorsPhoneNumber', 'Doctors Phone Number') }}
				{{ Form::text('doctorsPhoneNumber', $refDoctor->phoneNumber, ['class' => 'form-control']) }}
				</div>
				<div class="form-group">
				{{ Form::label('doctorsAddress', 'Doctors Address') }}
				{{ Form::text('doctorsAddress', $refDoctor->address, ['class' => 'form-control']) }}
				</div>
		@else
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
		
		@endif
				<div class="form-group">
				{{ Form::label('doctorsID', 'Select From List') }}
					<select class="form-control" id="doctorsID" name="doctorsID" onchange="populateData(this.value)">
						<option selected value="0">Select From List Or Enter Details</option>
						@foreach($doctors as $doctor)
						<option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
						@endforeach
					</select>
				
				 </div>
				
				<div class="form-group">
				{{ Form::submit('Update', ['class' => 'btn btn-primary btn-lg']) }}
					<a href="/" class="btn btn-link">Cancel</a>
				{{ Form::close() }}
				</div>
		</div>
		

@stop

@section('patientScripts')

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