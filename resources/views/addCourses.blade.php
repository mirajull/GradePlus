@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Add Courses</h1>

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
                        <li><a href="">{{$crs->course_id}}{{"\x20:"}}{{$crs->course_name}}</a></li>
                    @endforeach
                </ul>
            </div>
        </div> <br>
        {{--<div class="well well-lg"><h4>Added Courses</h4></div>--}}

        {{--<div class="well well-lg"><h4>{{$data['course_id']}}{{"\x20"}}{{"\x20Session:"}}{{$data['session_id']}}</h4></div>--}}

        <form method="POST" action="{{ url('/addCourses') }}">

            {{--<table class="table table-bordered">--}}
                {{--<thead>--}}
                {{--<tr>--}}
                    {{--<td align="center">Course ID</td>--}}
                    {{--<td align="center">Course Name</td>--}}
                {{--</tr>--}}
                {{--</thead>--}}

            {{--</table>--}}

            {{--@if($course != null)--}}

                {{--@foreach( $course as $cinfo)--}}
                    {{--<div class="input-group">--}}
                        {{--<span class="input-group-addon">{{$cinfo->course_id}}</span>--}}
                        {{--<span class="input-group-addon">{{$cinfo->course_name}}</span>--}}
                    {{--</div>--}}
                {{--@endforeach--}}
            {{--@endif--}}

            <div class="form-group row">
                <div class="col-xs-2">
                    <label for="ex2">Course Id</label>
                    <input class="form-control" id="ex2" name="course_id" type="text">
                </div>
                <div class="col-xs-2">
                    <label for="ex2">Course Name</label>
                    <input class="form-control" id="ex2" name="course_name" type="text">
                </div>
            </div>

            <h4>Course Type</h4>
            <div class="radio">
                <label><input type="radio" name="course_type" value="theory">Theory</label>
            </div>
            <div class="radio">
                <label><input type="radio" name="course_type" value="sessional">Sessional</label>
            </div>

            <h4>Credit Hours</h4>
            <div class="radio">
                <label><input type="radio" name="credit" value="4.0">4.0</label>
            </div>
            <div class="radio">
                <label><input type="radio" name="credit" value="3.0">3.0</label>
            </div>
            <div class="radio">
                <label><input type="radio" name="credit" value="2.0">2.0</label>
            </div>
            <div class="radio">
                <label><input type="radio" name="credit" value="1.5">1.5</label>
            </div>
            <div class="radio">
                <label><input type="radio" name="credit" value="0.75">0.75</label>
            </div>

            <input type="submit">
        </form>
    </div>
@endsection
