@extends('layouts.app')

@section('section')
<hr>
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <h2>Payment & Summary</h2>
                        <div class="bt-option">
                            <a href="/">Home</a>
                            <span>Pay</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="aboutus-page-section spad">
        <div class="container">
            <div class="about-page-text">
                <p class="text-centre"> Please review the details of your reservation carefully, including your check-in and
                    check-out dates, room type, and total amount due. <br> If everything looks correct, you can proceed to
                    the payment section:</p>
                <br>
                <hr>
                <h2 class="text-centre">Booking Details</h2>
                <br>
                <div class="text-centre">
                    <ul style="list-style-type:none;">
                        <li><strong>Full name: </strong>{{ $user->name . ' ' . $user->surname }}</li>
                        <li><strong>Email address: </strong>{{ $user->email }}</li>
                        <li><strong>Telephone number: </strong>{{ $user->phone }}</li>
                        <br>
                        <li><strong>Number of guests: </strong>{{ $request['guests'] }}</li>
                        <li><strong>Room type: </strong>{{ $request['room_type'] }}</li>
                        <li><strong>Price per night: £</strong>{{ $room_price }}</li>
                        <li><strong>Nights: </strong>{{ $request['nights'] }}</li>
                        <br>
                        <li><strong>Check In Date: </strong>{{ $request['checkin'] }}</li>
                        <li><strong>Check Out Date: </strong>{{ $request['checkout'] }}</li>
                        <br>
                        <li><strong>Total amount: </strong>£{{ $room_price . ' X ' . $request['nights'] }} = <h4><strong>
                                    £{{ $room_price * $request['nights'] }}</strong></h4>
                        </li>
                        <br>
                    </ul>

                </div>
                <hr>
                <p class="text-centre">
                    If any of the above details are incorrect or you want to change them, please request a new booking
                    by recompleting the form on our <a href="/">&nbsp; home &nbsp;</a> page.
                </p>
                <p class="text-centre">
                    If you need to change you personal details, you can do so by going to your<a href="/myaccount">&nbsp;
                        dashboard &nbsp;</a> area.
                </p>
                <hr>
                <br>
                <h2 class="text-centre">Card Details</h2>
                <br>
                <div class="row">
                <div class="container-fluid">

                    <form role="form" action="/pay" method="post" class="require-validation payment-form" data-cc-on-file="false"
                        data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form">

                        @csrf

                        <img src="\assets\img\card.png" alt="">

                        <div class='form-row row'>

                            <div class='col-xs-12 form-group required'>

                                <label class='control-label'>Name on Card</label> <input class='form-control' name="name" size='40'
                                    type='text'>

                            </div>

                        </div>

                        <div class='form-row row'>

                            <div class='col-xs-12 form-group  required'>

                                <label class='control-label'>Card Number</label> <input autocomplete='off'
                                    class='form-control card-number' size='40' type='text'>

                            </div>

                        </div>

                        <div class='form-row row'>

                            <div class='col-xs-12 col-md-4 form-group cvc required'>

                                <label class='control-label'>CVC </label> <br><input autocomplete='off'
                                    class='form-control card-cvc' placeholder='ex. 311' size='4' type='text'>

                            </div>
                            <div class='col-xs-12 col-md-4 form-group expiration required'>

                                <label class='control-label'>Expiration Month</label> <input
                                    class='form-control card-expiry-month' placeholder='MM' size='2' type='text'>

                            </div>

                            <div class='col-xs-12 col-md-4 form-group expiration required'>

                                <label class='control-label'>Expiration <br> Year</label> <input
                                    class='form-control card-expiry-year' placeholder='YYYY' size='4' type='text'>

                            </div>
                        </div>




                        <input type="hidden" name="guests" value="{{ $request['guests'] }}">
                        <input type="hidden" name="type" value="{{ $request['room_type'] }}">
                        <input type="hidden" name="nights" value="{{ $request['nights'] }}">
                        <input type="hidden" name="checkin" value="{{ $request['checkin'] }}">
                        <input type="hidden" name="checkout" value="{{ $request['checkout'] }}">
                        <input type="hidden" name="roomId" value="{{ $request['roomId'] }}">
                        <input type="hidden" name="price" value="{{ $request['price'] }}">

                        <div class="form-row row">
                            <div class="col-md-12 form-group">
                                <button class="btn btn-primary btn-lg btn-block" type="submit"><i class="fa-solid fa-lock" style="color: #ffffff;"></i> &nbsp; Pay Now (£{{$request['price']}})</button>
                            </div>
                        </div>


                    </form>
                </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
    </section>
@endsection
