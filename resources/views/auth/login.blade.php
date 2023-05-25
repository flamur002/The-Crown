@extends('layouts.app')

@section('section')
<section class="hero-section">
    <div class="container">
        <div class="row">
            <div class="col-xl-4 col-lg-5 offset-xl-2 offset-lg-1" id="ctr">
                <div class="booking-form">
                    <h3>Log In</h3>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="check-date">
                            <label for="email">E-mail</label>
                            <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            
                            <label for="password">Password</label>
                            <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <p>Not a member? <a href="/register">Register</a> now.</p>

                        <button type="submit">Log In</button>
                    </form>
                </div>
            </div>
        </div> 
    </div>
    <div class="hero-slider owl-carousel">
        <div class="hs-item set-bg" data-setbg="{{asset('assets/img/hero/image.jpg')}}"></div>
    </div>
</section>
@endsection
