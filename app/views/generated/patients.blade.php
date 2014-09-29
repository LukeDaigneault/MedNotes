{{ Form::open(array('route' => 'route.name', 'method' => 'POST')) }}
	<ul>
		<li>
			{{ Form::label('firstName', 'FirstName:') }}
			{{ Form::text('firstName') }}
		</li>
		<li>
			{{ Form::label('lastName', 'LastName:') }}
			{{ Form::text('lastName') }}
		</li>
		<li>
			{{ Form::label('address', 'Address:') }}
			{{ Form::text('address') }}
		</li>
		<li>
			{{ Form::label('dob', 'Dob:') }}
			{{ Form::text('dob') }}
		</li>
		<li>
			{{ Form::label('consentform', 'Consentform:') }}
			{{ Form::text('consentform') }}
		</li>
		<li>
			{{ Form::label('user_id', 'User_id:') }}
			{{ Form::text('user_id') }}
		</li>
		<li>
			{{ Form::label('doctor_id', 'Doctor_id:') }}
			{{ Form::text('doctor_id') }}
		</li>
		<li>
			{{ Form::label('history_id', 'History_id:') }}
			{{ Form::text('history_id') }}
		</li>
		<li>
			{{ Form::submit() }}
		</li>
	</ul>
{{ Form::close() }}