<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CWSRecommendationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $recipient;
    public $url;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($url, $recipient)
    {
        $this-> url = $url;
        $this-> url = $recipient;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('markdown_mail.cw_mail')
        ->subject('Co-Working Space Approval/Recommendation Invitation');
    }
}
