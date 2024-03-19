<?php

namespace App\Http\Controllers;

// app/Http/Controllers/UserMeetingController.php

// app/Http/Controllers/UserMeetingController.php
use Carbon\Carbon;
use App\Models\User;
use App\Models\Meeting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\MeetingUpdatedMail;
use App\Mail\MeetingCanceledMail;
use Illuminate\Contracts\Mail\Mailable;
use App\Mail\MeetingBookedMail;
use App\Mail\MeetingBookedMail1;
use App\Mail\MeetingUpdatedForCreatorMail;
use App\Mail\MeetingCanceledForCreatorMail;


class UserMeetingController extends Controller
{
    public function bookMeeting(Request $request, User $bookedUser)
    {
        $loggedInUser = Auth::user();

        // Validate the request data as needed
        $request->validate([
            'meeting_datetime' => 'required|date',
        ]);

        // Check booked user availability and other conditions
        // Add your logic here...

        // Check if there is no other meeting at the specified time and date
        $existingMeeting = Meeting::where('booked_user_id', $bookedUser->id)
            ->where('datetime', $request->input('meeting_datetime'))
            ->first();

        if ($existingMeeting) {
            return redirect()->back()->with('error', 'This creator already has a meeting scheduled at the specified time and date.');
        }

        // Store meeting details in the database
        $meeting = Meeting::create([
            'user_id' => $loggedInUser->id,
            'booked_user_id' => $bookedUser->id,
            'datetime' => $request->input('meeting_datetime'),
        ]);

        // Send email notification to the logged-in user with booked creator's portfolio
        Mail::to($loggedInUser->email)->send(new MeetingBookedMail($meeting, $bookedUser));
        Mail::to($bookedUser->email)->send(new MeetingBookedMail1($meeting, $loggedInUser));

        return redirect()->back()->with('success', 'Meeting booked successfully.');
    }

    public function myBookedMeetings()
    {
        $user = Auth::user();
        $bookedMeetings = $user->bookedMeetings;

        return view('user.my_booked_meetings', compact('bookedMeetings'));
    }

    public function updateMeeting(Meeting $meeting, Request $request)
    {
        // Validate the request data as needed
        $request->validate([
            'new_datetime' => 'required|date',
        ]);

        // Check if there is no other meeting at the specified time and date
        $existingMeeting = Meeting::where('booked_user_id', $meeting->booked_user_id)
            ->where('datetime', $request->input('new_datetime'))
            ->where('id', '!=', $meeting->id)
            ->first();

        if ($existingMeeting) {
            return redirect()->back()->with('error', 'This creator already has a meeting scheduled at the specified time and date.');
        }

        // Update meeting details
        $meeting->update([
            'datetime' => $request->input('new_datetime'),
        ]);

        // Send email notification to the logged-in user with updated meeting details
        Mail::to($meeting->user->email)->send(new MeetingUpdatedMail($meeting));
        Mail::to($meeting->bookedUser->email)->send(new MeetingUpdatedForCreatorMail($meeting));

        return redirect()->back()->with('success', 'Meeting updated successfully.');
    }


    public function cancelMeeting(Meeting $meeting)
    {
        // Send email notification to the logged-in user with canceled meeting details
        Mail::to($meeting->user->email)->send(new MeetingCanceledMail($meeting));

        Mail::to($meeting->bookedUser->email)->send(new MeetingCanceledForCreatorMail($meeting));


        // Delete the meeting
        $meeting->delete();

        return redirect()->back()->with('success', 'Meeting canceled successfully.');
    }

    public function myMeetings()
    {
        $user = Auth::user();

        // Explicitly load the meetings for the user along with the 'creator' relationship
        $user->load('meetings.bookedUser');

        $meetings = $user->meetings;

        return view('user.my_meetings', compact('meetings'));
    }
    public function upcomingAndCompletedMeetings()
    {
        $user = Auth::user();
        $bookedMeetings = $user->bookedMeetings;
    
        // Filter upcoming meetings and sort them by date and time
        $upcomingMeetings = $bookedMeetings
            ->filter(function ($meeting) {
                return \Carbon\Carbon::parse($meeting->datetime)->gt(now());
            })
            ->sortBy('datetime')
            ->take(2);
    
        $completedMeetings = $bookedMeetings
            ->filter(function ($meeting) {
                return \Carbon\Carbon::parse($meeting->datetime)->lte(now());
            });
    
        $completedMeetingsCount = count($completedMeetings);
    
        // Get activity data
        $activityData = $this->getActivityData();
    
        return view('creator.upcoming_and_completed_meetings', compact('upcomingMeetings', 'completedMeetings', 'completedMeetingsCount', 'activityData'));
    }
    
    private function getActivityData()
    {
        // Fetch meeting data from the last 7 days
        $startDate = now()->subDays(6)->startOfDay();
        $endDate = now()->endOfDay();
    
        $meetingData = Meeting::whereBetween('datetime', [$startDate, $endDate])
            ->orderBy('datetime')
            ->get();
    
        $labels = [];
        $meetingCounts = [];
    
        // Group meeting data by date
        $groupedData = $meetingData->groupBy(function ($meeting) {
            return Carbon::parse($meeting->datetime)->format('Y-m-d');
        });
    
        // Fill in data for each day, even if there are no meetings
        for ($i = $startDate; $i <= $endDate; $i->addDay()) {
            $date = $i->format('Y-m-d');
            $labels[] = $date;
            
            // Check if the key exists in the $groupedData array
            if (isset($groupedData[$date])) {
                $meetingCounts[] = $groupedData[$date]->count();
            } else {
                $meetingCounts[] = 0;
            }
        }
    
        return [
            'labels' => $labels,
            'meetingCounts' => $meetingCounts,
        ];
    }

public function allMeetings(Request $request)
{
    $startDate = $request->input('start_date', Carbon::now()->toDateString());
    $endDate = $request->input('end_date', Carbon::now()->toDateString());

    $meetings = Meeting::whereBetween('datetime', [$startDate, $endDate])->get();

    return view('admin.all_meetings', compact('meetings', 'startDate', 'endDate'));
}


}
