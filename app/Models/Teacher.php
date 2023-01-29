<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = ['faculty_id' ,
    'firstname' , 'middlename' , 'lastname' , 'email' , 'contact' , 'gender' , 'address' , 'password' , 'grade' , 'subject', 'avatar'];

}
