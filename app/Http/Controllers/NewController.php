<?php

namespace App\Http\Controllers;

use App\Course;
use App\CourseOffer;
use App\Mark;
use App\Marks;
use Illuminate\Http\Request;

use App\Http\Requests;

use App\Student;
use Illuminate\Support\Facades\DB;

class NewController extends Controller
{


    public function studentInfo()
    {
        $student = Student::all();


        return view('301')->with(['student' => $student]);
    }

    public function studentInfo1()
    {
        $student = Student::all();

        return view('313')->with(['student' => $student]);
    }

    public function studentInfo2()
    {
        $student = Student::all();

        return view('315')->with(['student' => $student]);
    }

    public function studentInfo3()
    {
        $student = Student::all();

        return view('317')->with(['student' => $student]);
    }

    public function studentInfo4()
    {
        $student = Student::all();

        return view('321')->with(['student' => $student]);
    }

    public function courseInfo($cid, $sid)
    {
//        $student = Student::all();
        $crow = CourseOffer::where('course_id','=',$cid)->first() ;

        $concat = $cid.$sid;
        $student = DB::table('students')
            ->join('enrollment', 'enrollment.student_id', '=', 'students.student_id')
            ->where('enrollment.offer_id','=',$concat)
            ->get();

        return view('allMarks', compact('crow','student') );
    }

    public function markInfo($cid, $sid, $tid)
    {
//        $student = Student::all();
//        $crow = Course::where('course_id','=',$cid)->first() ;
        $crow = CourseOffer::where('course_id','=',$cid)->first() ;

        $concat = $cid.$sid;

        $student = DB::table('students')
            ->join('enrollment', 'enrollment.student_id', '=', 'students.student_id')
            ->where('enrollment.offer_id','=',$concat)
            ->get();

        $exist = DB::table('mark')
            ->where('exam_name','=',$tid)
            ->get();

        if($exist!=null)
        {

            $student = DB::table('mark')
                ->join('enrollment', 'enrollment.student_id', '=', 'mark.student_id')
                ->join('students' , 'students.student_id','=','enrollment.student_id')
                ->where('enrollment.offer_id','=',$concat)
                ->where('mark.exam_name','=',$tid)
                ->get();

//


            return view('updateDetail',compact('tid', 'student' , 'crow') );
        }
        return view('details',compact('tid', 'student' , 'crow') );

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
        return ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request , $cid , $sid , $tid)
    {
        $array=$request->all();
        $concat = $cid.$sid;
        $student = DB::table('students')
            ->join('enrollment', 'enrollment.student_id', '=', 'students.student_id')
            ->where('enrollment.offer_id','=',$concat)
            ->get();

        foreach($student as $sinfo)
        {
            $mark=new Mark;
            $mark->student_id=$sinfo->student_id;
            $mark->offer_id=$concat;
            $mark->exam_name= $tid;

            if(substr($tid,0,2)=='CT') $mark->exam_id=2;
            else if(substr($tid,0,10)=='PRESENTATION') $mark->exam_id=7;
            else if(substr($tid,0,6)=='ONLINE') $mark->exam_id=3;
            else if(substr($tid,0,7)=='OFFLINE') $mark->exam_id=4;
            else if(substr($tid,0,15)=='LAB_PERFORMANCE') $mark->exam_id=5;
            else if(substr($tid,0,4)=='VIVA') $mark->exam_id=6;
            else if(substr($tid,0,4)=='QUIZ') $mark->exam_id=8;
            else if(substr($tid,0,7)=='PROJECT') $mark->exam_id=9;
            else if(substr($tid,0,10)=='TERM_FINAL') $mark->exam_id=1;
            else if(substr($tid,0,10)=='ATTENDANCE') $mark->exam_id=10;

            $roll=(string)$sinfo->student_id;
            $mark->mark =$array[$roll];
            $mark->save();
        }

        return view('abc');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       // return;
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
