<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserSkillController extends Controller
{
    public function index(Request $request)
    {
        $query = User::where('type', 2)
                    ->where('approved', 1)
                    ->where('available', 'Yes');

        if ($request->has('search')) {
            $searchTerms = explode(',', strtolower($request->input('search')));

            $query->where(function ($subquery) use ($searchTerms) {
                foreach ($searchTerms as $term) {
                    $subquery->orWhereRaw('LOWER(skill) LIKE ?', ["%{$term}%"]);
                }
            });
        }

        $sortBy = $request->input('sort_by', 'exp');
        $sortOrder = $request->input('sort_order', 'desc'); // Sorting by experience in descending order
        $query->orderBy($sortBy, $sortOrder);

        $users = $query->get();

        return view('user.searchcreator', compact('users'));
    }
}

