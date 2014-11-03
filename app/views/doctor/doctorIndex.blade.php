@extends('doctor.doctorTemplate')

@section('content')

 <h2 class="sub-header">Doctor Index</h2>
	<div class="row">
    @if ($doctors->isEmpty())
        <p>There are no doctors! :(</p>
    @else
	
	
		<table class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
					<th>Phone Number</th>
					<th>Address</th>
					<th class="col-md-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($doctors as $doctor)
                <tr id='{{ $doctor->id }}'>
                    <td>{{ $doctor->name }}</td>
                    <td>{{ $doctor->phoneNumber }}</td>
					<td>{{ $doctor->address }}</td>
                    <td>
					<div class="doctorButtonDiv">
						<a href="{{ route('edit.doctor', $doctor->id) }}" class="btn btn-info">Edit</a>
						<button class="btn btn-danger deleteDoctorBtn">Delete</button>
					</div>
					<div class="doctorDeleteButtonDiv hidePanel">
						<small>Are you sure?</small>
						{{ Form::open(['route' => ['delete.doctor', $doctor->id], 'method' => 'DELETE', 'class' => 'deleteDoctorForm']) }}
						{{ Form::hidden('id', $doctor->id) }}
						{{ Form::submit('Yes', ['class' => 'btn btn-danger']) }}
						<button class="btn btn-default cancelDeleteDcotorBtn">No</button>
						{{ Form::close() }}
					</div>
					</td>
                </tr>
                @endforeach
            </tbody>
		</table>
		@endif
		
		<a href="{{ route('create.doctor') }}" class="btn btn-primary btn-lg">Create New Doctor</a>
	</div>
@stop

@section ('doctorScripts')
<script> 
$(document).ready(function() {

	$(document).on('click', ".deleteDoctorBtn", function(event) {
		event.preventDefault();
	
		var doctorButtonDiv = $(this).parent(".doctorButtonDiv");
		var doctorDeleteButtonDiv = $(doctorButtonDiv).siblings('.doctorDeleteButtonDiv');
	
		doctorButtonDiv.slideUp(400);
		doctorDeleteButtonDiv.slideDown(400);
	});
	
	$(document).on('click', ".cancelDeleteDcotorBtn", function(event) {
		event.preventDefault();
		
		var doctorDeleteButtonDiv = $(this).parent().parent(".doctorDeleteButtonDiv");
		var doctorButtonDiv = $(doctorDeleteButtonDiv).siblings('.doctorButtonDiv');
	
		doctorDeleteButtonDiv.slideUp(400);
		doctorButtonDiv.slideDown(400);
	});
	
	$(document).on('submit', ".deleteDoctorForm", function(event) {
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