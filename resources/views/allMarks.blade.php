@extends('layouts.app')

@section('content')
    <div class="container">
        <!--<img src="http://www.generationy.com/wp-content/uploads/2014/07/why-routine-is-important-849x560.jpg" style="width:100%;height: 425px">-->
        <ul class="nav nav-pills nav-stacked">
            <li class="active"><a href="#">{{$crow->course_id}}{{"\x20Session:\x20"}}{{$crow->session_id}}</a></li>

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

            @if(Auth::user()->user_type!="Student")
                <li><a href="{{url('/exam/marks/'.$crow->course_id.'/'.$crow->session_id.'/instructor')}}">Add Instructor</a></li>
            @endif

            @if(Auth::user()->user_type!="Student")
                <li><a href="{{url('/exam/marks/'.$crow->course_id.'/'.$crow->session_id.'/addStudent')}}">Add Student</a></li>
            @endif

            @if(Auth::user()->user_type!="Student")
                <li><a href="{{url('/exam/marks/'.$crow->course_id.'/'.$crow->session_id.'/addLink')}}">Add Assesment Link</a></li>
            @endif
        </ul>

        {{--<a href="https://docs.google.com/spreadsheets/d/1rpYnVXeodTnYLcMTqVoSJvM7SbRK1T0v4bmJ-s3ButU/edit#gid=0">Continuous Assesment Link</a>--}}

        <br/><br/><br/>

        @if(Auth::user()->user_type!="Student")
            <a href="{{url('/exam/marks/'.$crow->course_id.'/'.$crow->session_id.'/grade')}}" class="btn btn-info" role="button">Calculate Total Grade</a>
        @endif
        <br/>
        <br/>
        <br/>
        <a href="{{url('/sheet/gradeshow2/'.$crow->course_id.'/'.$crow->session_id)}}" class="btn btn-info" role="button">View Total Grade</a>

        {{--<form action="{{url('/sheet/gradeshow')}}" method="POST">--}}
            {{--<input type="submit" value="View total Grades">--}}
        {{--</form>--}}

        <br/>
        <br/>
        <br/>

        <div class="container">
            <div class="jumbotron">
                <h2>Forum Posts</h2>
            </div>

        </div>

        @foreach($pathao as $p)

            <div class="container">
                <div class="jumbotron">
                    <h4>{{$p->created_at}}{{":\x20"}}{{$p->post}}</h4>
                </div>

            </div>
         @endforeach
    </div>

@endsection