<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_id','lecture_id' ,'question1', 'question2' , 'question3' , 'question4' , 'question5'  ];
}
