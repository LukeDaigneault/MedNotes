@extends('layout')


@section('scripts')
	<script>
	$(function() {
	$('#DoctorIndex').addClass('active');
	});
	</script>
	
	@yield('doctorScripts')
@stop



