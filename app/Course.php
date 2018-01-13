<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = "courses";
    protected $fillable = ['course_id','course_name', 'credit', 'course_type', 'syllabus' ];
}
