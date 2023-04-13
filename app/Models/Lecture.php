<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lecture extends Model
{
    use HasFactory;

    protected $fillable = [
        'faculty_id','title' ,'path', 'link' , 'shortDescription' , 'description' , 'thumbnailImage' , 'file'  ];
}
