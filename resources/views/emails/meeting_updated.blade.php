<!-- resources/views/emails/meeting_updated.blade.php -->

<p>Your meeting with {{ $meeting->bookedUser->name }} has been updated successfully.</p>
<p>New Date and Time: {{ $meeting->datetime }}</p>
<!-- Include other meeting details as needed -->
