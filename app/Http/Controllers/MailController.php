<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\appointmentMail;

class MailController extends Controller
{
    public function send_mail(Request $request){
        $data = $request->all();
        $mailData = [
            'title' => $data['title'],
            'body' => $data['body'],
            'footer' => $data['footer'],
        ];

        Mail::to($data['email'])->send(new appointmentMail($mailData));

        return redirect()->back()->with('Email Send Successfully');
    }

    public static function approve_mail($email){
        $mailData = [
            'title' => 'Appointment Approved',
            'body' => 'This mail is send to inform you that your apoointment is approved by the hospital. 
                       Kindly reschedule at another time.',
            'footer' => 'Regards'
        ];

        Mail::to($email)->send(new appointmentMail($mailData));

        return redirect('appointment_view');
    }

    public static function cancel_mail($email){
        $mailData = [
            'title' => 'Appointment Cancelled',
            'body' => 'This mail is send to inform you that your apoointment is cancelled by the hospital. 
                       Kindly visit at scheduled time.',
            'footer' => 'Regards'
        ];

        Mail::to($email)->send(new appointmentMail($mailData));

        return redirect('appointment_view');
    }
}