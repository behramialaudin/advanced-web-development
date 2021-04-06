<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    public $table= "gym_members";

    public function getId(){
        return $this->id;
    }

    public function getFirstName(){
        return $this->first_name;
    }

    public function getLastName(){
        return $this->last_name;
    }

    public function getBirthdate(){
        return $this->birthdate;
    }

    public function getExpireDate(){
        return $this->expire_date;
    }

    public function getProfilePicture(){
        return $this->profile_picture;
    }
}
