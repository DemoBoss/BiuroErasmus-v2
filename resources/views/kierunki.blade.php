@extends('layouts.app')
@section('content')
    <div class="container">
        @if(session('komunikat'))
            <div class="alert alert-success">
                {{session('komunikat')}}
            </div>
        @endif
            <div class="float-left" style="padding-right: 20px">
                <a href="/">
                    <button type="button" class="btn btn-primary" data-toggle="modal">
                        Wróć do okna głównego
                    </button>
                </a>
            </div>
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModalKierunek">
            Dodaj kierunek
        </button>
            <h2 style="text-align: center;">Wybierz kierunek studiów:</h2>
            <div style="text-align: center; font-size: 20px">
                @foreach($specializations as $specialization)
                <a id="linki" href="/kierunki/{{$specialization->id}}">
                    <div>

                        {{$specialization->nazwa}}

                    </div>
                </a>

            @endforeach

            </div>


        {{--Modal do tworzenia kierunku--}}
        <div class="modal fade" id="myModalKierunek">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Tworzenie kierunku</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Two -->
                    <div class="modal-body">
                        <form action="/tworzenie_kierunku">
                            <label>Podaj nazwę kierunku:</label>
                            <div class="form-group row justify-content-center">

                                <input type="text" class="form-control" name="nazwa_kierunku" required>
                            </div>

                            <div class="row justify-content-center"><button type="submit" class="btn btn-success " >Dodaj</button></div>
                        </form>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection