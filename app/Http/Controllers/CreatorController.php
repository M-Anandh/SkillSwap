<?php



namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CreatorController extends Controller
{
    public function show()
    {
        // Retrieve the currently authenticated user
        $user = Auth::user();

        return view('creator.creatorshow', ['user' => $user]);

        $editable = true;
        return view('creator.creatorshow', compact('user', 'editable'));
    }

    public function update(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
            'gender' => 'nullable|string|in:Male,Female,Other',
            'profile_photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'occupation' => ['required', 'string', 'max:255'],
            'exp' => ['required', 'numeric'],
            'link' => ['required', 'string', 'url'],
            'portfolio' => ['nullable', 'string', 'url'],
            'price' => ['required', 'numeric'],
            'available' => ['required', 'in:Yes,No Only'],
        ]);

        // Update user details
        $user = Auth::user();
        $user->name = $request->input('name');
        $user->phone = $request->input('phone');
        $user->gender = $request->input('gender');
        $user->occupation=$request->input('occupations');
        $user->price = $request->input('price');
        $user->exp = $request->input('exp');
        $user->link = $request->input('link');
        $user->skill = $request->input('interests');


        // Handle profile photo upload
        if ($request->hasFile('profile_photo')) {
            $profilePhotoPath = $request->file('profile_photo')->store('profile_photos', 'public');
            $user->profile_photo_path = $profilePhotoPath;
        }

        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }
}

