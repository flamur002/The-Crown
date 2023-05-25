@extends('layouts.admin')

@section('section')
@if(Session::has('message'))
    <div class="alert alert-success" role="alert">
        {{ Session::get('message') }}
    </div>
@endif
    <h4 class="h4">Rooms</h4>
    <br>
    <div class="card">    
        <div class="card-body">
    <table class="table-fixed w-full">
        <thead  class="text-left">
            <tr>
                <th class="w-1/2 py-4 text-sm font-extrabold tracking-wide">Room Number</th>
                <th class="w-1/2 py-4 text-sm font-extrabold tracking-wide">Type</th>
                <th class="w-1/4 py-4 text-sm font-extrabold tracking-wide">Delete</th>
            </tr>
        </thead>
        <tbody class="text-left text-gray-600">
            @foreach ($rooms as $room)

            <tr style="border-bottom: 2px dotted #ddd;">
                <th class="w-1/2 mb-4 py-4 text-sm font-extrabold tracking-wide">{{$room->number}}</th>
                <th class="w-1/2 mb-4 py-4 text-sm font-extrabold tracking-wide">{{$room->type}}</th>
                <th class="w-1/4 mb-4 py-4 text-sm font-extrabold tracking-wide">
                    <form action="/deleteRoom" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{$room->id}}">
                        <button type="submit"><i class="fa-sharp fa-solid fa-trash fa-2xl" style="color: #ff0000;"></i></button>
                    </form>
                </th>

            </tr>
            <tr style="height: 0.5rem;"></tr> <!-- add a 0.5rem gap between rows -->

            @endforeach
        </tbody>
    </table>
        </div>
    </div>
    <br>
    <a href="/addRoom" class="btn-bs-dark" style="display: inline-block;"><i class="fa-solid fa-plus fa-sm" style="color: #ffffff;"> Add Room</i></a> <br> <br>
    <a href="/editPrices" class="btn-bs-dark" style="display: inline-block;"><i class="fa-regular fa-pen-to-square" style="color: #ffffff;"> Edit Prices</i></a>
@endsection