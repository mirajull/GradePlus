<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeacherAssignment extends Model
{
    protected $table = "teacherAssignments";
    protected $fillable = ['teacher_id','offer_id'];
}
