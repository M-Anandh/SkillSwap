<?php

// app/Http/Controllers/ProfileController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user();

        return view('creator.meetings', compact('user'));
    }

    public function update(Request $request)
    {
        try {
            // Validate the request data
            $request->validate([
                'portfolio' => ['nullable', 'string', 'url'],
                'price' => ['nullable', 'numeric'],
                'availability' => ['required', 'string', 'in:yes,no'],
            ]);

            // Update user details
            $user = Auth::user();
            $user->portfolio = $request->input('portfolio');
            $user->price = $request->input('price');
            $user->available = $request->input('availability'); 

            $user->save();

            return redirect()->back()->with('success', 'Profile details updated successfully.');
        } catch (\Exception $e) {
            Log::error('Error updating profile: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while updating profile.');
        }
    }
}

