@extends('layouts.app')

@section('section')
<section class="hero-section">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-5 offset-xl-2 offset-lg-1" id="ctr">
                    <div class="booking-form">
                        <h3>Register</h3>
                        <form action="#">
                            <div class="check-date">
                                <label for="date-in">Name</label>
                                <input type="text">
                            </div>
                            <div class="check-date">
                                <label>Surname</label>
                                <input type="text">
                            </div>
                            <div class="check-date">
                                <label for="date-in">Date of Birth</label>
                                <input type="text" class="dob-input" id="date-in">
                                <i class="icon_calendar"></i>
                            </div>
                            <div class="check-date">
                                <label for="date-in">E-mail</label>
                                <input type="text">
                            </div>
                            <div class="check-date">
                                <label>Password</label>
                                <input type="password">
                            </div>
                            <div class="check-date">
                                <label for="date-in">Phone</label>
                                <input type="text">
                            </div>

                            <p>Already have an account? <a href="/login">Log-In</a>.</p>
                            <button type="submit">Register</button>
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