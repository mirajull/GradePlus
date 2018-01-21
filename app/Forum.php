<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    protected $table = "forum";
    protected $fillable = [ 'teacher_id','course_id','session_id','exam_name','post',];
}
