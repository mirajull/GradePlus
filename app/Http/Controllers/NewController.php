<?php

namespace App\Http\Controllers;

use App\Course;
use App\CourseOffer;
use App\Enrollment;
use App\Forum;
use App\Mark;
use App\OfferLink;
use App\Teacher;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;

use App\Student;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class NewController extends Controller
{

    public function __construct()
    {
        $this->middleware('isAdmin');
    }

    public function studentInfo()
    {
        $student = Student::all();


        return view('301')->with(['student' => $student]);
    }


    public function addInstructor($cid,$sid)
    {
        $concat= $cid.$sid;
        $instructors = DB::table('teacherAssignments')
            ->join('teachers', 'teachers.teacher_id', '=', 'teacherAssignments.teacher_id')
            ->where('teacherAssignments.offer_id','=',$concat)
            ->get();

        $course=CourseOffer::all();

        return view('instructor',compact('course','cid','sid', 'instructors'));
    }

    public function addLink($cid,$sid)
    {
        $concat= $cid.$sid;
        $student = DB::table('offerLink')
            ->where('offerLink.offer_id','=',$concat)
            ->get();

        $course=CourseOffer::all();

        return view('addLink',compact('course','cid','sid', 'student'));
    }

    public function addLinkStore(Request $request, $cid, $sid )
    {
        $link = $request->all();
        $newlink = new OfferLink;

        $newlink['offer_id']= $cid.$sid;
        $newlink['link']= $link['link'];
        $newlink['name']= $link['name'];

        $newlink->save() ;

        $course=CourseOffer::all();
        $concat= $cid.$sid;
        $student = DB::table('offerLink')
            ->where('offerLink.offer_id','=',$concat)
            ->get();


        return view('addLink',compact('course','cid','sid', 'student'));

    }

    public function addStudent($cid,$sid)
    {
        $concat= $cid.$sid;
        $student = DB::table('enrollment')
            ->join('students', 'students.student_id', '=', 'enrollment.student_id')
            ->where('enrollment.offer_id','=',$concat)
            ->get();

        $course=CourseOffer::all();

        return view('addStudent',compact('course','cid','sid', 'student'));
    }

    public function addStudentStore(Request $request, $cid, $sid )
    {
        $course = CourseOffer::all();
        $data = $request->all();
        $concat = $cid.$sid;
        $ase = false ;
        $crow= DB::table('courseOffer')
            ->where('offer_id','=',$cid.$sid)
            ->first();


        $tidcheck = DB::table('students')->where('student_id', '=', $data['student_id'])->get();

        $allreadycheck = DB::table('enrollment')
            ->where('student_id', '=', $data['student_id'])
            ->where('offer_id','=',$cid.$sid)
            ->get();

//        foreach ($tidcheck as $tck)
//        {
//            if ($data['student_id'] == $tck->student_id) {
//                $ase = true;
//            }
//
//        }
//

        if ($tidcheck!=null and $allreadycheck ==null ) {
                $ase = true;
        }


        if($ase == true)
        {
            $new = new Enrollment;
            $new['offer_id'] = $cid.$sid;
            $new['student_id']= $data['student_id'];

            $new->save();

            if($crow->ct_no!=0)
            {
                $sofarall = count(DB::table('mark')
                    ->where('offer_id','=',$cid.$sid)
                    ->where('exam_id','=',2)
                    ->get());
                $bablu = DB::table('mark')
                    ->where('offer_id','=',$cid.$sid)
                    ->where('exam_id','=',2)
                    ->first();
                $std_no = count(DB::table('enrollment')
                    ->where('offer_id','=',$cid.$sid)
                    ->get())-1;

                $no = $sofarall/$std_no;

                for($i=1; $i<=$no ; $i++)
                {
                    $marknew = new Mark;
                    $marknew->student_id = $data['student_id'];;
                    $marknew->offer_id = $concat;
                    $marknew->exam_id = 2;
                    $marknew->exam_name = "CT".$i;
                    $marknew->mark = 0;
                    $marknew->total_mark = $bablu->total_mark;
                    $marknew->save();
                }

            }
            if($crow->online_no!=0)
            {
                $sofarall = count(DB::table('mark')
                    ->where('offer_id','=',$cid.$sid)
                    ->where('exam_id','=',3)
                    ->get());
                $bablu = DB::table('mark')
                    ->where('offer_id','=',$cid.$sid)
                    ->where('exam_id','=',3)
                    ->first();
                $std_no = count(DB::table('enrollment')
                        ->where('offer_id','=',$cid.$sid)
                        ->get())-1;

                $no = $sofarall/$std_no;

                for($i=1; $i<=$no ; $i++)
                {
                    $marknew = new Mark;
                    $marknew->student_id = $data['student_id'];;
                    $marknew->offer_id = $concat;
                    $marknew->exam_id = 3;
                    $marknew->exam_name = "ONLINE".$i;
                    $marknew->mark = 0;
                    $marknew->total_mark = $bablu->total_mark;
                    $marknew->save();
                }
            }
            if($crow->offline_no!=0)
            {
                $sofarall = count(DB::table('mark')
                    ->where('offer_id','=',$cid.$sid)
                    ->where('exam_id','=',4)
                    ->get());
                $bablu = DB::table('mark')
                    ->where('offer_id','=',$cid.$sid)
                    ->where('exam_id','=',4)
                    ->first();
                $std_no = count(DB::table('enrollment')
                        ->where('offer_id','=',$cid.$sid)
                        ->get())-1;

                $no = $sofarall/$std_no;

                for($i=1; $i<=$no ; $i++)
                {
                    $marknew = new Mark;
                    $marknew->student_id = $data['student_id'];;
                    $marknew->offer_id = $concat;
                    $marknew->exam_id = 4;
                    $marknew->exam_name = "OFFLINE".$i;
                    $marknew->mark = 0;
                    $marknew->total_mark = $bablu->total_mark;
                    $marknew->save();
                }
            }
            if($crow->term_final!=0)
            {
                $sofarall = count(DB::table('mark')
                    ->where('offer_id','=',$cid.$sid)
                    ->where('exam_id','=',1)
                    ->get());
                $bablu = DB::table('mark')
                    ->where('offer_id','=',$cid.$sid)
                    ->where('exam_id','=',1)
                    ->first();
                $std_no = count(DB::table('enrollment')
                        ->where('offer_id','=',$cid.$sid)
                        ->get())-1;

                $no = $sofarall/$std_no;

                for($i=1; $i<=$no ; $i++)
                {
                    $marknew = new Mark;
                    $marknew->student_id = $data['student_id'];;
                    $marknew->offer_id = $concat;
                    $marknew->exam_id = 1;
                    $marknew->exam_name = "TERM_FINAL";
                    $marknew->mark = 0;
                    $marknew->total_mark = $bablu->total_mark;
                    $marknew->save();
                }
            }
            if($crow->lab_performance_no!=0)
            {
                $sofarall = count(DB::table('mark')
                    ->where('offer_id','=',$cid.$sid)
                    ->where('exam_id','=',5)
                    ->get());
                $bablu = DB::table('mark')
                    ->where('offer_id','=',$cid.$sid)
                    ->where('exam_id','=',5)
                    ->first();
                $std_no = count(DB::table('enrollment')
                        ->where('offer_id','=',$cid.$sid)
                        ->get())-1;

                $no = $sofarall/$std_no;

                for($i=1; $i<=$no ; $i++)
                {
                    $marknew = new Mark;
                    $marknew->student_id = $data['student_id'];;
                    $marknew->offer_id = $concat;
                    $marknew->exam_id = 5;
                    $marknew->exam_name = "LAB_PERFORMANCE".$i;
                    $marknew->mark = 0;
                    $marknew->total_mark = $bablu->total_mark;
                    $marknew->save();
                }
            }
            if($crow->viva_no!=0)
            {
                $sofarall = count(DB::table('mark')
                    ->where('offer_id','=',$cid.$sid)
                    ->where('exam_id','=',6)
                    ->get());
                $bablu = DB::table('mark')
                    ->where('offer_id','=',$cid.$sid)
                    ->where('exam_id','=',6)
                    ->first();
                $std_no = count(DB::table('enrollment')
                        ->where('offer_id','=',$cid.$sid)
                        ->get())-1;

                $no = $sofarall/$std_no;

                for($i=1; $i<=$no ; $i++)
                {
                    $marknew = new Mark;
                    $marknew->student_id = $data['student_id'];;
                    $marknew->offer_id = $concat;
                    $marknew->exam_id = 6;
                    $marknew->exam_name = "VIVA".$i;
                    $marknew->mark = 0;
                    $marknew->total_mark = $bablu->total_mark;
                    $marknew->save();
                }
            }
            if($crow->presenation_no!=7)
            {
                $sofarall = count(DB::table('mark')
                    ->where('offer_id','=',$cid.$sid)
                    ->where('exam_id','=',7)
                    ->get());
                $bablu = DB::table('mark')
                    ->where('offer_id','=',$cid.$sid)
                    ->where('exam_id','=',7)
                    ->first();
                $std_no = count(DB::table('enrollment')
                        ->where('offer_id','=',$cid.$sid)
                        ->get())-1;

                $no = $sofarall/$std_no;

                for($i=1; $i<=$no ; $i++)
                {
                    $marknew = new Mark;
                    $marknew->student_id = $data['student_id'];;
                    $marknew->offer_id = $concat;
                    $marknew->exam_id = 7;
                    $marknew->exam_name = "PRESENTATION".$i;
                    $marknew->mark = 0;
                    $marknew->total_mark = $bablu->total_mark;
                    $marknew->save();
                }
            }
            if($crow->quiz!=0)
            {
                $sofarall = count(DB::table('mark')
                    ->where('offer_id','=',$cid.$sid)
                    ->where('exam_id','=',8)
                    ->get());
                $bablu = DB::table('mark')
                    ->where('offer_id','=',$cid.$sid)
                    ->where('exam_id','=',8)
                    ->first();
                $std_no = count(DB::table('enrollment')
                        ->where('offer_id','=',$cid.$sid)
                        ->get())-1;

                $no = $sofarall/$std_no;

                for($i=1; $i<=$no ; $i++)
                {
                    $marknew = new Mark;
                    $marknew->student_id = $data['student_id'];;
                    $marknew->offer_id = $concat;
                    $marknew->exam_id = 8;
                    $marknew->exam_name = "QUIZ";
                    $marknew->mark = 0;
                    $marknew->total_mark = $bablu->total_mark;
                    $marknew->save();
                }
            }
            if($crow->project!=0)
            {
                $sofarall = count(DB::table('mark')
                    ->where('offer_id','=',$cid.$sid)
                    ->where('exam_id','=',9)
                    ->get());
                $bablu = DB::table('mark')
                    ->where('offer_id','=',$cid.$sid)
                    ->where('exam_id','=',9)
                    ->first();
                $std_no = count(DB::table('enrollment')
                        ->where('offer_id','=',$cid.$sid)
                        ->get())-1;

                $no = $sofarall/$std_no;

                for($i=1; $i<=$no ; $i++)
                {
                    $marknew = new Mark;
                    $marknew->student_id = $data['student_id'];;
                    $marknew->offer_id = $concat;
                    $marknew->exam_id = 9;
                    $marknew->exam_name = "PROJECT";
                    $marknew->mark = 0;
                    $marknew->total_mark = $bablu->total_mark;
                    $marknew->save();
                }
            }
//
//            if($crow->ct_no!=0)
            {
                $sofarall = count(DB::table('mark')
                    ->where('offer_id','=',$cid.$sid)
                    ->where('exam_id','=',10)
                    ->get());
                $bablu = DB::table('mark')
                    ->where('offer_id','=',$cid.$sid)
                    ->where('exam_id','=',10)
                    ->first();
                $std_no = count(DB::table('enrollment')
                        ->where('offer_id','=',$cid.$sid)
                        ->get())-1;

                $no = $sofarall/$std_no;

                for($i=1; $i<=$no ; $i++)
                {
                    $marknew = new Mark;
                    $marknew->student_id = $data['student_id'];;
                    $marknew->offer_id = $concat;
                    $marknew->exam_id = 10;
                    $marknew->exam_name = "ATTENDANCE";
                    $marknew->mark = 0;
                    $marknew->total_mark = $bablu->total_mark;
                    $marknew->save();
                }
            }


        }
        $student = DB::table('enrollment')
            ->join('students', 'students.student_id', '=', 'enrollment.student_id')
            ->where('enrollment.offer_id','=',$concat)
            ->get();

        return view('addStudent',compact('student','course','cid','sid'));

    }

    public function courseInfo($cid, $sid)
    {
//        $student = Student::all();
        $crow = DB::table('courseOffer')
            ->where('offer_id','=',$cid.$sid)
            ->first() ;
        $mark = DB::table('mark')
            ->where('offer_id','=',$cid.$sid);

        $allmarks = array(array());




        $concat = $cid.$sid;
        $student = DB::table('mark')
            ->join('enrollment', 'enrollment.student_id', '=', 'mark.student_id')
            ->join('students', 'students.student_id', '=', 'enrollment.student_id')
            ->where('enrollment.offer_id', '=', $concat)
            ->get();

        $pathao = DB::table('forum')
            ->where('course_id','=',$cid)
            ->where('session_id','=',$sid)
            ->orderby('id','desc')
            ->get();



        return view('allMarks', compact('crow','student','cid','sid','mark','allmarks','pathao') );
    }

    public function markInfo($cid, $sid, $tid)
    {
        $crow = CourseOffer::where('offer_id','=',$cid.$sid)->first() ;

        $concat = $cid.$sid;

        $student = DB::table('students')
            ->join('enrollment', 'enrollment.student_id', '=', 'students.student_id')
            ->where('enrollment.offer_id','=',$concat)
            ->get();

        $exist = DB::table('mark')
            ->where('offer_id','=',$cid.$sid)
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

            return view('updateDetail',compact('tid', 'student' , 'crow') );
        }

        $student = DB::table('enrollment')
            ->join('students', 'students.student_id', '=', 'enrollment.student_id')
            ->where('offer_id','=',$concat)
            ->get();
        if($student == null) echo "null";
        return view('details',compact('tid', 'student' , 'crow') );

    }


    public function addcourse()
    {
        $course = Course::all();
        return view('addCourses',compact('course'));
    }

    public function courseStore(Request $request)
    {
        $crs = new Course;
        $data = $request->all();
        $crs['course_id'] = $data ['course_id'];
        $crs['course_name'] = $data ['course_name'];
        $crs['credit'] = $data ['credit'];
        $crs['course_type'] = $data ['course_type'];
        $crs->save();

        $course = Course::all();

        return view('addCourses',compact('course'));
    }



    public function gradeCalculate($cid, $sid)
    {
        $crow = DB::table('courseOffer')
            ->where('offer_id','=',$cid.$sid)
            ->first();
        return view('grade', compact('crow'));
    }

    public function gradeShow(Request $request,$cid, $sid)
    {
        $array = $request->all();
        $student =  DB::table('students')
            ->join('enrollment','enrollment.student_id','=','students.student_id')
            ->where('enrollment.offer_id','=',$cid.$sid)
            ->get();



        $crow = DB::table('courseOffer')
            ->where('offer_id','=',$cid.$sid)
            ->first();

        $ans = 0;
        foreach($student as $stu)
        {
            if($crow->ct_no!=0)
            {
                $mamamark= DB::table('mark')
                    ->where('offer_id','=',$cid.$sid)
                    ->where('exam_id','=',2)
                    ->where('student_id','=',$stu->student_id)
                    ->orderby('mark','desc')
                    ->get();

                $i=0 ;
                $sum = 0;

                foreach($mamamark as $maxmark)
                {
                    $sum = $sum + $maxmark->mark;
                    $i++;
                    if($i==$crow->best_ct_no)
                    {
                        break;
                    }
                    $tm = $maxmark->total_mark;
                }
                $sum = $sum / (($tm) * $crow->best_ct_no) ;
                $ans += $sum * $array['ct'] ;
            }
            if($crow->online_no!=0)
            {
                $mamamark= DB::table('mark')
                    ->where('offer_id','=',$cid.$sid)
                    ->where('exam_id','=',3)
                    ->where('student_id','=',$stu->student_id)
                    ->orderby('mark','desc')
                    ->get();

                $i=0 ;
                $sum = 0;
                foreach($mamamark as $maxmark)
                {
                    $sum = $sum + $maxmark->mark;
                    $i++;
                    if($i==$crow->best_online_no)
                    {
                        break;
                    }
                    $tm = $maxmark->total_mark;
                }
                $sum = $sum / ($tm) *$crow->best_online_no ;
                $ans += $sum * $array['online'] ;
            }
            if($crow->offline_no!=0)
            {
                $mamamark= DB::table('mark')
                    ->where('offer_id','=',$cid.$sid)
                    ->where('exam_id','=',4)
                    ->where('student_id','=',$stu->student_id)
                    ->orderby('mark','desc')
                    ->get();

                $i=0 ;
                $sum = 0;
                foreach($mamamark as $maxmark)
                {
                    $sum = $sum + $maxmark->mark;
                    $i++;
                    if($i==$crow->best_offline_no)
                    {
                        break;
                    }

                    $tm = $maxmark->total_mark;
                }
                $sum = $sum / ($tm) *$crow->best_offline_no ;
                $ans += $sum * $array['offline'] ;
            }
            if($crow->lab_performance_no!=0)
            {
                $mamamark= DB::table('mark')
                    ->where('offer_id','=',$cid.$sid)
                    ->where('exam_id','=',5)
                    ->where('student_id','=',$stu->student_id)
                    ->orderby('mark','desc')
                    ->get();

                $i=0 ;
                $sum = 0;
                foreach($mamamark as $maxmark)
                {
                    $sum = $sum + $maxmark->mark;
                    $i++;
                    if($i==$crow->best_lab_performance_no)
                    {
                        break;
                    }

                    $tm = $maxmark->total_mark;
                }
                $sum = $sum / ($tm) *$crow->best_lab_performance_no ;
                $ans += $sum * $array['lab'] ;
            }
            if($crow->viva_no!=0)
            {
                $mamamark= DB::table('mark')
                    ->where('offer_id','=',$cid.$sid)
                    ->where('exam_id','=',6)
                    ->where('student_id','=',$stu->student_id)
                    ->orderby('mark','desc')
                    ->get();

                $i=0 ;
                $sum = 0;
                foreach($mamamark as $maxmark)
                {
                    $sum = $sum + $maxmark->mark;
                    $i++;
                    if($i==$crow->best_viva_no)
                    {
                        break;
                    }

                    $tm = $maxmark->total_mark;
                }
                $sum = $sum / ($tm) *$crow->best_viva_no ;
                $ans += $sum * $array['viva'] ;
            }
            if($crow->presenation_no!=0)
            {
                $mamamark= DB::table('mark')
                    ->where('offer_id','=',$cid.$sid)
                    ->where('exam_id','=',7)
                    ->where('student_id','=',$stu->student_id)
                    ->orderby('mark','desc')
                    ->get();

                $i=0 ;
                $sum = 0;
                foreach($mamamark as $maxmark)
                {
                    $sum = $sum + $maxmark->mark;
                    $i++;
//                    if($i==$crow->best_per_no)
//                    {
//                        break;
//                    }

                    $tm = $maxmark->total_mark;
                }
                $sum = $sum / ($tm) ;//*$crow->best_ct_no ;
                $ans += $sum * $array['presentation'] ;
            }
            if($crow->quiz!=0)
            {
                $mamamark= DB::table('mark')
                    ->where('offer_id','=',$cid.$sid)
                    ->where('exam_id','=',8)
                    ->where('student_id','=',$stu->student_id)
                    ->orderby('mark','desc')
                    ->get();

                $i=0 ;
                $sum = 0;
                foreach($mamamark as $maxmark)
                {
                    $sum = $sum + $maxmark->mark;
                    $i++;
//                    if($i==$crow->best_ct_no)
//                    {
//                        break;
//                    }
                    $tm = $maxmark->total_mark;

                }
                $sum = $sum / ($tm);// *$crow->best_ct_no ;
                $ans += $sum * $array['quiz'] ;
            }
            if($crow->project!=0)
            {
                $mamamark= DB::table('mark')
                    ->where('offer_id','=',$cid.$sid)
                    ->where('exam_id','=',9)
                    ->where('student_id','=',$stu->student_id)
                    ->orderby('mark','desc')
                    ->get();

                $i=0 ;
                $sum = 0;
                foreach($mamamark as $maxmark)
                {
                    $sum = $sum + $maxmark->mark;
                    $i++;
//                    if($i==$crow->best_ct_no)
//                    {
//                        break;
//                    }

                    $tm = $maxmark->total_mark;
                }
                $sum = $sum / ($tm);// *$crow->best_ct_no ;
                $ans += $sum * $array['project'] ;
            }
            if($crow->term_final!=0)
            {
                $mamamark= DB::table('mark')
                    ->where('offer_id','=',$cid.$sid)
                    ->where('exam_id','=',1)
                    ->where('student_id','=',$stu->student_id)
                    ->orderby('mark','desc')
                    ->get();

                $i=0 ;
                $sum = 0;
                foreach($mamamark as $maxmark)
                {
                    $sum = $sum + $maxmark->mark;
                    $i++;
//                    if($i==$crow->best_ct_no)
//                    {
//                        break;
//                    }

                    $tm = $maxmark->total_mark;
                }
                $sum = $sum / ($tm);// *$crow->best_ct_no ;
                $ans += $sum * $array['term_final'] ;
            }
//            if($crow->ct_no!=0)
            {
                $mamamark= DB::table('mark')
                    ->where('offer_id','=',$cid.$sid)
                    ->where('exam_id','=',10)
                    ->where('student_id','=',$stu->student_id)
                    ->orderby('mark','desc')
                    ->get();

                $i=0 ;
                $sum = 0;
                foreach($mamamark as $maxmark)
                {
                    $sum = $sum + $maxmark->mark;
                    $i++;
//                    if($i==$crow->best_ct_no)
//                    {
//                        break;
//                    }

                    $tm = $maxmark->total_mark;
                }
                $sum = $sum / ($tm)  ;
                $ans += $sum * $array['attendance'] ;
            }


            if($ans>80) $ch = "A+";
            else if($ans>75) $ch = "A";
            else if($ans>70) $ch = "A-";
            else if($ans>65) $ch = "B+";
            else if($ans>60) $ch = "B";
            else if($ans>55) $ch = "B-";
            else if($ans>50) $ch = "C+";
            else if($ans>45) $ch = "C-";
            else if($ans>75) $ch = "D";
            else  $ch = "F";

            DB::table('enrollment')
                ->where('offer_id', '=', $cid.$sid)
                ->where('student_id', '=', $stu->student_id)
                ->update(['final_mark' => $ans]);
            DB::table('enrollment')
                ->where('offer_id', '=', $cid.$sid)
                ->where('student_id', '=', $stu->student_id)
                ->update(['grade' => $ch]);


            $ans = 0;
        }

        $student = DB::table('enrollment')
            ->join('students','students.student_id','=','enrollment.student_id')
            ->where('offer_id','=',$cid.$sid)
            ->get();




        return view('gradeShow', compact('crow','student'));
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
    public function gpashowstudent(Request $request)
    {
        $course = Course::all();

        if(Auth::user()->user_type!="Student")
            $std_id = $request->get('std_id');
        else
            $std_id=Auth::user()->member_id;


        $sid = $request->get('session_id');

        $student = DB::table('enrollment')
            ->where('student_id','=',$std_id)
            ->where('offer_id','LIKE','%'.$sid)
            ->get();

        $student2 = DB::table('enrollment')
            ->where('student_id','=',$std_id)
            ->get();


        $gpasum=0;
        $creditsum =0;
        $gpa = 0;
        $sum = 0;
        foreach($student as $sinfo)
        {
            $cid=substr($sinfo->offer_id,0,6);
            $crs = DB::table('courses')
                ->where('course_id','=',$cid)
                ->first();
            $credit = $crs -> credit;
            if($sinfo->grade=="A+")
            {
                $grade = 4.0;
            }
            else if($sinfo->grade=="A")
            {
                $grade = 3.75;
            }
            else if($sinfo->grade=="A-")
            {
                $grade = 3.5;
            }
            else if($sinfo->grade=="B+")
            {
                $grade = 3.25;
            }
            else if($sinfo->grade=="B")
            {
                $grade = 3.00;
            }
            else if($sinfo->grade=="B-")
            {
                $grade = 2.75;
            }
            else if($sinfo->grade=="C+")
            {
                $grade = 2.5;
            }
            else if($sinfo->grade=="C")
            {
                $grade = 2.25;
            }
            else if($sinfo->grade=="D")
            {
                $grade = 2.0;
            }
            else
            {
                $grade = 1.5;
            }
            $sum=$sum+$credit;
            $gpa=$gpa+($grade * $credit);


        }
        $gpa = $gpa / $sum ;
//        $cgpa= $gpasum/$creditsum;

        foreach ($student2 as $sinfo)
        {
            $cid=substr($sinfo->offer_id,0,6);
            $crs = DB::table('courses')
                ->where('course_id','=',$cid)
                ->first();
            $credit = $crs -> credit;
            if($sinfo->grade=="A+")
            {
                $grade = 4.0;
            }
            else if($sinfo->grade=="A")
            {
                $grade = 3.75;
            }
            else if($sinfo->grade=="A-")
            {
                $grade = 3.5;
            }
            else if($sinfo->grade=="B+")
            {
                $grade = 3.25;
            }
            else if($sinfo->grade=="B")
            {
                $grade = 3.00;
            }
            else if($sinfo->grade=="B-")
            {
                $grade = 2.75;
            }
            else if($sinfo->grade=="C+")
            {
                $grade = 2.5;
            }
            else if($sinfo->grade=="C")
            {
                $grade = 2.25;
            }
            else if($sinfo->grade=="D")
            {
                $grade = 2.0;
            }
            else
            {
                $grade = 1.5;
            }
//            $sum=$sum+$credit;
//            $gpa=$gpa+($grade * $credit);

            $gpasum+=  ($grade * $credit);
            $creditsum+=$credit;
        }
        $cgpa = $gpasum / $creditsum ;
        return view('gpaShow', compact('student','gpa','std_id','cgpa','sid'));
    }

    public function gradeshowstudent(Request $request)
    {
        $cid = $request->get('course_id');
        $sid = $request->get('session_id');
        $crow = DB::table('courseOffer')
            ->where('offer_id','=',$cid.$sid)
            ->first();

        $student = DB::table('enrollment')
            ->join('students','students.student_id','=','enrollment.student_id')
            ->where('offer_id','=',$cid.$sid)
            ->get();


        return view('gradeShow', compact('crow','student'));

    }

    public function store(Request $request , $cid , $sid , $tid)
    {


        $array = $request->all();
        $concat = $cid.$sid;
        $crow = CourseOffer::where('offer_id', '=', $concat)->first();
        $student = DB::table('students')
            ->join('enrollment', 'enrollment.student_id', '=', 'students.student_id')
            ->where('enrollment.offer_id','=',$concat)
            ->get();
//        $student = DB::table('mark')
//            ->join('enrollment', 'enrollment.student_id', '=', 'mark.student_id')
//            ->join('students', 'students.student_id', '=', 'enrollment.student_id')
//            ->where('enrollment.offer_id', '=', $concat)
//            ->where('mark.exam_name', '=', $tid)
//            ->get();

        $exist = DB::table('mark')
            ->where('offer_id', '=', $concat)
            ->where('exam_name', '=', $tid)
            ->get();

        if ($exist == null)
        {

            foreach ($student as $sinfo)
            {
//                echo "abc";
                $mark = new Mark;
                $mark->student_id = $sinfo->student_id;
                $mark->offer_id = $concat;
                $mark->exam_name = $tid;

                if (substr($tid, 0, 2) == 'CT') $mark->exam_id = 2;
                else if (substr($tid, 0, 10) == 'PRESENTATION') $mark->exam_id = 7;
                else if (substr($tid, 0, 6) == 'ONLINE') $mark->exam_id = 3;
                else if (substr($tid, 0, 7) == 'OFFLINE') $mark->exam_id = 4;
                else if (substr($tid, 0, 15) == 'LAB_PERFORMANCE') $mark->exam_id = 5;
                else if (substr($tid, 0, 4) == 'VIVA') $mark->exam_id = 6;
                else if (substr($tid, 0, 4) == 'QUIZ') $mark->exam_id = 8;
                else if (substr($tid, 0, 7) == 'PROJECT') $mark->exam_id = 9;
                else if (substr($tid, 0, 10) == 'TERM_FINAL') $mark->exam_id = 1;
                else if ($tid == 'ATTENDANCE') $mark->exam_id = 10;

                $roll = (string)$sinfo->student_id;
                $mark->mark = $array[$roll];
                $mark->total_mark = $array['total_mark'];
                $mark->save();
            }

            $student = DB::table('mark')
            ->join('enrollment', 'enrollment.student_id', '=', 'mark.student_id')
            ->join('students', 'students.student_id', '=', 'enrollment.student_id')
            ->where('enrollment.offer_id', '=', $concat)
            ->where('mark.exam_name', '=', $tid)
            ->get();

            $newpost = new Forum;
            $poster_id = Auth::user()->member_id;
            $poster_name = Auth::user()->name;

            $p = $poster_name." just uploaded the ".$tid." marks.";

            $newpost['teacher_id']=$poster_id;
            $newpost['course_id']=$cid;
            $newpost['session_id']=$sid;
            $newpost['post'] = $p;
            $newpost['exam_name'] = $tid;
            $newpost->save();

//            $pathao = table('forum')
//                ->where('course_id','=',$cid)
//                ->where('session_id','=',$sid)
//                ->orderby('id','desc')
//                ->get();


//
//            $newPost['teacher_id']='';


            return view('updateDetail', compact('tid', 'student', 'crow'));
        }
        else {
            foreach ($student as $sinfo) {
                $roll = (string)$sinfo->student_id;
                //$mark->mark =$array[$roll];
                if ($roll != null and $array[$roll] > 0) {
                    DB::table('mark')
                        ->where('offer_id', '=', $concat)
                        ->where('exam_name', '=', $tid)
                        ->where('student_id', '=', $sinfo->student_id)
                        ->update(['mark' => $array[$roll]]);
                }



            }

            $student = DB::table('mark')
                ->join('enrollment', 'enrollment.student_id', '=', 'mark.student_id')
                ->join('students', 'students.student_id', '=', 'enrollment.student_id')
                ->where('enrollment.offer_id', '=', $concat)
                ->where('mark.exam_name', '=', $tid)
                ->get();

            $newpost = new Forum;
            $poster_id = Auth::user()->member_id;
            $poster_name = Auth::user()->name;

            $p = $poster_name." just edited and updated the ".$tid." marks.";

            $newpost['teacher_id']=$poster_id;
            $newpost['course_id']=$cid;
            $newpost['session_id']=$sid;
            $newpost['post'] = $p;
            $newpost['exam_name'] = $tid;
            $newpost->save();

//            $pathao = table('forum')
//                ->where('course_id','=',$cid)
//                ->where('session_id','=',$sid)
//                ->orderby('id','desc')
//                ->get();

            return view('updateDetail', compact('tid', 'student', 'crow'));
        }
    }




    public function playstore(Request $request)
    {
        $user = new User;
        $array = $request->all();
        $user['name'] = $array['name'];
        $user['email'] = $array['email'];
        $user['user_type'] = $array['user_type'];
        $user['member_id'] = $array['member_id'];
        $user['password'] = bcrypt($array['password']);
        $user->save();

        if($array['user_type']=="Student")
        {
            $new = new Student;
            $new['student_id'] = $array['member_id'];
            $new['student_name'] = $array['name'];
            $new->save();
        }

        if($array['user_type']=="Teacher")
        {
            $new = new Teacher;
            $new['teacher_id'] = $array['member_id'];
            $new['teacher_name'] = $array['name'];
            $new->save();
        }

        return view('welcome');
    }


    public function gradeshow2student($cid,$sid)
    {
        $crow = DB::table('courseOffer')
            ->where('offer_id','=',$cid.$sid)
            ->first();

        $student = DB::table('enrollment')
            ->join('students','students.student_id','=','enrollment.student_id')
            ->where('offer_id','=',$cid.$sid)
            ->get();


        return view('gradeShow', compact('crow','student'));


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
