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
	  @if (isset($patient->doctor))
		  {{ $patient->doctor->name }}<br/>
		  {{ $patient->doctor->address }}<br/>
		  <span class="glyphicon glyphicon-earphone"></span> {{ $patient->doctor->phoneNumber }}<br/>
	  @endif
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
	<a href="{{ route('edit.history', $patient->id) }}" class="btn btn-info pull-right">Edit Details</a>
	</div>
	<div class="col-md-3">
	@if (!(isset($patient->doctor)))
		<a href="{{ route('edit.history', $patient->id) }}" class="btn btn-info pull-right">Add Referrer</a>
	@else
		<a href="{{ route('edit.history', $patient->id) }}" class="btn btn-info pull-right">Edit Referrer</a>
	@endif
	</div>
	<div class="col-md-6">
	<a href="{{ route('edit.history', $patient->id) }}" class="btn btn-info pull-right">Edit History</a>
	</div>
</div>
<h3 class="sub-header">Complaints</h3>
<div class="row">
	<div class="col-md-4" id="complaintsTbl">
		
	</div>
	<div class="col-md-8" id="notesTbl">
	
	</div>
</div>

@stop

@section ('scripts')
<script> 
$(document).ready(function() {

	$.get("{{ route('show.complaints', $patient->id) }}", function(data) {
			$("#complaintsTbl").html(data);
		});
		
		// Complaint scripts
	$(document).on('click', "#newComplaintBtn", function(event) {
		event.preventDefault();
		$("#createComplaintDiv").slideDown(400);
	});
	
	$(document).on('click', "#cancelComplaintForm", function(event) {
		event.preventDefault();
		$("#createComplaintDiv").slideUp(400);
	});
	
	$(document).on('submit', "#createComplaintForm", function(event) {
		// Stop form from submitting normally
		event.preventDefault();
		// Get some values from elements on the page:
		var $form = $(this),
			term = $form.find("input[name='description']").val(),
			url = $form.attr("action");
		// Send the data using post
		var posting = $.post(url, {
			description: term
		}).done(function(response) {
			if (response.errors) {
				$("#complaintCreateErrors").slideDown(200);
			} else {
				$("#complaintsTbl").empty().append(response);
			}
		});
	});
	
	$(document).on('click', ".deleteComplaintBtn", function(event) {
		event.preventDefault();
	
		var notesButtonDiv = $(this).parent(".complaintsButtonDiv");
		var notesDeleteButtonDiv = $(notesButtonDiv).siblings('.complaintsDeleteButtonDiv');
	
		notesButtonDiv.slideUp(400);
		notesDeleteButtonDiv.slideDown(400);
	});
	
	$(document).on('click', ".cancelDeleteNoteBtn", function(event) {
		event.preventDefault();
		
		var notesDeleteButtonDiv = $(this).parent().parent(".complaintsDeleteButtonDiv");
		var notesButtonDiv = $(notesDeleteButtonDiv).siblings('.complaintsButtonDiv');
	
		notesDeleteButtonDiv.slideUp(400);
		notesButtonDiv.slideDown(400);
	});
	
	$(document).on('submit', ".deleteComplaintFrom", function(event) {
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
				$("#notesTbl").empty();	
				$("#complaintsTbl").empty().append(response);
			}
		});	
	});
	

	$(document).on('click', ".showComplaintBtn", function(event) {
		event.preventDefault();
		// Get some values from elements on the page:
		var $btn = $(this),
			url = $btn.attr("href");
		// Send the data using post
		var notes = $.get(url, function(data) {
			$("#notesTbl").empty().append(data);
		});
	});
	
});

//Notes scripts
	$(document).on('click', "#newNoteBtn", function() {
		event.preventDefault();
		$("#createNoteDiv").slideDown(400);
	});
	
	$(document).on('click', "#cancelNoteBtn", function() {
		event.preventDefault();
		$("#createNoteDiv").slideUp(400);
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
	
	$(document).on('click', ".deleteNoteBtn", function(event) {
		event.preventDefault();
	
		var notesButtonDiv = $(this).parent(".notesButtonDiv");
		var notesDeleteButtonDiv = $(notesButtonDiv).siblings('.notesDeleteButtonDiv');
	
		notesButtonDiv.slideUp(400);
		notesDeleteButtonDiv.slideDown(400);
	});
	
	$(document).on('click', ".cancelDeleteNoteBtn", function(event) {
		event.preventDefault();
		
		var notesDeleteButtonDiv = $(this).parent().parent(".notesDeleteButtonDiv");
		var notesButtonDiv = $(notesDeleteButtonDiv).siblings('.notesButtonDiv');
	
		notesDeleteButtonDiv.slideUp(400);
		notesButtonDiv.slideDown(400);
	});
	
	$(document).on('submit', ".deleteNoteFrom", function(event) {
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

</script>


@stop