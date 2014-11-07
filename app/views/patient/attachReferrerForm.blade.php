<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	<h4 class="modal-title" id="myModalLabel">Add Referrer</h4>
</div>
{{ Form::open(['route' =>  ['add.referrer', $patient->id], 'method' => 'POST', 'id'=>'attachReferrerForm']) }}
	<div class="modal-body">
		<div class="row alert alert-warning hidePanel" id="patientReferrerErrors">

		</div>
		<div class="form-group">
			{{ Form::label('name', 'Doctors Name') }}
			{{ Form::text('name', '', ['class' => 'form-control']) }}
			{{ Form::label('phoneNumber', 'Doctors Phone Number') }}
			{{ Form::text('phoneNumber', '', ['class' => 'form-control']) }}
			{{ Form::label('address', 'Doctors Address') }}
			{{ Form::text('address', '', ['class' => 'form-control']) }}
			{{ Form::label('doctorsID', 'Select From List') }}
			<select class="form-control" id="doctorsID" name="doctorsID" onchange="populateData(this.value)">
				<option selected value="0">Select From List Or Enter Details</option>
				@foreach($doctors as $doctor)
					<option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
				@endforeach
			</select>
			<script>
				function populateData(value){
					if(value==0){
						$('#name').val("");
						$('#phoneNumber').val("");
						$('#address').val("");
						$('#doctorsID').val("");
						$('#name').prop('disabled', false);
						$('#phoneNumber').prop('disabled', false);
						$('#address').prop('disabled', false);
					}else{
						$('#name').prop('disabled', true);
						$('#phoneNumber').prop('disabled', true);
						$('#address').prop('disabled', true);
					}
						@foreach($doctors as $doctor)
						if(value=={{ $doctor->id }}){
						$('#name').val("{{ $doctor->name }}");
						$('#phoneNumber').val("{{ $doctor->phoneNumber }}");
						$('#address').val("{{ $doctor->address }}");
						$('#doctorsID').val("{{ $doctor->id }}");
					}
					@endforeach	
				}
</script>
		</div>
	</div>
	<div class="modal-footer">
		<div class="form-group">
			{{ Form::submit('Add', ['class' => 'btn btn-primary']) }}
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		</div>
	</div>
{{ Form::close() }}
