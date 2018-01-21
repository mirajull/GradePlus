<?php

namespace App\Http\Controllers;

use App\Course;
use App\CourseOffer;
use Illuminate\Http\Request;

use App\Http\Requests;

class InstructorController extends Controller
{


    public function __construct()
    {
        $this->middleware('isAdmin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request , $cid, $sid)
    {
        //$coffer = CourseOffer::create($request->all());
        $course=CourseOffer::all();
        $now = new CourseOffer;
        $data = $request->all();
        $now['offer_id']= $cid.$sid ;
        $now['course_id'] = $cid;
        $now['session_id'] = $sid;
        $now['term_final'] = 0;
        if(array_key_exists("ct_no", $data))
        {
            $now['ct_no'] = $data['ct_no'];
            $now['term_final'] = 1;
        }
        if(array_key_exists("best_ct_no", $data))
        $now['best_ct_no'] = $data['best_ct_no'];
        if(array_key_exists("online_no", $data))
        $now['online_no'] = $data['online_no'];
        if(array_key_exists("best_online_no", $data))
        $now['best_online_no'] = $data['best_online_no'];
        if(array_key_exists("offline_no", $data))
        $now['offline_no'] = $data['offline_no'];
        if(array_key_exists("best_offline_no", $data))
        $now['best_offline_no'] = $data['best_offline_no'];
        if(array_key_exists("lab_performance_no", $data))
        $now['lab_performance_no'] = $data['lab_performance_no'];
        if(array_key_exists("best_lab_performance_no", $data))
        $now['best_lab_performance_no'] = $data['best_lab_performance_no'];
        if(array_key_exists("viva_no", $data))
        $now['viva_no'] = $data['viva_no'];
        if(array_key_exists("best_viva_no", $data))
        $now['best_viva_no'] = $data['best_viva_no'];
        if(array_key_exists("project", $data))
        $now['project'] = $data['project'];
        if(array_key_exists("quiz", $data))
        $now['quiz'] = $data['quiz'];
        if(array_key_exists("presenation_no", $data))
        $now['presenation_no'] = $data['presenation_no'];
        $now->save();

        $course=CourseOffer::all();

        $instructors = null ;

        $nid=1;

        return view('instructor',compact('course','cid','sid', 'instructors','nid'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
