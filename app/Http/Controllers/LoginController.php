<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function validateUser(Request $request)
    {
        // Validate input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        return $this->loginUser($request);
    }

    public function loginUser(Request $request)
    {
        $credentials = $request->only('email', 'password');

        //Laravel's built-in authentication
        if (Auth::attempt($credentials)) {
            return view('user.dashboard');
        }

        // Check if user exists
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return redirect()->back()->with('error', 'No user found with this email');
        }

        //Incorrect password
        return redirect()->back()->with('error', 'Wrong password');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
