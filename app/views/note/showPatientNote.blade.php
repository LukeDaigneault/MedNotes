<h4>{{ $complaint->description }}	<button class="btn btn-info" id="newNoteBtn">Add Note</button></h4>

<div id="createNoteDiv" class="createForm">
	@if (!($errors->isEmpty()))
		<div class="row alert alert-warning">
			<strong>This field can not be blank</strong>
		</div>
		@endif
		{{ Form::open(['route' => ['create.patientNote', $complaint->id], 'method' => 'POST', 'id' =>'createNoteFrom']) }}
			<div class="form-group">
				{{ Form::textarea('note', 'S:


O:


A:


P:', ['class' => 'form-control', 'style' => 'resize:vertical']) }}
			</div>
			{{ Form::submit('Create', ['class' => 'btn btn-primary']) }}
		<button class="btn btn-link" class="btn btn-link" id="cancelNoteBtn">Cancel</button>
		{{ Form::close() }} 
</div>

@if ($complaint->patientNotes->isEmpty())
        <p>There are no notes! :(</p>
@else
	
	@foreach($complaint->patientNotes as $patientNote)
		<pre class = "pre-scrollable">{{ $patientNote->note }}</pre>
		<a href="{{ route('edit.patientNote', $patientNote->id) }}" class="btn btn-info">Edit</a>
		<a href="{{ route('delete.patientNote', $patientNote->id) }}" class="btn btn-danger">Delete</a>
		<small>Created: {{ $patientNote->created_at }}</small>
		@if (!($patientNote->created_at == $patientNote->updated_at))
		<small>Updated: {{ $patientNote->updated_at }}</small>
		@endif
		<p/>
	@endforeach
		
@endif