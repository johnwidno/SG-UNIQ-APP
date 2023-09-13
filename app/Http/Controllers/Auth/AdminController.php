<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function makeFirstUserAdmin()
    {
        // Find the first user and update their role to 'admin'
        $firstUser = User::orderBy('id')->first();

        if ($firstUser) {
            $firstUser->update(['role_as' => '1']);
            return redirect('home')->with('status', 'First user is now an admin');
        } else {
            return redirect()->back()->with('status', 'No users found');
        }
    }


}
