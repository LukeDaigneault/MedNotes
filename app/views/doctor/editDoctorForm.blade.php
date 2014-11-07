<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	<h4 class="modal-title" id="myModalLabel">Edit {{ $doctor->name }}</h4>
</div>
{{ Form::open(['route' => ['edit.doctor', $doctor->id], 'method' => 'POST', 'id' => 'editDoctorForm']) }}
	<div class="modal-body">
			<div class="row alert alert-warning hidePanel" id="doctorEditErrors">

			</div>
		<div class="form-group">
			{{ Form::label('name', 'Doctors Name') }}
			{{ Form::text('name', $doctor->name, ['class' => 'form-control']) }}
			{{ Form::label('phoneNumber', 'Doctors Phone Number') }}
			{{ Form::text('phoneNumber', $doctor->phoneNumber, ['class' => 'form-control']) }}
			{{ Form::label('address', 'Doctors Address') }}
			{{ Form::text('address', $doctor->address, ['class' => 'form-control']) }}
		</div>
	</div>
	<div class="modal-footer">
		<div class="form-group">
			{{ Form::submit('Update', ['class' => 'btn btn-primary']) }}
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		</div>
	</div>
{{ Form::close() }}