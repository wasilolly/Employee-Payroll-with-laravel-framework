@extends('layouts.app')

@section('content')
	<hr>	
	<h1 class="text-center">Dashboard</h1>	
	<hr>
		
	<div class="col-lg-3 text-center">
		<div class="panel panel-default">
			<div class="panel-heading">Payroll issued</div>
			<div class="panel-body">{{ $payrolls->count() }}</div>		
		</div>
	</div>
	
	<div class="col-lg-3 text-center">
		<div class="panel panel-info">
			<div class="panel-heading">Employee Count</div>
			<div class="panel-body">{{ $employeesCount }}</div>		
		</div>
	</div>
	
	<div class="col-lg-3 text-center">
		<div class="panel panel-primary">
			<div class="panel-heading">Role Count</div>
			<div class="panel-body">{{ $roles }}</div>		
		</div>
	</div>
	
	<div class="col-lg-3 text-center">
		<div class="panel panel-success">
			<div class="panel-heading">Department</div>
			<div class="panel-body">{{ $departments }}</div>		
		</div>
	</div>
	
	<hr>
	
	<h3>Latest Employees</h3>
	
	<table class= "table table-hover">
		<thead>	
			<tr>
				<th>Date Added</td>
				<th>Name</th>
				<th>Email</th>
				<th>Role</th>
				<th>Department</th>
			</tr>
		</thead>		
			
		<tbody>
			@if($employees->count()> 0)
				@foreach($employees as $employee)
					<tr>		
						<td>{{ $employee->created_at->toDateString() }}</td>
						<td>{{ $employee->name }}</td>
						<td>{{ $employee->email }}</td>
						<td>{{ $employee->role->name }}</td>
						<td>{{ $employee->role->department->name }}</td>
					</tr>
				@endforeach
			@else
				<tr> 
					<th colspan="5" class="text-center">Empty</th>
				</tr>
			@endif
		</tbody>							
	</table>
	
	<hr>
	
	<h3>Latest issued payroll</h3>
	
	<table class= "table table-hover">
		<thead>	
			<tr>
				<th>Date-issued</td>
				<th>Name</th>
				<th>Over-Time</th>
				<th>Hours</th>
				<th>Rate</th>
				<th>Gross</th>
			</tr>
		</thead>		
			
		<tbody>
			@if($payrolls->count()> 0)
				@foreach($payrolls as $payroll)
					<tr>		
						<td>{{ $payroll->created_at->toDateString() }}</td>
						<td>{{ $payroll->employee->name }}</td>
						<td>
							@if($payroll->over_time)
								<p><b>Yes</b></p>				
							@else
								<p><b>No</b></p>							
							@endif				
						</td>
						<td>{{ $payroll->hours }}</td>
						<td>{{ $payroll->rate }}</td>
						<td>{{ $payroll->gross }}</td>
					</tr>
				@endforeach
			@else
				<tr> 
					<th colspan="5" class="text-center">Empty</th>
				</tr>
			@endif
		</tbody>							
	</table>
@endsection

