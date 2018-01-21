@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Courses</h1>

        <!--<img src="https://www.simplilearn.com/ice9/free_resources_article_thumb/clearing-ccna-certification-top-study-tips-for-exam-rar272-article.jpg" style="width:100%;height: 425px">-->
        <div class="row">
            <br class='col-xs-12 button-wrapper'>
            <div class="btn-group">
                <button type="button" class="btn btn-primary">Existing Courses</button>
                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" role="menu">
                    @foreach( $course as $crs)
                        <li><a href="{{url('/exam/marks/'.$crs->course_id.'/'.$crs->session_id)}}">{{$crs->course_id}}{{"\x20Session:"}}{{$crs->session_id}}</a></li>
                    @endforeach
                </ul>
            </div>
        </div> <br>
        <div class="well well-lg"><h4>{{$cid."\x20"."Session:".$sid}}Enrolled Students</h4></div>

        {{--<div class="well well-lg"><h4>{{$data['course_id']}}{{"\x20"}}{{"\x20Session:"}}{{$data['session_id']}}</h4></div>--}}

        <form action="{{url('/exam/marks/'.$cid.'/'.$sid.'/addStudent/store')}}" method="POST">

            <table class="table table-bordered">
                <thead>
                <tr>
                    <td align="center">Student ID</td>
                    <td align="center">Student Name</td>
                </tr>
                </thead>

            </table>

            @if($student != null)

                @foreach( $student as $sinfo)
                    <div class="input-group">
                        <span class="input-group-addon">{{$sinfo->student_id}}</span>
                        <span class="input-group-addon">{{$sinfo->student_name}}</span>
                    </div>
                @endforeach
            @endif

            <div class="form-group row">
                <div class="col-xs-2">
                    <label for="ex2">Student Id</label>
                    <input class="form-control" id="ex2" name="student_id" type="text">
                </div>
            </div>

            <input type="submit" value="Add Student">
        </form>
    </div>
@endsection
