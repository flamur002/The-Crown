@extends('layouts.app')

@section('section')
<hr>
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <h2>Your Quotes</h2>
                        <div class="bt-option">
                            <a href="/">Home</a>
                            <span>Quotes</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<section class="aboutus-page-section spad">
            <div class="container">
                <div class="about-page-text">
                        <div class="ap-title">
                            <p class="text-centre">Based on what you've told us, you're looking to accomodate {{$quote['guests']}} people for {{$quote['nights']}} nights. <br>
                                 These are your available options:</p>
                        </div>
                    @if ($quote['guests']<=2)
                        <div class="card-wrapper text-centre">
                            <div class="col-lg-6 offset-lg-1 card">
                                <h3>Standard Room</h3>
                                <hr>
                                <p>
                                    Our standard room is perfect for solo travelers or couples seeking an 
                                    affordable and comfortable accommodation option. Equipped with a queen-size 
                                    bed, flat-screen TV, work desk, and en-suite bathroom with a shower, the 
                                    room can accommodate up to two guests. You'll also enjoy complimentary Wi-Fi,
                                     air conditioning, and daily housekeeping services during your stay. 
                                    <br><a href="/standard" target="_blank">Learn more</a>
                                </p>
                                <p>£{{$quote['standard']}} X {{$quote['nights']}} nights</p>
                                <h5><strong>Total Price: £{{$quote['standard']*$quote['nights']}}</strong></h5>
                                <form action="/confirm" method="POST">
                                    @csrf
                                    <input type="hidden" name="price" value="{{$quote['standard']*$quote['nights']}}">
                                    <input type="hidden" name="room_type" value="standard">
                                    <input type="hidden" name="guests" value="{{$quote['guests']}}">
                                    <input type="hidden" name="checkin" value="{{$quote['checkin']}}">
                                    <input type="hidden" name="checkout" value="{{$quote['checkout']}}">
                                    <input type="hidden" name="nights" value="{{$quote['nights']}}">
                                    <button type="submit" class="bookbtn">Book Now</button>
                                </form>
                            </div>
                        </div>
                    @endif
                    @if ($quote['guests']<=3)
                        <div class="card-wrapper text-centre">
                            <div class="col-lg-6 offset-lg-1 card">
                                <h3>Deluxe Room</h3>
                                <hr>
                                <p>
                                    This room type is a step up from the standard room and is larger and more luxurious. 
                                    It features one king-size bed and a single bed, 
                                    as well as additional amenities such as a seating area, a mini-fridge, and a larger TV. 
                                    Deluxe rooms also offer better views and higher-quality furnishings than standard rooms.
                                    <br><a href="/deluxe" target="_blank">Learn more</a>
                                </p>
                                <p>£{{$quote['deluxe']}} X {{$quote['nights']}} nights</p>
                                <strong>Total Price: £{{$quote['deluxe']*$quote['nights']}}</strong>
                                <form action="/confirm" method="POST">
                                    @csrf
                                    <input type="hidden" name="price" value="{{$quote['deluxe']*$quote['nights']}}">
                                    <input type="hidden" name="room_type" value="deluxe">
                                    <input type="hidden" name="guests" value="{{$quote['guests']}}">
                                    <input type="hidden" name="checkin" value="{{$quote['checkin']}}">
                                    <input type="hidden" name="checkout" value="{{$quote['checkout']}}">
                                    <input type="hidden" name="nights" value="{{$quote['nights']}}">
                                    <button type="submit" class="bookbtn">Book Now</button>
                                </form>
                            </div>
                        </div>
                    @endif
                        <div class="card-wrapper text-centre">
                            <div class="col-lg-6 offset-lg-1 card">
                                <h3>Family Room</h3>
                                <hr>
                                <p>
                                This room type is designed to accommodate families or groups of people traveling together. 
                                It features one double bed and three single beds,
                                 making it ideal for families with children or groups of friends. 
                                The room also include additional amenities such as a private bathroom, a TV, and a seating area.
                                <br><a href="/family" target="_blank">Learn more</a>
                                </p>
                                <p>£{{$quote['family']}} X {{$quote['nights']}} nights</p>
                                <strong>Total Price: £{{$quote['family']*$quote['nights']}}</strong>
                                <form action="/confirm" method="POST">
                                    @csrf
                                    <input type="hidden" name="price" value="{{$quote['family']*$quote['nights']}}">
                                    <input type="hidden" name="room_type" value="family">
                                    <input type="hidden" name="guests" value="{{$quote['guests']}}">
                                    <input type="hidden" name="checkin" value="{{$quote['checkin']}}">
                                    <input type="hidden" name="checkout" value="{{$quote['checkout']}}">
                                    <input type="hidden" name="nights" value="{{$quote['nights']}}">
                                    <button type="submit" class="bookbtn">Book Now</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</div>
@endsection