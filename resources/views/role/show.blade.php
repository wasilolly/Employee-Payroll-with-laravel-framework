@extends('layouts.app')


@section('content')
    <div class="col-lg-12">
		<h1 class="page-header">Role: {{ $role->name }}</h1>
		<h1 class="page-header">Salary: {{ $role->salary }}</h1>
	</div>
		

	<table class= "table table-hover">
		<thead>
			<th>Employee</th>
			<th>email</th>
			<th>phone</th>
			<th>hired date</th>
		</thead>
		
		<tbody>
			@if($role->employees->count() > 0)
				@foreach($role->employees as $employee)
					<tr>
						<td>{{ $employee->getFullName() }}</td>
						<td>{{ $employee->email }}</td>
						<td>{{ $employee->phone }}</td>
						<td>{{ $employee->hired_date }}</td>
					</tr>
				@endforeach
			@else
				<tr> 
					<th colspan="5" class="text-center">No Employee assigned to this role yet</th>
				</tr>
			@endif		
		</tbody>	
	</table>
		
@endsection