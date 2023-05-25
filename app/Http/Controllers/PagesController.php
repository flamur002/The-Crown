<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\RoomPrice;
use App\Models\Booking;
use App\Models\User;
use Illuminate\Support\Facades\Auth;




class PagesController extends Controller
{
    public function index(){
        return view('index');
    }

    public function about(){
        return view('about');
    }

    public function contact(){
        return view('contact');
    }

    public function standard(){
        $standard = RoomPrice::where('room_type', 'standard')->first();
        $price = $standard->room_price;
        return view('standard',compact('price'));
    }

    public function deluxe(){
        $deluxe = RoomPrice::where('room_type', 'deluxe')->first();
        $price = $deluxe->room_price;
        return view('deluxe',compact('price'));
    }

    public function family(){
        $family = RoomPrice::where('room_type', 'family')->first();
        $price = $family->room_price;
        return view('family',compact('price'));
    }


    public function login(){
        return view('auth.login');
    }

    public function register(){
        return view('auth.register');
    }


    public function quotes(Request $request){

        $standard = RoomPrice::where('room_type', 'standard')->pluck('room_price')->first();
        $deluxe = RoomPrice::where('room_type', 'deluxe')->pluck('room_price')->first();
        $family = RoomPrice::where('room_type', 'family')->pluck('room_price')->first();


        $checkin = Carbon::createFromFormat('d F, Y', $request['checkin'])->format('d/m/Y');
        $checkout = Carbon::createFromFormat('d F, Y', $request['checkout'])->format('d/m/Y');

        $checkinCarbon = Carbon::createFromFormat('d/m/Y', $checkin);
        $checkoutCarbon = Carbon::createFromFormat('d/m/Y', $checkout);

        $quote = [
            'guests' => $request['guest'],
            'checkin' => $checkin,
            'checkout' => $checkout,
            'nights' => $checkinCarbon->diffInDays($checkoutCarbon),
            'standard' => $standard,
            'deluxe' => $deluxe,
            'family' => $family
        ];

        return view('quote', compact('quote'));

    }

}
