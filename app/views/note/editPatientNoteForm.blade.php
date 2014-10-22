@extends('treatmentTemplate')
@section('complaint')
<h4>{{ $complaint->description }}</h4>

@if (!($errors->isEmpty()))
	<div class="row alert alert-warning">
		<strong>This field can not be blank</strong>
	</div>
	@endif
	{{ Form::open(['route' => ['edit.patientNote', $patientNote->id], 'method' => 'POST']) }}
		<div class="form-group">
			{{ Form::textarea('note', $patientNote->note, ['class' => 'form-control', 'style' => 'resize:vertical']) }}
		</div>
		{{ Form::submit('Update', ['class' => 'btn btn-primary']) }}
	<a href="{{ route('show.patientNotes', ['complaint' => $complaint->id]) }}" class="btn btn-link">Cancel</a>
	{{ Form::close() }}
@stop
	