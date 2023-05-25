@extends('layouts.app')

@section('section')
    <!-- Breadcrumb Section Begin -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <h2>Oops!</h2>
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
                    <h2>{{$error['title']}}</h2>
                    <p><br><br>{{$error['paragraph']}}</p>
                </div>
            </div>
        </div>
    </section>
@endsection