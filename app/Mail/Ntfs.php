<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Ntfs extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

	public $subject_fsc;
	public $msj_fsc;
	public $name_fsc;
	public $email_fsc;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($subject_fsc = '',$msj_fsc = '',$name_fsc = '',$email_fsc = '')
    {
        if(!empty($subject_fsc)){
			$this->subject_fsc = $subject_fsc;
		}
        if(!empty($msj_fsc)){
			$this->msj_fsc = $msj_fsc;
		}
        if(!empty($name_fsc)){
			$this->name_fsc = $name_fsc;
		}
        if(!empty($email_fsc)){
			$this->email_fsc = $email_fsc;
		}
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->subject_fsc)->view('emails.ntfs');
    }
}
