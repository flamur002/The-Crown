@if ($user->role=="1")
    @php $extend = "layouts.staff"; @endphp
@else
    @php $extend = "layouts.admin"; @endphp
@endif

@extends($extend)

@section('section')

<div class="card" style="position: absolute; left: 50%; transform: translateX(-50%);">

    <div class="card-header">
        <h4 class="h4">Cancel Booking "<a href="/booking/{{$booking->id}}" target="_blank">{{$booking->confirmation_code}}</a>"</h4>
    </div>

<form class="registration-form" method="POST" action="/cancel/{{$booking->id}}">
    @csrf

    <div class="mb-4">
        <label for="reason">Reason of Cancellation:</label>
        <input type="text" id="reason" name="reason" placeholder="Text goes here..." required>
    </div>


    <div  class="submit-wrapper">
        <button type="submit" class="btn-bs-dark" style="display: inline-block;">Cancel Booking</button>
    </div>
</form>
</div>



@endsection