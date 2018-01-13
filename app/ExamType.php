<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExamType extends Model
{
    protected $table = "examtype";
    protected $fillable = [ 'exam_id', 'exam_type'];
}
