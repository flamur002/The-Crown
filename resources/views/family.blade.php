@extends('layouts.app')

@section('section')
<hr>
<!-- Breadcrumb Section Begin -->
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <h2>Family Room</h2>
                    <div class="bt-option">
                        <a href="./home.html">Home</a>
                        <span>Family Room</span>
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
                    <img src="assets/img/LDN.png" alt="">
                    <div class="rd-text">
                        <div class="rd-title">
                            <h3>Family Room</h3>
                            <div class="rdt-right">
                                <a href="/">Book Now</a>
                            </div>
                        </div>
                        <h2>£{{$price}}<span>/Pernight</span></h2>
                        <table>
                            <tbody>
                                <tr>
                                    <td class="r-o">Size:</td>
                                    <td>60 ft</td>
                                </tr>
                                <tr>
                                    <td class="r-o">Capacity:</td>
                                    <td>Max 5 people</td>
                                </tr>
                                <tr>
                                    <td class="r-o">Bed:</td>
                                    <td>King Bed and 3 Single Beds</td>
                                </tr>
                                <tr>
                                    <td class="r-o">Services:</td>
                                    <td>Wifi, Television, Bathroom,...</td>
                                </tr>
                            </tbody>
                        </table>
                        <p class="f-para">Looking for the perfect accommodation for your family getaway? Look no further than our spacious and stylish family room. Featuring one king-size bed and three single beds, our family room can comfortably accommodate up to five people, making it the perfect choice for families or groups of friends.
                            <br><br>
                            Enjoy plenty of space to spread out and relax in our family room, with separate sleeping areas and a comfortable sitting area to unwind after a day of exploring the city. And with large windows that let in plenty of natural light, our family room feels bright, airy, and welcoming.
                            <br><br>
                            Take advantage of our complimentary high-speed Wi-Fi to stay connected, or simply kick back and relax with a movie on our large flat-screen TV. And with our 24-hour room service, you can indulge in delicious meals and snacks without ever having to leave the comfort of your room.
                            <br><br>
                            Our family room also comes equipped with a luxurious en-suite bathroom, complete with a shower and deep-soaking tub, to help you unwind and relax after a long day of sightseeing.
                            <br><br>
                            Book your stay in our family room today and experience the perfect combination of comfort, convenience, and style for your next family vacation.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Room Details Section End -->
@endsection