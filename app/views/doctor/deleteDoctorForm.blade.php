@extends('layout')

@section('content')

<h2 class="sub-header">Delete {{ $doctor->name }} <small>Are you sure?</small></h2>

	<div class="row">

		{{ Form::open(array('route' => 'delete.doctor', 'method' => 'POST')) }}
		{{ Form::hidden('doctor', $doctor->id) }}
		{{ Form::submit('Yes', ['class' => 'btn btn-danger btn-lg']) }}
		<a href="/doctorIndex" class="btn btn-default btn-lg">No</a>
		{{ Form::close() }}

	</div>

	

@stop
