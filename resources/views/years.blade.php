@extends('layouts.app')
@section('content')
    <div class="container">
        @if(session('komunikat'))
            <div class="alert alert-success">
                {{session('komunikat')}}
            </div>
        @endif
        <h3 style="text-align: center">Wybierz rok akademicki:</h3>
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModalYears">
            Dodaj rok
        </button>
<div style="text-align: center">
        @foreach($lata as $year)
            <a id="linki" href="/kierunki/{{$kierunek->id}}/{{$year->id}}">
                <div>

                    {{$year->name}}

                </div>
            </a>

        @endforeach
</div>



        {{--Modal do tworzenia kierunku--}}
        <div class="modal fade" id="myModalYears">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Tworzenie Roku</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Two -->
                    <div class="modal-body">
                        <form action="/tworzenie_roku">
                            <label>Podaj nazwę roku:</label>
                            <div class="form-group row justify-content-center">
                                <input type="hidden" name="specialization_id" value="{{$kierunek->id}}"/>
                                <input type="text" class="form-control" name="nazwa_roku" required>
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