@extends('layouts.app')

@section('section')
<hr>
<!-- Breadcrumb Section Begin -->
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <h2>Standard Room</h2>
                    <div class="bt-option">
                        <a href="/">Home</a>
                        <span>Standard Room</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section End -->

 <!-- Room Details Section Begin -->
 <section class="room-details-section spad">
    <div class="container">
        <div class="row  text-centre">
            <div class="col-lg-8">
                <div class="room-details-item">
                    <img src="assets/img/Deluxe_20Room.png" alt="">
                    <div class="rd-text">
                        <div class="rd-title">
                            <h3>Standard Room</h3>
                            <div class="rdt-right">
                                <a href="/">Book Now</a>
                            </div>
                        </div>
                        <h2>£{{$price}}<span>/Pernight</span></h2>
                        <table>
                            <tbody>
                                <tr>
                                    <td class="r-o">Size:</td>
                                    <td>30 ft</td>
                                </tr>
                                <tr>
                                    <td class="r-o">Capacity:</td>
                                    <td>Max 2 people</td>
                                </tr>
                                <tr>
                                    <td class="r-o">Bed:</td>
                                    <td>King Bed</td>
                                </tr>
                                <tr>
                                    <td class="r-o">Services:</td>
                                    <td>Wifi, Television, Bathroom,...</td>
                                </tr>
                            </tbody>
                        </table>
                        <p class="f-para">Our cozy and comfortable standard room is the perfect choice for couples or solo travelers looking for a relaxing stay. Featuring a spacious double bed that can accommodate up to two people, our standard room comes equipped with all the modern amenities you need for a comfortable stay.
                            <br><br>
                            With soft lighting, warm decor, and plush bedding, our standard room offers a peaceful retreat from the hustle and bustle of the city. Take advantage of our complimentary high-speed Wi-Fi to stay connected, or simply kick back and relax with a movie on our state-of-the-art flat-screen TV.
                            <br><br>
                            In the morning, wake up feeling refreshed and ready for the day ahead thanks to our luxurious shower and bath facilities. And with our 24-hour room service, you can indulge in delicious meals and snacks without ever having to leave the comfort of your room.
                            <br><br>
                            Book your stay in our standard room today and experience the perfect blend of comfort and convenience for your next trip.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Room Details Section End -->
@endsection