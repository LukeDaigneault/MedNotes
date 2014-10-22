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
	<strong>Past Medical History :</strong> {{ $patient->history->details }}<br/>
	<strong>Social History:</strong> {{ $patient->history->social }}<br/>
	<strong>Drug History :</strong> {{ $patient->history->drug }}<br/>
	<strong>Pathologies :</strong><br/>
		<div id="multiColumn">
			<ul class="nodots">
				{{ ($patient->history->diplopia) ? '<li>Diplopia</li>' : null  }} 
				{{ ($patient->history->dizziness) ? '<li>Dizziness</li>' : null  }}  
				{{ ($patient->history->speechSwallow) ? '<li>Speech/Swallow</li>' : null  }}
				{{ ($patient->history->blackouts) ? '<li>Blackouts</li>' : null  }}  
				{{ ($patient->history->pacemaker) ? '<li>Pacemaker</li>' : null  }}  
				{{ ($patient->history->bilateralNeuroSigns) ? '<li>Bilateral Neuro Signs</li>' : null  }}  
				{{ ($patient->history->saddleAnaesthesia) ? '<li>Saddle Anaesthesia</li>' : null  }}  
				{{ ($patient->history->cancerHistory) ? '<li>Cancer History</li>' : null  }}  
				{{ ($patient->history->weightloss) ? '<li>Weightloss</li>' : null  }}  
				{{ ($patient->history->steroids) ? '<li>Steroids</li>' : null  }}  
				{{ ($patient->history->anticoagulants) ? '<li>Anticoagulants</li>' : null  }}  
				{{ ($patient->history->pregnant) ? '<li>Pregnant</li>' : null  }}  
				{{ ($patient->history->diabetes) ? '<li>Diabetes</li>' : null  }}  
				{{ ($patient->history->epilepsy) ? '<li>Epilepsy</li>' : null  }}  
				{{ ($patient->history->bloodPressure) ? '<li>Blood pressure</li>' : null  }}  
				{{ ($patient->history->heartConditions) ? '<li>Heart Conditions</li>' : null  }}  
				{{ ($patient->history->osteoporosis) ? '<li>Osteoporosis</li>' : null  }}  
				{{ ($patient->history->thyroid) ? '<li>Thyroid</li>' : null  }}  
				{{ ($patient->history->arthritis) ? '<li>Arthritis</li>' : null  }}
			</ul>
		</div>
		
	</div>
</div>
<div class="row">
	<div class="col-md-3">
	
	</div>
	<div class="col-md-3">
	
	</div>
	<div class="col-md-6">
	<a href="{{ route('edit.history', $patient->id) }}" class="btn btn-info">Edit History</a>
	</div>
</div>
<h3 class="sub-header">Complaints</h3>
<div class="row">
	<div class="col-md-4">
	 @if ($patient->complaints->isEmpty())
        <p>There are no complaints! :(</p>
    @else
	<h4>Existing Complaints</h4>
	<table class="table table-striped">
        <tbody>
            @foreach($patient->complaints as $complaint)
				<tr>
                    <td>{{ $complaint->description }}</td>
                    <td>
						<a href="{{ route('show.patientNotes', $complaint->id) }}" class="btn btn-success">Open</a>
						<a href="{{ route('edit.complaint', $complaint->id) }}" class="btn btn-info">Edit</a>
						<a href="{{ route('delete.complaint', $complaint->id) }}" class="btn btn-danger">Delete</a>
					</td>
                </tr>
            @endforeach
        </tbody>
	</table>
	@endif
	<a href="{{ route('new.complaint', $patient->id) }}" class="btn btn-info">Create New Complaint</a>
	</div>
	<div class="col-md-8">
	@yield('complaint')
	</div>
</div>

@stop