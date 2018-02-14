<?php

namespace App\Mail;

use App\Payroll;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PayrolIssued extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
	
	public $payroll;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Payroll $payroll)
    {
        $this->payroll = $payroll;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('paroll.download.pdfpayroll');
    }
}
