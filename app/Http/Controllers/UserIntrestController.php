<?php


namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserIntrestController extends Controller
{
    public function index()
    {
        $loggedInUser = Auth::user();

        if ($loggedInUser) {
            $skills = explode(',', $loggedInUser->skill);

            $users = User::where('type', 2)
                         ->where('approved', 1)
                         ->where(function ($query) use ($skills) {
                             foreach ($skills as $skill) {
                                 $query->orWhere('skill', 'LIKE', "%{$skill}%");
                             }
                         })
                         ->where(function ($query) {
                             $query->where('available', 'yes')
                                   ->orWhere('available', 'Yes');
                         })
                         ->take(5) // Limit to the top 5 matched users
                         ->get();

            return view('user.intrest', compact('users', 'loggedInUser'));
        } else {
            // Redirect or handle the case when the user is not logged in
        }
    }
}
