<p style="color: #3366ff;">Dear {{ $meeting->bookedUser->name }},</p>

<p>We're reaching out to inform you that your meeting with {{ $meeting->user->name }} has been updated successfully.</p>

<p><strong>Updated Meeting Details:</strong></p>
<ul>
    <li><strong>New Date and Time:</strong> {{ $meeting->datetime }}</li>
</ul>

<p>Please ensure you have the new date and time noted down. Should you have any questions or need further assistance, feel free to get in touch with us.</p>

<p style="color: #3366ff;">We appreciate your flexibility and cooperation.</p>

<p style="color: #3366ff;">Best regards,</p>
<p style="color: #3366ff;">The SkillSwap Team</p>