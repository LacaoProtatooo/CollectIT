<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Login;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function register(Request $request) {
        //dd($request->all());
        $request->validate([
            'username' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:11',
            'email' => 'required|string|email|max:255|unique:users',
            'address' => 'required|string|max:255',
            'birthdate' => 'required|date',
            'password' => 'required|string|min:8',
        ]);

        $birthdate = date('Y-m-d', strtotime($request->birthdate));

        // Create new User
        $user = User::create([
            'username' => $request->username,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'address' => $request->address,
            'role' => 'user',
            'birthdate' => $birthdate,
        ]);

        // Save Login
        Login::create([
            'user_id' => $user->id,
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login.loginpage')->with('successregister', true);
    }
}
