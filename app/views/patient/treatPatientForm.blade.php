@extends('patient.patientTemplate')

@section('head')
<link href="{{ asset('css/jquery-ui.min.css') }}" rel="stylesheet">

@stop
@section('content')

<h2 class="sub-header">Treat {{ $patient->lastName }}, {{$patient->firstName }} <small>{{ date("d/m/Y", strtotime($patient->dob)) }}</small></h2>
<div>
<address>
  {{ $patient->address }}<br/>
  <span class="glyphicon glyphicon-earphone"></span> {{ $patient->homePhone }}<br/>
  <span class="glyphicon glyphicon-phone"></span> {{ $patient->mobilePhone }}<br/>
   <a href="mailto:{{ $patient->email }}">{{ $patient->email }}</a>
</address>
</div>
@stop