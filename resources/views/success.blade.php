@extends('layouts.app')

@section('section')
<hr>
    <!-- Breadcrumb Section Begin -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <h2>Congratulations!</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->

    <section class="aboutus-page-section spad">
        <h2 class="text-centre">Your booking is complete! </h2>
        <div class="container">
            <div class="about-page-text">
                    <hr>
                    <p class="text-centre"><br>We are thrilled to have you stay with us at our luxurious hotel.
                    Here are the details of your booking:</p>
                    <div class="text-centre">
                        <ul style="list-style-type:none;">
                            <li>Confirmation Code: #{{$booking->confirmation_code}}</li>
                            <br>
                            <li>Check In Date: {{$booking->check_in_date}}</li>
                            <li>Check Out Date: {{$booking->check_out_date}}</li>
                        </ul>
                    </div>
                    <hr>
                    <br>
                        <p class="text-centre">More details will be sent to your email. Our friendly staff will be on hand 24/7 to ensure you have everything you need during your stay.
                        We can't wait to welcome you to our hotel and provide you with an unforgettable experience. If you have any questions or concerns, please don't hesitate to reach out to us at any time.
                        <br> <br> Thank you for choosing our hotel for your upcoming trip!</p>
                        
            </div>
        </div>
    </section>
@endsection