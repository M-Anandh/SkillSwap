<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RegisterController1 extends Controller
{
    use RegistersUsers;
    protected $redirectTo = '/';

    // protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:3', 'confirmed'],
            'dob' => ['required', 'date'],
            'phone' => ['required', 'numeric'],
            'gender' => ['required', 'in:Male,Female,Others'],
            'photo' => ['image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'user' => ['required', 'string', 'max:255'],
            'occupation' => ['required', 'string', 'max:255'],
            'exp' => ['required', 'numeric'],
            'link' => ['required', 'string', 'url'],
            'portfolio' => ['nullable', 'string', 'url'],
            'price' => ['required', 'numeric'],
            'available' => ['required', 'in:Yes,No Only'],
            'skill' => ['nullable', 'string', 'max:255'],
            'type' => ['required', 'tinyInteger', 'max:10'],
            'approved' => ['required', 'tinyInteger', 'max:10'],
            
        ]);
    }

    public function create(Request $request)
{
    $profilePhotoPath = null;

    if ($request->hasFile('photo')) {
        $profilePhotoPath = $request->file('photo')->store('profile-photos', 'public');
    }

    $skills = explode(', ', $request->input('skills'));

    $user = User::create([
        'name' => $request->input('name'),
        'email' => $request->input('email'),
        'password' => Hash::make($request->input('password')),
        'dob' => $request->input('dob'),
        'phone' => $request->input('phone'),
        'gender' => $request->input('gender'),
        'user' => $request->input('user'),
        'profile_photo_path' => $profilePhotoPath,
        'type' => $request->input('type_default'),
        'approved'=>$request->input('approved_default'),
        'occupation' => $request->input('occupation'),
        'exp' => $request->input('exp'),
        'link' => $request->input('link'),
        'portfolio' => $request->input('portfolio'),
        'price' => $request->input('price'),
        'available' => $request->input('available'),
    ]);


    // Attach skills to the user
    $user->update(['skill' => implode(', ', $skills)]);

    $user->notify(new \App\Notifications\WelcomeMailNotifications($user));

    return redirect($this->redirectTo)->with('user', $user);
}


}
