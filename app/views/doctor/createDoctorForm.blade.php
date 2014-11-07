<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	<h4 class="modal-title" id="myModalLabel">Create Doctor</h4>
</div>
{{ Form::open(['route' => 'create.doctor', 'method' => 'POST', 'id'=>'createDoctorForm']) }}
	<div class="modal-body">
			<div class="row alert alert-warning hidePanel" id="doctorCreateErrors">

			</div>
		<div class="form-group">
		
			{{ Form::label('name', 'Doctors Name') }}
			{{ Form::text('name', '', ['class' => 'form-control']) }}
			{{ Form::label('phoneNumber', 'Doctors Phone Number') }}
			{{ Form::text('phoneNumber', '', ['class' => 'form-control']) }}
			{{ Form::label('address', 'Doctors Address') }}
			{{ Form::text('address', '', ['class' => 'form-control']) }}
		</div>
	</div>
	<div class="modal-footer">
		<div class="form-group">
			{{ Form::submit('Create', ['class' => 'btn btn-primary']) }}
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		</div>
	</div>
{{ Form::close() }}