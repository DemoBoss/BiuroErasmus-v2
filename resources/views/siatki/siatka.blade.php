@extends('layouts.app')
@section('content')
    <div class="container">
    @if(session('komunikat'))
        <div class="alert alert-success">
            {{session('komunikat')}}
        </div>
    @endif

        @if(count($errors) > 0)
            <div class="alert alert-danger">
                Upload Validation Error<br><br>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
        @endif
        <form method="post" enctype="multipart/form-data" action="{{ url('/import') }}">
            {{ csrf_field() }}
            <input type="hidden" name="grid_id" value="{{$grid_id}}">
            <div class="form-group">
                <table class="table">
                    <tr>
                        <td width="40%" align="right"><label>Select File for Upload</label></td>
                        <td width="30">
                            <input type="file" name="select_file" />
                        </td>
                        <td width="30%" align="left">
                            <input type="submit" name="upload" class="btn btn-primary" value="Upload">
                        </td>
                    </tr>
                    <tr>
                        <td width="40%" align="right"></td>
                        <td width="30"><span class="text-muted">.xls, .xslx</span></td>
                        <td width="30%" align="left"></td>
                    </tr>
                </table>
            </div>
        </form>

        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModalComment">
            Dodaj Przedmiot
        </button>


        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Przedmioty</h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>Nazwa przedmiotu</th>
                            <th>Godziny</th>
                            <th>ECTS</th>
                            <th>Prowadzący</th>
                            <th>Język</th>
                            <th>Semestr</th>
                        </tr>
                        @foreach($subjects as $row)
                            <tr>
                                <td>{{ $row->nazwa_przedmiotu }}</td>
                                <td>{{ $row->godziny }}</td>
                                <td>{{ $row->ECTS }}</td>
                                <td>{{ $row->nauczyciel }}</td>
                                <td>{{ $row->jezyk }}</td>
                                <td>{{ $row->semestr }}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>



        {{--Modal do tworzenia Przedmiotu--}}
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
                        <form action="/tworzenie_przedmiotu">
                            <label>Wprowadź Przedmiot:</label>
                            <div class="form-group row justify-content-center">

                                <input type="text" class="form-control" name="nazwa_przedmiotu" required>
                            </div>
                            <label>Wprowadź godziny:</label>
                            <div class="form-group row justify-content-center">

                                <input type="text" class="form-control" name="godziny" required>
                            </div>
                            <label>Wprowadź ECTS:</label>
                            <div class="form-group row justify-content-center">

                                <input type="number" class="form-control" name="ECTS" required>
                            </div>
                            <label>Wprowadź nauczyciela:(opcjonalnie)</label>
                            <div class="form-group row justify-content-center">

                                <input type="text" class="form-control" name="nauczyciel" >
                            </div>
                            <label>Wprowadź język:</label>
                            <div class="form-group row justify-content-center">

                                <input type="text" class="form-control" name="jezyk" required>
                            </div>
                            <label>Wprowadź semestr:</label>
                            <div class="form-group row justify-content-center">

                                <input type="text" class="form-control" name="semestr" required>
                            </div>
                            <input type="hidden" name="grid_id" value="{{$grid_id}}">

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