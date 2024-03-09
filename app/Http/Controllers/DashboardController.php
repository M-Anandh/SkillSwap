<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Meeting;
use App\Models\UploadedFile;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // Total number of users with type 0
        $totalType0Users = User::where('type', 0)->count();

        // Total number of users with type 2
        $totalType2Users = User::where('type', 2)->count();

        // Total number of meetings
        $totalMeetings = Meeting::count();

        // Total number of uploaded files
        $totalFiles = UploadedFile::count();

        // Last 7 days data
        $last7Days = Carbon::now()->subDays(7);

        // Last 7 days new type 0 users
        $type0UsersLast7Days = User::where('type', 0)->where('created_at', '>=', $last7Days)->count();

        // Last 7 days new type 2 users
        $type2UsersLast7Days = User::where('type', 2)->where('created_at', '>=', $last7Days)->count();

        // Last 7 days meetings booked
        $meetingsLast7Days = Meeting::where('created_at', '>=', $last7Days)->get();

        // Last 7 days file uploads
        $fileUploadsLast7Days = UploadedFile::where('created_at', '>=', $last7Days)->count();

        // Extract data for the line chart
        $meetingDates = $meetingsLast7Days->pluck('created_at')->map(function ($date) {
            return $date->format('M d');
        })->toArray();
        $meetingCounts = $meetingsLast7Days->pluck('id')->toArray();

        return view('admin.dash', compact(
            'totalType0Users',
            'totalType2Users',
            'totalMeetings',
            'totalFiles',
            'type0UsersLast7Days',
            'type2UsersLast7Days',
            'meetingDates',
            'meetingCounts',
            'fileUploadsLast7Days'
        ));
    }
}
