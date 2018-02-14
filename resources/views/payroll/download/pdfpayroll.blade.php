<html>
<body>
	<div class="container">
		<div class="box">
			<header>
				<address>
					{{ $employee->name }}
					{{ $employee->email }}
					{{ $employee->street }}
					{{ $employee->town }}
					{{ $employee->city }}
					{{ $employee->country }}
				</address>
			</header>
			
			<hr>
				
			@if($employee->full_time)
				<p><b>Full-Time</b> :  Yes</p>
				<p><b>Base Salary</b>: {{ $employee->role->salary }}</p>
			@else
				<p><b>Part-Time</b> : Yes</p>
				<br>
				<p><b>Base Salary</b>: 0</p>
			@endif
				<p><b>Department: </b> {{ $employee->role->department->name }}
			<br>

			<table class= "table table-hover" id="filterTable">
				<thead>	
					<th>Date-issued</td>
					<th>Over-Time</th>
					<th>Hours</th>
					<th>Rate</th>
					<th>Gross</th>
				</thead>		
					
				<tbody>
					@if($employee->payrolls->count()> 0)
						@foreach($employee->payrolls as $payroll)
							<tr>		
								<td>{{ $payroll->created_at->toDateString() }}
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
							<th colspan="5" class="text-center">No payroll issued</th>
						</tr>
					@endif
				</tbody>						
			</table>		
			
		</div>
	</div>
</body>
</html>
