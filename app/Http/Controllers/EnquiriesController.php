<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Enquiry;
use Illuminate\Support\Facades\Session;

class EnquiriesController extends Controller
{
    function AddEnquiry(Request $request){
        $enquiry = new Enquiry;
        $enquiry->name = $request->name;
        $enquiry->email = $request->email;
        $enquiry->text = $request->text;
        $enquiry->sent_at = date('Y-m-d');
        $enquiry->save();
        Session::flash('message', 'Enquiry Sent!'); 
        return redirect('/contact');
    }

    function enquiries (){
        $enquiries = Enquiry::where('completed', 'N')->orderBy('sent_at')->get();
        $completed = 'N';
        $user = Auth::user();
        return view('adminViews.enquiries', compact('enquiries','completed', 'user'));
    }

    function completedEnquiries (){
        $enquiries = Enquiry::where('completed', 'Y')->orderBy('sent_at', 'desc')->get();
        $completed = 'Y';
        $user = Auth::user();
        return view('adminViews.enquiries', compact('enquiries','completed', 'user'));
    }

    function complete($id){
        $enquiry = Enquiry::findOrFail($id);
        $enquiry->update([
            'completed' => 'Y',
        ]);
        Session::flash('message', 'Enquiry marked as completed!'); 
        return redirect('/enquiries');
    }
}
