@extends('layouts.app')

@section('content')
    <div class="container">
        {{--<h1>{{$crow->course_id."\x20 Session:".$crow->session_id}}</h1>--}}

        <!--<img src="https://www.simplilearn.com/ice9/free_resources_article_thumb/clearing-ccna-certification-top-study-tips-for-exam-rar272-article.jpg" style="width:100%;height: 425px">-->
        <div class="row">
            <br class='col-xs-12 button-wrapper'>

        </div> <br>
        <div class="well well-lg"><h1>Result</h1></div>

            <div class="well well-lg"><h6>{{"Student Id:\x20"}}{{$std_id}}{{"\x20\x20"}}</h6></div>
            <div class="well well-lg"><h6>{{"Session:\x20"}}{{$sid}}{{"\x20\x20"}}</h6></div>
            <div class="well well-lg"><h6>GPA : {{$gpa}}</h6></div>
            <div class="well well-lg"><h6>CGPA : {{$cgpa}}</h6></div>

            <table class="table table-bordered">
                <thead>
                <tr>
                    <td align="center">Offer ID</td>
                    <td align="center">Grade</td>

                </tr>
                </thead>
            </table>

            @foreach( $student as $sinfo)
                {{--<div class="well well-lg"><h4>{{$sinfo->offer_id}}{{"\x20Grade:\x20"}}{{$sinfo->grade}}</h4></div>--}}
                {{--<div class="well well-lg"><h4>{{$sinfo->grade}}</h4></div>--}}
                {{--<div class="input-group">--}}
                    {{--<span class="input-group-addon">{{$sinfo->offer_id}}</span>--}}
                    {{--<span class="input-group-addon">{{$sinfo->grade}}</span>--}}

                {{--</div>--}}
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <td align="center">{{$sinfo->offer_id}}</td>
                        <td align="center">{{$sinfo->grade}}</td>

                    </tr>
                    </thead>
                </table>
            @endforeach

            <br/>
            <br/>

    </div>

@endsection