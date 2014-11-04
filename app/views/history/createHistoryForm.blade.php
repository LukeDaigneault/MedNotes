<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	<h4 class="modal-title" id="myModalLabel">Create History {{ $patient->lastName }}, {{$patient->firstName }}</h4>
</div>
{{ Form::open(['route' => ['create.history', $patient->id], 'method' => 'POST','id'=>'createHistoryForm']) }}
<div class="modal-body">
	<div class="row alert alert-warning hidePanel" id="historyCreateErrors">

	</div>
	<div class="form-group">
		{{ Form::label('social', 'Social History') }}
		{{ Form::textarea('social', '', ['class' => 'form-control', 'style' => 'resize:vertical']) }}
	</div>
	<div class="form-group">
		{{ Form::label('drug', 'Drug History') }}
		{{ Form::textarea('drug', '', ['class' => 'form-control', 'style' => 'resize:vertical']) }}
	</div>
	<div class="form-group">
		{{ Form::label('details', 'Past Medical History') }}
		{{ Form::textarea('details', '', ['class' => 'form-control', 'style' => 'resize:vertical']) }}
	</div>
	<div class="row">
		{{ Form::label('', 'Pathologies') }}
		<div class="col-md-12">
			<div class="col-md-4">
				<div class="checkbox">
					<label>
					{{ Form::checkbox('diplopia') }} Diplopia
					</label>
 				</div>
				<div class="checkbox">
					<label>
     			 		{{ Form::checkbox('dizziness') }} Dizziness
					</label>
 				</div>
 				<div class="checkbox">
					<label>
     			 		{{ Form::checkbox('speechSwallow') }} Speech/Swallow
					</label>
 				</div>
				<div class="checkbox">
					<label>
     			 		{{ Form::checkbox('blackouts') }} Blackouts
					</label>
 				</div>
				<div class="checkbox">
					<label>
     			 		{{ Form::checkbox('pacemaker') }} Pacemaker
					</label>
 				</div>
			</div>
			<div class="col-md-4">
				<div class="checkbox">
					<label>
     			 		{{ Form::checkbox('bilateralNeuroSigns') }} Bilateral Neuro Signs
					</label>
 				</div>
				<div class="checkbox">
					<label>
     			 		{{ Form::checkbox('bladderBowel') }} Bladder/Bowel
					</label>
 				</div>
 				<div class="checkbox">
					<label>
     			 		{{ Form::checkbox('saddleAnaesthesia') }} Saddle Anaesthesia
					</label>
 				</div>
				<div class="checkbox">
					<label>
     			 		{{ Form::checkbox('cancerHistory') }} Cancer History
					</label>
 				</div>
			</div>	
			<div class="col-md-4">
				<div class="checkbox">
					<label>
     			 		{{ Form::checkbox('weightloss') }} Weightloss
					</label>
 				</div>
				<div class="checkbox">
					<label>
     			 		{{ Form::checkbox('steroids') }} Steroids
					</label>
 				</div>
 				<div class="checkbox">
					<label>
     			 		{{ Form::checkbox('anticoagulants') }} Anticoagulants
					</label>
 				</div>
				<div class="checkbox">
					<label>
     			 		{{ Form::checkbox('pregnant') }} Pregnant
					</label>
 				</div>
			</div>
		</div>
	</div>		
	<div class="row">
		<div class="col-md-12">			
			<div class="col-md-4">
				<div class="checkbox">
					<label>
						{{ Form::checkbox('diabetes') }} Diabetes
					</label>
				</div>
				<div class="checkbox">
					<label>
						{{ Form::checkbox('epilepsy') }} Epilepsy
					</label>
				</div>
				<div class="checkbox">
					<label>
						{{ Form::checkbox('bloodPressure') }} Blood pressure
					</label>
				</div>
			</div>
			<div class="col-md-4">
				<div class="checkbox">
					<label>
						{{ Form::checkbox('heartConditions') }} Heart Conditions
					</label>
				</div>
				<div class="checkbox">
					<label>
						{{ Form::checkbox('osteoporosis') }} Osteoporosis
					</label>
				</div>
			</div>
			<div class="col-md-4">
				<div class="checkbox">
					<label>
						{{ Form::checkbox('thyroid') }} Thyroid
					</label>
				</div>
				<div class="checkbox">
					<label>
						{{ Form::checkbox('arthritis') }} Arthritis
					</label>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal-footer">
	<div class="form-group">
		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		{{ Form::submit('Create', ['class' => 'btn btn-primary']) }}
	</div>
</div>
{{ Form::close() }}