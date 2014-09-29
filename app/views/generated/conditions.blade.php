{{ Form::open(array('route' => 'route.name', 'method' => 'POST')) }}
	<ul>
		<li>
			{{ Form::label('description', 'Description:') }}
			{{ Form::text('description') }}
		</li>
		<li>
			{{ Form::label('patient_id', 'Patient_id:') }}
			{{ Form::text('patient_id') }}
		</li>
		<li>
			{{ Form::submit() }}
		</li>
	</ul>
{{ Form::close() }}