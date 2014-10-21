@extends('history.historyTemplate')

@section('head')
<link href="{{ asset('css/jquery-ui.min.css') }}" rel="stylesheet">

@stop
@section('content')

<h2 class="sub-header">Edit History {{ $patient->lastName }}, {{$patient->firstName }} </h2>
@if (!is_object($history))
	<div class="row alert alert-warning">
			<h4>{{ $patient->lastName }}, {{$patient->firstName }} Does not have a history yet.</h4>
	</div>
@else

			<div class="col-md-6">
			{{ Form::open(['route' => ['edit.history', $patient->id], 'method' => 'POST']) }}
				<div class="form-group">
					{{ Form::label('social', 'Social') }}
					{{ Form::textarea('social', $history->social, ['class' => 'form-control', 'style' => 'resize:vertical']) }}
				</div>
				<div class="form-group">
					{{ Form::label('drug', 'Drug') }}
					{{ Form::textarea('drug', $history->drug, ['class' => 'form-control', 'style' => 'resize:vertical']) }}
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					{{ Form::label('details', 'Details') }}
					{{ Form::textarea('details', $history->details, ['class' => 'form-control', 'style' => 'resize:vertical']) }}
				</div>
	
		<div class="row">
		{{ Form::label('', 'History') }}
		<div class="col-md-12">
		
			<div class="col-md-4">
				<div class="checkbox">
					<label>
					{{ Form::checkbox('diplopia', 1, $history->diplopia) }} Diplopia
					</label>
 				</div>
				<div class="checkbox">
					<label>
     			 		{{ Form::checkbox('dizziness', 1, $history->dizziness) }} Dizziness
					</label>
 				</div>
 				<div class="checkbox">
					<label>
     			 		{{ Form::checkbox('speechSwallow', 1, $history->speechSwallow) }} Speech/Swallow
					</label>
 				</div>
				<div class="checkbox">
					<label>
     			 		{{ Form::checkbox('blackouts', 1, $history->blackouts) }} Blackouts
					</label>
 				</div>
				<div class="checkbox">
					<label>
     			 		{{ Form::checkbox('pacemaker', 1, $history->pacemaker) }} Pacemaker
					</label>
 				</div>
			</div>
	
			<div class="col-md-4">
			<div class="checkbox">
					<label>
     			 		{{ Form::checkbox('bilateralNeuroSigns, 1, $history->bilateralNeuroSigns') }} Bilateral Neuro Signs
					</label>
 				</div>
				<div class="checkbox">
					<label>
     			 		{{ Form::checkbox('bladderBowel', 1, $history->bladderBowel) }} Bladder/Bowel
					</label>
 				</div>
 				<div class="checkbox">
					<label>
     			 		{{ Form::checkbox('saddleAnaesthesia', 1, $history->saddleAnaesthesia) }} Saddle Anaesthesia
					</label>
 				</div>
				<div class="checkbox">
					<label>
     			 		{{ Form::checkbox('cancerHistory', 1, $history->cancerHistory) }} Cancer History
					</label>
 				</div>
			</div>
		
			<div class="col-md-4">
			<div class="checkbox">
					<label>
     			 		{{ Form::checkbox('weightloss', 1, $history->weightloss) }} Weightloss
					</label>
 				</div>
				<div class="checkbox">
					<label>
     			 		{{ Form::checkbox('steroids', 1, $history->steroids) }} Steroids
					</label>
 				</div>
 				<div class="checkbox">
					<label>
     			 		{{ Form::checkbox('anticoagulants', 1, $history->anticoagulants) }} Anticoagulants
					</label>
 				</div>
				<div class="checkbox">
					<label>
     			 		{{ Form::checkbox('pregnant', 1, $history->pregnant) }} Pregnant
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
     			 		{{ Form::checkbox('diabetes', 1, $history->diabetes) }} Diabetes
					</label>
 				</div>
				<div class="checkbox">
					<label>
     			 		{{ Form::checkbox('epilepsy', 1, $history->epilepsy) }} Epilepsy
					</label>
 				</div>
 				<div class="checkbox">
					<label>
     			 		{{ Form::checkbox('bloodPressure', 1, $history->bloodPressure) }} Blood pressure
					</label>
 				</div>

			</div>
		
			<div class="col-md-4">
		
			<div class="checkbox">
					<label>
     			 		{{ Form::checkbox('heartConditions', 1, $history->heartConditions) }} Heart Conditions
					</label>
 				</div>
				<div class="checkbox">
					<label>
     			 		{{ Form::checkbox('osteoporosis', 1, $history->osteoporosis) }} Osteoporosis
					</label>
 				</div>
			</div>
			
		
			<div class="col-md-4">

			<div class="checkbox">
					<label>
     			 		{{ Form::checkbox('thyroid', 1, $history->thyroid) }} Thyroid
					</label>
 				</div>
				<div class="checkbox">
					<label>
     			 		{{ Form::checkbox('arthritis', 1, $history->arthritis) }} Arthritis
					</label>
 				</div>
				{{ Form::submit('Create', ['class' => 'btn btn-primary btn-lg']) }}
					<a href="/" class="btn btn-link">Cancel</a>
				{{ Form::close() }}
			</div>
			
			</div>
			</div>
	
			</div>
@endif
@stop