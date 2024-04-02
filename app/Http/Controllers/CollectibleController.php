<?php

namespace App\Http\Controllers;

use App\DataTables\CollectibleDataTable;
use App\Models\Collectible;
use App\Models\Review;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CollectibleController extends Controller
{
    public function collectibles(){
        $user = Auth::user();
        $nottrashedcollectibles = Collectible::where('user_id', $user->id)->get();
    // Retrieve all soft deleted collectibles
        $trashedCollectibles = Collectible::onlyTrashed()->get();

    // Merge both collections
        $collectibles = $nottrashedcollectibles->merge($trashedCollectibles);
        return view('user.collectibles', compact('collectibles'));
    }

    public function populate(){
        $collectibles = Collectible::where('status','available')->get();
        // dd($data->name);


        return view('home.home', compact('collectibles'));
    }
    public function edit($id){
        $collectible = Collectible::find($id);

        return View('collectibles.edit', compact('collectible'));
    }

    public function update(Request $request, $id)
    {
        $collectible = Collectible::find($id);
        $user = Auth::user();

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'dimension' => 'required',
            'condition' => 'required',
            'stock' => 'required',
            'manufacturer' => 'required',
            'category' => 'required',
            'release_date' => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif'
        ]);

        // Image Handler
        $imagePaths = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $filename = uniqid() . '_' . $image->getClientOriginalName();
                $image->move('storage', $filename);
                $imagePaths[] = 'storage/' . $filename;
            }
        }

        $data = [
            'user_id' => $user->id,
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'dimension' => $request->dimension,
            'condition' => $request->condition,
            'stock' => $request->stock,
            'manufacturer' => $request->manufacturer,
            'category' => $request->category,
            'release_date' => $request->release_date,
        ];

        if (!empty($imagePaths)) {
            $data['image_path'] = implode(',', $imagePaths);
        }

        $collectible->update($data);
        return redirect()->route('collectibles.show');
    }

    public function collectibleinfo($id){
        // $id = $request->query('id');
        $collectible = Collectible::where('id', $id)->first();
        $reviews = Collectible::where('id', $id)
    ->firstOrFail()
    ->reviews() // Include user_id from pivot table
    ->get();
    //    dd($reviews);

        return view('user.collectibleinfo', compact('collectible', 'reviews'));
    }



    public function delete($id) {
        $collectible = Collectible::findOrFail($id);
        $collectible->delete();

        return redirect()->route('collectibles.show');
    }

    public function create(){
        return view('collectibles.create');
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'dimension' => 'required',
            'condition' => 'required',
            'stock' => 'required',
            'manufacturer' => 'required',
            'category' => 'required',
            'release_date' => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif'
        ]);

        // Image Handler
        $imagePaths = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $filename = uniqid() . '_' . $image->getClientOriginalName();
                $image->move('storage', $filename);
                $imagePaths[] = 'storage/' . $filename;
            }
        }

        $collectible = Collectible::create([
            'user_id' => $user->id,
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'dimension' => $request->dimension,
            'condition' => $request->condition,
            'stock' => $request->stock,
            'manufacturer' => $request->manufacturer,
            'category' => $request->category,
            'release_date' => $request->release_date,
            'image_path' => implode(',', $imagePaths)
        ]);

        return redirect()->route('collectibles.show')->with('successcollectible', true);
    }

    public function restore($id)
    {
        // Find the soft deleted collectible by ID
        $collectible = Collectible::withTrashed()->findOrFail($id);

        // Restore the collectible
        $collectible->restore();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Collectible restored successfully');
    }

    public function search(Request $request)
    {
        $keyword = $request->searchcontent;
        $collectibles = Collectible::query();
        $collectibles->where(function ($query) use ($keyword) {
            $query->where('name', 'like', '%' . $keyword . '%')
                ->orWhere('description', 'like', '%' . $keyword . '%')
                ->orWhere('category', 'like', '%' . $keyword . '%');
        });
        $collectibles = $collectibles->get();

        if ($user = Auth::check()) {
            return view('user.home', compact('collectibles'));
        } else {
            return view('home.home', compact('collectibles'));
        }
    }



}
