<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;
    public static function getAllDoctors(){
        return self::all();
    }

    public static function updateDoctor($id, $data){
        return self::where("id", "=", "$id")->update($data);
    }

    public static function getDoctor($id){
        return self::where('id', '=', "$id")->get();
    }
    
    public static function getDoctorByUserId($id){
        return self::where('user_id', '=', "$id")->get();
    }

    public static function saveDoctor($payload) {
        return self::insert($payload);
    } 
}
