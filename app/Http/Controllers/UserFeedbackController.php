<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Review;

class UserFeedbackController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $feedbacks = Review::whereHas('meeting', function ($query) use ($user) {
            $query->where('booked_user_id', $user->id);
        })->with('user')->get();

        return view('creator.review', compact('feedbacks'));
    }

    public function userpart()
    {
        $user = Auth::user();

        $feedbacks = $user->reviews()->with('meeting.bookedUser')->get();

        return view('user.review', compact('feedbacks'));
    }

    public function edit(Review $review)
    {
        return view('user.feedbackedit', compact('review'));
    }

    public function update(Request $request, Review $review)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'feedback' => 'required|string',
        ]);

        $review->update([
            'rating' => $request->rating,
            'feedback' => $request->feedback,
        ]);

        return redirect()->route('user.review')->with('success', 'Feedback updated successfully.');
    }

    public function destroy(Review $review)
    {
        $review->delete();
        return redirect()->route('user.review')->with('success', 'Feedback deleted successfully.');
    }
}
