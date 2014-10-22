@extends('treatmentTemplate')
@section('complaint')
<h4>Delete {{ $complaint->description }} <small>Are you sure?</small></h4>
	{{ Form::open(['route' => ['delete.complaint', $complaint->id], 'method' => 'DELETE']) }}
		{{ Form::submit('Yes', ['class' => 'btn btn-danger']) }}
		<a href="{{ route('treat.patient', $patient->id) }}" class="btn btn-link">No</a>
		{{ Form::close() }}



@stop
