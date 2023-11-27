<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Models\Doctor;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\MailController;

class AdminController extends Controller
{
    public function add_view(){
        $doctors = Doctor::getAllDoctors();
        if(Auth::id()){
            if(Auth::user()->role == '1'){
                return view('admin.add_doctors', compact('doctors'));
            }

            return redirect()->back();
        }

        return view('user.home');
    }

    public function doctors_table(){
        $doctors = Doctor::getAllDoctors();

        return view('admin.doctors', compact('doctors'));
    }

    public function delete_doctor($id){
        $doctor = Doctor::getDoctor($id);
        // echo "<pre>";
        // print_r($doctor);
        // die();
        $doctor->delete();

        return redirect()->back();
    }
    public function upload(Request $request){
        $doctor = new doctor;

        $image = $request->file('image');
        $extension = $image->getClientOriginalExtension();
        $newFileName = uniqid().'.'.$extension;
        $array = $request->all();
        
        unset($array['_token']);
        unset($array['image']);
        
        
        $array['image'] = $newFileName;
        // echo "<pre>";
        // print_r($array);
        // die();
        
        $saveDoctor = Doctor::saveDoctor($array);

        $image->move('images/Doctors/', $newFileName);
        
        return redirect()->back()->with('message', 'Doctor Added Successfully');
    }

    public function appointment_view(){
        $appointments = Appointment::get_all_appointments();
        return view('admin.appointments', compact('appointments'));
    }

    public function approve_appointment($id){
        $appointment = Appointment::get_appointment($id);
        $date = $appointment['date'];
        $check_schedule = Appointment::check_schedule($date, $id);

        if($check_schedule->count()){
            $appointment->status = 'cancelled';
            $appointment->save();
            $array_msg = ['message' => 'doctor not available', 'email' => $appointment['email']];
            // mail call
            MailController::cancel_mail($appointment['email']);
            return redirect()->back()->with(compact('array_msg'));
        }
        
        // echo "<pre>";
        // print_r($check_schedule);
        // die();
        $appointment->status = 'approved';
        $appointment->save();
        $array_msg = ['message' => 'appointment approved', 'email' => $appointment['email']];
        // mail
        MailController::approve_mail($appointment['email']);
        return redirect()->back()->with(compact('array_msg'));
    }
    
    public function cancel_appointment($id){
        $appointment = Appointment::get_appointment($id);
        $appointment->status = 'cancelled';
        
        $appointment->save();
        
        return redirect()->back();
    }
    
    public function update_doctor($id){
        $doctor = Doctor::getDoctor($id);
        // echo("<pre>");
        // print_r($doctor);
        // die();
        
        return view('admin.update_doctor', compact('doctor'));
    }
    
    public function edit_doctor(Request $request, $id){
        $doctor = Doctor::getDoctor($id);
        $data = $request->all();
        unset($data['_token']);
        
        if($request->image){
            $image = $request->file('image');
            $extension = $image->getClientOriginalExtension();
            $newFileName = uniqid().'.'.$extension;
            $data['image'] = $newFileName;
        }
        
        $update_doctor = Doctor::updateDoctor($id, $data);
        // echo"<pre>";
        // print_r($update_doctor);
        // die();
        
        if($request->image){
            $image->move('images/Doctors/', $newFileName);
        }
        return redirect()->back()->with('message', 'Doctor Updated Successfully');
    }

    public function email_view($id){
        $appointment = Appointment::get_appointment($id);
        $email = $appointment->email;
        // echo"<pre>";
        // print_r($appointment->email);
        // die();
        return view('admin.email_view', compact('email'));
    }
}

/*
$array = $request->all();

unset($array['_token']);
$array['image'] =  $imageName;

$saveDoctor = Doctor::saveDoctor($array);


//on the doctor model


public static function saveDoctor($payload) {
	return self::insert($payload);
} 
*/