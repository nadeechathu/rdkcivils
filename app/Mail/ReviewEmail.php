<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReviewEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $reviewData;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($reviewData)
    {
        $this->reviewData = $reviewData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->reviewData['subject'])->view('emails.review_email');
    }
}
