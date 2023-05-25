<?php
    use App\Models\Room;
?>
@extends('layouts.customer')

@section('section')
@if(Session::has('message'))
    <div class="alert alert-success" role="alert">
        {{ Session::get('message') }}
    </div>
    <br>
@endif
    <h4 class="h4">My Bookings</h4>
    <br>
    <div class="card">    
    <div class="card-body">
    
    <!-- start a table -->
    <table class="table-fixed w-full">
        
        <!-- table head -->
        <thead class="text-left">
            <tr>
                <th class="w-1/4 pb-10 text-sm font-extrabold tracking-wide">Confirmation Code</th>
                <th class="w-1/4 pb-10 text-sm font-extrabold tracking-wide text-right">Room Type</th>
                <th class="w-1/4 pb-10 text-sm font-extrabold tracking-wide text-right">Check In Date</th>
                <th class="w-1/4 pb-10 text-sm font-extrabold tracking-wide text-right">Check Out Date</th>
                <th class="w-1/4 pb-10 text-sm font-extrabold tracking-wide text-right">Nr. of Guests</th>
                <th class="w-1/4 pb-10 text-sm font-extrabold tracking-wide text-right">Booked At</th>
                <th class="w-1/4 pb-10 text-sm font-extrabold tracking-wide text-right">Price &nbsp;</th>
                <th class="w-1/4 pb-10 text-sm font-extrabold tracking-wide text-right"> &nbsp; Cancel Booking</th>
            </tr>
        </thead>
        <!-- end table head -->

        <tbody class="text-left text-gray-600">
            @foreach ($bookings as $booking)
            <?php
            $room = Room::where('id', $booking->room_id)->first();
            ?>
                <tr style="border-bottom: 2px dotted #ddd;">
                    <th class="w-1/4 mb-4 text-xs font-extrabold tracking-wider flex flex-row items-center w-full py-2">
                        {{-- <a href="booking/{{$booking->id}}" target="_blank"><p>{{$booking->confirmation_code}}</p></a>   
                                                         --}}
                        <p>{{$booking->confirmation_code}}</p>
                    </th>
        
                    <th class="w-1/4 mb-4 text-xs font-extrabold tracking-wider text-right py-2">{{$room->type}}</th>
        
                    <th class="w-1/4 mb-4 text-xs font-extrabold tracking-wider text-right py-2">{{date('d M Y', strtotime($booking->check_in_date))}}</th>

                    <th class="w-1/4 mb-4 text-xs font-extrabold tracking-wider text-right py-2">{{date('d M Y', strtotime($booking->check_out_date))}}</th>
        
                    <th class="w-1/4 mb-4 text-xs font-extrabold tracking-wider text-right py-2">{{$booking->guests}}</th>
                    
                    <th class="w-1/4 mb-4 text-xs font-extrabold tracking-wider text-right py-2">{{date('d M Y', strtotime($booking->booked_at))}}</th>
        
                    <th class="w-1/4 mb-4 text-xs font-extrabold tracking-wider text-right py-2">£{{$booking->price}}</th>

                    <th class="w-1/4 mb-4 text-xs font-extrabold tracking-wider text-right py-2">
                        <?php
                        $check_in = new DateTime($booking->check_in_date);
                        $check_in->setTime(15, 0, 0);
                        $diff = $check_in->diff(new DateTime());
                        $hours = $diff->days * 24 + $diff->h;
                        if ($hours >= 24) {
                        ?>
                            <a href="/cancel/mybooking/{{$booking->id}}"><button><i class="fa-sharp fa-solid fa-ban fa-2xl" style="color: #ff0000;"></i></button></a>
                        <?php
                        } else {
                        echo "can't cancel";
                        }
                        ?>
                    </th>
                </tr>
                <tr style="height: 0.5rem;"></tr> <!-- add a 0.5rem gap between rows -->
            @endforeach
        </tbody>
        <!-- end table body -->

    </table>
    <!-- end a table -->
</div>
</div>

@endsection