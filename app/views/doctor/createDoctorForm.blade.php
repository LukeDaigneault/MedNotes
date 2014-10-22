@extends('doctor.doctorTemplate')

@section('content')

<h2 class="sub-header">Create Doctor</h2>

@if (!($errors->isEmpty()))
	<div class="row alert alert-warning">
		@foreach($errors->all() as $error)
		<h4>{{ $error }}</h4>
		@endforeach
	</div>
	@endif

			<div class="col-md-6">
				<div class="form-group">
				{{ Form::open(['route' => 'create.doctor', 'method' => 'POST']) }}
				{{ Form::label('name', 'Doctors Name') }}
				{{ Form::text('name', '', ['class' => 'form-control']) }}
				{{ Form::label('phoneNumber', 'Doctors Phone Number') }}
				{{ Form::text('phoneNumber', '', ['class' => 'form-control']) }}
				{{ Form::label('address', 'Doctors Address') }}
				{{ Form::text('address', '', ['class' => 'form-control']) }}
				</div>
				<div class="form-group">
				{{ Form::submit('Create', ['class' => 'btn btn-primary btn-lg']) }}
				<a href="{{ route('index.doctor') }}" class="btn btn-link">Cancel</a>
				{{ Form::close() }}
				</div>
			</div>
	
@stop