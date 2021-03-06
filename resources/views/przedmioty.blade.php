@extends('layouts.app')
@section('content')
    <div class="container">
        @if(session('komunikat'))
            <div class="alert alert-success">
                {{session('komunikat')}}
            </div>
        @endif

            @if(Auth::user()->role_name == "User")
                <div>
                    <h3 style="text-align: center; padding: 20px">   Nie masz uprawnień!</h3>

                </div>
            @endif

            @if(Auth::user()->role_name == "Admin")
            <h2 style="text-align: center">Wybierz kierunek studiów na które chcesz wybrać przedmioty:</h2>

       <div style="text-align: center; font-size: 20px">
        @foreach($specializations as $specialization)
            <a id="linki" href="/wybor/{{$specialization->id}}">
                <div>

                    {{$specialization->nazwa}}

                </div>
            </a>

        @endforeach
       </div>
                @endif
    </div>
@endsection