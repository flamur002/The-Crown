@if ($user->role=="1")
    @php $extend = "layouts.staff"; @endphp
@else
    @php $extend = "layouts.admin"; @endphp
@endif

@extends($extend)

@section('section')




<!-- strat content -->
  <div class="bg-gray-100 flex-1 p-6 md:mt-16"> 

    <h1 class="h3">Hello, {{$user->name}}!</h1>
    <p class="h6">Welcome Back</p>
    <br>
        <!-- Sales Overview -->
        <div class="card mt-6">
            <div class="card-header flex flex-row justify-between">
                <h1 class="h6">Sales Overview</h1>
                    <div class="flex flex-row justify-center items-center">
                        {{ date('F j, Y') }}</div>
            </div>
        </div>
        <!-- end Sales Overview -->
        <br>
    <!-- General Report -->
    <div class="grid grid-cols-4 gap-6 xl:grid-cols-1">
    <!-- card -->
    <div class="report-card">
        <div class="card">
            <div class="card-body flex flex-col">
                
                <!-- top -->
                <div class="flex flex-row justify-between items-center">
                    <h1 class="h6">Bookings</h1>
                </div>
                <!-- end top -->

                <!-- bottom -->
                <div class="mt-8">
                    <h1 class="h5">{{$counts['count1']}}</h1>
                    <p>Bookings made today</p>
                </div>                
                <!-- end bottom -->
    
            </div>
        </div>
        <div class="footer bg-white p-1 mx-4 border border-t-0 rounded rounded-t-none"></div>
    </div>
    <!-- end card -->




    <div class="report-card">
        <div class="card">
            <div class="card-body flex flex-col">
                
                <!-- top -->
                <div class="flex flex-row justify-between items-center">
                    <h1 class="h6">Check Ins</h1>
                </div>
                <!-- end top -->

                <!-- bottom -->
                <div class="mt-8">
                    <h1 class="h5">{{$counts['count2']}}</h1>
                    <p>Total Check Ins for today</p>
                </div>                
                <!-- end bottom -->
    
            </div>
        </div>
        <div class="footer bg-white p-1 mx-4 border border-t-0 rounded rounded-t-none"></div>
    </div>





        <!-- card -->
        <div class="report-card">
            <div class="card">
                <div class="card-body flex flex-col">
                    
                    <!-- top -->
                    <div class="flex flex-row justify-between items-center">
                        <h1 class="h6">Check Outs</h1>
                    </div>
                    <!-- end top -->
    
                    <!-- bottom -->
                    <div class="mt-8">
                        <h1 class="h5">{{$counts['count3']}}</h1>
                        <p>Total Check Outs for today</p>
                    </div>                
                    <!-- end bottom -->
        
                </div>
            </div>
            <div class="footer bg-white p-1 mx-4 border border-t-0 rounded rounded-t-none"></div>
        </div>
        <!-- end card -->

            <!-- card -->
    <div class="report-card">
        <div class="card">
            <div class="card-body flex flex-col">
                
                <!-- top -->
                <div class="flex flex-row justify-between items-center">
                    <h1 class="h6">Cancelled</h1>
                </div>
                <!-- end top -->

                <!-- bottom -->
                <div class="mt-8">
                    <h1 class="h5">{{$counts['count4']}}</h1>
                    <p>Bookings Cancelled today</p>
                </div>                
                <!-- end bottom -->
    
            </div>
        </div>
        <div class="footer bg-white p-1 mx-4 border border-t-0 rounded rounded-t-none"></div>
    </div>
    <!-- end card -->

    </div>
    <br>

</div>

@endsection
