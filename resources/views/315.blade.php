@extends('layouts.app')

@section('content')
    <div class="container">
        <!--<img src="http://www.generationy.com/wp-content/uploads/2014/07/why-routine-is-important-849x560.jpg" style="width:100%;height: 425px">-->
        <ul class="nav nav-pills nav-stacked">
            <li class="active"><a href="#">CSE 315</a></li>
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Class Test Marks
                    <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="#">CT 1 </a></li>
                    <li><a href="#">CT 2 </a></li>
                    <li><a href="#">CT 3 </a></li>
                </ul>
            </li>
            <li><a href="#">Attendance Mark</a></li>
            <li><a href="#">Term Final Mark</a></li>
        </ul>
        </br></br></br>


        <table class="table table-bordered">
            <thead>
            <tr>
                <td align="center">Student ID</td>
                <td align="center">Full Name</td>
                <td align="center">Mark(20)</td>
            </tr>
            </thead>
        </table>
        @foreach($student as $info)
            <form method="post" action="/exam/abc">
                <div class="input-group">
                    <span class="input-group-addon">{{$info->studentId}}</span>
                    <span class="input-group-addon">{{$info->name}}</span>
                    <input id="msg" type="text" class="form-control" name="mark301" placeholder="">
                </div>

                @endforeach

                <input type="submit" name="submit">
            </form>
    </div>
@endsection