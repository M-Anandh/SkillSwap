<?php

// app/Http/Controllers/UserController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function show()
    {
        // Retrieve the currently authenticated user
        $user = Auth::user();

        return view('user.show', ['user' => $user]);

        $editable = true;
        return view('user.show', compact('user', 'editable'));
    }

    public function update(Request $request)
{
    // Validate the request data
    $request->validate([
        'name' => 'required|string|max:255',
        'phone' => 'nullable|string|max:20',
        'gender' => 'nullable|string|in:Male,Female,Other',
        'profile_photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        // 'skill' => ['nullable', 'string', 'max:255'], // Example for profile photo
    ]);

    // Update user details
    $user = Auth::user();
    $user->name = $request->input('name');
    $user->phone = $request->input('phone');
    $user->gender = $request->input('gender');
    $user->skill = $request->input('interests');

    // Update other fields similarly

    // Handle profile photo upload
    if ($request->hasFile('profile_photo')) {
        $profilePhotoPath = $request->file('profile_photo')->store('profile_photos', 'public');
        $user->profile_photo_path = $profilePhotoPath;
    }

    // Save the user model
    $user->save();

    // dd($request->all(), $user);

    return redirect()->back()->with('success', 'Profile updated successfully.');
}

}

