<?php

// app/Http/Controllers/ManageUserController.php

// app/Http/Controllers/ManageUserController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ManageUserController extends Controller
{
    public function index()
    {
        // Fetch users where type is 0 or 2
        $users = User::whereIn('type', [0, 2])->get();

        return view('admin.manageuser', compact('users'));
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('manage.users.index')->with('success', 'User deleted successfully.');
    }
}
