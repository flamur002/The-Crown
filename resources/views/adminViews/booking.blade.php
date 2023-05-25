@if ($auth->role=="1")
  @php $extend = "layouts.staff"; @endphp
@else
  @php $extend = "layouts.admin"; @endphp
@endif

@extends($extend)

@section('section')
@section('section')

  <div class="card"  style="position: absolute; left: 50%; transform: translateX(-50%);">
    <div class="card-header">
        <h4 class="h4">&nbsp; &nbsp; &nbsp; &nbsp;Booking Details &nbsp; &nbsp; &nbsp; &nbsp;</h4>
    </div>
    <div class="card-body">
        <div class="row align-items-center">
      <div class="row">
        <div class="col-sm-3">
          <h5>Confirmation Code:</h5>
        </div>
        <div class="col-sm-9">
          <p class="h6 lead">{{$booking->confirmation_code}}</p>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-3">
          <h5>Booked By:</h5>
        </div>
        <div class="col-sm-9">
          <p class="h6 lead">
            @if($user)
              {{$user->name ?? ''}} {{$user->surname ?? ''}}
            @else
              Not found. <br> The account may has been deleted.
            @endif
          </p>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-3">
          <h5>Booked At:</h5>
        </div>
        <div class="col-sm-9">
          <p class="h6 lead">{{date('d M Y', strtotime($booking->booked_at))}}</p>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-3">
          <h5>Room Number:</h5>
        </div>
        <div class="col-sm-9">
          <p class="h6 lead">{{$room->number}}</p>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-3">
          <h5>Check In Date:</h5>
        </div>
        <div class="col-sm-9">
          <p class="h6 lead">{{date('d M Y', strtotime($booking->check_in_date))}}</p>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-3">
          <h5>Check Out Date:</h5>
        </div>
        <div class="col-sm-9">
          <p class="h6 lead">{{date('d M Y', strtotime($booking->check_out_date))}}</p>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-3">
          <h5>Guests:</h5>
        </div>
        <div class="col-sm-9">
          <p class="h6 lead">{{$booking->guests}}</p>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-3">
          <h5>Price:</h5>
        </div>
        <div class="col-sm-9">
          <p class="h6 lead">£{{$booking->price}}</p>
        </div>
      </div>
    @if($booking->cancelled=="Y")
      <div class="row">
        <div class="col-sm-3">
          <h5>Cancelled?</h5>
        </div>
        <div class="col-sm-9">
          <p class="h6 lead">Yes</p>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-3">
          <h5>Cancelled At:</h5>
        </div>
        <div class="col-sm-9">
          <p class="h6 lead">{{date('d M Y', strtotime($booking->cancelled_at))}}</p>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-3">
          <h5>Cancellation Reason:</h5>
        </div>
        <div class="col-sm-9">
          <p class="h6 lead">{{$booking->cancellation_reason}}</p>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-3">
          <h5>Cancelled By:</h5>
        </div>
        <div class="col-sm-9">
          <p class="h6 lead">{{$user2->name.' '.$user2->surname}}</p>
        </div>
      </div>
    @endif
    </div>
  </div>
  </div>
@endsection