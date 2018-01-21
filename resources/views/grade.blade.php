@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Grade Calculation</h1>

        <!--<img src="https://www.simplilearn.com/ice9/free_resources_article_thumb/clearing-ccna-certification-top-study-tips-for-exam-rar272-article.jpg" style="width:100%;height: 425px">-->
        <div class="row">
            <br class='col-xs-12 button-wrapper'>

        </div> <br>
        <div class="well well-lg"><h4>Input Mark Weights</h4></div>

        <form action="{{url('/exam/marks/'.$crow->course_id.'/'.$crow->session_id.'/gradeshow')}}" method="POST">

            @if($crow->ct_no!=0)
                <div class="form-group row">
                    <div class="col-xs-2">
                        <label for="ex2">CT (%)</label>
                        <input class="form-control" id="ex2" name="ct" type="text">
                    </div>

                </div>
            @endif


            @if($crow->online_no!=0)
                <div class="form-group row">
                    <div class="col-xs-2">
                        <label for="ex2">Online (%)</label>
                        <input class="form-control" id="ex2" name="online" type="text">
                    </div>

                </div>
            @endif

            @if($crow->offline_no!=0)
                <div class="form-group row">
                    <div class="col-xs-2">
                        <label for="ex2">Offline (%)</label>
                        <input class="form-control" id="ex2" name="offline" type="text">
                    </div>
                </div>
            @endif


            @if($crow->lab_performance_no!=0)
                <div class="form-group row">
                    <div class="col-xs-2">
                        <label for="ex2">Lab performance (%)</label>
                        <input class="form-control" id="ex2" name="lab_performance" type="text">
                    </div>

                </div>
            @endif


            @if($crow->viva_no!=0)
                <div class="form-group row">
                    <div class="col-xs-2">
                        <label for="ex2">Viva (%)</label>
                        <input class="form-control" id="ex2" name="viva" type="text">
                    </div>

                </div>
            @endif
            @if($crow->quiz!=0)
                <div class="form-group row">
                    <div class="col-xs-2">
                        <label for="ex2">Quiz (%)</label>
                        <input class="form-control" id="ex2" name="quiz" type="text">
                    </div>

                </div>
            @endif

            @if($crow->presenation_no!=0)
                <div class="form-group row">
                    <div class="col-xs-2">
                        <label for="ex2">Prsentation (%)</label>
                        <input class="form-control" id="ex2" name="presentation" type="text">
                    </div>

                </div>
            @endif

            @if($crow->project!=0)
                <div class="form-group row">
                    <div class="col-xs-2">
                        <label for="ex2">Project (%)</label>
                        <input class="form-control" id="ex2" name="project" type="text">
                    </div>

                </div>
            @endif

                <div class="form-group row">
                    <div class="col-xs-2">
                        <label for="ex2">Attendance (%)</label>
                        <input class="form-control" id="ex2" name="attendance" type="text">
                    </div>

                </div>


            @if($crow->term_final!=0)
                <div class="form-group row">
                    <div class="col-xs-2">
                        <label for="ex2">Term final (%)</label>
                        <input class="form-control" id="ex2" name="term_final" type="text">
                    </div>

                </div>
            @endif

            <input type="submit">
        </form>
    </div>
@endsection
