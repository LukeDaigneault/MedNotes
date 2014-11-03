@extends('layout')

@section('content')

<h2 class="sub-header">Edit {{ $doctor->name }}</h2>

@if (!($errors->isEmpty()))
	<div class="row alert alert-warning">
		@foreach($errors->all() as $error)
		<h4>{{ $error }}</h4>
		@endforeach
	</div>
	@endif

			<div class="col-md-6">
				<div class="form-group">
				{{ Form::open(['route' => ['edit.doctor', $doctor->id], 'method' => 'POST']) }}
				{{ Form::label('name', 'Doctors Name') }}
				{{ Form::text('name', $doctor->name, ['class' => 'form-control']) }}
				{{ Form::label('phoneNumber', 'Doctors Phone Number') }}
				{{ Form::text('phoneNumber', $doctor->phoneNumber, ['class' => 'form-control']) }}
				{{ Form::label('address', 'Doctors Address') }}
				{{ Form::text('address', $doctor->address, ['class' => 'form-control']) }}
				</div>
				<div class="form-group">
				{{ Form::submit('Update', ['class' => 'btn btn-primary btn-lg']) }}
				<a href="{{ route('index.doctor') }}" class="btn btn-link">Cancel</a>
				{{ Form::close() }}
				</div>
			</div>
	
@stop