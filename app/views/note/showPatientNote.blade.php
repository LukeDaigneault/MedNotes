@extends('treatmentTemplate')
@section('complaint')
<h4>{{ $complaint->description }}	<a href="{{ route('new.patientNote', $complaint->id) }}" class="btn btn-info">Add Note</a></h4> 

@if ($complaint->patientNotes->isEmpty())
        <p>There are no notes! :(</p>
@else
	
	@foreach($complaint->patientNotes as $patientNote)
		<pre class = "pre-scrollable">{{ $patientNote->note }}</pre>
		<a href="{{ route('delete.patientNote', $patientNote->id) }}" class="btn btn-info">Edit</a>
		<a href="{{ route('delete.patientNote', $patientNote->id) }}" class="btn btn-danger">Delete</a>
		<small>Created: {{ $patientNote->created_at }}</small>
		@if (! $patientNote->created_at == $patientNote->updated_at)
		<small>Updated: {{ $patientNote->updated_at }}</small>
		@endif
		<p/>
	@endforeach
		
@endif

@stop
	