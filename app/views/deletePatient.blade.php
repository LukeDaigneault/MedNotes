@extends('layout')

@section('head')
<link href="{{ asset('css/jquery-ui.min.css') }}" rel="stylesheet">

@stop
@section('content')

<h2 class="sub-header">Delete {{ $patient->lastName }}, {{$patient->firstName }} <small>Are you sure?</small></h2>

	<div class="row">
	{{ Form::open(array('route' => 'delete.patient', 'method' => 'POST')) }}
	{{ Form::hidden('patient', $patient->id) }}
	{{ Form::submit('Yes', ['class' => 'btn btn-danger btn-lg']) }}
	<a href="/" class="btn btn-default">No</a>
	{{ Form::close() }}

	</div>

	

@stop

@section('scripts')

<script src="{{ asset('js/jquery-ui.min.js') }}"></script>
<script src="{{ asset('js/createpatient.js') }}"></script>
@stop