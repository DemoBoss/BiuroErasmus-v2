@extends('layouts.app')
<head>
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>
@section('content')

    <div class="content">
        <div class="title m-b-md">
            BiuroErasmus
        </div>

        <div class="links">
            <a href="{{ url('/import_excel') }}">ImportExcel</a>
            <a href="{{ url('/siatki') }}">Siatki</a>
            <a href="{{ url('/kierunki') }}">Kierunki</a>
            <a href="{{ url('/wybor') }}">Wybór przedmiotów</a>
            <a href="{{ url('/studenci') }}">Studenci</a>
            <a href="{{ url('/prowadzacy') }}">Prowadzący</a>
        </div>
        <div>

            Jeśli chcesz dodać lub zobaczyć siatki kliknij w zakładkę "Kierunki" <br>
            Jeśli chcesz dodać lub zobaczyć przedmioty wybrane na Erasmusa klijnij w zakładkę "Wybór Przedmiotów"

        </div>
    </div>
@endsection