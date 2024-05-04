<p style="color: #3366ff;">Dear User,</p>

<p>We are pleased to confirm that your meeting with {{ $bookedUser->name }} has been successfully booked!</p>

<p><strong>Meeting Details:</strong></p>
<ul>
    <li><strong>Date and Time:</strong> {{ $meeting->datetime }}</li>
    <li><strong>Meeting Link:</strong> {{ $bookedUser->portfolio }}</li>

</ul>

<p>Please ensure you have the date and time marked on your calendar. Should you have any questions or need to reschedule, feel free to reach out to us.</p>

<p style="color: #3366ff;">We're looking forward to the insightful session you'll be leading!</p>

<p style="color: #3366ff;">Best regards,</p>
<p style="color: #3366ff;">The SkillSwap Team</p>
