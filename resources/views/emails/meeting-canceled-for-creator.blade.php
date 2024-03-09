<!-- resources/views/emails/meeting-canceled-for-creator.blade.php -->

<p>Dear {{ $meeting->bookedUser->name }},</p>

<p>Your meeting with {{ $meeting->user->name }} has been canceled.</p>

<p>Thank you for using our platform.</p>
