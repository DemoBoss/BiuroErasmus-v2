@extends('layouts.app')
@section('content')
    <div class="container">

    {{--content postu wrac z info o userze--}}
    <div class="row">
        <div id="Post" class="col-4" style="max-height: 450px; min-width: 150px;">
            <div>
                {{--<div><img class="img-fluid rounded mx-auto d-block" src="{{ \App\Http\Controllers\CommentController::getAvatar($user->avatar_id)}}" height="60%" width="60%"></div>--}}
                <div id="Second-line">{{$student->name}}</div>
                <hr style="height: 3px; border:2px; background:  #1b1e21; border-radius: 30px">


                <div id="Second-line">{{$student->role_name}}</div>
                <div id="Second-line">{{$student->role_name}}</div>
                <div id="Second-line">{{$student->role_name}}</div>
                <div id="Second-line">{{$student->role_name}}</div>
            </div>

        </div>
        <div id="TematContent" class="panel panel-default col-7">
            <div class="panel-body">Przedmioty:</div>
        </div>
    </div>
    </div>
@endsection
