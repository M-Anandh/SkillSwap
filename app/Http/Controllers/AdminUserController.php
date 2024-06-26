<?php

// app/Http/Controllers/AdminUserController.php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Mail\UserApprovalMail;
use Illuminate\Support\Facades\Mail;

class AdminUserController extends Controller
{
    public function index()
    {
        $users = User::where('type', 2)->get();
        return view('admin.creatorapproval', compact('users'));
    }

    public function approve($userId)
{
    $user = User::find($userId);
    
    if ($user) {
        $user->update(['approved' => 1]);

        // Send approval email
        Mail::to($user->email)->send(new UserApprovalMail($user));

        return redirect()->route('admin.creatorapproval')->with('success', 'User approved successfully. Email sent.');
    } else {
        return redirect()->route('admin.creatorapproval')->with('error', 'User not found.');
    }
}

public function reject($userId)
{
    $user = User::find($userId);
    
    if ($user) {
        // Here you can delete the user, mark as rejected, or take any necessary action.
        // For example, I'm just marking the user as rejected.
        $user->update(['approved' => 0]);

        return redirect()->route('admin.creatorapproval')->with('success', 'User rejected successfully.');
    } else {
        return redirect()->route('admin.creatorapproval')->with('error', 'User not found.');
    }
}
}
