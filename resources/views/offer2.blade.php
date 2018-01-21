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

        <div class="well well-lg"><h4>{{$data['course_id']}}{{"\x20"}}{{"\x20Session:"}}{{$data['session_id']}}</h4></div>

        <form action="exam/instructor/{{$data['course_id']}}/{{$data['session_id']}}/zero" method="POST">


            @if($exam_ids[2] == true)
                <div class="form-group row">
                    <div class="col-xs-2">
                        <label for="ex2">Total CT count</label>
                        <input class="form-control" id="ex2" name="ct_no" type="text">
                    </div>
                    <div class="col-xs-2">
                        <label for="ex2">Best CT Count</label>
                        <input class="form-control" id="ex2" name="best_ct_no" type="text">
                    </div>
                </div>
            @endif

            @if($exam_ids[3] == true)
                <div class="form-group row">
                    <div class="col-xs-2">
                        <label for="ex2">Total Online count</label>
                        <input class="form-control" id="ex2" name="online_no" type="text">
                    </div>
                    <div class="col-xs-2">
                        <label for="ex2">Best Online Count</label>
                        <input class="form-control" id="ex2" name="best_online_no" type="text">
                    </div>
                </div>
            @endif

            @if($exam_ids[4] == true)
                <div class="form-group row">
                    <div class="col-xs-2">
                        <label for="ex2">Total Offline count</label>
                        <input class="form-control" id="ex2" name="offline_no" type="text">
                    </div>
                    <div class="col-xs-2">
                        <label for="ex2">Best Offline Count</label>
                        <input class="form-control" id="ex2" name="best_offline_no" type="text">
                    </div>
                </div>
            @endif


            @if($exam_ids[5] == true)
                <div class="form-group row">
                    <div class="col-xs-2">
                        <label for="ex2">Total Lab Performance</label>
                        <input class="form-control" id="ex2" name="lab_performance_no" type="text">
                    </div>
                    <div class="col-xs-2">
                        <label for="ex2">Best Lab Performance</label>
                        <input class="form-control" id="ex2" name="best_lab_performance_no" type="text">
                    </div>
                </div>
            @endif

            @if($exam_ids[6] == true)
                <div class="form-group row">
                    <div class="col-xs-2">
                        <label for="ex2">Total Viva count</label>
                        <input class="form-control" id="ex2" name="viva_no" type="text">
                    </div>
                    <div class="col-xs-2">
                        <label for="ex2">Best Viva Count</label>
                        <input class="form-control" id="ex2" name="best_viva_no" type="text">
                    </div>
                </div>
            @endif

            @if($exam_ids[9] == true)
                <div class="form-group row">
                    <div class="col-xs-1">
                        <label for="ex2">Project</label>
                        <input class="form-control" id="ex2" name="project" type="text">
                    </div>
                </div>
            @endif

            @if($exam_ids[8] == true)
                <div class="form-group row">
                    <div class="col-xs-1">
                        <label for="ex2">Quiz</label>
                        <input class="form-control" id="ex2" name="quiz" type="text">
                    </div>
                </div>
            @endif

            @if($exam_ids[7] == true)
                <div class="form-group row">
                    <div class="col-xs-1">
                        <label for="ex2">Presentation</label>
                        <input class="form-control" id="ex2" name="presenation_no" type="text">
                    </div>
                </div>
            @endif
        <input type="submit">
        </form>
    </div>
@endsection
