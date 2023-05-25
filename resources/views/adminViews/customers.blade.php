<?php
use App\Models\Booking;
?>
@extends('layouts.admin')

@section('section')
@section('section')
@if(Session::has('message'))
    <div class="alert alert-success" role="alert">
        {{ Session::get('message') }}
    </div>
    <br>
@endif    <h4 class="h4">Customer Accounts</h4>
    <br>
    <div class="card">    
    <div class="card-body">
    
    <!-- start a table -->
    <table class="table-fixed w-full">
        
        <!-- table head -->
        <thead class="text-left">
            <tr>
                <th class="w-1/4 pb-10 text-sm font-extrabold tracking-wide">full name</th>
                <th class="w-1/4 pb-10 text-sm font-extrabold tracking-wide text-right">Email</th>
                <th class="w-1/4 pb-10 text-sm font-extrabold tracking-wide text-right">Phone</th>
                <th class="w-1/4 pb-10 text-sm font-extrabold tracking-wide text-right">Date of Birth</th>
                <th class="w-1/4 pb-10 text-sm font-extrabold tracking-wide text-right">Bookings Made</th>
                <th class="w-1/4 pb-10 text-sm font-extrabold tracking-wide text-right">Actions</th>
            </tr>
        </thead>
        <!-- end table head -->

        <tbody class="text-left text-gray-600">
            @foreach ($customers as $customer)
                <tr style="border-bottom: 2px dotted #ddd;">
                    <th class="w-1/4 mb-4 text-xs font-extrabold tracking-wider flex flex-row items-center w-full py-2">
                        <p>{{$customer->name.' '.$customer->surname}}</p>                    
                    </th>
        
                    <th class="w-1/4 mb-4 text-xs font-extrabold tracking-wider text-right py-2">{{$customer->email}}</th>
        
                    <th class="w-1/4 mb-4 text-xs font-extrabold tracking-wider text-right py-2">{{$customer->phone}}</th>
        
                    <th class="w-1/4 mb-4 text-xs font-extrabold tracking-wider text-right py-2">{{date('d M Y', strtotime($customer->dob))}}</th>

                    <th class="w-1/4 mb-4 text-xs font-extrabold tracking-wider text-right py-2">{{Booking::where('user_id', $customer->id)->count()}}&nbsp;</th>
        
                    <th class="w-1/4 mb-4 text-xs font-extrabold tracking-wider text-right py-2">
                        <a href="/admin/editUser/{{$customer->id}}"><button><i class="fa-solid fa-pen-to-square fa-2xl" style="color: #ff8000;"></i></button></a>
                        &nbsp; &nbsp; &nbsp;
                        <a href="/delete/user/{{$customer->id}}"><button><i class="fa-sharp fa-solid fa-trash fa-2xl" style="color: #ff0000;"></i></button></a>
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