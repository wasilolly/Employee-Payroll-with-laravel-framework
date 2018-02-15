<?php

namespace App\Http\Controllers;

use App\Payroll;
use App\Employee;
use App\Role;
use App\Department;
use Session;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home',['employees' => Employee::take(4)->get(),
							'employeesCount' =>Employee::count(),
							'payrolls'=>Payroll::take(4)->get(),
							'roles' => Role::count(),
							'departments' => Department::count()]);
    }
}
