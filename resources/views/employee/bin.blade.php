@extends('layouts.app')


@section('content')
    <div class="col-lg-12">
		<h1 class="page-header">Bin</h1>
	</div>
	
	<table class= "table table-hover">
		<thead>
			
			<th>
				Name
			</th>
			
			<th>
				Restore
			</th>
			
			<th>
				Permanaently Destroy
			</th>
			
		</thead>
		
		<tbody>
			@if($employees->count() > 0)
				@foreach($employees as $employee)
					<tr>
						
						<td>{{ $employee->name}}</td>
						
						<td>
							<a href="{{ route('employees.restore', ['id' => $employee->id]) }}" class="btn btn-xs btn-info">Restore</a>
						</td>
						<td>
							<a href="{{ route('employees.kill', ['id' => $employee->id]) }}" class="btn btn-xs btn-danger">Delete</a>
						</td>
					</tr>
				@endforeach
			@else
				<tr> 
					<th colspan="5" class="text-center">Bin Empty</th>
				</tr>
			@endif
		</tbody>
	
	</table>		
@endsection