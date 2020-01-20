@extends('layouts.app')
@section('content')
    <div class="container" style="text-align: center">
<h3 style="text-align: center">Wybierz tok studiów:</h3>

            <a href="/kierunki/{{$kierunek_id}}/{{$year_id}}/stacjonarne" >Studia stacjonarne</a>
        <br>
            <a href="/kierunki/{{$kierunek_id}}/{{$year_id}}/niestacjonarne" >Studia niestacjonarne</a>
    </div>
@endsection