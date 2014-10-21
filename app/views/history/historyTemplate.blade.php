@extends('layout')


@section('scripts')
	<script>
	$(function() {
	$('#PatientIndex').addClass('active');
	});
	</script>
	
	@yield('patientScripts')
@stop



