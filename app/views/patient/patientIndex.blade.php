@extends('patient.patientTemplate')

@section('content')

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
						<a href="{{ route('treat.patient', $patient->id) }}" class="btn btn-success">Treat</a>
						<a href="{{ route('edit.patient', $patient->id) }}" class="btn btn-info">Edit</a>
						<button class="btn btn-danger deletePatientBtn">Delete</button>
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
		
		<a href="{{ route('create.patient') }}" class="btn btn-primary btn-lg">Create New Patient</a>
	</div>

@stop

@section ('patientScripts')
<script> 
$(document).ready(function() {

	$(document).on('click', ".deletePatientBtn", function(event) {
		event.preventDefault();
	
		var patientButtonDiv = $(this).parent(".patientButtonDiv");
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