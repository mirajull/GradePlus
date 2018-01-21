<?php

namespace App\Http\Controllers;

use App\Course;
use App\CourseExamType;
use App\CourseOffer;
use App\Session;
use Illuminate\Http\Request;

use App\Http\Requests;

class CourseController extends Controller
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

    public function manage()
    {
        $course = CourseOffer::all();
        $error = false;
        return view('exam',compact('error','course'));
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
    public function store(Request $request)
    {
        $data = $request->all();
        $course = CourseOffer::all();
        $crs = Course::all();
        $session = Session::all();
        $error = true;
        $check1 = false ;
        $check2 = false ;

        foreach ($crs as $onerow)
        {
            if ($onerow->course_id == $data['course_id']) {
                $check1=true;
            }
        }
        foreach ($session as $onerow)
        {
            if ($onerow->session_id == $data['session_id']) {
                $check2=true;
            }
        }

        if($check2 == true and $check1 == true)
        {
            $exam_row = CourseExamType::where('course_id','=',$data['course_id'])->get();
            //echo $exam_row;
            $exam_ids = array();
            $i=0;
            for($j=1;$j<=10;$j++)
            {
                $exam_ids[$j]=false;
            }

            foreach ($exam_row as $row)
            {
                $exam_ids[$row['exam_id']]=true;
                 //$exam_ids[$i]=$row['exam_id'];
                // echo $exam_ids[$i];
                 $i++;
            }
            //echo $a;
            return view('offer2',compact('data', 'course','exam_ids'));
        }
        return view('exam',compact('error','course'));
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
