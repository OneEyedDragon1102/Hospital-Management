<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    public static function make_appointment($data){
        return self::insert($data);
    }

    public static function get_user_appointment($id){
        return self::where("user_id", "=", "$id")->get();
    }
 
    public static function delete_appointment($id){
        return self::where("id", "=", "$id")->delete();
    }

    public static function get_all_appointments(){
        return self::all();
    }

    public static function get_appointment($id){
        return self::find($id);
    }

    public static function get_all_appointments_of_doctor($id){
        return self::where('doctor_id', '=', "$id")->get();
    }

    public static function check_schedule($date, $id){
        return self::where("id", "!=", "$id")
                    ->where("date", "=", "$date")
                    ->where("status", "=", 'approved')->get();
    }
}