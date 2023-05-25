@extends('layouts.admin')

@section('section')

<div class="card" style="position: absolute; left: 50%; transform: translateX(-50%);">

    <div class="card-header">
        <h4 class="h4">&nbsp; &nbsp; &nbsp; Add Room</h4>
    </div>

<form class="registration-form" method="POST" action="/addRoom">
    @csrf

    <div class="mb-4">
        <label for="number">Room Number</label>
        <input type="text" id="number" name="number" placeholder="Room Nr..." required>
    </div>

    <div class="mb-4">
        <label for="type">Room Type</label>
        <select name="type" id="type">
            <option value="standard">standard</option>
            <option value="deluxe">deluxe</option>
            <option value="family">family</option>
        </select>

    </div>

    <div  class="submit-wrapper">
        <button type="submit" class="btn-bs-dark" style="display: inline-block;">Save Room</button>
    </div>
</form>
</div>



@endsection