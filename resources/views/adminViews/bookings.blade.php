<?php
    use App\Models\User;
    use App\Models\Room;
?>
@if ($user->role=="1")
    @php $extend = "layouts.staff"; @endphp
@else
    @php $extend = "layouts.admin"; @endphp
@endif

@extends($extend)

@section('section')
@section('section')
@if(Session::has('message'))
    <div class="alert alert-success" role="alert">
        {{ Session::get('message') }}
    </div>
    <br>
@endif
    <h4 class="h4">{{$when}} Bookings</h4>
    <br>
    <div  class="submit-wrapper">
        @if ($when == "Upcoming")
            <a href="/previousBookings"><button class="btn-bs-dark" style="display: inline-block;">View Previous Bookings</button></a>
        @else
            <a href="/bookings"><button class="btn-bs-dark" style="display: inline-block;">View Upcoming Bookings</button></a>
        @endif
        &nbsp;
            <a href="/cancelledBookings"><button class="btn-bs-dark" style="display: inline-block;">View Cancelled Bookings</button></a>
    </div>
    <br>
    <div class="card">    
    <div class="card-body">
    
    <!-- start a table -->
    <table class="table-fixed w-full">
        
        <!-- table head -->
        <thead class="text-left">
            <tr>
                <th class="w-1/4 pb-10 text-sm font-extrabold tracking-wide">Confirmation Code</th>
                <th class="w-1/4 pb-10 text-sm font-extrabold tracking-wide text-right">Booked By</th>
                <th class="w-1/4 pb-10 text-sm font-extrabold tracking-wide text-right">Room Nr.</th>
                <th class="w-1/4 pb-10 text-sm font-extrabold tracking-wide text-right">Nr. of Guests</th>
                <th class="w-1/4 pb-10 text-sm font-extrabold tracking-wide text-right">Check In Date</th>
                <th class="w-1/4 pb-10 text-sm font-extrabold tracking-wide text-right">Check Out Date</th>
                <th class="w-1/4 pb-10 text-sm font-extrabold tracking-wide text-right">Price &nbsp;</th>

                @if ($when=="Upcoming")
                    <th class="w-1/4 pb-10 text-sm font-extrabold tracking-wide text-right"> &nbsp; Cancel Booking</th>
                @endif
            </tr>
        </thead>
        <!-- end table head -->

        <tbody class="text-left text-gray-600">
            @foreach ($bookings as $booking)
            <?php
            $user = User::where('id', $booking->user_id)->first();
            $room = Room::where('id', $booking->room_id)->first();
            ?>
                <tr style="border-bottom: 2px dotted #ddd;">
                    <th class="w-1/4 mb-4 text-xs font-extrabold tracking-wider flex flex-row items-center w-full py-2">
                        <a href="booking/{{$booking->id}}" target="_blank"><p>{{$booking->confirmation_code}}</p></a>                                   
                    </th>
        
                    <th class="w-1/4 mb-4 text-xs font-extrabold tracking-wider text-right py-2">
                        @if($user)
                            {{$user->name ?? ''}} {{$user->surname ?? ''}}
                        @else
                            n/a
                        @endif
                    </th>
        
                    <th class="w-1/4 mb-4 text-xs font-extrabold tracking-wider text-right py-2">{{$room->number}}</th>
        
                    <th class="w-1/4 mb-4 text-xs font-extrabold tracking-wider text-right py-2">{{$booking->guests}}</th>
                    
                    <th class="w-1/4 mb-4 text-xs font-extrabold tracking-wider text-right py-2">{{date('d M Y', strtotime($booking->check_in_date))}}</th>

                    <th class="w-1/4 mb-4 text-xs font-extrabold tracking-wider text-right py-2">{{date('d M Y', strtotime($booking->check_out_date))}}</th>
        
                    <th class="w-1/4 mb-4 text-xs font-extrabold tracking-wider text-right py-2">£{{$booking->price}}</th>

                    <th class="w-1/4 mb-4 text-xs font-extrabold tracking-wider text-right py-2">
                        @if ($when=="Upcoming")
                            <a href="/cancel/{{$booking->id}}"><button><i class="fa-sharp fa-solid fa-ban fa-2xl" style="color: #ff0000;"></i></button></a>
                            &nbsp; &nbsp; &nbsp;
                        @endif

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