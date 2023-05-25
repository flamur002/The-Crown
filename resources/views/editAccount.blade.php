@if ($user->role=="1")
    @php $extend = "layouts.staff"; @endphp
@elseif($user->role=="2")
    @php $extend = "layouts.admin"; @endphp
@else
    @php $extend = "layouts.customer"; @endphp
@endif

@extends($extend)

@section('section')

<div class="card" style="position: absolute; left: 50%; transform: translateX(-50%);">

    <div class="card-header">
        <h4 class="h4">&nbsp; &nbsp; Edit my Account &nbsp; &nbsp; </h4>
    </div>

<form class="registration-form" method="POST" action="/myaccount/edit">
    @csrf

    <div class="mb-4">
        <label for="name">Name</label>
        <input type="text" id="name" name="name" placeholder="Name..." value="{{$user->name}}" required>
    </div>

    <div class="mb-4">
        <label for="surname">Surname</label>
        <input type="text" id="surname" name="surname" placeholder="Surname..." value="{{$user->surname}}" required>
    </div>

    <div class="mb-4">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Email address..." value="{{$user->email}}" required>
    </div>

    <div class="mb-4">
        <label for="phone">Phone</label>
        <input type="text" id="phone" name="phone" placeholder="Phone number..."  value="{{$user->phone}}" required>
    </div>

    <div class="mb-4">
        <label for="dob">Date of Birth</label>
        <input type="date" id="dob" name="dob" placeholder="date" value="{{$user->dob}}" max="{{$yrs}}" required>
    </div>

    <div class="mb-4">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Password..." required>
    </div>

    <div class="mb-4">
        <label for="password_confirmation">Confirm Password</label>
        <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Re-enter password..." required>
    </div>

    <div  class="submit-wrapper">
        <button type="submit" class="btn-bs-dark" style="display: inline-block;">Update Details</button>
    </div>
</form>
</div>



@endsection