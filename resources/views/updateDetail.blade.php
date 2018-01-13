@extends('layouts.app')

@section('content')
    <div class="container">
        <!--<img src="http://www.generationy.com/wp-content/uploads/2014/07/why-routine-is-important-849x560.jpg" style="width:100%;height: 425px">-->
        <ul class="nav nav-pills nav-stacked">
            <li class="active"><a href="#">{{$crow->course_id}}{{"\x20Session:\x20"}}{{$crow->session_id}}{{"\x20"}}{{$crow->course_name}}</a></li>
            <li class="active"><a href="#">{{$tid."\x20Marks"}}</a></li>
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

        <form action="/final/public/exam/marks/{{$crow->course_id}}/{{$crow->session_id}}/{{$tid}}/details" method="POST">
            @foreach( $student as $sinfo)
                <div class="input-group">
                    <span class="input-group-addon">{{$sinfo->student_id}}</span>
                    <span class="input-group-addon">{{$sinfo->student_name}}</span>
                    <span class="input-group-addon">{{$sinfo->mark}}</span>
                    <input id="msg" type="text" class="form-control" name="{{$sinfo->student_id}}"  placeholder="">
                </div>
            @endforeach
            <input type="submit">
        </form>
    </div>

@endsection