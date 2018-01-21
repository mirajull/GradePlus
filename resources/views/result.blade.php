@extends('layouts.app')

@section('content')
    <div class="container">
        <h1> Result </h1>


        <div class="well well-lg"><h4>View GPA on a session</h4></div>

        <form action="{{url('/sheet/gpashow')}}" method="POST">
            <div class="form-group row">
                @if(Auth::user()->user_type != "Student")
                    <div class="col-xs-2">
                        <label for="ex2">Student_id</label>
                        <input class="form-control" id="ex2" name="std_id" type="text">
                    </div>
                @endif
                <div class="col-xs-2">
                    <label for="ex2">Session_id</label>
                    <input class="form-control" id="ex2" name="session_id" type="text">
                </div>
            </div>
            <input type="submit" value="View GPA">
        </form>


    </div>
@endsection
