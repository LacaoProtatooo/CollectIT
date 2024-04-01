<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Collectible;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

use App\Mail\RegisterEmail;
use Mail;

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
        $passhash = Hash::make($request->password);

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
            'password' => $passhash
        ]);

        Mail::to($user->email)->send(new RegisterEmail($user));

        return redirect()->route('login.loginpage')->with('regissuccess', 'Check Your Email to Verify your Account');
    }

    public function verifyemail($email){

        $user = User::where('email', $email)->first();

        if(!$user){
            return redirect()->route('login.loginpage')->with('error','Invalid Verification');
        }

        $user->update([
            'status' => 'verified',
        ]);

        return redirect()->route('login.loginpage')->with('success','Account Verified, You can Login now !');
    }


    public function collectibles(Request $data){
        $user = Auth::user();
        $collectibles = Collectible::where('user_id', $user->id)->get();

        // if($data->ajax())
        // {
        //     $re = Collectible::select('*');
        //     return DataTables::of($re)
        //     ->addIndexColumn()
        //     ->addColumn('action', function($row){
        //         $actionbtn = '  <a href ="javascript::void(0)" class = "edit btn btn-success btn-sm">Edit</a>
        //                         <a href = "javascript::void(0)" class = "delete btn btn-danger btn-sm">Delete</a>';
        //                         return $actionbtn;
        //     })
        //     ->rawColumns(['action'])
        //     ->make(true);
        // }

        return view('user.collectibles', compact('collectibles'));
    }

    public function profile(){
        $user = Auth::user();
        $userinfo = User::where('id', $user->id)->first();

        return view('user.profile', compact('user'));
    }


}
