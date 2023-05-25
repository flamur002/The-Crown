<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Validator;
use Illuminate\Support\Facades\Session;


class UsersController extends Controller
{

    public function customerDashboard()
    {
        $user = Auth::user();
        $count = Booking::where('user_id', $user->id)->count();
        return view('customerDashboard', compact('count','user'));
    }

    public function dashboard(){
        $user = Auth::user();
        $counts = [
            'count1' => Booking::where('booked_at', date('Y-m-d'))->count(),
            'count2' => Booking::where('check_in_date', date('Y-m-d'))->count(),
            'count3' => Booking::where('check_out_date', date('Y-m-d'))->count(),
            'count4' => Booking::where('cancelled_at', date('Y-m-d'))->count(),
        ];
        return view('adminViews.dashboard', compact('counts','user'));
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

    public function deleteUser($id){
        $user = User::where('id', $id)->first();
        $role = $user->role;
        $user->delete();
        Session::flash('message', 'User Deleted!'); 
        switch ($role) {
            case 0:
                return redirect('/admin/customers');
                break;
            
            case 1:
                return redirect('/admin/staff');
                break;

            case 2:
                return redirect('/admin/admins');
                break;
                        
            default:
                return redirect('/admin');
                break;
        }
        
    }

    public function addUser(Request $request, $role){
        $yrs = Carbon::now()->subYears(16)->format('Y-m-d');
        return view('adminViews.addUser', compact('role','yrs'));
    }

    public function editUser(Request $request){
        $yrs = Carbon::now()->subYears(16)->format('Y-m-d');
        $user = User::where('id', $request->route('id'))->first();
        return view('adminViews.editUser', compact('user','yrs'));
    }

    public function storeUser(Request $request)
    {
        $yrs = Carbon::now()->subYears(16)->format('Y-m-d');

        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'dob' => ['required', 'date', 'before_or_equal:'.$yrs],
            'phone' => ['required', 'string'],
            'role' => ['required'],
        ]);

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'dob' => $validatedData['dob'],
            'surname' => $validatedData['surname'],
            'phone' => $validatedData['phone'],
            'role' => $validatedData['role'],
        ]);

        Session::flash('message', 'User Created!'); 

        if ($validatedData['role'] == 1) {
            return redirect('/admin/staff');
        }
        else {
            return redirect('/admin/admins');
        }
    }

    public function updateUser(Request $request)
    {
        $user = User::findOrFail($request->id);


        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'dob' => ['required', 'date', 'before_or_equal:today'],
            'phone' => ['required', 'string'],
        ]);


        $user->update([
            'name' => $validatedData['name'],
            'surname' => $validatedData['surname'],
            'email' => $validatedData['email'],
            'dob' => $validatedData['dob'],
            'phone' => $validatedData['phone'],
        ]);

        Session::flash('message', 'User Updated!'); 

        if ($user->role == 0) {
            return redirect('/admin/customers');
        }
        elseif ($user->role == 1) {
            return redirect('/admin/staff');
        }
        else {
            return redirect('/admin/admins');
        }

    }

    public function account()
    {
        $user = Auth::user();
        return view('account', compact('user'));
    }

    public function editAccount()
    {
        $user = Auth::user();
        $yrs = Carbon::now()->subYears(16)->format('Y-m-d');
        return view('editAccount', compact('user','yrs'));
    }

    public function updateAccount(Request $request)
    {
        $user = Auth::user();
        $yrs = Carbon::now()->subYears(16)->format('Y-m-d');
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'dob' => ['required', 'date', 'before_or_equal:'.$yrs],
            'phone' => ['required', 'string'],
        ]);

        $user->update([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'dob' => $validatedData['dob'],
            'surname' => $validatedData['surname'],
            'phone' => $validatedData['phone'],
        ]);

        Session::flash('message', 'Account Updated!'); 

        return redirect('/myaccount');
    }

    public function deleteAccount()
    {
        $user = Auth::user();
        $user->delete();
        return redirect('/login');        
    }


}
