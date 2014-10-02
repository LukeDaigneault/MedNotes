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
						<th>Next Appointment</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($patients as $patient)
                <tr>
                    <td>{{ $patient->lastName }}, {{ $patient->firstName }}</td>
                    <td>{{ date("d-m-Y", strtotime($patient->dob)) }}</td>
					<td>Tomorrow</td>
                    <td>
                    <a href="/" class="btn btn-info">View
						  </td>
                </tr>
                @endforeach
            </tbody>
		</table>
		@endif
		
		<div class="panel panel-default">
			<div class="panel-body">
				<a href="{{ action('PatientController@show') }}" class="btn btn-primary">Create New Patient</a>
			</div>
		</div>
	</div>



	
@stop