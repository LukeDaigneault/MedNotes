{{ Form::open(array('route' => 'route.name', 'method' => 'POST')) }}
	<ul>
		<li>
			{{ Form::label('note', 'Note:') }}
			{{ Form::text('note') }}
		</li>
		<li>
			{{ Form::label('condition_id', 'Condition_id:') }}
			{{ Form::text('condition_id') }}
		</li>
		<li>
			{{ Form::submit() }}
		</li>
	</ul>
{{ Form::close() }}