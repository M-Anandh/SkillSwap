<!-- resources/views/emails/meeting-updated-for-creator.blade.php -->

<p>Dear {{ $meeting->bookedUser->name }},</p>

<p>Your meeting with {{ $meeting->user->name }} has been updated. The new date and time are: {{ $meeting->datetime }}.</p>

<p>Thank you for using our platform.</p>
