<?php

namespace App\Http\Controllers;

use App\Payroll;
use App\Employee;
use App\Role;
use Session;
use Illuminate\Http\Request;


class PayrollController extends Controller
{
    public function index(){
		return view('payroll.index', ['payrolls'=>Payroll::all()]);
	}
	
	public function edit($id){
		$payroll = Payroll::where('employee_id',$id)->first();
		return view('payroll.edit')->with('payroll',$payroll);
	}
	
	public function update(Request $request, $id){	
	
		$this->validate($request,[
			'hours'=> 'required',
			'rate'=>'required',
			'over_time' => 'required|bool'
		]);
		
		$payroll = Payroll::where('employee_id',$id)->first();
		$payroll->hours = $request->hours;
		$payroll->rate= $request->rate;
		$payroll->over_time = $request->over_time;
		$payroll->save();		
		
		$payroll->grossPay();
		$payroll->save();
		
		Session::flash('success', 'Payroll Updated ready for download');
		return redirect()->route('payroll.index');		
	}
	
	
}
