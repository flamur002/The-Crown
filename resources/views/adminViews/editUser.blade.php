@extends('layouts.admin')

@section('section')

<?php
$roles = array('customer', 'Staff', 'Admin');
?>
<div class="card" style="position: absolute; left: 50%; transform: translateX(-50%);">
    <div class="card-header">
        <h4 class="h4">&nbsp; &nbsp; Edit {{$roles[$user->role]}} Account &nbsp; &nbsp; </h4>
    </div>
<form class="registration-form" method="POST" action="/admin/editUser/{{$user->id}}">
    @csrf

    <div class="mb-4">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="{{ $user->name ?? '' }}" required>
    </div>

    <div class="mb-4">
        <label for="surname">Surname:</label>
        <input type="text" id="surname" name="surname" value="{{ $user->surname ?? '' }}" required>
    </div>

    <div class="mb-4">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="{{ $user->email ?? '' }}" required>
    </div>

    <div class="mb-4">
        <label for="phone">Phone:</label>
        <input type="text" id="phone" name="phone" value="{{ $user->phone ?? '' }}" required>
    </div>

    <div class="mb-4">
        <label for="dob">Date of Birth:</label>
        <input type="date" id="dob" name="dob" value="{{ $user->dob ?? '' }}" max="{{$yrs}}" required>
    </div>

    <input type="hidden" name="id" value="{{ $user->id }}">

    <div  class="submit-wrapper">
        <button type="submit" class="btn-bs-dark" style="display: inline-block;">Update User</button>
    </div>
</form>

</div>
@endsection