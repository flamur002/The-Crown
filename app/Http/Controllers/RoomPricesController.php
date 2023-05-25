<?php

namespace App\Http\Controllers;
use App\Models\RoomPrice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Validator;
use Illuminate\Support\Facades\Session;


class RoomPricesController extends Controller
{
    public function edit(){
        $prices = [
            'standard' => RoomPrice::where('room_type', 'standard')->pluck('room_price')->first(),
            'deluxe' => RoomPrice::where('room_type', 'deluxe')->pluck('room_price')->first(),
            'family' => RoomPrice::where('room_type', 'family')->pluck('room_price')->first(),
        ];
        return view('adminViews.editPrices', compact('prices'));
    }

    public function update(Request $request){
        
        $standard = RoomPrice::where('room_type', 'standard')->first();
        $deluxe = RoomPrice::where('room_type', 'deluxe')->first();
        $family = RoomPrice::where('room_type', 'family')->first();

        $validatedData = $request->validate([
            'standard' => ['required', 'numeric', 'min:20'],
            'deluxe' => ['required', 'numeric', 'min:20'],
            'family' => ['required', 'numeric', 'min:20'],
        ]);

        $standard->update([
            'room_price' => $validatedData['standard'],
        ]);

        $deluxe->update([
            'room_price' => $validatedData['deluxe'],
        ]);        
        
        $family->update([
            'room_price' => $validatedData['family'],
        ]);
        Session::flash('message', 'Prices Successfully Updated!'); 
        return redirect('/editPrices');

    }
}
