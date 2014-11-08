<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	<h4 class="modal-title" id="myModalLabel">Create Patient</h4>
</div>
{{ Form::open(['route' => 'create.patient', 'method' => 'POST', 'id'=>'createPatientForm']) }}
	<div class="modal-body">
		<div class="row alert alert-warning hidePanel" id="patientCreateErrors">

		</div>
		<div class="form-group">
			{{ Form::label('firstName', 'First Name') }}
			{{ Form::text('firstName', '', ['class' => 'form-control', 'required' => 'required', ]) }}
			{{ Form::label('lastName', 'Last Name') }}
			{{ Form::text('lastName', '', ['class' => 'form-control', 'required' => 'required']) }}
			{{ Form::label('address', 'Address') }}
			{{ Form::text('address', '', ['class' => 'form-control']) }}
			{{ Form::label('email', 'Email Address') }}
			{{ Form::text('email', '', ['class' => 'form-control', 'required' => 'required']) }}
			{{ Form::label('homePhone', 'Home Phone Number') }}
			{{ Form::text('homePhone', '', ['class' => 'form-control']) }}
			{{ Form::label('mobilePhone', 'Mobile Phone Number') }}
			{{ Form::text('mobilePhone', '', ['class' => 'form-control']) }}
			{{ Form::label('dob', 'Date Of Birth') }}
			{{ Form::text('dob', '', ['class' => 'form-control datepicker', 'required' => 'required', 'id' => 'datepicker']) }}
		</div>
		<script>
		$(function() {
			$( "#datepicker" ).datepicker({ dateFormat: "dd/mm/yy", changeYear: true, changeMonth: true, yearRange: "-100:-0", minDate: "-100Y", maxDate: "+0D" });
		});	
		
		// Since confModal is essentially a nested modal it's enforceFocus method
		// must be no-op'd or the following error results 
		// "Uncaught RangeError: Maximum call stack size exceeded"
		// But then when the nested modal is hidden we reset modal.enforceFocus
		var enforceModalFocusFn = $.fn.modal.Constructor.prototype.enforceFocus;

		$.fn.modal.Constructor.prototype.enforceFocus = function() {};

		$confModal.on('hidden', function() {
   		 $.fn.modal.Constructor.prototype.enforceFocus = enforceModalFocusFn;
		});

		$confModal.modal({ backdrop : false });
		</script>
	</div>
	<div class="modal-footer">
		<div class="form-group">
			{{ Form::submit('Create', ['class' => 'btn btn-primary']) }}
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		</div>
	</div>
{{ Form::close() }}
