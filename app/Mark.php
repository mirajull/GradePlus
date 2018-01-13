<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    protected $table = "mark";
    protected $fillable = ['student_id','offer_id', 'exam_id', 'mark', 'weight'];
}
