<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Collectible;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $admininfo = auth()->user();

        $users = User::all();
        $collectibles = Collectible::all();
        
        $usercount = User::count();
        $collectiblecount = Collectible::count();
        $availablecollectible = Collectible::where('status', 'available')->count();
        $soldcollectible = Collectible::where('status', 'sold')->count();
        
        return view('admin.home', 
        compact('admininfo','users','collectibles',
        'usercount','collectiblecount',
        'availablecollectible','soldcollectible'));
    }
}
