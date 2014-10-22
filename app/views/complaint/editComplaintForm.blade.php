@extends('treatmentTemplate')
@section('complaint')
<h4>Create New Complaint</h4>
@if (!($errors->isEmpty()))
	<div class="row alert alert-warning">
		<strong>This field can not be blank</strong>
	</div>
	@endif
	{{ Form::open(['route' => ['edit.complaint', $complaint->id], 'method' => 'POST']) }}
		<div class="form-group">
			{{ Form::text('description', $complaint->description, ['class' => 'form-control']) }}
		</div>
		{{ Form::submit('Update', ['class' => 'btn btn-primary']) }}
	<a href="{{ route('treat.patient', $complaint->patient->id) }}" class="btn btn-link">Cancel</a>
	{{ Form::close() }}

@stop