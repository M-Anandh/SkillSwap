<?php

namespace App\Mail;

// app/Mail/MeetingBookedMail.php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Meeting;
use App\Models\User;

class MeetingBookedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $meeting;
    public $bookedUser;

    public function __construct(Meeting $meeting, User $bookedUser)
    {
        $this->meeting = $meeting;
        $this->bookedUser = $bookedUser;
    }

    public function build()
    {
        return $this->subject('Meeting Booked')->view('emails.meeting_booked');
    }
}
