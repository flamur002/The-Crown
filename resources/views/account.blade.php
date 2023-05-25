@if ($user->role=="1")
    @php $extend = "layouts.staff"; @endphp
@elseif($user->role=="2")
    @php $extend = "layouts.admin"; @endphp
@else
    @php $extend = "layouts.customer"; @endphp
@endif

@extends($extend)

@section('section')

@if(Session::has('message'))
    <div class="alert alert-success" role="alert">
        {{ Session::get('message') }}
    </div>
    <br>
@endif

  <div class="card"  style="position: absolute; left: 50%; transform: translateX(-50%);">
    <div class="card-header">
        <h4 class="h4">&nbsp; &nbsp; &nbsp; &nbsp;My Details &nbsp; &nbsp; &nbsp; &nbsp;</h4>
    </div>
    <div class="card-body">
        <div class="row align-items-center">
      <div class="row">
        <div class="col-sm-3">
          <h5>Name:</h5>
        </div>
        <div class="col-sm-9">
          <p class="h6 lead">{{$user->name}}</p>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-3">
          <h5>Surname:</h5>
        </div>
        <div class="col-sm-9">
          <p class="h6 lead">{{$user->surname}}</p>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-3">
          <h5>Email:</h5>
        </div>
        <div class="col-sm-9">
          <p class="h6 lead">{{$user->email}}</p>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-3">
          <h5>Phone:</h5>
        </div>
        <div class="col-sm-9">
          <p class="h6 lead">{{$user->phone}}</p>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-3">
          <h5>Date of Birth:</h5>
        </div>
        <div class="col-sm-9">
          <p class="h6 lead">{{date('d M Y', strtotime($user->dob))}}</p>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-3">
          <h5>Date Joined:</h5>
        </div>
        <div class="col-sm-9">
          <p class="h6 lead">{{date('d M Y', strtotime($user->created_at))}}</p>
        </div>
      </div>
    </div>
    <br>
    <a href="/myaccount/edit" class="btn-bs-dark" style="display: inline-block;">Edit my Details</a>
    <br>
    <br>

    <form action="/myaccount/delete" method="POST">
      @csrf
      <a href="/myaccount/delete" class="btn-bs-dark" style="display: inline-block;"> <button type="submit">Delete Account</button></a>
    </form>

  </div>
  </div>
@endsection