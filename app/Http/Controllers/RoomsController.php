<?php

namespace App\Http\Controllers;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class RoomsController extends Controller
{
    public function view()
    {
        $user = Auth::user();
        $rooms = Room::all();
        return view('adminViews.rooms', compact('rooms','user'));
    }

    public function addRoom()
    {
        return view('adminViews.addRoom');
    }

    public function saveRoom(Request $request)
    {
        $room = Room::create([
            'number' => $request['number'],
            'type' => $request['type'],
        ]);
        Session::flash('message', 'Room saved!'); 
        return redirect('/managerooms');
    }

    public function deleteRoom(Request $request)
    {
        $room = Room::find($request['id']);
        $room->delete();
        Session::flash('message', 'Room deleted!'); 
        return redirect('/managerooms');
    }
}
