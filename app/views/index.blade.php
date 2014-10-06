@extends('layout')

@section('content')

 <h2 class="sub-header">Patient Index</h2>
    @if ($patients->isEmpty())
        <p>There are no patients! :(</p>
    @else
	
	<div class="row">
		<table class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>DOB</th>
					<th>Address</th>
					<th>Email</th>
					<th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($patients as $patient)
                <tr>
                    <td>{{ $patient->lastName }}, {{ $patient->firstName }}</td>
                    <td>{{ date("d/m/Y", strtotime($patient->dob)) }}</td>
					<td>{{ $patient->address }}</td>
					<td>{{ $patient->email }}</td>
                    <td>
						<a href="/" class="btn btn-success">Treat</a>
						<a href="/" class="btn btn-info">Edit</a>
						<a href="{{ route('delete.patient', $patient->id) }}" class="btn btn-danger">Delete</a>
					</td>
                </tr>
                @endforeach
            </tbody>
		</table>
		@endif
		
		<div class="row">
					<a href="{{ route('create.patient') }}" class="btn btn-primary">Create New Patient</a>
		</div>
	</div>



	
@stop