<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request): RedirectResponse
    {
        $input = $request->all();

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = [
            'email' => $input['email'],
            'password' => $input['password'],
            'approved' => 1, // Check if the 'approved' column is set to 1
        ];

        if (auth()->attempt($credentials)) {
            if (auth()->user()->type == 'admin') {
                return redirect()->route('dashboard');
            } else if (auth()->user()->type == 'creator') {
                return redirect()->route('user.dash');
            } else {
                return redirect()->route('user.interest.index');
            }
        } else {
            // Display error message using window.alert and refresh the page
            echo "<script>
                    alert('Email-Address And Password Are Wrong or Your Account is not approved.');
                    window.location.href = '/login';
                 </script>";
            exit;
        }
    }
}
