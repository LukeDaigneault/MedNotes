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
					<th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($doctors as $doctor)
                <tr>
                    <td>{{ $doctor->name }}</td>
                    <td>{{ $doctor->phoneNumber }}</td>
					<td>{{ $doctor->address }}</td>
                    <td>
						<a href="/" class="btn btn-info">Edit</a>
						<a href="{{ route('delete.doctor', $doctor->id) }}" class="btn btn-danger">Delete</a>
					</td>
                </tr>
                @endforeach
            </tbody>
		</table>
		@endif
		
		<a href="{{ route('create.doctor') }}" class="btn btn-primary btn-lg">Create New Doctor</a>
	</div>


@stop