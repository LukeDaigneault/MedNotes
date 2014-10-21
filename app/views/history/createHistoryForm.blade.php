@extends('history.historyTemplate')

@section('head')
<link href="{{ asset('css/jquery-ui.min.css') }}" rel="stylesheet">

@stop
@section('content')

<h2 class="sub-header">Create History</h2>
	
			<div class="col-md-6">
			{{ Form::open(['route' => ['create.history', $patient->id], 'method' => 'POST']) }}
				<div class="form-group">
					{{ Form::label('social', 'Social') }}
					{{ Form::textarea('social', '', ['class' => 'form-control', 'style' => 'resize:vertical']) }}
				</div>
				<div class="form-group">
					{{ Form::label('drug', 'Drug') }}
					{{ Form::textarea('drug', '', ['class' => 'form-control', 'style' => 'resize:vertical']) }}
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					{{ Form::label('details', 'Details') }}
					{{ Form::textarea('details', '', ['class' => 'form-control', 'style' => 'resize:vertical']) }}
				</div>
	
		<div class="row">
		{{ Form::label('', 'History') }}
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
				{{ Form::submit('Create', ['class' => 'btn btn-primary btn-lg']) }}
					<a href="/" class="btn btn-link">Cancel</a>
				{{ Form::close() }}
			</div>
			
			</div>
			</div>
	
			</div>
@stop