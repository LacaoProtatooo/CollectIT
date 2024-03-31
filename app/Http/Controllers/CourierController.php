<?php

namespace App\Http\Controllers;

use App\Models\Courier;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourierController extends Controller
{
    // 'name', str
    // 'rates', dbl
    // 'type', str
    // 'image_path' longtxt

    public function couriers(){
        $user = Auth::user();
        $couriers = Courier::All();

        return view('admin.couriers', compact('couriers'));
    }

    public function create(){
        return view('couriers.create');
    }

    public function store(Request $request){
        $user = Auth::user();
        $request->validate([
            'name' => 'required',
            'type' => 'required',
            'rates' => 'required|numeric',
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

        $courier = Courier::create([
            'name' => $request->name,
            'type' => $request->type,
            'rates' => $request->rates,
            'image_path' => implode(',', $imagePaths) 
        ]);

        return redirect()->route('courier.show')->with('successevent', true);
    }

    public function delete($id){
        $courier = Courier::findOrFail($id);
        $courier->delete();
        
        return redirect()->route('courier.show');
    }

    public function edit($id){
        $courier = Courier::find($id);

        return View('couriers.edit', compact('courier'));
    }

    public function update(Request $request, $id)
    {
        $courier = Courier::find($id);

        $request->validate([
            'name' => 'required',
            'type' => 'required',
            'rates' => 'required|numeric',
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
            'name' => $request->name,
            'type' => $request->type,
            'rates' => $request->rates,
        ];

        if (!empty($imagePaths)) {
            $data['image_path'] = implode(',', $imagePaths);
        }

        $courier->update($data);
        return redirect()->route('courier.show');
    }
}
