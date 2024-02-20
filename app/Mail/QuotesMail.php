<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class QuotesMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
	
	public $name_fsc;
	public $attach_fsc;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name_fsc = '',$attach_fsc = '')
    {
        if(!empty($name_fsc)){
			$this->name_fsc = $name_fsc;
		}
        if(!empty($attach_fsc)){
			$this->attach_fsc = $attach_fsc;
		}
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Cotización de productos y/o servicios')->view('emails.quotes')->attach($this->attach_fsc, ['as' => 'quotes.pdf','mime' => 'application/pdf']);
    }
}
