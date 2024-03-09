<?php

// app/Http/Controllers/UserSkillController.php


namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserSkillController extends Controller
{
    public function index(Request $request)
    {
        $loggedInUser = Auth::user();

        if ($loggedInUser) {
            // Get the skills of the current user
            $currentSkills = explode(',', $loggedInUser->skill);

            // Build a query to find users with similar skills
            $query = User::where('type', 2)
                ->where('approved', 1)
                ->where('available', 'Yes'); // Check for available users

            // Exclude the current user from the results
            $query->where('id', '!=', $loggedInUser->id);

            // Search functionality
            if ($request->has('search')) {
                $searchTerm = $request->input('search');

                // Adjust the search to filter based on type=2, approved=1, available=Yes, and the searched skill
                $query->where(function ($subquery) use ($searchTerm, $currentSkills) {
                    $searchTermLower = strtolower($searchTerm); // Convert search term to lowercase

                    $subquery->where('type', 2)
                        ->where('approved', 1)
                        ->where('available', 'Yes')
                        ->whereRaw('LOWER(skill) LIKE ?', ["%{$searchTermLower}%"]);

                    // Additionally, filter based on similar skills
                    foreach ($currentSkills as $skill) {
                        $skillLower = strtolower($skill); // Convert current skill to lowercase

                        $subquery->orWhereRaw('LOWER(skill) LIKE ?', ["%{$skillLower}%"]);
                    }
                });
            } else {
                // If no search term, filter only based on type=2, approved=1, and available=Yes
                $query->where(function ($subquery) use ($currentSkills) {
                    $subquery->where('type', 2)
                        ->where('approved', 1)
                        ->where('available', 'Yes');

                    foreach ($currentSkills as $skill) {
                        $subquery->orWhere('skill', 'LIKE', "%{$skill}%");
                    }
                });
            }

            // Sorting functionality
            $sortBy = $request->input('sort_by', 'exp');
            $sortOrder = $request->input('sort_order', 'asc');
            $query->orderBy($sortBy, $sortOrder);

            $users = $query->get();

            return view('user.searchcreator', compact('users'));
        } else {
            // Redirect or handle the case when the user is not logged in
        }
    }
}
