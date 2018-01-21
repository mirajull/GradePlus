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
        <div class="well well-lg"><h4>Course Offer Specification</h4></div>

        @if(Auth::user()->user_type!="Student")
            <form action="exam" method="POST" >
                    <div class="form-group row">
                        <div class="col-xs-2">
                            <label for="a">Course Number</label>
                            <input class="form-control" id="a" name="course_id" type="text">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-xs-2">
                            <label for="c">Session</label>
                            <input class="form-control" id="c" name="session_id" type="text">
                        </div>
                    </div>
                <input type="submit" value="Add Course Offer">
            </form>
            <br/>
            @if($error == true )
                <div class="well well-sm" ><h4 style="color:red;">Invalid Course id or Session id!</h4></div>
            @endif
        @endif

    </div>
@endsection
