@extends('layouts.customer')

@section('section')




<!-- strat content -->
  <div class="bg-gray-100 flex-1 p-6 md:mt-16"> 

    <h1 class="h3">Hello, {{$user->name}}!</h1>
    <p class="h6">Welcome Back</p>
    <br>
        <!-- Sales Overview -->
        <div class="card mt-6">
            <div class="card-header flex flex-row justify-between">
                <h1 class="h6">You have a total of {{$count}} bookings.</h1>
                    <div class="flex flex-row justify-center items-center">
                        {{ date('F j, Y') }}</div>
            </div>
        </div>
        <!-- end Sales Overview -->
        <br>
    <!-- General Report -->
    <div class="grid grid-cols-4 gap-6 xl:grid-cols-1">
    </div>
    <br>

</div>

@endsection
