<?php

namespace App\Http\Controllers;

use App\Course;
use App\CourseOffer;
use App\Teacher;
use App\TeacherAssignment;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class InstructorMoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('isAdmin');
    }

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
    public function store(Request $request, $cid, $sid )
    {
        $course = CourseOffer::all();
        $data = $request->all();
        $concat = $cid.$sid;
        $ase = false ;
        $tidcheck = DB::table('teacherAssignments')->where('offer_id', '=', $concat)->get();
        foreach ($tidcheck as $tck)
        {
            if ($data['teacher_id'] == $tck->teacher_id) {
                $ase = true;
            }

        }

        if($ase == false)
        {
            $new = new TeacherAssignment;
            $new['offer_id'] = $cid.$sid;
            $new['teacher_id']= $data['teacher_id'];
            $new->save();
        }
        $instructors = DB::table('teacherAssignments')
            ->join('teachers', 'teachers.teacher_id', '=', 'teacherAssignments.teacher_id')
            ->where('teacherAssignments.offer_id','=',$concat)
            ->get();

        return view('instructor',compact('instructors','course','cid','sid'));

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
