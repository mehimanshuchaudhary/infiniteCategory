<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function create()
    {
        return view('user.register');
    }

    public function validateUser(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:50',
            'email' => 'required|email',
            'vat_number' => 'nullable|max:13',
            'password' => 'required|confirmed|min:6',
        ]);
        if($this->registerUser($request)){
            return redirect()->back()->with('success', 'Registration successful! You Can Log-in Now!');
        }else{
            return redirect()->back()->with('error', 'Not updated in database');
        }
    }

    public function registerUser(Request $request){
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        if ($user->save()) {
            return true;
        } else {
            return false;
        }
    }
}
