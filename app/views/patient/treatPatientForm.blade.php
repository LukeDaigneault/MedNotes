@extends('layout')
@section('head')
<link href="{{ asset('css/jquery-ui.min.css') }}" rel="stylesheet">

@stop

@section('content')
<div class="modal fade" id="treatModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" id="treatPatientModalForm">
            
   	 </div>
  </div>
</div>


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
	@if (is_object($patient->doctor) )
		  {{ $patient->doctor->name }}<br/>
		  {{ $patient->doctor->address }}<br/>
		  <span class="glyphicon glyphicon-earphone"></span> {{ $patient->doctor->phoneNumber }}<br/>
	 @endif
	</address>
	</div>
	<div class="col-md-6">
	@if (is_object($patient->history) )
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
	@else
	<strong>Past Medical History :</strong> <br/>
	<strong>Social History:</strong> <br/>
	<strong>Drug History :</strong> <br/>
	<strong>Pathologies :</strong><br/>
	@endif	
	</div>
</div>
<div class="row">
	<div class="col-md-3">
	{{ Form::open(['route' => ['edit.patient', $patient->id], 'method' => 'GET', 'id' => 'editDetailsButton']) }}
	{{ Form::submit('Edit Details', ['class' => 'btn btn-info pull-right']) }}
	{{ Form::close() }}
	</div>
	<div class="col-md-3">
		{{ Form::open(['route' => ['add.referrer', $patient->id], 'method' => 'GET', 'id' => 'addReferrerButton']) }}
		@if (!(isset($patient->doctor)))
		{{ Form::submit('Add Referrer', ['class' => 'btn btn-primary pull-right']) }}
		@else
		{{ Form::submit('Edit Referrer', ['class' => 'btn btn-info pull-right']) }}
		@endif
		{{ Form::close() }}
	</div>
	<div class="col-md-6">
	@if (!(isset($patient->history)))
		{{ Form::open(['route' => ['new.history', $patient->id], 'method' => 'GET', 'id' => 'addHistoryButton']) }}
		{{ Form::submit('Add History', ['class' => 'btn btn-primary pull-right']) }}
		{{ Form::close() }}
	@else
		{{ Form::open(['route' => ['edit.history', $patient->id], 'method' => 'GET', 'id' => 'editHistoryButton']) }}
		{{ Form::submit('Edit History', ['class' => 'btn btn-info pull-right']) }}
		{{ Form::close() }}
	@endif
	</div>
</div>
<h3 class="sub-header">Complaints</h3>
<div class="row">
	<div class="col-md-5" id="complaintsTbl">
		
	</div>
	<div class="col-md-7" id="notesTbl">
	
	</div>
</div>

@stop

