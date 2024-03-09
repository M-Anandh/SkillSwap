<!-- resources/views/emails/meeting_booked.blade.php -->

<p>Your meeting with {{ $bookedUser->name }} has been booked successfully.</p>
<p>Date and Time: {{ $meeting->datetime }}</p>
<p>Booked User's Portfolio: {{ $bookedUser->portfolio }}</p>
<!-- Include other meeting details as needed -->
