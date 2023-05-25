@extends('layouts.admin')

@section('section')
<?php
$roles = array('user', 'Staff', 'Admin');
?>
<div class="card" style="position: absolute; left: 50%; transform: translateX(-50%);">

    <div class="card-header">
        <h4 class="h4">&nbsp; &nbsp; Add {{$roles[$role]}} Account &nbsp; &nbsp; </h4>
    </div>

<form class="registration-form" method="POST" action="/admin/addUser">
    @csrf

    <div class="mb-4">
        <label for="name">Name</label>
        <input type="text" id="name" name="name" placeholder="Name..." required>
    </div>

    <div class="mb-4">
        <label for="surname">Surname</label>
        <input type="text" id="surname" name="surname" placeholder="Surname..." required>
    </div>

    <div class="mb-4">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Email address..." required>
    </div>

    <div class="mb-4">
        <label for="phone">Phone</label>
        <input type="text" id="phone" name="phone" placeholder="Phone number..."  required>
    </div>

    <div class="mb-4">
        <label for="dob">Date of Birth</label>
        <input type="date" id="dob" name="dob" placeholder="date" max="{{$yrs}}" required>
    </div>

    <div class="mb-4">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Password..." required>
    </div>

    <div class="mb-4">
        <label for="password_confirmation">Confirm Password</label>
        <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Re-enter password..." required>
    </div>

    <input type="hidden" name="role" value="{{ $role }}">

    <div  class="submit-wrapper">
        <button type="submit" class="btn-bs-dark" style="display: inline-block;">Register User</button>
    </div>
</form>
</div>



@endsection