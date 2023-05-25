@extends('layouts.app')

@section('section')
<hr>
<!-- Breadcrumb Section Begin -->
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <h2>Deluxe Room</h2>
                    <div class="bt-option">
                        <a href="./home.html">Home</a>
                        <span>Deluxe Room</span>
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
                    <img src="assets/img/LDNNobleHouse-AVS.png" alt="">
                    <div class="rd-text">
                        <div class="rd-title">
                            <h3>Deluxe Room</h3>
                            <div class="rdt-right">
                                <a href="/">Book Now</a>
                            </div>
                        </div>
                        <h2>£{{$price}}<span>/Pernight</span></h2>
                        <table>
                            <tbody>
                                <tr>
                                    <td class="r-o">Size:</td>
                                    <td>50 ft</td>
                                </tr>
                                <tr>
                                    <td class="r-o">Capacity:</td>
                                    <td>Max 3 people</td>
                                </tr>
                                <tr>
                                    <td class="r-o">Bed:</td>
                                    <td>King Beds and Single Bed</td>
                                </tr>
                                <tr>
                                    <td class="r-o">Services:</td>
                                    <td>Wifi, Television, Bathroom,...</td>
                                </tr>
                            </tbody>
                        </table>
                        <p class="f-para">
                        Indulge in luxury with our stunning deluxe room, the perfect choice for couples, friends or families traveling together. With a king size bed and a single bed, our deluxe room can comfortably accommodate up to three people, making it the perfect choice for those looking for a little extra space.
                        <br><br>
                        But the real star of our deluxe room is the breathtaking view of London that awaits you. Take in the stunning cityscape from the comfort of your own private oasis, with floor-to-ceiling windows that offer unparalleled views of the city.
                        <br><br>
                        Relax in style with our deluxe amenities, including sumptuous bedding, a large flat-screen TV, and complimentary high-speed Wi-Fi. And for those looking to unwind after a long day of exploring the city, our deluxe room comes complete with a luxurious en-suite bathroom, complete with a rain shower and deep-soaking tub.
                        <br><br>
                        Whether you're in town for business or pleasure, our deluxe room offers the perfect blend of comfort, convenience, and luxury. So why wait? Book your stay today and experience the ultimate in London living.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Room Details Section End -->
@endsection