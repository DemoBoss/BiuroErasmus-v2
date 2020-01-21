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
            <a style="font-size: 30px" href="{{ url('/kierunki') }}">Kierunki</a>
            @if(Auth::check())
                <a style="font-size: 30px" href="{{ url('/wybor') }}">Wybór przedmiotów</a>
                <a style="font-size: 30px" href="{{ url('/prowadzacy') }}">Prowadzący</a>
            @endif



        </div>
        <div class="container" style="padding-top: 20px; ">
            <div class="row row-cols-2">
                <div class="col" >
            <div class="card text-white bg-primary mb-3">

                <div class="card-body">
                    <h5 class="card-text">Jeśli chcesz dodać lub zobaczyć siatki kliknij w zakładkę "Kierunki"</h5>
                </div>
            </div>
                </div>
                @if(Auth::check())
                <div class="col">
                 <div class="card text-white bg-primary mb-3">

                <div class="card-body">
                    <h5 class="card-text">Jeśli chcesz dodać lub zobaczyć przedmioty wybrane na Erasmusa klijnij w zakładkę "Wybór Przedmiotów"</h5>
                </div>
                 </div>
             </div>


            </div>
            <div class="row row-cols-2">
                <div class="col" >
                    <div class="card text-white bg-primary mb-3">

                        <div class="card-body">
                            <h5 class="card-text">Jeśli chcesz sprawdzić dane prowadzącego lub dodać go kliknij w zakładkę "Prowadzący"</h5>
                        </div>
                    </div>
                </div>
            </div>
            @endif

        </div>
        <div><a style="font-size: 30px" href="{{ url('/dynamic_pdf') }}">PDF z wybranymi przedmiotami</a></div>
    </div>
@endsection