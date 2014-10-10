@extends('doctor.doctorTemplate')

@section('content')

<h2 class="sub-header">Delete {{ $doctor->name }} <small>Are you sure?</small></h2>

	<div class="row">

		{{ Form::open(['route' => ['delete.doctor', $doctor->id], 'method' => 'POST']) }}
		{{ Form::submit('Yes', ['class' => 'btn btn-danger btn-lg']) }}
		<a href="/doctorIndex" class="btn btn-default btn-lg">No</a>
		{{ Form::close() }}

	</div>

@stop
