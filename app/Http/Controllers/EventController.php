<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Event;

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
        return view('events.create');
    }

    public function store(Request $request){
        $user = Auth::user();
        $request->validate([
            'title' => 'required',
            'details' => 'required',
            'discount_rate' => 'required|numeric',
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

        $event = Event::create([
            'title' => $request->title,
            'details' => $request->details,
            'discount_rate' => $request->discount_rate,
            'image_path' => implode(',', $imagePaths) 
        ]);

        return redirect()->route('event.show')->with('successevent', true);
    }

    public function delete($id){
        Event::destroy($id);
        
        return redirect()->route('event.show');
    }

    public function edit($id){
        $event = Event::find($id);

        return View('events.edit', compact('event'));
    }

    public function update(Request $request, $id)
    {
        $event = Event::find($id);

        $request->validate([
            'title' => 'required',
            'details' => 'required',
            'discount_rate' => 'required|numeric',
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

        $event->update($data);
        return redirect()->route('event.show');
    }
}
