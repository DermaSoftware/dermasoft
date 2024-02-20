<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Msjlogmails extends Mailable
{
    use Queueable, SerializesModels;
	
	public $subject_fsc;
	public $msj_fsc;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($subject_fsc = '',$msj_fsc = '')
    {
        if(!empty($subject_fsc)){
			$this->subject_fsc = $subject_fsc;
		}
        if(!empty($msj_fsc)){
			$this->msj_fsc = $msj_fsc;
		}
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
		return $this->subject($this->subject_fsc)->html($this->msj_fsc);
    }
}
