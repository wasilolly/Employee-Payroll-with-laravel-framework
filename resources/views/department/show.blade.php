@extends('layouts.app')


@section('content')
    <div class="col-lg-12">
		<h1 class="page-header">Department: {{ $department->name }}</h1>
	</div>
		

	<table class= "table table-hover">
		<thead>
			<th>Role</th>
			<th>Salary</th>
		</thead>
		
		<tbody>
			@if($department->roles->count() > 0)
				@foreach($department->roles as $role)
					<tr>
						<td>
							<a href="{{ route('roles.show', ['slug'=>$role->slug])}}">{{ $role->name }}</a>
						</td>
						<td>{{ $role->salary }}</td>
					</tr>
				@endforeach
			@else
				<tr> 
					<th colspan="5" class="text-center">No Roles assigned in this department yet</th>
				</tr>
			@endif
		
		</tbody>
	
	</table>
		
@endsection