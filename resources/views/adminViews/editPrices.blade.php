@extends('layouts.admin')

@section('section')
@section('section')
@if(Session::has('message'))
    <div class="alert alert-success" role="alert">
        {{ Session::get('message') }}
    </div>
    <br>
@endif
<div class="card" style="position: absolute; left: 50%; transform: translateX(-50%);">
    <div class="card-header">
        <h4 class="h4">&nbsp;Edit Room Prices Per Night&nbsp; </h4>
    </div>

<form class="registration-form" method="POST" action="/editPrices">
    @csrf

    <div class="mb-4">
        <label for="standard">Standard Room:</label>
        <input type="text" id="standard" name="standard" value="{{$prices['standard']}}" required>
    </div>

    <div class="mb-4">
        <label for="deluxe">Deluxe Room:</label>
        <input type="text" id="deluxe" name="deluxe" value="{{$prices['deluxe']}}" required>
    </div>

    <div class="mb-4">
        <label for="family">Family Room:</label>
        <input type="text" id="family" name="family" value="{{$prices['family']}}" required>
    </div>

    <div  class="submit-wrapper">
        <button type="submit" class="btn-bs-dark" style="display: inline-block;">Update Prices</button>
    </div>

    <br>

</form>

</div>
@endsection