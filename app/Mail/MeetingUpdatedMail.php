<?php

namespace App\Mail;

// app/Mail/MeetingUpdatedMail.php

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Meeting;

class MeetingUpdatedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $meeting;

    public function __construct(Meeting $meeting)
    {
        $this->meeting = $meeting;
    }

    public function build()
    {
        return $this->subject('Meeting Updated')->view('emails.meeting_updated');
    }
}
