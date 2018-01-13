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
                            <li><a href="#">{{"Online".$i}}</a></li>
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
                            <li><a href="#">{{"Offline".$i}}</a></li>
                        @endfor
                    </ul>
                </li>
            @endif

            <li><a href="#">Attendance Mark</a></li>

            @if($crow->term_final!=0)
                <li><a href="#">Term Final Mark</a></li>
            @endif
        </ul>
        </br></br></br>


        <table class="table table-bordered">
            <thead>
            <tr>
                <td align="center">Student ID</td>
                <td align="center">Full Name</td>
                <td align="center">Marks(20)</td>
            </tr>
            </thead>
        </table>

        <form class="form-horizontal" action="abc" method="POST">
            @foreach( $student as $sinfo)
                <div class="input-group">
                    <span class="input-group-addon">{{$sinfo->student_id}}</span>
                    <span class="input-group-addon">{{$sinfo->student_name}}</span>
                    <input id="msg" type="text" class="form-control" name="{{$sinfo->student_id}}"  placeholder="">
                </div>
            @endforeach
            <input type="submit">
        </form>
    </div>

@endsection