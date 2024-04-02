<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Order;
use App\Models\Collectible;
use Auth;
class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        // dd($request);
        $colId = $request->colID;
        $rev = $request->review;
        $ordId = $request->ordID;

        $review = new Review();
        $review->user_id = Auth::user()->id;
        $review->status = 'published';
        $review->description = $rev;
        $review->save();

        $collectible = Collectible::find($colId);
        $collectible->reviews()->attach($review->id);
        Order::find($ordId)
        ->collectibles()
        ->updateExistingPivot($colId, ['status' => 'rated']);
        return redirect()->route('myorders.index');
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
