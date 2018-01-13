<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = "students";
    protected $fillable = ['student_id','student_name','current_session', 'cgpa', 'total_credit'];

}