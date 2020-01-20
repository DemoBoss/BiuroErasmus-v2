@extends('layouts.app')
@section('content')
    <div class="container" >

            <a href="/kierunki">
                <button type="button" class="btn btn-primary" data-toggle="modal">
                    Wróć do kierunków
                </button>
            </a>

<h3 style="text-align: center">Wybierz tok studiów:</h3>
<div style="text-align: center ; font-size: 20px">
            <a id="linki" href="/kierunki/{{$kierunek_id}}/{{$year_id}}/stacjonarne" >Studia stacjonarne</a>
        <br>
            <a id="linki" href="/kierunki/{{$kierunek_id}}/{{$year_id}}/niestacjonarne" >Studia niestacjonarne</a>
    </div>
    </div>
@endsection