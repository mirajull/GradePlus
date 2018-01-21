@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{$crow->course_id."\x20 Session:".$crow->session_id}}</h1>

        <!--<img src="https://www.simplilearn.com/ice9/free_resources_article_thumb/clearing-ccna-certification-top-study-tips-for-exam-rar272-article.jpg" style="width:100%;height: 425px">-->
        <div class="row">
            <br class='col-xs-12 button-wrapper'>

        </div> <br>
        <div class="well well-lg"><h3>GradeSheet</h3></div>



        <table class="table table-bordered">
            <thead>
            <tr>
                <td align="center">Student ID</td>
                <td align="center">Student Name</td>
                <td align="center">Total Mark(out of 100)</td>
                <td align="center">Grade</td>


            </tr>
            </thead>
        </table>

        <form>
            @foreach( $student as $sinfo)
                <div class="input-group">
                    <span class="input-group-addon">{{$sinfo->student_id}}</span>
                    <span class="input-group-addon">{{$sinfo->student_name}}</span>
                    <span class="input-group-addon">{{$sinfo->final_mark}}</span>
                    <span class="input-group-addon">{{$sinfo->grade}}</span>
                </div>
            @endforeach
        </form>
    </div>

@endsection