<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\Room;
use App\Models\User;
use App\Models\Booking;
use App\Models\RoomPrice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class BookingsController extends Controller
{
    public function getIntersection($a1,$a2,$b1,$b2)
    {
        $a1 = strtotime($a1);
        $a2 = strtotime($a2);
        $b1 = strtotime($b1);
        $b2 = strtotime($b2);
        if($b1 > $a2 || $a1 > $b2 || $a2 < $a1 || $b2 < $b1)
        {
            return false;
        }
    }

    public function summary(Request $request)
    {
        $request['checkin'] = Carbon::createFromFormat('d/m/Y', $request['checkin'])->format('Y-m-d');
        $request['checkout'] = Carbon::createFromFormat('d/m/Y', $request['checkout'])->format('Y-m-d');
        $user = Auth::user();
        $type = $request['room_type'];
        $availableRooms = [];
        $room_price = RoomPrice::where('room_type', $type)->first()->room_price;
        $rooms = Room::where('type', $type)->get();

        foreach ($rooms as $room){
            $available = true;
            $bookings = Booking::where('room_id', $room->id)->get();
            foreach ($bookings as $booking){
                $intersection = $this->getIntersection($request['checkin'], $request['checkout'], $booking->check_in_date, $booking->check_out_date);
                if($intersection){
                    $available = false;
                    break;
                }
            }
            if($available){
                $request->merge(['roomId' => $room->id]);
                return view('confirm', compact(['request', 'user', 'room_price']));
                break;
            }
        }
        if (!isset($available) || !$available) {
            return view('noAvailability');
        }
    }

    public function checkInBookings()
    {
        $bookings = Booking::where('checked_in', 'N')->where('cancelled', 'N')->orderBy('check_in_date')->get();
        $check = "In";
        $user = Auth::user();
        return view('adminViews.check', compact('bookings','check','user'));
    }

    public function checkOutBookings()
    {
        $bookings = Booking::where('checked_in', 'Y')->where('checked_out', 'N')->orderBy('check_out_date')->get();
        $check = "Out";
        $user = Auth::user();
        return view('adminViews.check', compact('bookings','check','user'));
    }

    public function checkIn($id)
    {
        $booking = Booking::find($id);
        $booking->update([
            'checked_in' => 'Y',
        ]);
        Session::flash('message', 'Booking Checked In!'); 
        return redirect('/checkin');
    }

    public function checkOut($id)
    {
        $booking = Booking::find($id);
        $booking->update([
            'checked_out' => 'Y',
        ]);
        Session::flash('message', 'Booking Checked Out!'); 
        return redirect('/checkout');
    }

    public function bookings()
    {
        $bookings = Booking::where('checked_in', 'N')->where('checked_out', 'N')->where('check_in_date', '>=', date('Y-m-d'))->where('cancelled', 'N')->get();
        $when = "Upcoming";
        $user = Auth::user();
        return view('adminViews.bookings', compact('bookings', 'when','user'));
    }

    public function previousBookings()
    {
        $bookings = Booking::where('cancelled', 'N')
        ->where(function ($query) {
            $query->where('check_out_date', '<=', date('Y-m-d'))
                ->where('checked_in', 'N')
                ->where('checked_out', 'N');
        })
        ->orWhere(function ($query) {
            $query->where('checked_in', 'Y')
                ->where('checked_out', 'Y');
        })
        ->where('cancelled', 'N')
        ->get();
    
        
        $when = "Previous";
        $user = Auth::user();
        return view('adminViews.bookings', compact('bookings', 'when','user'));
    }

    public function cancelledBookings()
    {
        $bookings = Booking::where('cancelled', 'Y')->orderBy('check_in_date')->get();
        $user = Auth::user();
        return view('adminViews.cancelledBookings', compact('bookings','user'));
    }

    public function bookingDetails($id){
        $booking = Booking::find($id);
        $auth = Auth::user();
        $user = User::find($booking->user_id);
        $user2 = User::find($booking->cancelled_by);
        $room = Room::find($booking->room_id);
        return view('adminViews.booking', compact('booking','user','user2','room','auth'));
    }

    public function cancelBooking($id)
    {
        $booking = Booking::find($id);
        $user = Auth::user();
        return view('adminViews.cancelBooking', compact('booking','user'));
    }

    public function cancel($id, Request $request)
    {
        $booking = Booking::find($id);
        $user = Auth::user();

        $booking->update([
            'cancelled' => 'Y',
            'cancelled_at' => date('Y-m-d'),
            'cancellation_reason' => $request['reason'],
            'cancelled_by' => $user->id,
        ]);
        Session::flash('message', 'Booking Successfully Cancelled!'); 
        if($user->role==0){
            return redirect('/mybookings');
        }
        else{        
            return redirect('/bookings');
        }
    }

    public function mybookings()
    {
        $user = Auth::user();
        $bookings = Booking::where('user_id', $user->id)->where('cancelled', 'N')->get();
        return view('mybookings', compact('bookings'));
    }

    public function cancelMyBooking($id)
    {
        $booking = Booking::find($id);
        $user = Auth::user();

        if($booking->user_id==$user->id){
            return view('cancelBooking', compact('booking'));
        }

        return back();
    }

    public function myCancelledBookings()
    {
        $user = Auth::user();
        $bookings = Booking::where('user_id', $user->id)->where('cancelled', 'Y')->get();
        return view('myCancelledBookings', compact('bookings'));

    }

}
    
