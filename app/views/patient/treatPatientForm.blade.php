@extends('patient.patientTemplate')

@section('head')
<link href="{{ asset('css/jquery-ui.min.css') }}" rel="stylesheet">

@stop
@section('content')

<h2 class="sub-header">Treat {{ $patient->lastName }}, {{$patient->firstName }} <small>{{ date("d/m/Y", strtotime($patient->dob)) }}</small></h2>
<div class="row">
	<div class="col-md-3">
	<address>
		<strong>Details :</strong><br/>
	  {{ $patient->address }}<br/>
	  <span class="glyphicon glyphicon-earphone"></span> {{ $patient->homePhone }}<br/>
	  <span class="glyphicon glyphicon-phone"></span> {{ $patient->mobilePhone }}<br/>
	   <a href="mailto:{{ $patient->email }}">{{ $patient->email }}</a>
	</address>
	</div>
	<div class="col-md-3">
	<address>
		<strong>Referred By :</strong><br/>
	  {{ $patient->doctor->name }}<br/>
	  {{ $patient->doctor->address }}<br/>
	  <span class="glyphicon glyphicon-earphone"></span> {{ $patient->doctor->phoneNumber }}<br/>
	</address>
	</div>
	<div class="col-md-6">
	<strong>Details :</strong> {{ $patient->history->details }}<br/>
	<strong>Social :</strong> {{ $patient->history->social }}<br/>
	<strong>Drugs :</strong> {{ $patient->history->drug }}<br/>
	<strong>Conditions :</strong><br/>
		{{ ($patient->history->diplopia) ? 'Diplopia<br/>' : null  }} 
		{{ ($patient->history->dizziness) ? 'Dizziness<br/>' : null  }}  
		{{ ($patient->history->speechSwallow) ? 'Speech/Swallow<br/>' : null  }}
		{{ ($patient->history->blackouts) ? 'Blackouts<br/>' : null  }}  
		{{ ($patient->history->pacemaker) ? 'Pacemaker<br/>' : null  }}  
		{{ ($patient->history->bilateralNeuroSigns) ? 'Bilateral Neuro Signs<br/>' : null  }}  
		{{ ($patient->history->saddleAnaesthesia) ? 'Saddle Anaesthesia<br/>' : null  }}  
		{{ ($patient->history->cancerHistory) ? 'Cancer History<br/>' : null  }}  
		{{ ($patient->history->weightloss) ? 'Weightloss<br/>' : null  }}  
		{{ ($patient->history->steroids) ? 'Steroids<br/>' : null  }}  
		{{ ($patient->history->anticoagulants) ? 'Anticoagulants<br/>' : null  }}  
		{{ ($patient->history->pregnant) ? 'Pregnant<br/>' : null  }}  
		{{ ($patient->history->diabetes) ? 'Diabetes<br/>' : null  }}  
		{{ ($patient->history->epilepsy) ? 'Epilepsy<br/>' : null  }}  
		{{ ($patient->history->bloodPressure) ? 'Blood pressure<br/>' : null  }}  
		{{ ($patient->history->heartConditions) ? 'Heart Conditions<br/>' : null  }}  
		{{ ($patient->history->osteoporosis) ? 'Osteoporosis<br/>' : null  }}  
		{{ ($patient->history->thyroid) ? 'Thyroid<br/>' : null  }}  
		{{ ($patient->history->arthritis) ? 'Arthritis<br/>' : null  }}  
		<a href="{{ route('edit.history', $patient->id) }}" class="btn btn-info">Edit History</a>
	</div>
</div>
<h3 class="sub-header">Complaints</h3>





@stop