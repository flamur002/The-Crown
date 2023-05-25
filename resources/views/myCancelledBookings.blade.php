<?php
    use App\Models\Room;
?>
@extends('layouts.customer')

@section('section')
    <h4 class="h4">My Cancelled Bookings</h4>
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
                <th class="w-1/4 pb-10 text-sm font-extrabold tracking-wide text-right">Check In/Out <br> Dates</th>
                <th class="w-1/4 pb-10 text-sm font-extrabold tracking-wide text-right">Cancelled At</th>
                <th class="w-1/4 pb-10 text-sm font-extrabold tracking-wide text-right">Reason</th>
                <th class="w-1/4 pb-10 text-sm font-extrabold tracking-wide text-right">Nr. of Guests</th>
                <th class="w-1/4 pb-10 text-sm font-extrabold tracking-wide text-right">Booked At</th>
                <th class="w-1/4 pb-10 text-sm font-extrabold tracking-wide text-right">Price &nbsp;</th>
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
                        <p>{{$booking->confirmation_code}}</p>
                    </th>
        
                    <th class="w-1/4 mb-4 text-xs font-extrabold tracking-wider text-right py-2">{{$room->type}}</th>
        
                    <th class="w-1/4 mb-4 text-xs font-extrabold tracking-wider text-right py-2">{{date('d M Y', strtotime($booking->check_in_date))}} <br> {{date('d M Y', strtotime($booking->check_out_date))}}</th>
        
                    <th class="w-1/4 mb-4 text-xs font-extrabold tracking-wider text-right py-2">{{date('d M Y', strtotime($booking->cancelled))}}</th>
                    
                    <th class="w-1/4 mb-4 text-xs font-extrabold tracking-wider text-right py-2">{{$booking->cancellation_reason}}</th>
        
                    <th class="w-1/4 mb-4 text-xs font-extrabold tracking-wider text-right py-2">{{$booking->guests}}</th>

                    <th class="w-1/4 mb-4 text-xs font-extrabold tracking-wider text-right py-2">{{date('d M Y', strtotime($booking->booked_at))}}</th>

                    <th class="w-1/4 mb-4 text-xs font-extrabold tracking-wider text-right py-2">£{{$booking->price}}</th>
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