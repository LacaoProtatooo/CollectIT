<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Collectible;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $user = auth()->user();

        $collectibles = Collectible::all();
        $soldcollectible = Collectible::where('status', 'sold')->get();
        $availablecollectible = Collectible::where('status', 'available')->get();

        $usercount = User::count();
        $collectiblecount = Collectible::count();



        return view('admin.home', 
        compact('user','collectibles',
        'availablecollectible','soldcollectible',
        'usercount','collectiblecount'));
    }
}
