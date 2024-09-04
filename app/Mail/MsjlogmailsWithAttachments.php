<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MsjlogmailsWithAttachments extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

	public $subject_fsc;
	public $msj_fsc;
	public $fattachments;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($subject_fsc = '',$msj_fsc = '',$attachments = [])
    {
        if(!empty($subject_fsc)){
			$this->subject_fsc = $subject_fsc;
		}
        if(!empty($msj_fsc)){
			$this->msj_fsc = $msj_fsc;
		}
        if(!empty($attachments)){
			$this->fattachments = $attachments;
		}
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $email = $this->subject($this->subject_fsc)->html($this->msj_fsc);
		foreach ($this->fattachments as $file){
            $email->attach($file);
        }
		return $email;
    }

	public function attachments()
	{
		$attachments = [];
		foreach ($this->fattachments as $filePath) {
			$attachments[] = Attachment::fromStorage($filePath);
		}
		return $attachments;
	}
}
