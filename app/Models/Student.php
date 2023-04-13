<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    
    protected $fillable = [
    'faculty_id','student_id','firstname' , 'middlename' , 'lastname' ,'gender','age', 'email' , 'contact' , 'address' , 'password'];

}
