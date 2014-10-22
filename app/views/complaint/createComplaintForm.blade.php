@extends('treatmentTemplate')
@section('complaint')
<h4>Create New Complaint</h4>
	{{ Form::open(['route' => ['create.complaint', $patient->id], 'method' => 'POST']) }}
		<div class="form-group">
			{{ Form::text('description', '', ['class' => 'form-control']) }}
		</div>
		{{ Form::submit('Create', ['class' => 'btn btn-primary']) }}
	<a href="{{ route('treat.patient', $patient->id) }}" class="btn btn-link">Cancel</a>
	{{ Form::close() }}


@stop