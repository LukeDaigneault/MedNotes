<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	<h4 class="modal-title" id="myModalLabel">Edit {{ $patient->lastName }}, {{$patient->firstName }}</h4>
</div>
{{ Form::open(['route' =>  ['edit.patient', $patient->id], 'method' => 'POST', 'id'=>'editPatientForm']) }}
	<div class="modal-body">
		<div class="row alert alert-warning hidePanel" id="patientEditErrors">

		</div>
		<div class="form-group">
			{{ Form::label('firstName', 'First Name') }}
			{{ Form::text('firstName', $patient->firstName, ['class' => 'form-control', 'required' => 'required', ]) }}
			{{ Form::label('lastName', 'Last Name') }}
			{{ Form::text('lastName', $patient->lastName, ['class' => 'form-control', 'required' => 'required']) }}
			{{ Form::label('address', 'Address') }}
			{{ Form::text('address', $patient->address, ['class' => 'form-control']) }}
			{{ Form::label('email', 'Email Address') }}
			{{ Form::text('email', $patient->email, ['class' => 'form-control', 'required' => 'required']) }}
			{{ Form::label('homePhone', 'Home Phone Number') }}
			{{ Form::text('homePhone', $patient->homePhone, ['class' => 'form-control']) }}
			{{ Form::label('mobilePhone', 'Mobile Phone Number') }}
			{{ Form::text('mobilePhone', $patient->mobilePhone, ['class' => 'form-control']) }}
			{{ Form::label('dob', 'Date Of Birth') }}
			{{ Form::text('dob', date("d/m/Y", strtotime($patient->dob)), ['class' => 'form-control', 'required' => 'required', 'id' => 'datepicker']) }}
		</div>
		<script>
		$(function() {
			$( "#datepicker" ).datepicker({ dateFormat: "dd/mm/yy", changeYear: true, changeMonth: true, yearRange: "-100:-0", minDate: "-100Y", maxDate: "+0D" });
		});	
		</script>
	</div>
	<div class="modal-footer">
		<div class="form-group">
			{{ Form::submit('Update', ['class' => 'btn btn-primary']) }}
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		</div>
	</div>
{{ Form::close() }}