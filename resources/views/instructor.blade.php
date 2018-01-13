@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Examinations</h1>

        <!--<img src="https://www.simplilearn.com/ice9/free_resources_article_thumb/clearing-ccna-certification-top-study-tips-for-exam-rar272-article.jpg" style="width:100%;height: 425px">-->
        <div class="row">
            <br class='col-xs-12 button-wrapper'>
            <div class="btn-group">
                <button type="button" class="btn btn-primary">Manage Existing Courses</button>
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
        <div class="well well-lg"><h4>{{$cid."\x20"."Session:".$sid}} Instructors</h4></div>

        {{--<div class="well well-lg"><h4>{{$data['course_id']}}{{"\x20"}}{{"\x20Session:"}}{{$data['session_id']}}</h4></div>--}}

        <form action="/final/public/exam/instructor/{{$cid}}/{{$sid}}/more" method="POST">

            <table class="table table-bordered">
                <thead>
                <tr>
                    <td align="center">Teacher ID</td>
                    <td align="center">Teacher Name</td>
                </tr>
                </thead>

            </table>

            @if($instructors != null)

                @foreach( $instructors as $insinfo)
                    <div class="input-group">
                        <span class="input-group-addon">{{$insinfo->teacher_id}}</span>
                        <span class="input-group-addon">{{$insinfo->teacher_name}}</span>
                    </div>
                @endforeach
            @endif

            <div class="form-group row">
                <div class="col-xs-2">
                    <label for="ex2">Instructor Id</label>
                    <input class="form-control" id="ex2" name="teacher_id" type="text">
                </div>
            </div>

            <input type="submit">
        </form>
    </div>
@endsection
