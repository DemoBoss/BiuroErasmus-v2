@extends('layouts.app')
@section('content')
    <div class="container">

       <a href="/prowadzacy">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModalComment">
            Wróć do prowadzących
        </button>
       </a>
    <div class="col-4 mx-auto" style="text-align: center; font-size: 20px">

            <div>
                <div id="Second-line"> {{$teacher->name}}</div>
                <hr style="height: 2px; border:1px; background:  #1b1e21; border-radius: 30px">


                <div id="Second-line">E-mail: {{$teacher->email}}</div>
                <div id="Second-line">Numer telefonu: {{$teacher->phone}}</div>
                <div id="Second-line">Język: {{$teacher->language}}</div>

            </div>

        </div>

    </div>
@endsection
