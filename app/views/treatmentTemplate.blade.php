@extends('patient.patientTemplate')

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
		<div id="createComplaintForm" class="createForm">
		@if (!($errors->isEmpty()))
		<div class="row alert alert-warning">
			<strong>This field can not be blank</strong>
		</div>
		@endif
		{{ Form::open(['route' => ['create.complaint', $patient->id], 'method' => 'POST']) }}
			<div class="form-group">
				{{ Form::text('description', '', ['class' => 'form-control']) }}
			</div>
			{{ Form::submit('Create', ['class' => 'btn btn-primary']) }}
		<button class="btn btn-link" id="cancelComplaintForm">Cancel</button>
		{{ Form::close() }}
		</div>
	
	 @if ($patient->complaints->isEmpty())
        <p>There are no complaints! :(</p>
    @else
	<table class="table table-striped" id="complaintsTbl">
        <tbody>
            @foreach($patient->complaints as $complaint)
				<tr>
                    <td>{{ $complaint->description }}</td>
                    <td>
						<a href="{{ route('show.patientNotes', $complaint->id) }}" class="btn btn-success showComplaintBtn">Open</a>
						<a href="{{ route('edit.complaint', $complaint->id) }}" class="btn btn-info">Edit</a>
						<a href="{{ route('delete.complaint', $complaint->id) }}" class="btn btn-danger">Delete</a>
					</td>
                </tr>
            @endforeach
        </tbody>
	</table>
	@endif
	<button class="btn btn-info" id="newComplaintBtn">Create New Complaint</button>
	</div>
	<div class="col-md-8" id="notesTbl">
	@yield('complaint')
	</div>
</div>

@stop

@section ('scripts')
<script> 
$(document).ready(function() {
	// Complaint scripts
	$("#newComplaintBtn").click(function() {
		event.preventDefault();
		$("#createComplaintForm").slideDown(200);
	});
	
	$("#cancelComplaintForm").click(function() {
		event.preventDefault();
		$("#createComplaintForm").slideUp(200);
	});
	
	$(".showComplaintBtn").click(function(event) {
		event.preventDefault();
		// Get some values from elements on the page:
		var $btn = $(this),
			url = $btn.attr("href");
		// Send the data using post
		var notes = $.get(url, function(data) {
			$("#notesTbl").empty().append(data);
		});
	});
	
	//Notes scripts
	$(document).on('click', "#newNoteBtn", function() {
		event.preventDefault();
		$("#createNoteDiv").slideDown(200);
	});
	
	$(document).on('click', "#cancelNoteBtn", function() {
		event.preventDefault();
		$("#createNoteDiv").slideUp(200);
	});
	
	$(document).on('submit', "#createNoteFrom", function(event) {
		// Stop form from submitting normally
		event.preventDefault();
		// Get some values from elements on the page:
		var $form = $(this),
			term = $form.find("textarea[name='note']").val(),
			url = $form.attr("action");
		// Send the data using post
		var posting = $.post(url, {
			note: term
		}).done(function(response) {
			if (response.errors) {
				$("#noteCreateErrors").slideDown(200);
			} else {
				$("#notesTbl").empty().append(response);
			}
		});
	});
	
	$(document).on('click', "#deleteNoteBtn", function() {
		event.preventDefault();
		$('#notesButtonDiv').slideUp(200);
		$('#notesDeleteButtonDiv').slideDown(200);
	});
	
	$(document).on('click', "#cancelDeleteNoteBtn", function() {
		event.preventDefault();
		$("#notesDeleteButtonDiv").slideUp(200);
		$("#notesButtonDiv").slideDown(200);
	});
	
	$(document).on('submit', "#deleteNoteFrom", function(event) {
		// Stop form from submitting normally
		event.preventDefault();
		// Get some values from elements on the page:
		var $form = $(this),
		token = $form.data('_token'),
		url = $form.attr("action");
		// Send the data using post
		
		var posting = $.ajax({
   	 url: url,
    		type: 'post',
        data: {_method: 'delete', _token :token},
    	success:function(response){
					
				$("#notesTbl").empty().append(response);
			}
		});	
	});
	
});

</script>


@stop