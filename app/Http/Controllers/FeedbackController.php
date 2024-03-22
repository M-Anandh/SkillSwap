<?php
// app/Http/Controllers/FeedbackController.php

namespace App\Http\Controllers;

use App\Models\Feedbacks;
use Illuminate\Support\Facades\Session;


use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function index()
    {
        $feedbacks = Feedbacks::all();
        return view('admin.request', compact('feedbacks'));
    }

    public function create()
    {
        return view('user.feedback');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        Feedbacks::create($request->all());

        // Flash a success message to the session
        Session::flash('success', 'Feedback submitted successfully!');

        // Redirect back to the form page
        return redirect()->route('feedback.create');
    }

    public function destroy($id)
    {
        $feedback = Feedbacks::findOrFail($id);
        $feedback->delete();

        // Flash a success message to the session
        Session::flash('success', 'Feedback deleted successfully!');

        // Redirect back to the page showing all feedbacks
        return redirect()->route('feedback.index');
    }
}
