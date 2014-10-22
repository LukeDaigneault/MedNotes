@extends('treatmentTemplate')
@section('complaint')
<h4>{{ $complaint->description }}</h4>

@if (!($errors->isEmpty()))
	<div class="row alert alert-warning">
		<strong>This field can not be blank</strong>
	</div>
	@endif
	{{ Form::open(['route' => ['create.patientNote', $complaint->id], 'method' => 'POST']) }}
		<div class="form-group">
			{{ Form::textarea('note', 'S:


O:


A:


P:', ['class' => 'form-control', 'style' => 'resize:vertical']) }}
		</div>
		{{ Form::submit('Create', ['class' => 'btn btn-primary']) }}
	<a href="{{ route('show.patientNotes', ['complaint' => $complaint->id]) }}" class="btn btn-link">Cancel</a>
	{{ Form::close() }}
@stop
