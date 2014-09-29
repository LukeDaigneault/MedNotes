{{ Form::open(array('route' => 'route.name', 'method' => 'POST')) }}
	<ul>
		<li>
			{{ Form::label('name', 'Name:') }}
			{{ Form::text('name') }}
		</li>
		<li>
			{{ Form::label('phoneNumber', 'PhoneNumber:') }}
			{{ Form::text('phoneNumber') }}
		</li>
		<li>
			{{ Form::label('address', 'Address:') }}
			{{ Form::text('address') }}
		</li>
		<li>
			{{ Form::submit() }}
		</li>
	</ul>
{{ Form::close() }}