@section ('scripts')
<script src="{{ asset('js/jquery-ui.min.js') }}"></script>
<script> 
$(document).ready(function() {

	$.get("{{ route('show.complaints', $patient->id) }}", function(data) {
			$("#complaintsTbl").html(data);
		});
		
	$(document).on('submit', "#addReferrerButton", function(event) {
		event.preventDefault();
		$( "#treatPatientModalForm" ).load( $(this).attr("action"));
		$('#treatModal').modal('toggle')
	});	
	
	$(document).on('submit', "#attachReferrerForm", function(event) {
		// Stop form from submitting normally
		event.preventDefault();
		// Get some values from elements on the page:
		var $form = $(this),
			data = $(this).serialize(),
			url = $form.attr("action");
		// Send the data using post
		var posting = $.post(url, data).done(function(response) {
			if (response.errors) {
				$.each(response.errors, function (key, value) {
                 $("#patientReferrerErrors").empty().append("<h4>"+value+"</h4>");
				});
				$("#patientReferrerErrors").slideDown(400);
			} else {
				location.reload(true);
			}
		});
	});
		
	$(document).on('submit', "#editDetailsButton", function(event) {
		event.preventDefault();
		$("#treatPatientModalForm").load( $(this).attr("action"));
		$("#treatModal").modal("toggle");
	});	
	
	$(document).on('submit', "#editPatientForm", function(event) {
		// Stop form from submitting normally
		event.preventDefault();
		// Get some values from elements on the page:
		var $form = $(this),
			data = $(this).serialize(),
			url = $form.attr("action");
		// Send the data using post
		var posting = $.post(url, data).done(function(response) {
			if (response.errors) {
			$("#patientEditErrors").empty();
				$.each(response.errors, function (key, value) {
                 $("#patientEditErrors").append("<h4>"+value+"</h4>");
				});
				$("#patientEditErrors").slideDown(400);
			} else {
				location.reload(true);
			}
		});
	});
		
	$(document).on('submit', "#addHistoryButton", function(event) {
		event.preventDefault();
		$( "#treatPatientModalForm" ).load( $(this).attr("action"));
		$('#treatModal').modal('toggle')
	});	
	
	$(document).on('submit', "#createHistoryForm", function(event) {
		// Stop form from submitting normally
		event.preventDefault();
		// Get some values from elements on the page:
		var $form = $(this),
			data = $(this).serialize(),
			url = $form.attr("action");
		// Send the data using post
		var posting = $.post(url, data).done(function(response) {
			if (response.errors) {
				$("#historyCreateErrors").empty();
				$.each(response.errors, function (key, value) {
                 $("#historyCreateErrors").append("<h4>"+value+"</h4>");
				});
				$("#historyCreateErrors").slideDown(400);
			} else {
				location.reload(true);
			}
		});
	});
	
	$(document).on('submit', "#editHistoryButton", function(event) {
		event.preventDefault();
		$( "#treatPatientModalForm" ).load( $(this).attr("action"));
		$('#treatModal').modal('toggle')
	});	
	
	$(document).on('submit', "#editHistoryForm", function(event) {
		// Stop form from submitting normally
		event.preventDefault();
		// Get some values from elements on the page:
		var $form = $(this),
			data = $(this).serialize(),
			url = $form.attr("action");
		// Send the data using post
		var posting = $.post(url, data).done(function(response) {
			if (response.errors) {
				$("#historyEditErrors").empty();
				$.each(response.errors, function (key, value) {
                 $("#historyEditErrors").append("<h4>"+value+"</h4>");
				});
				$("#historyEditErrors").slideDown(400);
			} else {
				location.reload(true);
			}
		});
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
				$("#complaintCreateErrors").slideDown(400);
			} else {
				$("#complaintsTbl").empty().append(response);
			}
		});
	});
	
	$(document).on('click', ".deleteComplaintBtn", function(event) {
		event.preventDefault();
	
		var complaintsButtonDiv = $(this).parent(".complaintsButtonDiv");
		var complaintsDeleteButtonDiv = $(complaintsButtonDiv).siblings('.complaintsDeleteButtonDiv');
	
		complaintsButtonDiv.slideUp(400);
		complaintsDeleteButtonDiv.slideDown(400);
	});
	
	$(document).on('click', ".cancelDeleteComplaintBtn", function(event) {
		event.preventDefault();
		
		var complaintsDeleteButtonDiv = $(this).parent().parent(".complaintsDeleteButtonDiv");
		var complaintsButtonDiv = $(complaintsDeleteButtonDiv).siblings('.complaintsButtonDiv');
	
		complaintsDeleteButtonDiv.slideUp(400);
		complaintsButtonDiv.slideDown(400);
	});
	
	$(document).on('submit', ".deleteComplaintForm", function(event) {
		// Stop form from submitting normally
		event.preventDefault();
		// Get some values from elements on the page:
		var $form = $(this),
		id = $form.find( "input[name='id']" ).val(),
		token = $form.find( "input[name='_token']" ).val(),
		url = $form.attr("action");
		// Send the data using post
		
		var posting = $.ajax({
			url: url,
    		type: 'post',
        data: {_method: 'delete', _token :token},
    	success:function(response){
				$("#notesTbl").empty();
				
				$("#complaint" + id).remove();				
			}
		});	
	});
	
	$(document).on('click', '.editComplaintBtn', function(event) {
		event.preventDefault();
	
		var complaintDiv = $(this).parent('.complaintsButtonDiv');
		var complaintEditDiv = $(complaintDiv).next('.complaintsEditButtonDiv');
		
		var input = $(complaintEditDiv).parent().prev().children('input');
	
		complaintDiv.slideUp(400);
		complaintEditDiv.slideDown(400);
		input.prop({disabled :false});
	});
	
	$(document).on('click', '.cancelEditComplaintBtn', function(event) {
		event.preventDefault();
		
		var complaintEditDiv = $(this).parents('.complaintsEditButtonDiv');
		var complaintDiv = $(complaintEditDiv).prev('.complaintsButtonDiv');
		
		var input = $(complaintEditDiv).parent().prev().children('input');
	
		complaintEditDiv.slideUp(400);
		complaintDiv.slideDown(400);
		input.prop({disabled :true});
	});
	
	$(document).on('submit', ".editComplaintForm", function(event) {
		// Stop form from submitting normally
		event.preventDefault();
		// Get some values from elements on the page:
	
		var $form = $(this),
			term = $(this).parents('td').prev().children('input').val(),
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
	


//Notes scripts
	$(document).on('click', "#newNoteBtn", function() {
		event.preventDefault();
		$("#createNoteDiv").slideDown(400);
	});
	
	$(document).on('click', "#cancelNoteBtn", function() {
		event.preventDefault();
		$("#createNoteDiv").slideUp(400);
	});
	
	$(document).on('submit', "#createNoteForm", function(event) {
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
	
	$(document).on('submit', ".deleteNoteForm", function(event) {
		// Stop form from submitting normally
		event.preventDefault();
		// Get some values from elements on the page:
		var $form = $(this),
		id = $form.find( "input[name='id']" ).val(),
		token = $form.find( "input[name='_token']" ).val(),
		url = $form.attr("action");
		// Send the data using post
		
		var posting = $.ajax({
   	 url: url,
    		type: 'post',
        data: {_method: 'delete', _token :token},
    	success:function(response){
					
				$("#patientNote" + id).remove();
			}
		});	
	});
	
	
	$(document).on('click', '.editNoteBtn', function(event) {
		event.preventDefault();
	
		var noteButtonDiv = $(this).parent('.notesButtonDiv');
		var noteEditDiv = $(noteButtonDiv).next('.notesEditButtonDiv');
		
		var input = $(noteEditDiv).parent().prev();
	
		noteButtonDiv.slideUp(400);
		noteEditDiv.slideDown(400);
		input.prop({disabled :false});
	});
	
	$(document).on('click', '.cancelEditNoteBtn', function(event) {
		event.preventDefault();
		
		var noteEditDiv = $(this).parents('.notesEditButtonDiv');
		var noteButtonDiv = $(noteEditDiv).prev();
		
		var input = $(noteEditDiv).parent().prev();
	
		noteEditDiv.slideUp(400);
		noteButtonDiv.slideDown(400);
		input.prop({disabled :true});
	});
	
	$(document).on('submit', ".editNoteForm", function(event) {
		// Stop form from submitting normally
		event.preventDefault();
		// Get some values from elements on the page:
	
		var $form = $(this),
			term = $(this).parents('.noteDiv').prev().val(),
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
	
});



		// Since confModal is essentially a nested modal it's enforceFocus method
		// must be no-op'd or the following error results 
		// "Uncaught RangeError: Maximum call stack size exceeded"
		// But then when the nested modal is hidden we reset modal.enforceFocus
		var enforceModalFocusFn = $.fn.modal.Constructor.prototype.enforceFocus;

		$.fn.modal.Constructor.prototype.enforceFocus = function() {};


</script>


@stop