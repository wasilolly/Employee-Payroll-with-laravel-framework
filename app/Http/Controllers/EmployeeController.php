<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Role;
use App\Department;
use App\Payroll;
use Session;

use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('employee.index', ['employees'=>Employee::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles=Role::all();
		if($roles->count()==0){
			Session::flash('Success', 'you must have at least 1 department/role created before attempting to create an employee');
			return redirect()->route('roles.create');
		}
        return view('employee.create')->with('roles',$roles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
			'name' => 'required|max:255',
			'email' => 'required|email',
			'street' => 'required',
			'town' => 'required',
			'city' => 'required',
			'country' => 'required',
			'full_time' => 'required|bool',
			'role_id' => 'required'
		]);
		
		$employee = Employee::create([
			'name' => $request->name,
			'slug' =>str_slug($request->name),
			'email' => $request->email,
			'street' => $request->street,
			'town' => $request->town,
			'city' => $request->city,
			'country' => $request->country,
			'full_time' => $request->full_time,
			'role_id' => $request->role_id,	
		]);
		
		$payroll = new Payroll;
		$payroll->employee_id = $employee->id;
		$payroll->save();
		$employee->save();
		
		
		$request->session()->flash('status', 'New Employee created');
		return redirect()->route('employees.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('employee.edit', ['employee'=>Employee::find($id),
											'roles'=>Role::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $employee=Employee::findOrFail($id);
		$this->validate($request,[
			'name' => 'required|max:255',
			'email' => 'required|email',
			'street' => 'required',
			'town' => 'required',
			'city' => 'required',
			'country' => 'required',
			'full_time' => 'required|bool',
			'role_id' => 'required'
		]);
				
		$employee->name = $request->name;
		$employee->slug = str_slug($request->name);
		$employee->email = $request->email;
		$employee->street = $request->street;
		$employee->town = $request->town;
		$employee->city = $request->city;
		$employee->country = $request->country;
		$employee->full_time = $request->full_time;
		$employee->role_id  = $request->role_id;		
		$employee->save();
		
		$request->session()->flash('status', 'New Employee created');
		return redirect()->route('employees.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
	public function destroy($id)
    {
        $employee=Employee::findOrFail($id);
		$employee->delete();
		
		Session::flash('success','Employee deleted');
		return redirect()->route('employees.index');
    }
	
	public function bin(){
		$employees=Employee::onlyTrashed()->get();
		return view('employee.bin')->with('employees', $employees);
	}
	
	public function restore($id){
		$employee=Employee::withTrashed()->where('id', $id)->first();
		$employee->restore();
		
		Session::flash('success', 'The employee user account is restored.');
		return redirect()->route('employees.index');
	}
	
	public function kill($id){
		$employee=Employee::withTrashed()->where('id', $id)->first();
		$employee->payroll->delete();
		$employee->forceDelete();
		
		Session::flash('success', 'The employee account has been permanently destroyed.');
		return redirect()->route('employees.index');
	}
}
