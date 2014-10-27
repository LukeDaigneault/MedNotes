<div id="createComplaintDiv" class="createForm">
	<div class="row alert alert-warning hidePanel" id="complaintCreateErrors">
		<strong>This field can not be blank</strong>
	</div>
	{{ Form::open(['route' => ['create.complaint', $patient->id], 'method' => 'POST', 'id' => 'createComplaintForm']) }}
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
					<div class="complaintDiv">
						<div class="complaintsButtonDiv">
							<a href="{{ route('show.patientNotes', $complaint->id) }}" class="btn btn-success showComplaintBtn">Open</a>
							<a href="{{ route('edit.complaint', $complaint->id) }}" class="btn btn-info">Edit</a>
							<button class="btn btn-danger deleteComplaintBtn" >Delete</button>
						</div>
						<div class="hidePanel complaintsDeleteButtonDiv">
							<strong>Are you sure?</strong>
							{{ Form::open(['route' => ['delete.complaint', $complaint->id], 'method' => 'DELETE', 'class' => 'deleteComplaintFrom']) }}
							{{ Form::submit('Yes', ['class' => 'btn btn-danger']) }}
							<button  class="btn btn-link cancelDeleteNoteBtn">No</button>
							{{ Form::close() }}
						</div>
					</div>
						
					</td>
                </tr>
            @endforeach
        </tbody>
	</table>
@endif
<button class="btn btn-info" id="newComplaintBtn">Create New Complaint</button>
<script>

</script>