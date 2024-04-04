<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Event;
use App\Models\Collectible;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function events(){
        $user = Auth::user();
        $events = Event::All();


        return view('admin.events', compact('events'));
    }

    public function create(){
        $category = Collectible::all();
        return view('events.create', compact('category') );
    }

    public function store(Request $request){
        $user = Auth::user();
        $category = $request->category;
        // dd($request);

        // dd($price);

        $request->validate([
            'title' => 'required',
            'details' => 'required',
            'discount_rate' => 'required|numeric',
            'category'=> 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif'
        ]);

        // dd($category);

         // Image Handler
         $imagePaths = [];
         if ($request->hasFile('images')) {
             foreach ($request->file('images') as $image) {
                 $filename = uniqid() . '_' . $image->getClientOriginalName();
                 $image->move('storage', $filename);
                 $imagePaths[] = 'storage/' . $filename;
             }
         }

         $event = Event::create([
            'title' => $request->title,
            'details' => $request->details,
            'discount_rate' => $request->discount_rate,
            'image_path' => implode(',', $imagePaths)
        ]);

        $collectibles = Collectible::where('category', $category)->get();

        foreach ($collectibles as $collectible) {
            $orgprice = $collectible->price;
            $newprice = $orgprice - ($orgprice * $request->discount_rate);

            // Update the price of the collectible
            $collectible->update(['price' => $newprice]);
            $event->collectibles()->attach($collectible->id, ['OrigPrice' => $orgprice]);
        }

        // Now that all prices are updated, attach the event to the collectibles
        // $event->collectibles()->attach($collectibles);
        // Collectible::where('category', $category)->update([


        return redirect()->route('event.show', compact('category'))->with('successevent', true);
    }

    public function delete($id){
        $event = Event::findOrFail($id);
        $events = Event::with('collectibles')->findOrFail($id);

        foreach ($events->collectibles as $collectible) {

            $originalPrice = $collectible->pivot->OrigPrice;

            // Update the price of the collectible to the original price
            $collectible->update(['price' => $originalPrice]);
        }
        // totam quis 1195.00 delectus

        // Detach all collectibles associated with the event
        $events->collectibles()->detach();
        $event->delete();

        return redirect()->route('event.show');
    }

    public function edit($id){
        $event = Event::find($id);
        $category = Collectible::all();

        return View('events.edit', compact('event', 'category'));
    }

    public function update(Request $request, $id)
    {

        $category = $request->category;
        $request->validate([
            'title' => 'required',
            'details' => 'required',
            'discount_rate' => 'required|numeric',
            'category'=> 'required',
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
            'title' => $request->id,
            'details' => $request->details,
            'discount_rate' => $request->discount_rate,
        ];

        if (!empty($imagePaths)) {
            $data['image_path'] = implode(',', $imagePaths);
        }


        $event = Event::with('collectibles')->findOrFail($id);
        // dd($event);
        foreach ($event->collectibles as $collectible) {
            $originalPrice = $collectible->pivot->OrigPrice;

            // Update the price of the collectible to the original price
            $collectible->update(['price' => $originalPrice]);
        }

        // Detach all collectibles associated with the event
        $event->collectibles()->detach();


        $collectibless = Collectible::where('category', $category)->get();

        foreach ($collectibless as $collectible) {
            $orgprice = $collectible->price;
            $newprice = $orgprice - ($orgprice * $request->discount_rate);

            // Update the price of the collectible
            $collectible->update(['price' => $newprice]);
            $event->collectibles()->attach($collectible->id, ['OrigPrice' => $orgprice]);
        }

        // Now that all prices are updated, attach the event to the collectibles
        // $event->collectibles()->attach($collectibless);

        $event->update($data);
        return redirect()->route('event.show');
    }
}
