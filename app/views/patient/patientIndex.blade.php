@extends('layout')
@section('head')
<link href="{{ asset('css/jquery-ui.min.css') }}" rel="stylesheet">

@stop

@section('content')

<div class="modal fade" id="patientModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" id="createPatientModalForm">
            
   	 </div>
  </div>
</div>

 <h2 class="sub-header">Patient Index</h2>
	<div class="row">
    @if ($patients->isEmpty())
        <p>There are no patients! :(</p>
    @else
	
		<table class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>DOB</th>
					<th>Address</th>
					<th>Email</th>
					<th class="col-md-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($patients as $patient)
                <tr id='{{ $patient->id }}'>
                    <td>{{ $patient->lastName }}, {{ $patient->firstName }}</td>
                    <td>{{ date("d/m/Y", strtotime($patient->dob)) }}</td>
					<td>{{ $patient->address }}</td>
					<td>{{ $patient->email }}</td>
                    <td>
					<div class="patientButtonDiv">
						{{ Form::open(['route' => ['edit.patient', $patient->id], 'method' => 'POST', 'class' => 'editPatientFrom']) }}
						<a href="{{ route('treat.patient', $patient->id) }}" class="btn btn-success">Treat</a>
						{{ Form::submit('Edit', ['class' => 'btn btn-info']) }}
						<button class="btn btn-danger deletePatientBtn">Delete</button>
						{{ Form::close() }}
					</div>
					<div class="patientDeleteButtonDiv hidePanel">
						<small>Are you sure?</small>
						{{ Form::open(['route' => ['delete.patient', $patient->id], 'method' => 'DELETE', 'class' => 'deletePatientForm']) }}
						{{ Form::hidden('id', $patient->id) }}
						{{ Form::submit('Yes', ['class' => 'btn btn-danger']) }}
						<button class="btn btn-default cancelDeletePatientBtn">No</button>
						{{ Form::close() }}
					</div>
					</td>
                </tr>
                @endforeach
            </tbody>
		</table>
		@endif
		<button class="btn btn-primary" id="createPatientButton">Create New Patient</button>
			</div>

@stop

@section ('scripts')
<script src="{{ asset('js/jquery-ui.min.js') }}"></script>
<script> 
$(document).ready(function() {
	
	$(document).on('click', "#createPatientButton", function(event) {
		$( "#createPatientModalForm" ).load( "{{ route('create.patient') }}" );
		$('#patientModal').modal('toggle')
	});
	
	$(document).on('submit', "#createPatientForm", function(event) {
		// Stop form from submitting normally
		event.preventDefault();
		// Get some values from elements on the page:
		var $form = $(this),
			data = $(this).serialize(),
			url = $form.attr("action");
		// Send the data using post
		var posting = $.post(url, data).done(function(response) {
			if (response.errors) {
				$("#patientCreateErrors").empty();
				$.each(response.errors, function (key, value) {
                 $("#patientCreateErrors").append("<h4>"+value+"</h4>");
				});
				$("#patientCreateErrors").slideDown(400);
			} else {
				location.reload(true);
			}
		});
	});
	
	
	$(document).on('submit', ".editPatientFrom", function(event) {
		event.preventDefault();
		$( "#createPatientModalForm" ).load( $(this).attr("action"));
		$('#patientModal').modal('toggle')
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


	$(document).on('click', ".deletePatientBtn", function(event) {
		event.preventDefault();
	
		var patientButtonDiv = $(this).parents(".patientButtonDiv");
		var patientDeleteButtonDiv = $(patientButtonDiv).siblings('.patientDeleteButtonDiv');
	
		patientButtonDiv.slideUp(400);
		patientDeleteButtonDiv.slideDown(400);
	});
	
	$(document).on('click', ".cancelDeletePatientBtn", function(event) {
		event.preventDefault();
		
		var patientDeleteButtonDiv = $(this).parent().parent(".patientDeleteButtonDiv");
		var patientButtonDiv = $(patientDeleteButtonDiv).siblings('.patientButtonDiv');
	
		patientDeleteButtonDiv.slideUp(400);
		patientButtonDiv.slideDown(400);
	});
	
	$(document).on('submit', ".deletePatientForm", function(event) {
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
					
				$("#" + id).remove();
			}
		});	
	});
	
});

</script>


@stop