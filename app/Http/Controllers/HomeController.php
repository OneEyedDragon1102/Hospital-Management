<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Appointment;

class HomeController extends Controller
{
    public function redirect(){
        if(Auth::id()){
            if(Auth::user()->role == '2'){
                return view('doctor.home');
            }
            if(Auth::user()->role == '1'){
                return view('admin.home');
            }
            else{
                $doctor = doctor::all();
                return view('user.home', compact('doctor'));
            }
        }
        else{
            return redirect()->back();
        }
    }

    public function index(){
        if(Auth::id()){
            return redirect('home');
        }
        
        $doctor = Doctor::getAllDoctors();
        // echo "<pre>";
        // print_r($doctor->toArray());
        // die();

        return view('user.home', compact('doctor'));
    }

    public function logout(){
        Auth::logout();
        // $request->session()->invalidate();
        // $request->session()->regenerateToken();

        return redirect('/');
    }

    public function make_appointment(Request $request){
        $array = $request->all();

        unset($array['_token']);
        $array['user_id'] = Auth::user()->id;
        $array['status'] = "pending";
        // echo "<pre>";
        // print_r($array);
        // die();

        $appointment = Appointment::make_appointment($array);
        return redirect()->back()->with('message', "Appointment request successful");
    }

    public function appointment_view(){
        if(Auth::id()){
            $appointments = Appointment::get_user_appointment(Auth::user()->id);
            return view('user.my_appointment_view', compact('appointments'));
        }

        return redirect()->back();
    }

    public function cancel_appointment($id){

        $delete_appointment = Appointment::delete_appointment($id);
        return redirect()->back()->with('message', 'Appointment cancelled successfully');
    }
}