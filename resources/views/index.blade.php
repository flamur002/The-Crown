@extends('layouts.app')

@section('section')

 <!-- Hero Section Begin -->
 <section class="hero-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="hero-text">
                        <h1>The Crown</h1>
                        <p>The hotel where every guest is treated like royalty.</p>
                        <a href="/about" class="primary-btn">Discover Now</a>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-5 offset-xl-2 offset-lg-1">
                    <div class="booking-form">
                        <h3>Booking Your Hotel</h3>
                        <form action="/quote" method="POST">
                            @csrf
                            <div class="check-date">
                                <label for="date-in">Check In:</label>
                                <input type="text" class="date-input" id="date-in" name="checkin" required>
                                <i class="icon_calendar"></i>
                            </div>
                            <div class="check-date">
                                <label for="date-out">Check Out:</label>
                                <input type="text" class="date-input" id="date-out" name="checkout" required>
                                <i class="icon_calendar"></i>
                            </div>
                            <div class="select-option">
                                <label for="guest">People:</label>
                                <select id="guest" name="guest" required>
                                    <option value="1">1 Person</option>
                                    <option value="2">2 People</option>
                                    <option value="3">3 People</option>
                                    <option value="4">4 People</option>
                                    <option value="5">5 People</option>
                                </select>
                            </div>
                            <button type="submit">Check Availability</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="hero-slider owl-carousel">
            <div class="hs-item set-bg" data-setbg="{{asset('assets/img/Rosewood-London-Hotel-Exterior.jpeg')}}"></div>
            <div class="hs-item set-bg" data-setbg="{{asset('assets/img/Rosewood-London_Premier-Suite-01.jpg')}}"></div>
            <div class="hs-item set-bg" data-setbg="{{asset('assets/img/1448964474_RosewoodHotel-001728web.jpg')}}"></div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- About Us Section Begin -->
    <section class="aboutus-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="about-text">
                        <div class="section-title">
                            <span>About Us</span>
                            <h2>The Crown <br />London Hotel</h2>
                        </div>
                        <p class="f-para">Located in the heart of London, The Crown hotel is the perfect place for
                             those seeking a luxurious and comfortable stay in the bustling city. With its 
                             traditional British architecture and exquisite interior design, The Crown exudes
                              elegance and sophistication.</p>
                        <p class="s-para">Whether you're visiting London for leisure or business, The Crown hotel 
                            promises an unforgettable experience that combines style, comfort, and convenience.</p>
                        <a href="/about" class="primary-btn about-btn">Read More</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-pic">
                        <div class="row">
                            <div class="col-sm-6">
                                <img src="{{asset('assets/img/rosewood-5.jpg')}}" alt="">
                            </div>
                            <div class="col-sm-6">
                                <img src="{{asset('assets/img/Rosewood_London_Exterior.png')}}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Us Section End -->

    <!-- Services Section End -->
    <section class="services-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span>What We Do</span>
                        <h2>Discover Our Services</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-sm-6">
                    <div class="service-item">
                        <i class="flaticon-036-parking"></i>
                        <h4>Travel Plan</h4>
                        <p>Let us help plan your perfect London itinerary with our personalized travel planning service.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="service-item">
                        <i class="flaticon-033-dinner"></i>
                        <h4>Catering Service</h4>
                        <p>Experience the best of British cuisine with our bespoke catering service, perfect for events and special occasions.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="service-item">
                        <i class="flaticon-026-bed"></i>
                        <h4>Babysitting</h4>
                        <p>Enjoy a worry-free stay with our reliable and experienced babysitting service, available upon request for your convenience.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="service-item">
                        <i class="flaticon-024-towel"></i>
                        <h4>Laundry</h4>
                        <p>Stay fresh and clean with our efficient laundry service, available for all guests to keep their clothes and linens in pristine condition.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="service-item">
                        <i class="flaticon-044-clock-1"></i>
                        <h4>Hire Driver</h4>
                        <p>Explore London in comfort and style with our professional hire driver service, available to take you wherever you need to go.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="service-item">
                        <i class="flaticon-012-cocktail"></i>
                        <h4>Bar & Drink</h4>
                        <p>Relax and unwind in our stylish bar, offering a wide selection of drinks and cocktails in a sophisticated atmosphere.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Services Section End -->

    <hr>
        <!-- Gallery Section Begin -->
        <section class="gallery-section spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title">
                            <span>Our Gallery</span>
                            <h2>View Our Rooms</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="gallery-item set-bg" data-setbg="{{asset('assets/img/Deluxe_20Room.png')}}">
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="gallery-item set-bg" data-setbg="{{asset('assets/img/Rosewood-London-executive-room.jpg')}}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="gallery-item set-bg" data-setbg="{{asset('assets/img/GardenHouse-AVS.png')}}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="gallery-item large-item set-bg" data-setbg="{{asset('assets/img/LDNNobleHouse-AVS.png')}}">
                        </div>
                    </div>
                </div>
            </div>
        </section>

    <script>
        $(document).ready(function() {
            var checkin = $('#date-in');
            var checkout = $('#date-out');
            
            // Disable the checkout date input until a check-in date is selected
            checkout.prop('disabled', true);
            
            // When a check-in date is selected, enable the checkout date input and set its minimum value to one day after the check-in date
            checkin.change(function() {
                var checkinVal = new Date(checkin.val());
                var minCheckoutVal = new Date(checkinVal.getTime() + 24 * 60 * 60 * 1000);
                checkout.prop('min', minCheckoutVal.toISOString().split('T')[0]);
                checkout.prop('disabled', false);
            });
            
            // When a checkout date is selected, check if it's at least one day after the check-in date
            checkout.change(function() {
                var checkinVal = new Date(checkin.val());
                var checkoutVal = new Date(checkout.val());
                var diff = Math.ceil((checkoutVal - checkinVal) / (24 * 60 * 60 * 1000));
                
                if (diff < 1) {
                    alert('The check-out date should be at least one day after the check-in date.');
                    checkout.val('');
                }
            });
        });

      </script>
@endsection