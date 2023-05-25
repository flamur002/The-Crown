@extends('layouts.app')

@section('section')
<hr>
<!-- Contact Section Begin -->
<?php $message = Session::get('message');?>
@isset($message)
    <div class="alert alert-success text-centre" role="alert">
        {{$message}}
    </div>
@endisset
<section class="contact-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="contact-text">
                    <h2>Contact Info</h2>
                    <p>We're delighted to hear from you! Whether you have a question about our hotel, a comment about your stay, or simply want to say hello, we're always here to help. Please feel free to get in touch with us using one of the following methods:</p>
                    <table>
                        <tbody>
                            <tr>
                                <td class="c-o">Address:</td>
                                <td>56 High Street, Clifton, London, WC1X 9LP</td>
                            </tr>
                            <tr>
                                <td class="c-o">Phone:</td>
                                <td>+44 (0) 20 1234 5678</td>
                            </tr>
                            <tr>
                                <td class="c-o">Email:</td>
                                <td>info@thecrown.com</td>
                            </tr>
                            <tr>
                                <td class="c-o">Fax:</td>
                                <td>+44 (0) 20 1234 5679</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>


            <div class="col-lg-7 offset-lg-1">
                <form action="/contact" method="POST" class="contact-form">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <input type="text" name="name" placeholder="Your Name" required>
                        </div>
                        <div class="col-lg-6">
                            <input type="email" name="email" placeholder="Your Email" required>
                        </div>
                        <div class="col-lg-12">
                            <textarea name="text" placeholder="Your Message" required></textarea>
                            <button type="submit">Submit Now</button>
                        </div>
                    </div>
                </form>
            </div>


        </div>
        <div class="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d19549.681099346875!2d-0.9075790643691739!3d52.23048386300479!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48770ec7832a01f1%3A0x965dedc9c5712ba8!2sUniversity%20of%20Northampton!5e0!3m2!1sen!2suk!4v1681432487911!5m2!1sen!2suk" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</section>
<!-- Contact Section End -->
@endsection