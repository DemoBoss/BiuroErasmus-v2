@extends('layouts.app')
@section('content')
<div class="container">
    @if(session('komunikat'))
        <div class="alert alert-success">
            {{session('komunikat')}}
        </div>
    @endif
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModalComment">
    Dodaj siatkę
</button>

@foreach($grids as $grid)
    <a id="linki" href="/siatki/{{$grid->id}}">
    <div>

        {{$grid->nazwa_siatki}}

    </div>
    </a>

@endforeach






{{--Modal do tworzenia komentarza--}}
<div class="modal fade" id="myModalComment">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Tworzenie komentarza</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Two -->
            <div class="modal-body">
                <form action="/tworzenie_siatki">
                    <label>Podaj nazwę siatki:</label>
                    <div class="form-group row justify-content-center">

                        <input type="text" class="form-control" name="nazwa_siatki" required>
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