<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Login;
use App\Http\Controllers\UserController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function loginpage(){
        return view('login.login');
    }

    public function signup(){
        return view('login.signup');
    }

    public function login(Request $request){

        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)){
            $request->session()->regenerate();
            $user = auth()->user();
            if(Auth::user()->status === 'unverified'){
                Auth::logout();
                return redirect()->route('login.loginpage')->with('errorver','Account not Verified!');
            }
            if(Auth::user()->role === 'user')
            {
                return redirect()->route('home');
            }
            if(Auth::user()->role === 'admin')
            {
                return redirect()->route('admin.home');
            }
            
            Auth::logout();
            return redirect()->route('home');
        } else {
            return back()->withErrors(['credentials' => 'Invalid username or password']);
        }
    }


    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login.loginpage');
    }

    public function signupuser(Request $request){
        return app(UserController::class)->register($request);
    }


}
