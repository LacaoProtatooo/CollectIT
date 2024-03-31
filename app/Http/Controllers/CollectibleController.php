<?php

namespace App\Http\Controllers;

use App\Models\Collectible;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CollectibleController extends Controller
{
    public function collectibles(){
        $user = Auth::user();
        $collectibles = Collectible::where('user_id', $user->id)->get();

        return view('user.collectibles', compact('collectibles'));
    }
    
    public function populate(){
        $collectibles = Collectible::where('status','available')->get();   

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



    public function delete($id){
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
    

}
