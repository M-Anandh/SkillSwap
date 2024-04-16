<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function create()
    {
        $typeTwoUsers = User::where('type', 2)->get();
        return view('admin.send_message', compact('typeTwoUsers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'message' => 'required|string',
        ]);

        Report::create([
            'user_id' => $request->user_id,
            'message' => $request->message,
        ]);

        return redirect()->back()->with('success', 'Report submitted successfully.');
    }

    public function index()
    {
        $user = Auth::user();
        $reports = $user->reports()->get();
        return view('creator.display_messages', compact('reports'));
    }

    public function destroy(Report $report)
    {
        $report->delete();
        return redirect()->back()->with('success', 'Report deleted successfully.');
    }
}
