<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseExamType extends Model
{
    protected $table = "coursesExamType";
    protected $fillable = ['course_id', 'exam_id'];
}
