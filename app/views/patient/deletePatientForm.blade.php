@extends('patient.patientTemplate')

@section('content')

<h2 class="sub-header">Delete {{ $patient->lastName }}, {{$patient->firstName }} <small>Are you sure?</small></h2>

	<div class="row">

		{{ Form::open(['route' => ['delete.patient', $patient->id], 'method' => 'DELETE']) }}
		{{ Form::submit('Yes', ['class' => 'btn btn-danger btn-lg']) }}
		<a href="{{ route('index') }}" class="btn btn-default btn-lg">No</a>
		{{ Form::close() }}

	</div>	

@stop
