<!-- resources/views/emails/meeting_canceled.blade.php -->

<p>Your meeting with {{ $meeting->bookedUser->name }} has been canceled.</p>
<p>Original Date and Time: {{ $meeting->datetime }}</p>
<!-- Include other meeting details as needed -->
