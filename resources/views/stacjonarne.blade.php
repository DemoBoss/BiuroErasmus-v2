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
            <a id="linki" href="/kierunki/{{$kierunek_id}}/{{$year_id}}" >
                <button type="button" class="btn btn-primary" data-toggle="modal">
                    Wróć do toku studiów
                </button>
            </a>

            <div class="container">
                @if(!is_null($grid))
                <h1 style="text-align: center">Studia stacjonarne  {{$grid->nazwa_siatki}}/{{$grid->nazwa_siatki+1}}</h1>
                @endif
                <h1>Inżynierskie</h1>

@guest

    @else
                    @if(Auth::user()->role_name == "Admin")
                <form method="post" enctype="multipart/form-data" action="{{ url('/importInz') }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="year_id" value="{{$year_id}}">
                    <input type="hidden" name="kierunek_id" value="{{$kierunek_id}}">
                    <input type="hidden" name="stacjonarne" value="{{1}}">
                    <input type="hidden" name="inzynierskie" value="{{1}}">
                    <div class="form-group">
                        <table class="table ">
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
                    @endif
@endguest
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Przedmioty</h3>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <tr>

                                    @guest
                                    @else
                                        @if(Auth::user()->role_name == "Admin")

                                            <th>Usuń przedmiot</th>
                                        @endif
                                    @endguest

                                    <th>Nazwa pliku siatki</th>
                                    <th>Przedmioty</th>
                                    <th>Forma zaliczenia</th>
                                    <th>Wykład</th>
                                    <th>Cw/Konw/Lab</th>
                                    <th>ECTS</th>
                                    <th>Semestr 1</th>
                                    <th>Wykład</th>
                                    <th>Cw/Konw/Lab</th>
                                    <th>ECTS</th>
                                    <th>Semestr 2</th>
                                    <th>Rok 1</th>

                                    <th>Wykład</th>
                                    <th>Cw/Konw/Lab</th>
                                    <th>ECTS</th>
                                    <th>Semestr 3</th>
                                    <th>Wykład</th>
                                    <th>Cw/Konw/Lab</th>
                                    <th>ECTS</th>
                                    <th>Semestr 4</th>
                                    <th>Rok 2</th>

                                    <th>Wykład</th>
                                    <th>Cw/Konw/Lab</th>
                                    <th>ECTS</th>
                                    <th>Semestr 5</th>
                                    <th>Wykład</th>
                                    <th>Cw/Konw/Lab</th>
                                    <th>ECTS</th>
                                    <th>Semestr 6</th>
                                    <th>Rok 2</th>

                                    <th>Wykład</th>
                                    <th>Cw/Konw/Lab</th>
                                    <th>ECTS</th>
                                    <th>Semestr 7</th>
                                    <th>Rok 4</th>


                                </tr>
                                @if(!is_null($subjectsInz))
                                    @foreach($subjectsInz as $row)

                                        <tr class="rzad">
                                            @guest
                                                @else
                                                @if(Auth::user()->role_name == "Admin")



                                            <td>
                                                <form action="/delete_subject">
                                                    <input type="hidden" name="subject_id" value="{{$row->id}}">
                                                    <button type="submit" class=" btn btn-danger" style="margin-top: 10px">Usuń</button>
                                                </form>
                                            </td>
                                                    @endif
                                                @endguest
                                            <td>{{ $row->Nazwa_pliku }}</td>
                                            <td>{{ $row->Przedmioty }}</td>
                                            <td>{{ $row->Forma_zaliczenia }}</td>
                                            <td>{{ $row->Wykład1 }}</td>
                                            <td>{{ $row->Cw_Konw_Lab_1 }}</td>
                                            <td>{{ $row->ECTS_s1 }}</td>
                                            <td>{{ $row->semestr_1 }}</td>
                                            <td>{{ $row->Wykład2 }}</td>
                                            <td>{{ $row->Cw_Konw_Lab_2 }}</td>
                                            <td>{{ $row->ECTS_s2 }}</td>
                                            <td>{{ $row->semestr_2 }}</td>
                                            <td>{{ $row->rok1 }}</td>

                                            <td>{{ $row->Wykład3 }}</td>
                                            <td>{{ $row->Cw_Konw_Lab_3 }}</td>
                                            <td>{{ $row->ECTS_s3 }}</td>
                                            <td>{{ $row->semestr_3 }}</td>
                                            <td>{{ $row->Wykład4 }}</td>
                                            <td>{{ $row->Cw_Konw_Lab_4 }}</td>
                                            <td>{{ $row->ECTS_s4 }}</td>
                                            <td>{{ $row->semestr_4 }}</td>
                                            <td>{{ $row->rok2 }}</td>

                                            <td>{{ $row->Wykład5 }}</td>
                                            <td>{{ $row->Cw_Konw_Lab_5 }}</td>
                                            <td>{{ $row->ECTS_s5 }}</td>
                                            <td>{{ $row->semestr_5 }}</td>
                                            <td>{{ $row->Wykład6 }}</td>
                                            <td>{{ $row->Cw_Konw_Lab_6 }}</td>
                                            <td>{{ $row->ECTS_s6 }}</td>
                                            <td>{{ $row->semestr_6 }}</td>
                                            <td>{{ $row->rok3 }}</td>

                                            <td>{{ $row->Wykład7 }}</td>
                                            <td>{{ $row->Cw_Konw_Lab_7 }}</td>
                                            <td>{{ $row->ECTS_s7 }}</td>
                                            <td>{{ $row->semestr_7 }}</td>
                                            <td>{{ $row->rok4 }}</td>

                                        </tr>

                                    @endforeach
                                @endif

                            </table>
                        </div>
                    </div>
                </div>

                {{--<button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModalInzynier">--}}
                    {{--Dodaj Przedmiot--}}
                {{--</button>--}}

            </div>

            <hr>

            <div class="container">

                <h1>Magisterskie</h1>

                @guest

                @else
                @if(Auth::user()->role_name == "Admin")
                <form method="post" enctype="multipart/form-data" action="{{ url('/importMgr') }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="year_id" value="{{$year_id}}">
                    <input type="hidden" name="kierunek_id" value="{{$kierunek_id}}">
                    <input type="hidden" name="inzynierskie" value="{{0}}">
                    <input type="hidden" name="stacjonarne" value="{{1}}">

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
                @endif
@endguest
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Przedmioty</h3>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <tr>
                                    @guest
                                    @else
                                        @if(Auth::user()->role_name == "Admin")

                                            <th>Usuń przedmiot</th>
                                        @endif
                                    @endguest
                                    <th>Przedmioty</th>
                                    <th>Forma zaliczenia</th>
                                    <th>Wykład</th>
                                    <th>Cw/Konw/Lab</th>
                                    <th>ECTS</th>
                                    <th>Semestr 1</th>
                                    <th>Rok 1</th>

                                    <th>Wykład</th>
                                    <th>Cw/Konw/Lab</th>
                                    <th>ECTS</th>
                                    <th>Semestr 2</th>
                                    <th>Wykład</th>
                                    <th>Cw/Konw/Lab</th>
                                    <th>ECTS</th>
                                    <th>Semestr 3</th>
                                    <th>Rok 2</th>
                                </tr>
                                @if(!is_null($subjectsMgr))
                                    @foreach($subjectsMgr as $row)

                                        <tr class="rzad">
                                            @guest
                                            @else
                                                @if(Auth::user()->role_name == "Admin")
                                                    <td>
                                                        <form action="/delete_subject">
                                                            <input type="hidden" name="subject_id" value="{{$row->id}}">
                                                            <button type="submit" class=" btn btn-danger" style="margin-top: 10px">Usuń</button>
                                                        </form>
                                                    </td>
                                                @endif
                                            @endguest
                                            <td>{{ $row->Przedmioty }}</td>
                                            <td>{{ $row->Forma_zaliczenia }}</td>
                                            <td>{{ $row->Wykład1 }}</td>
                                            <td>{{ $row->Cw_Konw_Lab_1 }}</td>
                                            <td>{{ $row->ECTS_s1 }}</td>
                                            <td>{{ $row->semestr_1 }}</td>
                                            <td>{{ $row->rok1 }}</td>

                                            <td>{{ $row->Wykład2 }}</td>
                                            <td>{{ $row->Cw_Konw_Lab_2 }}</td>
                                            <td>{{ $row->ECTS_s2 }}</td>
                                            <td>{{ $row->semestr_2 }}</td>
                                            <td>{{ $row->Wykład3 }}</td>
                                            <td>{{ $row->Cw_Konw_Lab_3 }}</td>
                                            <td>{{ $row->ECTS_s3 }}</td>
                                            <td>{{ $row->semestr_3 }}</td>
                                            <td>{{ $row->rok2 }}</td>

                                        </tr>

                                    @endforeach
                                @endif

                            </table>
                        </div>
                    </div>
                </div>

                {{--<button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModalMagister">--}}
                    {{--Dodaj Przedmiot--}}
                {{--</button>--}}

            </div>




        {{--Modal do tworzenia Przedmiotu inzynierskich--}}
        <div class="modal fade" id="myModalInzynier">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Tworzenie przedmiotu Inżynier stacjonarne</h4>
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
                            {{--<input type="hidden" name="grid_id" value="{{$grid_id}}">--}}

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




    {{--Modal do tworzenia Przedmiotu magisterkich--}}
    <div class="modal fade" id="myModalMagister">
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
                        {{--<input type="hidden" name="grid_id" value="{{$grid_id}}">--}}

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
    <script>
        $(document).ready(function(){
            // defaultowe ustawienie zaznaczenia na pierwszy rząd tabeli
            $("tr.rzad:first").addClass('table-primary')
            $('input.hid').val($('tr.rzad:first'))

            // zaznaczanie innego rzędu onclick
            $("tr.rzad").click(function(){

                // kolorowanie klikniętego rzędu
                $('tr.rzad').removeClass('table-primary')
                $(this).addClass('table-primary')
            });
        })
    </script>
@endsection