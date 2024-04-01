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
    public function create(Request $request)
    {
        if (Cart::where("user_id", Auth::user()->id)->count() == 0) {
            $cart = new Cart();
            $cart->user_id = Auth::user()->id;
            $cart->save();


            $collectible = Collectible::find($request->id);
            $cart->collectibles()->attach($collectible->id, ['quantity' => $request->quantity]);
        } else {
            $cart = Cart::where("user_id", Auth::user()->id)->first();

            $existingCollectible = $cart->collectibles()->where('collectible_id', $request->id)->first();
            // dd($existingCollectible);
            if($existingCollectible)
            {
                $existingQuantity = $existingCollectible->pivot->quantity;
                // dd( $existingQuantity);
                $newQuantity = $existingQuantity + $request->quantity;
                $cart->collectibles()->updateExistingPivot($request->id, ['quantity' => $newQuantity]);
            }else{
                $collectible = Collectible::find($request->id);
                $cart->collectibles()->attach($collectible->id, ['quantity' => $request->quantity]);
            }
        }

        // Redirect to the cart page
        return redirect()->route('cart.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function index()
    {
        if (Cart::where("user_id", Auth::user()->id)->count() == 0) {
            $cart = new Cart();
            $cart->user_id = Auth::user()->id;
            $cart->save();
        }

        // $quantity = $request->quantity;
        $cartItems = Cart::where('user_id', Auth::user()->id)->firstOrFail()->collectibles()->withPivot('quantity')->get();
        // dd($cartItems);
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
    public function delete($id)
    {
        $cart = Cart::where('user_id', Auth::user()->id)->firstOrFail();
        $cart->collectibles()->detach($id);

        return redirect()->route('cart.index');
    }

    public function add(Request $request)
    {
        $cart = Cart::where("user_id", Auth::user()->id)->first();

        // Check if the collectible already exists in the cart
        $existingCollectible = $cart->collectibles()->where('collectible_id', $request->id)->first();

        if ($existingCollectible) {
            // Increment the quantity by 1 if it's not maxed out
            $existingQuantity = $existingCollectible->pivot->quantity;
            $maxQuantity = Collectible::find($request->id)->stock; // Assuming there's a field in your Collectible model indicating the maximum quantity
            if ($existingQuantity < $maxQuantity) {
                $newQuantity = $existingQuantity + 1;
                $cart->collectibles()->updateExistingPivot($request->id, ['quantity' => $newQuantity]);
            } else {
                return redirect()->back()->with('error', 'The maximum quantity for this collectible has been reached.');
            }
        }
        return redirect()->route('cart.index');


    }
    public function deduct(Request $request)
    {
        $id = $request->id;
        $cart = Cart::where('user_id', Auth::user()->id)->firstOrFail();

    // Check if the collectible exists in the cart
        $existingCollectible = $cart->collectibles()->where('collectible_id', $id)->first();

        if ($existingCollectible) {
            // Decrement the quantity by 1
            $existingQuantity = $existingCollectible->pivot->quantity;
            if ($existingQuantity > 1) {
                $newQuantity = $existingQuantity - 1;
                $cart->collectibles()->updateExistingPivot($id, ['quantity' => $newQuantity]);
            } else {
                // If quantity is 1, remove the collectible from the cart
                $cart->collectibles()->detach($id);
            }
        }

        return redirect()->route('cart.index');
        }
}
