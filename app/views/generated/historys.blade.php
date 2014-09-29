{{ Form::open(array('route' => 'route.name', 'method' => 'POST')) }}
	<ul>
		<li>
			{{ Form::label('social', 'Social:') }}
			{{ Form::text('social') }}
		</li>
		<li>
			{{ Form::label('drug', 'Drug:') }}
			{{ Form::text('drug') }}
		</li>
		<li>
			{{ Form::label('conditions', 'Conditions:') }}
			{{ Form::text('conditions') }}
		</li>
		<li>
			{{ Form::label('details', 'Details:') }}
			{{ Form::text('details') }}
		</li>
		<li>
			{{ Form::submit() }}
		</li>
	</ul>
{{ Form::close() }}