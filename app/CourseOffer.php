<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseOffer extends Model
{
    protected $table = "courseOffer";
    protected $fillable = ['offer_id','course_id', 'session_id', 'ct_no', 'best_ct_no', 'online_no', 'best_online_no',
        'offline_no','best_offline_no','lab_performance_no','best_lab_performance_no','viva_no','best_viva_no',
        'project','quiz' ];
}
