<?php

namespace App\Http\Controllers;
use App\Models\Collectible;
use App\Models\Cart;
use Auth;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function create($id)
    {
        // dd($id);
        if(Cart::where("user_id", Auth::user()->id)->count() == 0)
        {
                $cart = new Cart();
                $cart->user_id = Auth::user()->id;
                $cart->save();

            $collectible = Collectible::find($id);
            $cart->collectibles()->attach($collectible->id);
        }
        else{
            $cart = Cart::where("user_id", Auth::user()->id)->first();
            $collectible = Collectible::find($id);
            $cart->collectibles()->attach($collectible->id);
        }

        
        $cartItems = Cart::where('user_id', Auth::user()->id)->firstOrFail()->collectibles()->get();
        return view('user.cart', compact('cartItems'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function index()
    {
        $cartItems = Cart::where('user_id', Auth::user()->id)->firstOrFail()->collectibles()->get();
        return view('user.cart', compact('cartItems'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
