@extends('layouts.app')

@section('section')
<hr>
    <!-- Breadcrumb Section Begin -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <h2>About Us</h2>
                        <div class="bt-option">
                            <a href="/">Home</a>
                            <span>About Us</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->

<section class="aboutus-page-section spad">
        <div class="container">
            <div class="about-page-text">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="ap-title">
                            <h2>Welcome to The Crown.</h2>
                            <hr>
                            <p>Welcome to The Crown, a stylish and modern hotel located just a short distance from the heart of the city. With our unbeatable location, stunning views, and world-class amenities, we're the perfect choice for your next stay in London.
                                <br> <br>
                                Enjoy the convenience of free parking on site, making it easy to explore the city on your own terms. And with easy access to the city center via public transportation, you're never far from all the action.
                                <br><br>
                                Take in the beautiful views of the city from our luxurious guest rooms, which offer everything you need for a comfortable and relaxing stay. And with a range of room types to choose from, including our cozy standard room, spacious deluxe room, and family room perfect for larger groups, we have something for everyone.
                                <br><br>
                                Stay active and energized with a workout in our state-of-the-art gym, or take a dip in our refreshing indoor pool. And with a complimentary breakfast included with your stay, you'll have the fuel you need to start your day off right.
                                <br><br>
                                Our friendly and knowledgeable staff are always on hand to assist you with anything you need, whether it's providing recommendations for local attractions or helping you book tickets for a show.
                                <br><br>
                                Book your stay at The Crown today and experience the perfect combination of convenience, comfort, and style for your next trip to London.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-5 offset-lg-1">
                        <ul class="ap-services">
                            <li><i class="icon_check"></i> Free on-site parking</li>
                            <li><i class="icon_check"></i> Complimentary Daily Breakfast</li>
                            <li><i class="icon_check"></i> 3 Pcs Laundry Per Day</li>
                            <li><i class="icon_check"></i> Free Wi-Fi</li>
                            <li><i class="icon_check"></i> 24-hour front desk assistance</li>
                            <li><i class="icon_check"></i> Currency exchange service</li>
                            <li><i class="icon_check"></i> Room safe for valuables</li>
                            <li><i class="icon_check"></i> Multilingual staff</li>
                            <li><i class="icon_check"></i> In-room tea and coffee making facilities</li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Us Page Section End -->
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
    @endsection