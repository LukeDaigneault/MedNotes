@extends('patient.patientTemplate')

@section('head')
<link href="{{ asset('css/jquery-ui.min.css') }}" rel="stylesheet">

@stop
@section('content')

<h2 class="sub-header">Edit {{ $patient->lastName }}, {{$patient->firstName }}</h2>

@if (!($errors->isEmpty()))
	<div class="row alert alert-warning">
		@foreach($errors->all() as $error)
		<h4>{{ $error }}</h4>
		@endforeach
	</div>
	@endif
	
		<div class="col-md-6">
			{{ Form::open(['route' => ['edit.patient', $patient->id], 'method' => 'POST']) }}
				<div class="form-group">
				{{ Form::label('firstName', 'First Name') }}
				{{ Form::text('firstName', $patient->firstName, ['class' => 'form-control', 'required' => 'required', ]) }}
				{{ Form::label('lastName', 'Last Name') }}
				{{ Form::text('lastName', $patient->lastName, ['class' => 'form-control', 'required' => 'required']) }}
				{{ Form::label('homePhone', 'Home Phone Number') }}
				{{ Form::text('homePhone', $patient->homePhone, ['class' => 'form-control']) }}
				{{ Form::label('mobilePhone', 'Mobile Phone Number') }}
				{{ Form::text('mobilePhone', $patient->mobilePhone, ['class' => 'form-control']) }}
				{{ Form::label('email', 'Email Address') }}
				{{ Form::text('email', $patient->email, ['class' => 'form-control', 'required' => 'required']) }}
				{{ Form::label('address', 'Address') }}
				{{ Form::text('address', $patient->address, ['class' => 'form-control']) }}
				{{ Form::label('dob', 'Date Of Birth') }}
				{{ Form::text('dob', date("d/m/Y", strtotime($patient->dob)), ['class' => 'form-control', 'required' => 'required', 'id' => 'datepicker']) }}
				</div>
			</div>

		<div class="col-md-6">
		@if (is_object($patient->doctor) )
				<div class="form-group">
				{{ Form::label('doctorsName', 'Doctors Name') }}
				{{ Form::text('doctorsName', $patient->doctor->name, ['class' => 'form-control']) }}
				{{ Form::label('doctorsPhoneNumber', 'Doctors Phone Number') }}
				{{ Form::text('doctorsPhoneNumber', $patient->doctor->phoneNumber, ['class' => 'form-control']) }}
				{{ Form::label('doctorsAddress', 'Doctors Address') }}
				{{ Form::text('doctorsAddress', $patient->doctor->address, ['class' => 'form-control']) }}
				</div>
				<div class="form-group">
				{{ Form::label('doctorsID', 'Select From List') }}
					<select class="form-control" id="doctorsID" name="doctorsID" onchange="populateData(this.value)" >
						<option value="0">Select From List Or Enter Details</option>
						@foreach($doctors as $doctor)
						 @if ($doctor->id == $patient->doctor->id)
						  <option selected value="{{ $doctor->id }}">{{ $doctor->name }}</option>
						 @else
						 <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
						 @endif
						@endforeach
					</select>
				 </div>
		@else
				<div class="form-group">
				{{ Form::label('doctorsName', 'Doctors Name') }}
				{{ Form::text('doctorsName', '', ['class' => 'form-control']) }}
				{{ Form::label('doctorsPhoneNumber', 'Doctors Phone Number') }}
				{{ Form::text('doctorsPhoneNumber', '', ['class' => 'form-control']) }}
				{{ Form::label('doctorsAddress', 'Doctors Address') }}
				{{ Form::text('doctorsAddress', '', ['class' => 'form-control']) }}
				</div>
				<div class="form-group">
				{{ Form::label('doctorsID', 'Select From List') }}
					<select class="form-control" id="doctorsID" name="doctorsID" onchange="populateData(this.value)" >
						<option selected value="0">Select From List Or Enter Details</option>
						@foreach($doctors as $doctor)
						<option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
						@endforeach
					</select>
				 </div>
		
		@endif
				
				
				<div class="form-group">
				{{ Form::submit('Update', ['class' => 'btn btn-primary btn-lg']) }}
					<a href="{{ route('index') }}" class="btn btn-link">Cancel</a>
				{{ Form::close() }}
				</div>
		</div>
		

@stop

@section('patientScripts')

<script src="{{ asset('js/jquery-ui.min.js') }}"></script>
<script>
  $(function() {
    $( "#datepicker" ).datepicker({ dateFormat: "dd/mm/yy", changeYear: true, changeMonth: true, yearRange: "-100:-0", minDate: "-100Y", maxDate: "+0D" });
  });
  
  function populateData(value){
		if(value=="0"){
        $('#doctorsName').val("");
		$('#doctorsPhoneNumber').val("");
		$('#doctorsAddress').val("");
		$('#doctorsID').val("0");
		$('#doctorsName').prop('disabled', false);
		$('#doctorsPhoneNumber').prop('disabled', false);
		$('#doctorsAddress').prop('disabled', false);
    }else{
		$('#doctorsName').prop('disabled', true);
		$('#doctorsPhoneNumber').prop('disabled', true);
		$('#doctorsAddress').prop('disabled', true);
	
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
  
  populateData($('#doctorsID').val());
  </script>
@stop