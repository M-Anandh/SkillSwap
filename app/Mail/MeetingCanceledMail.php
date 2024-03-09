<?php

namespace App\Mail;
// app/Mail/MeetingCanceledMail.php

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Meeting;

class MeetingCanceledMail extends Mailable
{
    use Queueable, SerializesModels;

    public $meeting;

    public function __construct(Meeting $meeting)
    {
        $this->meeting = $meeting;
    }

    public function build()
    {
        return $this->subject('Meeting Canceled')->view('emails.meeting_canceled');
    }
}
