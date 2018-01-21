@extends('layouts.app')

@section('content')
    <div class="container">
        <ul class="nav nav-pills nav-stacked">
            <li class="active"><a href="#">{{$crow->course_id}}{{"\x20Session:\x20"}}{{$crow->session_id}}{{"\x20"}}{{$crow->course_name}}</a></li>
            <li class="active"><a href="#">{{$tid."\x20Marks"}}</a></li>




        @if($crow->ct_no!=0)
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Class Test Marks
                    <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    @for($i=1;$i<=$crow->ct_no;$i++)
                        <li><a href="{{url('/exam/marks/'.$crow->course_id.'/'.$crow->session_id.'/CT'.$i)}}">{{"CT".$i}}</a></li>
                    @endfor
                </ul>
            </li>
        @endif

        @if($crow->online_no !=0)
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Online Marks
                    <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    @for($i=1;$i<=$crow->online_no;$i++)
                        <li><a href="{{url('/exam/marks/'.$crow->course_id.'/'.$crow->session_id.'/ONLINE'.$i)}}">{{"Online".$i}}</a></li>
                    @endfor
                </ul>
            </li>
        @endif

        @if($crow->offline_no !=0)
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Offline Marks
                    <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    @for($i=1;$i<=$crow->offline_no;$i++)
                        <li><a href="{{url('/exam/marks/'.$crow->course_id.'/'.$crow->session_id.'/OFFLINE'.$i)}}">{{"Offline".$i}}</a></li>
                    @endfor
                </ul>
            </li>
        @endif

        @if($crow->term_final!=0)
            <li><a href="{{url('/exam/marks/'.$crow->course_id.'/'.$crow->session_id.'/TERM_FINAL')}}">Term Final Mark</a></li>
        @endif

        @if($crow->viva_no !=0)
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Viva Marks
                    <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    @for($i=1;$i<=$crow->viva_no;$i++)
                        <li><a href="{{url('/exam/marks/'.$crow->course_id.'/'.$crow->session_id.'/VIVA'.$i)}}">{{"Viva".$i}}</a></li>
                    @endfor
                </ul>
            </li>
        @endif

        @if($crow->presenation_no !=0)
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Presentation Marks
                    <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    @for($i=1;$i<=$crow->presenation_no;$i++)
                        <li><a href="{{url('/exam/marks/'.$crow->course_id.'/'.$crow->session_id.'/PRESENTATION'.$i)}}">{{"Presentation".$i}}</a></li>
                    @endfor
                </ul>
            </li>
        @endif

        @if($crow->lab_performance_no !=0)
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Lab Performance Marks
                    <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    @for($i=1;$i<=$crow->lab_performance_no;$i++)
                        <li><a href="{{url('/exam/marks/'.$crow->course_id.'/'.$crow->session_id.'/LAB_PERFORMANCE'.$i)}}">{{"Lab Performance".$i}}</a></li>
                    @endfor
                </ul>
            </li>
        @endif

        @if($crow->quiz!=0)
            <li><a href="{{url('/exam/marks/'.$crow->course_id.'/'.$crow->session_id.'/QUIZ')}}">Quiz</a></li>
        @endif

        @if($crow->project!=0)
            <li><a href="{{url('/exam/marks/'.$crow->course_id.'/'.$crow->session_id.'/PROJECT')}}">Project</a></li>
        @endif


        <li><a href="{{url('/exam/marks/'.$crow->course_id.'/'.$crow->session_id.'/ATTENDANCE')}}">Attendance Mark</a></li>

        </ul>
        <br/><br/>
        <table class="table table-bordered">
            <thead>
            <tr>
                <td align="center">Student ID</td>
                <td align="center">Full Name</td>
                <td align="center">Marks</td>
            </tr>
            </thead>
        </table>

        <form action="/final/public/exam/marks/{{$crow->course_id}}/{{$crow->session_id}}/{{$tid}}/details" method="POST">
            @foreach( $student as $sinfo)
                <div class="input-group">
                    <span class="input-group-addon">{{$sinfo->student_id}}</span>
                    <span class="input-group-addon">{{$sinfo->student_name}}</span>
                    @if(Auth::user()->user_type!="Student")
                        <input id="msg" type="text" class="form-control" name="{{$sinfo->student_id}}"  placeholder="">
                    @endif
                </div>
            @endforeach
            <br/><br/>
            @if(Auth::user()->user_type!="Student")
                <div class="form-group row">
                    <div class="col-xs-2">
                        <label for="c">Full Mark</label>
                        <input class="form-control" id="c" name="total_mark" type="text">
                    </div>
                </div>
                 <input type="submit" value="Update">
            @endif

        </form>
    </div>

@endsection