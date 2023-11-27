<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\User;
use App\Models\Doctor;
use Illuminate\Support\Facades\Auth;

class DoctorController extends Controller
{
    public function appointment_view(){
        $doctor = User::getDoctor(Auth::user()->id);
        $doctor_array = $doctor->toArray();
        $doc = Doctor::getDoctorByUserId($doctor_array[0]['id']);
        $doc_array = $doc->toArray();
        $appointment = Appointment::get_all_appointments_of_doctor($doc_array[0]['id']);
        // $appointment_array = $appointment->toArray();
        // echo "<pre>";
        // print_r($appointment);
        // die();

        return view('doctor.appointments', compact('appointment'));
    }
}
