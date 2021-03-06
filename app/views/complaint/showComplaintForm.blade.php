<div class="row alert alert-warning hidePanel" id="complaintCreateErrors">
		<strong>This field can not be blank</strong>
</div>
<div id="createComplaintDiv" class="createForm">
	{{ Form::open(['route' => ['create.complaint', $patient->id], 'method' => 'POST', 'id' => 'createComplaintForm']) }}
	<div class="form-group">
		{{ Form::text('description', '', ['class' => 'form-control']) }}
	</div>
	{{ Form::submit('Create', ['class' => 'btn btn-primary']) }}
	<button class="btn btn-default" id="cancelComplaintForm">Cancel</button>
	{{ Form::close() }}
</div>

@if ($patient->complaints->isEmpty())
	<p>There are no complaints! :(</p>
@else
	<table class="table table-striped">
		<tbody>
			@foreach($patient->complaints as $complaint)
			
				<tr id='complaint{{ $complaint->id }}'>
				
					<td class="col-md-6">
					<input class="form-control" name="shownDescription" type="text" value="{{ $complaint->description }}" disabled="true">
						</td>
						<td>
						<div class="complaintsButtonDiv">
							<a href="{{ route('show.patientNotes', $complaint->id) }}" class="btn btn-success showComplaintBtn">Open</a>
							<button class="btn btn-info editComplaintBtn">Edit</button>
							<button class="btn btn-danger deleteComplaintBtn" >Delete</button>
						</div>
						<div  class="createForm complaintsEditButtonDiv">
						{{ Form::open(['route' => ['edit.complaint', $complaint->id], 'method' => 'POST', 'class' => 'editComplaintForm']) }}
						{{ Form::submit('Update', ['class' => 'btn btn-primary']) }}
						<button class="btn btn-link cancelEditComplaintBtn">Cancel</button>
						{{ Form::close() }}
						</div>
						<div class="hidePanel complaintsDeleteButtonDiv">
							<strong>Are you sure?</strong>
							{{ Form::open(['route' => ['delete.complaint', $complaint->id], 'method' => 'DELETE', 'class' => 'deleteComplaintForm']) }}
							{{ Form::hidden('id', $complaint->id) }}
							{{ Form::submit('Yes', ['class' => 'btn btn-danger']) }}
							<button  class="btn btn-default cancelDeleteComplaintBtn">No</button>
							{{ Form::close() }}
						</div>
					</td>
					
                </tr>
			
            @endforeach
        </tbody>
	</table>
@endif
<button class="btn btn-primary" id="newComplaintBtn">Create New Complaint</button>
<script>

</script>