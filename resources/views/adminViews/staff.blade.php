@extends('layouts.admin')

@section('section')
@section('section')
@if(Session::has('message'))
    <div class="alert alert-success" role="alert">
        {{ Session::get('message') }}
    </div>
    <br>
@endif
        <h4 class="h4">Staff Accounts</h4>
        <br>
    <div class="card">    
    <div class="card-body">
    
    <!-- start a table -->
    <table class="table-fixed w-full">
        
        <!-- table head -->
        <thead class="text-left">
            <tr>
                <th class="w-1/4 pb-10 text-sm font-extrabold tracking-wide">full name</th>
                <th class="w-1/4 pb-10 text-sm font-extrabold tracking-wide text-right">Email</th>
                <th class="w-1/4 pb-10 text-sm font-extrabold tracking-wide text-right">Phone</th>
                <th class="w-1/4 pb-10 text-sm font-extrabold tracking-wide text-right">Date of Birth</th>
                <th class="w-1/4 pb-10 text-sm font-extrabold tracking-wide text-right">Actions</th>
            </tr>
        </thead>
        <!-- end table head -->

        <tbody class="text-left text-gray-600">
            @foreach ($staff as $st)
                <tr style="border-bottom: 2px dotted #ddd;">
                    <th class="w-1/4 mb-4 text-xs font-extrabold tracking-wider flex flex-row items-center w-full py-2">
                        <p>{{$st->name.' '.$st->surname}}</p>                    
                    </th>
        
                    <th class="w-1/4 mb-4 text-xs font-extrabold tracking-wider text-right py-2">{{$st->email}}</th>
        
                    <th class="w-1/4 mb-4 text-xs font-extrabold tracking-wider text-right py-2">{{$st->phone}}</th>
        
                    <th class="w-1/4 mb-4 text-xs font-extrabold tracking-wider text-right py-2">{{date('d M Y', strtotime($st->dob))}}</th>
        
                    <th class="w-1/4 mb-4 text-xs font-extrabold tracking-wider text-right py-2">
                        <a href="/admin/editUser/{{$st->id}}"><button><i class="fa-solid fa-pen-to-square fa-2xl" style="color: #ff8000;"></i></button></a>
                        &nbsp; &nbsp; &nbsp;
                        <a href="/delete/user/{{$st->id}}"><button><i class="fa-sharp fa-solid fa-trash fa-2xl" style="color: #ff0000;"></i></button></a>
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
<br>
<a href="/admin/addUser/1" class="btn-bs-dark" style="display: inline-block;"><i class="fa-solid fa-plus fa-sm" style="color: #ffffff;"> Add Staff</i></a>

@endsection