<h4>{{ $complaint->description }}	<button class="btn btn-info" id="newNoteBtn">Add Note</button></h4>
<div class="row alert alert-warning hidePanel" id="noteCreateErrors"><strong>This field can not be blank</strong></div>
<div id="createNoteDiv" class="createForm">
		{{ Form::open(['route' => ['create.patientNote', $complaint->id], 'method' => 'POST', 'id' =>'createNoteForm']) }}
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
	<div id='patientNote{{ $patientNote->id }}'>
			<textarea class = "form-control" disabled = "true" cols = "50" rows = "10">{{ $patientNote->note }}</textarea>
			<div class="noteDiv">
				<div class="notebuttons notesButtonDiv">
				<button class="btn btn-info editNoteBtn">Edit</button>
				<button class="btn btn-danger deleteNoteBtn" >Delete</button>
				</div>
				<div  class="notebuttons hidePanel notesEditButtonDiv">
							{{ Form::open(['route' => ['edit.patientNote', $patientNote->id], 'method' => 'POST', 'class' => 'editNoteForm']) }}
							{{ Form::submit('Update', ['class' => 'btn btn-primary']) }}
							<button class="btn btn-link cancelEditNoteBtn">Cancel</button>
							{{ Form::close() }}
				</div>
				<div class="notebuttons hidePanel notesDeleteButtonDiv">
					<strong>Are you sure?</strong>
					{{ Form::open(['route' => ['delete.patientNote', $patientNote->id], 'method' => 'DELETE', 'class' =>'deleteNoteForm']) }}
					{{ Form::hidden('id', $patientNote->id) }}
					{{ Form::submit('Yes', ['class' => 'btn btn-danger']) }}
					<button class="btn btn-link cancelDeleteNoteBtn" >No</button>
					{{ Form::close() }}
				</div>
			</div>
			<small>Created: {{ $patientNote->created_at }}</small>
			@if (!($patientNote->created_at == $patientNote->updated_at))
			<small>Updated: {{ $patientNote->updated_at }}</small>
			@endif
			<p/>
		</div>
	@endforeach
		
@endif

<script>


</script>