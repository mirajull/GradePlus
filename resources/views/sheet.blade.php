@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Grade Sheets</h1>

        <div class="well well-lg"><h4>View Course Grade Sheets</h4></div>

        <form action="{{url('/sheet/gradeshow')}}" method="POST">
            <div class="form-group row">
                <div class="col-xs-2">
                    <label for="ex2">Course_id</label>
                    <input class="form-control" id="ex2" name="course_id" type="text">
                </div>
                <div class="col-xs-2">
                    <label for="ex2">Session_id</label>
                    <input class="form-control" id="ex2" name="session_id" type="text">
                </div>
            </div>
            <input type="submit" value="View gradesheet">
        </form>

        <br/><br/>


    </div>
@endsection
