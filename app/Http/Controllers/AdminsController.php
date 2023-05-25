<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class AdminsController extends Controller
{
    public function admin(){
        return view('adminViews.dashboard');
    }

    public function admins(){
        $admins = User::where('role', 2)->get();
        return view('adminViews.admins', compact('admins'));
    }

    public function customers(){
        $customers = User::where('role', 0)->get();
        return view('adminViews.customers', compact('customers'));
    }

    public function staff(){
        $staff = User::where('role', 1)->get();
        return view('adminViews.staff', compact('staff'));
    }
}
