<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	<h4 class="modal-title" id="myModalLabel">Edit {{ $doctor->name }}</h4>
</div>
{{ Form::open(['route' => ['edit.doctor', $doctor->id], 'method' => 'POST']) }}
	<div class="modal-body">
		@if (!($errors->isEmpty()))
			<div class="row alert alert-warning">
				@foreach($errors->all() as $error)
				<h4>{{ $error }}</h4>
				@endforeach
			</div>
		@endif
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
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			{{ Form::submit('Update', ['class' => 'btn btn-primary']) }}
			
		</div>
	</div>
{{ Form::close() }}