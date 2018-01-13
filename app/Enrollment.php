<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    protected $table = "enrollment";
    protected $fillable = ['student_id','offer_id'];
}
