<?php

namespace App\Http\Controllers;

use App\Payroll;
use App\Employee;
use PDF;
use App\Mail\PayrollIssued;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class DownloadController extends Controller
{
   public function pdfDownload($id){
	   $pdf = PDF::loadview('payroll.download.pdfpayroll',['employee'=>Employee::find($id)]);
	   return $pdf->download('employee.pdf');
   }
   
   public function notifyEmail($id){
	   $payroll=Payroll::findorFail($id);
	   $employee=Employee::findorFail($payroll->employee_id);
	   if($employee=null){
		   return redirect()->back();
	   }
	 
	   Mail::to($employee())->send(new OrderShipped($payroll));
	   return redirect()->back();
   }
}
