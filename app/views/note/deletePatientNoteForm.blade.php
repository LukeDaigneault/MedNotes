@extends('treatmentTemplate')
@section('complaint')
<h4>Delete Note <small>Are you sure?</small></h4>
	{{ Form::open(['route' => ['delete.patientNote', $patientNote->id], 'method' => 'DELETE']) }}
	<pre class = "pre-scrollable">{{ $patientNote->note }}</pre>
	{{ Form::submit('Yes', ['class' => 'btn btn-danger']) }}
	<a href="{{ route('show.patientNotes', ['complaint' => $complaint->id]) }}" class="btn btn-link">No</a>
	{{ Form::close() }}
@stop
	