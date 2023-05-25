@if ($user->role=="1")
    @php $extend = "layouts.staff"; @endphp
@else
    @php $extend = "layouts.admin"; @endphp
@endif

@extends($extend)

@section('section')
@section('section')
@if(Session::has('message'))
    <div class="alert alert-success" role="alert">
        {{ Session::get('message') }}
    </div>
    <br>
@endif
    <h4 class="h4">{{$completed=="Y" ? 'Completed' : 'Uncompleted'}} Enquires</h4>
    <br>
    <div class="card">    
    <div class="card-body">
    
    <!-- start a table -->
    <table class="table-fixed w-full">
        
        <!-- table head -->
        <thead class="text-left">
            <tr>
                <th class="w-1/4 pb-10 text-sm font-extrabold tracking-wide">Sender Name</th>
                <th class="w-1/4 pb-10 text-sm font-extrabold tracking-wide text-right">Message</th>
                <th class="w-1/4 pb-10 text-sm font-extrabold tracking-wide text-right">Email</th>
                <th class="w-1/4 pb-10 text-sm font-extrabold tracking-wide text-right">Date Received</th>
                <th class="w-1/4 pb-10 text-sm font-extrabold tracking-wide text-right">{{$completed=="Y" ? 'Completed?' : 'Mark as Completed:'}}</th>
            </tr>
        </thead>
        <!-- end table head -->

        <tbody class="text-left text-gray-600">
            @foreach ($enquiries as $enquiry)
                <tr style="border-bottom: 2px dotted #ddd;">
                    <th class="w-1/4 mb-4 text-xs font-extrabold tracking-wider flex flex-row items-center w-full py-2">
                        <p>{{$enquiry->name}}</p>                    
                    </th>
        
                    <th class="w-1/4 mb-4 text-xs font-extrabold tracking-wider text-right py-2">{{$enquiry->text}}</th>
        
                    <th class="w-1/4 mb-4 text-xs font-extrabold tracking-wider text-right py-2"><a href="mailto:{{$enquiry->email}}">{{$enquiry->email}}</a></th>
        
                    <th class="w-1/4 mb-4 text-xs font-extrabold tracking-wider text-right py-2">{{date('d M Y', strtotime($enquiry->sent_at))}}</th>
        
                    <th class="w-1/4 mb-4 text-xs font-extrabold tracking-wider text-right py-2">
                        @if ($enquiry->completed=='N')
                            <a href="/completeEnquiry/{{$enquiry->id}}"><button><i class="fa-solid fa-circle-check fa-2xl" style="color: #0aa701;"></i>&nbsp;&nbsp;&nbsp;&nbsp;</button>&nbsp;</a>
                        @else
                            Yes
                        @endif
                    </th>
                </tr>
                <tr style="height: 0.5rem;"></tr> <!-- add a 0.5rem gap between rows -->
            @endforeach
        </tbody>
        <!-- end table body -->

    </table>
    <!-- end a table -->
</div>
</div>

@endsection