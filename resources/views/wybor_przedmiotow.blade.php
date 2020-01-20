@extends('layouts.app')
@section('content')
    <div class="container">
        @if(session('komunikat'))
            <div class="alert alert-success">
                {{session('komunikat')}}
            </div>
        @endif
    {{--@foreach($grids as $grid)--}}
            <h1 style="text-align: center"> Wybierz przedmioty na rok {{$rok->name}}</h1>
<div class="container">
    <div style="background-color: blue; color: white; font-weight: bold; padding: 10px; cursor: pointer"
         onclick="toggle('divContent1')"> tutaj bedzie pole z dodanymi juz przedmiotami z tego roku</div>
    <div style="border: 3px solid blue;  padding: 10px"
         id="divContent1">

        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <tr>
                        <th>Przedmioty</th>
                        <th>Forma zaliczenia</th>
                        <th>Wykład</th>
                        <th>Cw/Konw/Lab</th>
                        <th>ECTS</th>
                        <th>Na rok</th>
                        <th>Opis</th>


                    </tr>
                    @if(!is_null($wybrane))
                        @foreach($wybrane as $row)

                            <tr class="rzad">
                                <td>{{ $row->Przedmioty }}</td>
                                <td>{{ $row->Forma_zaliczenia }}</td>
                                <td>{{ $row->Wykład }}</td>
                                <td>{{ $row->Cw_Konw_Lab }}</td>
                                <td>{{ $row->ECTS }}</td>
                                <td>{{ $row->Na_rok }}</td>
                                <td>{{ $row->Opis }}</td>


                            </tr>

                        @endforeach
                    @endif

                </table>
            </div>
        </div>
    <div>

        Jeśli nie widzisz przedmiotów to znaczy, że nie wybrały jeszcze wybrane.

    </div>
    </div>
</div>


<div class="container" style="padding-top: 20px">
    <div style="background-color: blue; color: white; font-weight: bold; padding: 10px; cursor: pointer"
         onclick="toggle('divContent12')">  tutaj bedzie pole z dodanymi juz przedmiotami z tamtego roku roku</div>
    <div style="border: 3px solid blue; padding: 10px"
         id="divContent12">  <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <tr>
                        <th>Przedmioty</th>
                        <th>Forma zaliczenia</th>
                        <th>Wykład</th>
                        <th>Cw/Konw/Lab</th>
                        <th>ECTS</th>
                        <th>Na rok</th>
                        <th>Opis</th>



                    </tr>
                    @if(!is_null($wybrane2))
                        @foreach($wybrane2 as $row)

                            <tr class="rzad">
                                <td>{{ $row->Przedmioty }}</td>
                                <td>{{ $row->Forma_zaliczenia }}</td>
                                <td>{{ $row->Wykład }}</td>
                                <td>{{ $row->Cw_Konw_Lab }}</td>
                                <td>{{ $row->ECTS }}</td>
                                <td>{{ $row->Na_rok }}</td>
                                <td>{{ $row->Opis }}</td>


                            </tr>

                        @endforeach
                    @endif

                </table>
            </div>
        </div>
    <div>

        Jeśli nie widzisz przedmiotów to znaczy, że nie wybrały jeszcze wybrane.

    </div>
    </div>
</div>




            <p>&nbsp;</p>
            <h3  style="padding-top: 20px; text-align: center" class="panel-title">Przedmioty rok I. Siatka z roku {{$grid1}}/{{$grid1+1}}</h3>
            <h5  style=" text-align: center" class="panel-title">Jeśli widzisz siatkę starszą niż rok na który planujesz przedmioty to znaczy, że nie jest jeszcze dostępna.</h5>
            <div style="background-color: blue; color: white; font-weight: bold; padding: 10px; cursor: pointer"
                 onclick="toggle('divContent2')">Rok I semestr zimowy - KLIKNIJ aby zwinąć/rozwinąć</div>
            <div style="border: 3px solid blue; padding: 10px" id="divContent2">
                {{--formularz dodawanie przedmiotu--}}
                <div class="modal-body row">
                    <div class="col-12">

                        <form action="/dodaj_przedmiot">

                            <label>Wpisz nazwę przedmiotu z roku I semestr zimowy: </label>
                            <input class="form-control" id="myInput" type="text" placeholder="Szukaj.."><br/>
                            <input class="hid" type="hidden" name="subject_id">
                            <input class="hid2" type="hidden" name="przedmiot">
                            <input class="hid3" type="hidden" name="forma_zaliczenia">
                            <input class="hid4" type="hidden" name="wyklad">
                            <input class="hid5" type="hidden" name="cw">
                            <input class="hid6" type="hidden" name="ects">
                            <input type="hidden" name="nazwa_roku" value="{{$grid1}}">
                            <input type="hidden" name="opis" value="Rok: I, studia: inżynierskie, semestr: zimowy">


                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Przedmiot</th>
                                    <th>Forma zaliczenia</th>
                                    <th>Wykład</th>
                                    <th>Cwieczenia</th>
                                    <th>ECTS</th>
                                    <th>Semestr</th>
                                    <th>Rok</th>
                                </tr>
                                </thead>
                                <tbody id="myTable">
                                @foreach($subjectsInzs1 as $row)
                                    <tr class="rzad" about="{{$row->id}}" about2="{{$row->Przedmioty}}"
                                            about3="{{$row->Forma_zaliczenia}}"
                                             about4="{{$row->Wykład1}}"
                                            about5="{{$row->Cw_Konw_Lab_1}}"
                                             about6="{{$row->ECTS_s1}}">

                                        <td>{{ $row->Przedmioty }}</td>
                                        <td>{{ $row->Forma_zaliczenia }}</td>
                                        <td>{{ $row->Wykład1 }}</td>
                                        <td>{{ $row->Cw_Konw_Lab_1 }}</td>
                                        <td>{{ $row->ECTS_s1 }}</td>
                                        <td>{{ $row->semestr_1 }}</td>
                                        <td>{{ $row->rok1 }}</td>
                                    </tr>
                                @endforeach
                                </tbody>


                            </table>
                            <button type="submit" class="btn btn-success">Dodaj</button>
                        </form>
                    </div>
                </div>
            </div>

            <div style="background-color: blue; color: white; font-weight: bold; padding: 10px; cursor: pointer"
                 onclick="toggle('divContent3')">Rok I semestr letni - KLIKNIJ aby zwinąć/rozwinąć</div>
            <div style="border: 3px solid blue; padding: 10px" id="divContent3">
                {{--formularz dodawanie przedmiotu--}}
                <div class="modal-body row">
                    <div class="col-12">

                        <form action="/dodaj_przedmiot">
                            <input type="hidden" name="grid" value="{{$grid1}}">
                            <input type="hidden" name="rok" value="{{$grid1}}">
                            {{--<input type="hidden" name="semestr" value="{{$grid1}}">--}}
                            <label>Wpisz nazwę przedmiotu z roku I semestr letni: </label>
                            <input class="form-control" id="myInput" type="text" placeholder="Szukaj.."><br/>
                            <input class="hid" type="hidden" name="subject_id">

                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Przedmiot</th>
                                    <th>Forma zaliczenia</th>
                                    <th>Wykład</th>
                                    <th>Cwieczenia</th>
                                    <th>ECTS</th>
                                    <th>Semestr</th>
                                    <th>Rok</th>
                                </tr>
                                </thead>
                                <tbody id="myTable">
                                @foreach($subjectsInzs2 as $row)
                                    <tr class="rzad" about="{{$row->id}}">
                                        <td>{{ $row->Przedmioty }}</td>
                                        <td>{{ $row->Forma_zaliczenia }}</td>
                                        <td>{{ $row->Wykład2 }}</td>
                                        <td>{{ $row->Cw_Konw_Lab_2 }}</td>
                                        <td>{{ $row->ECTS_s2 }}</td>
                                        <td>{{ $row->semestr_2 }}</td>
                                        <td>{{ $row->rok1 }}</td>
                                    </tr>
                                @endforeach
                                </tbody>


                            </table>
                            <button type="submit" class="btn btn-success">Dodaj</button>
                        </form>
                    </div>
                </div>
            </div>

            <div style="background-color: blue; color: white; font-weight: bold; padding: 10px; cursor: pointer"
                 onclick="toggle('divContent4')">Rok I MAGISTER semestr letni - KLIKNIJ aby zwinąć/rozwinąć</div>
            <div style="border: 3px solid blue; padding: 10px" id="divContent4">
                {{--formularz dodawanie przedmiotu--}}
                <div class="modal-body row">
                    <div class="col-12">

                        <form action="/dodaj_przedmiot">
                            <input type="hidden" name="grid" value="{{$grid1}}">
                            <input type="hidden" name="rok" value="{{$grid1}}">
                            <input type="hidden" name="nazwa_roku" value="{{$grid1}}">
                            <label>Wpisz nazwę przedmiotu z roku I MAGISTER semestr LETNI: </label>
                            <input class="form-control" id="myInput" type="text" placeholder="Szukaj.."><br/>
                            <input class="hid" type="hidden" name="subject_id">
                            <input class="hid2" type="hidden" name="przedmiot">

                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Przedmiot</th>
                                    <th>Forma zaliczenia</th>
                                    <th>Wykład</th>
                                    <th>Cwieczenia</th>
                                    <th>ECTS</th>
                                    <th>Semestr</th>
                                    <th>Rok</th>
                                </tr>
                                </thead>
                                <tbody id="myTable">
                                @foreach($subjectsMgrs1 as $row)
                                    <tr class="rzad" about="{{$row->id}}">
                                        <td>{{ $row->Przedmioty }}</td>
                                        <td>{{ $row->Forma_zaliczenia }}</td>
                                        <td>{{ $row->Wykład1 }}</td>
                                        <td>{{ $row->Cw_Konw_Lab_1 }}</td>
                                        <td>{{ $row->ECTS_s1 }}</td>
                                        <td>{{ $row->semestr_1 }}</td>
                                        <td>{{ $row->rok1 }}</td>
                                    </tr>
                                @endforeach
                                </tbody>


                            </table>
                            <button type="submit" class="btn btn-success">Dodaj</button>
                        </form>
                    </div>
                </div>
            </div>



            <h3  style="padding: 20px 20px; text-align: center" class="panel-title">Przedmioty rok II. Siatka z roku {{$grid2}}/{{$grid2+1}}</h3>
            <div style="background-color: blue; color: white; font-weight: bold; padding: 10px; cursor: pointer"
                 onclick="toggle('divContent5')">Rok II semestr zimowy - KLIKNIJ aby zwinąć/rozwinąć</div>
            <div style="border: 3px solid blue; padding: 10px" id="divContent5">
                {{--formularz dodawanie przedmiotu--}}
                <div class="modal-body row">
                    <div class="col-12">

                        <form action="/dodaj_przedmiot">
                            <input type="hidden" name="grid" value="{{$grid2}}">
                            <input type="hidden" name="rok" value="{{$grid2}}">
                            {{--<input type="hidden" name="semestr" value="{{$grid1}}">--}}
                            <label>Wpisz nazwę przedmiotu z roku II semestr zimowy: </label>
                            <input class="form-control" id="myInput" type="text" placeholder="Szukaj.."><br/>
                            <input class="hid" type="hidden" name="subject_id">

                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Przedmiot</th>
                                    <th>Forma zaliczenia</th>
                                    <th>Wykład</th>
                                    <th>Cwieczenia</th>
                                    <th>ECTS</th>
                                    <th>Semestr</th>
                                    <th>Rok</th>
                                </tr>
                                </thead>
                                <tbody id="myTable">
                                @foreach($subjectsInzs3 as $row)
                                    <tr class="rzad" about="{{$row->id}}">
                                        <td>{{ $row->Przedmioty }}</td>
                                        <td>{{ $row->Forma_zaliczenia }}</td>
                                        <td>{{ $row->Wykład3 }}</td>
                                        <td>{{ $row->Cw_Konw_Lab_3 }}</td>
                                        <td>{{ $row->ECTS_s3 }}</td>
                                        <td>{{ $row->semestr_3 }}</td>
                                        <td>{{ $row->rok2 }}</td>
                                    </tr>
                                @endforeach
                                </tbody>


                            </table>
                            <button type="submit" class="btn btn-success">Dodaj</button>
                        </form>
                    </div>
                </div>
            </div>

            <div style="background-color: blue; color: white; font-weight: bold; padding: 10px; cursor: pointer"
                 onclick="toggle('divContent6')">Rok II semestr letni - KLIKNIJ aby zwinąć/rozwinąć</div>
            <div style="border: 3px solid blue; padding: 10px" id="divContent6">
                {{--formularz dodawanie przedmiotu--}}
                <div class="modal-body row">
                    <div class="col-12">

                        <form action="/dodaj_przedmiot">
                            <input type="hidden" name="grid" value="{{$grid2}}">
                            <input type="hidden" name="rok" value="{{$grid2}}">
                            {{--<input type="hidden" name="semestr" value="{{$grid1}}">--}}
                            <label>Wpisz nazwę przedmiotu z roku II semestr letni: </label>
                            <input class="form-control" id="myInput" type="text" placeholder="Szukaj.."><br/>
                            <input class="hid" type="hidden" name="subject_id">

                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Przedmiot</th>
                                    <th>Forma zaliczenia</th>
                                    <th>Wykład</th>
                                    <th>Cwieczenia</th>
                                    <th>ECTS</th>
                                    <th>Semestr</th>
                                    <th>Rok</th>
                                </tr>
                                </thead>
                                <tbody id="myTable">
                                @foreach($subjectsInzs4 as $row)
                                    <tr class="rzad" about="{{$row->id}}">
                                        <td>{{ $row->Przedmioty }}</td>
                                        <td>{{ $row->Forma_zaliczenia }}</td>
                                        <td>{{ $row->Wykład4 }}</td>
                                        <td>{{ $row->Cw_Konw_Lab_4 }}</td>
                                        <td>{{ $row->ECTS_s4 }}</td>
                                        <td>{{ $row->semestr_4 }}</td>
                                        <td>{{ $row->rok2 }}</td>
                                    </tr>
                                @endforeach
                                </tbody>


                            </table>
                            <button type="submit" class="btn btn-success">Dodaj</button>
                        </form>
                    </div>
                </div>
            </div>

            <div style="background-color: blue; color: white; font-weight: bold; padding: 10px; cursor: pointer"
                 onclick="toggle('divContent7')">Rok II MAGISTER semestr zimowy - KLIKNIJ aby zwinąć/rozwinąć</div>
            <div style="border: 3px solid blue; padding: 10px" id="divContent7">
                {{--formularz dodawanie przedmiotu--}}
                <div class="modal-body row">
                    <div class="col-12">

                        <form action="/dodaj_przedmiot">
                            <input type="hidden" name="grid" value="{{$grid1}}">
                            <input type="hidden" name="rok" value="{{$grid1}}">
                            {{--<input type="hidden" name="semestr" value="{{$grid1}}">--}}
                            <label>Wpisz nazwę przedmiotu z roku I MAGISTER semestr zimowy: </label>
                            <input class="form-control" id="myInput" type="text" placeholder="Szukaj.."><br/>
                            <input class="hid" type="hidden" name="subject_id">

                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Przedmiot</th>
                                    <th>Forma zaliczenia</th>
                                    <th>Wykład</th>
                                    <th>Cwieczenia</th>
                                    <th>ECTS</th>
                                    <th>Semestr</th>
                                    <th>Rok</th>
                                </tr>
                                </thead>
                                <tbody id="myTable">
                                @foreach($subjectsMgrs2 as $row)
                                    <tr class="rzad" about="{{$row->id}}">
                                        <td>{{ $row->Przedmioty }}</td>
                                        <td>{{ $row->Forma_zaliczenia }}</td>
                                        <td>{{ $row->Wykład2 }}</td>
                                        <td>{{ $row->Cw_Konw_Lab_2 }}</td>
                                        <td>{{ $row->ECTS_s2 }}</td>
                                        <td>{{ $row->semestr_2 }}</td>
                                        <td>{{ $row->rok2 }}</td>
                                    </tr>
                                @endforeach
                                </tbody>


                            </table>
                            <button type="submit" class="btn btn-success">Dodaj</button>
                        </form>
                    </div>
                </div>
            </div>
            <div style="background-color: blue; color: white; font-weight: bold; padding: 10px; cursor: pointer"
                 onclick="toggle('divContent8')">Rok II MAGISTER semestr letni - KLIKNIJ aby zwinąć/rozwinąć</div>
            <div style="border: 3px solid blue; padding: 10px" id="divContent8">
                {{--formularz dodawanie przedmiotu--}}
                <div class="modal-body row">
                    <div class="col-12">

                        <form action="/dodaj_przedmiot">
                            <input type="hidden" name="grid" value="{{$grid1}}">
                            <input type="hidden" name="rok" value="{{$grid1}}">
                            {{--<input type="hidden" name="semestr" value="{{$grid1}}">--}}
                            <label>Wpisz nazwę przedmiotu z roku II MAGISTER semestr LETNI: </label>
                            <input class="form-control" id="myInput" type="text" placeholder="Szukaj.."><br/>
                            <input class="hid" type="hidden" name="subject_id">

                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Przedmiot</th>
                                    <th>Forma zaliczenia</th>
                                    <th>Wykład</th>
                                    <th>Cwieczenia</th>
                                    <th>ECTS</th>
                                    <th>Semestr</th>
                                    <th>Rok</th>
                                </tr>
                                </thead>
                                <tbody id="myTable">
                                @foreach($subjectsMgrs3 as $row)
                                    <tr class="rzad" about="{{$row->id}}">
                                        <td>{{ $row->Przedmioty }}</td>
                                        <td>{{ $row->Forma_zaliczenia }}</td>
                                        <td>{{ $row->Wykład3 }}</td>
                                        <td>{{ $row->Cw_Konw_Lab_3 }}</td>
                                        <td>{{ $row->ECTS_s3 }}</td>
                                        <td>{{ $row->semestr_3 }}</td>
                                        <td>{{ $row->rok2 }}</td>
                                    </tr>
                                @endforeach
                                </tbody>


                            </table>
                            <button type="submit" class="btn btn-success">Dodaj</button>
                        </form>
                    </div>
                </div>
            </div>


            <h3  style="padding: 20px 20px; text-align: center" class="panel-title">Przedmioty rok III. Siatka z roku {{$grid3}}/{{$grid3+1}}</h3>
            <div style="background-color: blue; color: white; font-weight: bold; padding: 10px; cursor: pointer"
                 onclick="toggle('divContent9')">Rok III semestr zimowy - KLIKNIJ aby zwinąć/rozwinąć</div>
            <div style="border: 3px solid blue; padding: 10px" id="divContent9">
                {{--formularz dodawanie przedmiotu--}}
                <div class="modal-body row">
                    <div class="col-12">

                        <form action="/dodaj_przedmiot">
                            <input type="hidden" name="grid" value="{{$grid3}}">
                            <input type="hidden" name="rok" value="{{$grid3}}">
                            {{--<input type="hidden" name="semestr" value="{{$grid1}}">--}}
                            <label>Wpisz nazwę przedmiotu z roku III semestr zimowy: </label>
                            <input class="form-control" id="myInput" type="text" placeholder="Szukaj.."><br/>
                            <input class="hid" type="hidden" name="subject_id">

                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Przedmiot</th>
                                    <th>Forma zaliczenia</th>
                                    <th>Wykład</th>
                                    <th>Cwieczenia</th>
                                    <th>ECTS</th>
                                    <th>Semestr</th>
                                    <th>Rok</th>
                                </tr>
                                </thead>
                                <tbody id="myTable">
                                @foreach($subjectsInzs5 as $row)
                                    <tr class="rzad" about="{{$row->id}}">
                                        <td>{{ $row->Przedmioty }}</td>
                                        <td>{{ $row->Forma_zaliczenia }}</td>
                                        <td>{{ $row->Wykład1 }}</td>
                                        <td>{{ $row->Cw_Konw_Lab_5 }}</td>
                                        <td>{{ $row->ECTS_s5 }}</td>
                                        <td>{{ $row->semestr_5 }}</td>
                                        <td>{{ $row->rok3 }}</td>
                                    </tr>
                                @endforeach
                                </tbody>


                            </table>
                            <button type="submit" class="btn btn-success">Dodaj</button>
                        </form>
                    </div>
                </div>
            </div>

            <div style="background-color: blue; color: white; font-weight: bold; padding: 10px; cursor: pointer"
                 onclick="toggle('divContent10')">Rok III semestr letni - KLIKNIJ aby zwinąć/rozwinąć</div>
            <div style="border: 3px solid blue; padding: 10px" id="divContent10">
                {{--formularz dodawanie przedmiotu--}}
                <div class="modal-body row">
                    <div class="col-12">

                        <form action="/dodaj_przedmiot">
                            <input type="hidden" name="grid" value="{{$grid3}}">
                            <input type="hidden" name="rok" value="{{$grid3}}">
                            {{--<input type="hidden" name="semestr" value="{{$grid1}}">--}}
                            <label>Wpisz nazwę przedmiotu z roku III semestr letni: </label>
                            <input class="form-control" id="myInput" type="text" placeholder="Szukaj.."><br/>
                            <input class="hid" type="hidden" name="subject_id">

                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Przedmiot</th>
                                    <th>Forma zaliczenia</th>
                                    <th>Wykład</th>
                                    <th>Cwieczenia</th>
                                    <th>ECTS</th>
                                    <th>Semestr</th>
                                    <th>Rok</th>
                                </tr>
                                </thead>
                                <tbody id="myTable">
                                @foreach($subjectsInzs6 as $row)
                                    <tr class="rzad" about="{{$row->id}}">
                                        <td>{{ $row->Przedmioty }}</td>
                                        <td>{{ $row->Forma_zaliczenia }}</td>
                                        <td>{{ $row->Wykład6 }}</td>
                                        <td>{{ $row->Cw_Konw_Lab_6 }}</td>
                                        <td>{{ $row->ECTS_s6 }}</td>
                                        <td>{{ $row->semestr_6 }}</td>
                                        <td>{{ $row->rok3 }}</td>
                                    </tr>
                                @endforeach
                                </tbody>


                            </table>
                            <button type="submit" class="btn btn-success">Dodaj</button>
                        </form>
                    </div>
                </div>
            </div>

            <h3  style="padding: 20px 20px; text-align: center" class="panel-title">Przedmioty rok IV. Siatka z roku {{$grid4}}/{{$grid4+1}}</h3>
            @if(!is_null($subjectsInzs7))
            <div style="background-color: blue; color: white; font-weight: bold; padding: 10px; cursor: pointer"
                 onclick="toggle('divContent11')">Rok IV semestr zimowy - KLIKNIJ aby zwinąć/rozwinąć</div>
            <div style="border: 3px solid blue; padding: 10px" id="divContent11">
                {{--formularz dodawanie przedmiotu--}}
                <div class="modal-body row">
                    <div class="col-12">

                        <form action="/dodaj_przedmiot">
                            <input type="hidden" name="grid" value="{{$grid4}}">
                            <input type="hidden" name="rok" value="{{$grid4}}">
                            {{--<input type="hidden" name="semestr" value="{{$grid1}}">--}}
                            <label>Wpisz nazwę przedmiotu z roku IV semestr zimowy: </label>
                            <input class="form-control" id="myInput" type="text" placeholder="Szukaj.."><br/>
                            <input class="hid" type="hidden" name="subject_id">

                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Przedmiot</th>
                                    <th>Forma zaliczenia</th>
                                    <th>Wykład</th>
                                    <th>Cwieczenia</th>
                                    <th>ECTS</th>
                                    <th>Semestr</th>
                                    <th>Rok</th>
                                </tr>
                                </thead>
                                <tbody id="myTable">
                                @if(!is_null($subjectsInzs7))
                                @foreach($subjectsInzs7 as $row)
                                    <tr class="rzad" about="{{$row->id}}">
                                        <td>{{ $row->Przedmioty }}</td>
                                        <td>{{ $row->Forma_zaliczenia }}</td>
                                        <td>{{ $row->Wykład7 }}</td>
                                        <td>{{ $row->Cw_Konw_Lab_7 }}</td>
                                        <td>{{ $row->ECTS_s7 }}</td>
                                        <td>{{ $row->semestr_7 }}</td>
                                        <td>{{ $row->rok4 }}</td>
                                    </tr>
                                @endforeach
                                @endif
                                </tbody>


                            </table>
                            <button type="submit" class="btn btn-success">Dodaj</button>
                        </form>
                    </div>
                </div>
            </div>
                @else
                <h4 style="text-align: center">Nie znaleziono w bazie danych siatek na ten rok</h4>
            @endif











            {{--<div class="panel panel-default">--}}
                {{--<div class="panel-heading">--}}

                {{--</div>--}}
                {{--<div class="panel-body">--}}
                    {{--<div class="table-responsive">--}}
                        {{--<table class="table table-bordered table-hover">--}}
                            {{--<tr>--}}
                                {{--<th>Przedmioty</th>--}}
                                {{--<th>Forma zaliczenia</th>--}}
                                {{--<th>Wykład</th>--}}
                                {{--<th>Cw_Konw_Lab_1</th>--}}
                                {{--<th>ECTS_s1</th>--}}
                                {{--<th>semestr_1</th>--}}
                                {{--<th>rok1</th>--}}
                            {{--</tr>--}}

                            {{--{{$grid1}}--}}
                            {{--{{$subjectsMgr}}--}}
                            {{--{{$subjectsInz}}--}}

                            {{--@if(!is_null($subjectsInzs3))--}}
                                {{--@foreach($subjectsInzs3 as $row)--}}
{{--{{$row}}--}}
                                    {{--<tr>--}}
                                        {{--<td>{{ $row->Przedmioty }}</td>--}}
                                        {{--<td>{{ $row->Forma_zaliczenia }}</td>--}}
                                        {{--<td>{{ $row->Wykład1 }}</td>--}}
                                        {{--<td>{{ $row->Cw_Konw_Lab_1 }}</td>--}}
                                        {{--<td>{{ $row->ECTS_s1 }}</td>--}}
                                        {{--<td>{{ $row->semestr_1 }}</td>--}}
                                        {{--<td>{{ $row->rok1 }}</td>--}}
                                    {{--</tr>--}}

                                {{--@endforeach--}}
                            {{--@endif--}}

                        {{--</table>--}}
                        {{--<p>semestr 2</p>--}}
                        {{--<table class="table table-bordered table-hover">--}}
                            {{--<tr>--}}
                                {{--<th>Przedmioty</th>--}}
                                {{--<th>Forma zaliczenia</th>--}}
                                {{--<th>Wykład</th>--}}
                                {{--<th>Cw_Konw_Lab_2</th>--}}
                                {{--<th>ECTS_s2</th>--}}
                                {{--<th>semestr_2</th>--}}
                                {{--<th>rok1</th>--}}
                            {{--</tr>--}}

                            {{--{{$grid1}}--}}
                            {{--{{$subjectsMgr}}--}}
                            {{--{{$subjectsInz}}--}}

                            {{--@if(!is_null($subjectsInzs4))--}}
                                {{--@foreach($subjectsInzs4 as $row)--}}
{{--{{$row}}--}}
                                    {{--<tr>--}}
                                        {{--<td>{{ $row->Przedmioty }}</td>--}}
                                        {{--<td>{{ $row->Forma_zaliczenia }}</td>--}}
                                        {{--<td>{{ $row->Wykład2 }}</td>--}}
                                        {{--<td>{{ $row->Cw_Konw_Lab_2 }}</td>--}}
                                        {{--<td>{{ $row->ECTS_s2 }}</td>--}}
                                        {{--<td>{{ $row->semestr_2 }}</td>--}}
                                        {{--<td>{{ $row->rok1 }}</td>--}}
                                    {{--</tr>--}}

                                {{--@endforeach--}}
                            {{--@endif--}}

                        {{--</table>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}


            {{--<div class="panel panel-default">--}}
                {{--<div class="panel-heading">--}}
                    {{--<h3 class="panel-title">Przedmioty rok I Mgr</h3>--}}
                {{--</div>--}}
                {{--<div class="panel-body">--}}
                    {{--<div class="table-responsive">--}}
                        {{--<table class="table table-bordered table-hover">--}}
                            {{--<tr>--}}
                                {{--<th>Przedmioty</th>--}}
                                {{--<th>Forma zaliczenia</th>--}}
                                {{--<th>Wykład</th>--}}
                                {{--<th>Cw_Konw_Lab_1</th>--}}
                                {{--<th>ECTS_s1</th>--}}
                                {{--<th>semestr_1</th>--}}
                                {{--<th>rok1</th>--}}
                            {{--</tr>--}}

                            {{--{{$grid1}}--}}
                            {{--{{$subjectsMgr}}--}}
                            {{--{{$subjectsInz}}--}}

                            {{--@if(!is_null($subjectsMgrs1))--}}
                                {{--@foreach($subjectsMgrs1 as $row)--}}
{{--{{$row}}--}}
                                    {{--<tr>--}}
                                        {{--<td>{{ $row->Przedmioty }}</td>--}}
                                        {{--<td>{{ $row->Forma_zaliczenia }}</td>--}}
                                        {{--<td>{{ $row->Wykład1 }}</td>--}}
                                        {{--<td>{{ $row->Cw_Konw_Lab_1 }}</td>--}}
                                        {{--<td>{{ $row->ECTS_s1 }}</td>--}}
                                        {{--<td>{{ $row->semestr_1 }}</td>--}}
                                        {{--<td>{{ $row->rok1 }}</td>--}}
                                    {{--</tr>--}}

                                {{--@endforeach--}}
                            {{--@endif--}}

                        {{--</table>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}

            {{--<div class="panel panel-default">--}}
                {{--<div class="panel-heading">--}}
                    {{--<h3 class="panel-title">Przedmioty rok II Inż</h3>--}}
                {{--</div>--}}
                {{--<div class="panel-body">--}}
                    {{--<div class="table-responsive">--}}
                        {{--<table class="table table-bordered table-hover">--}}
                            {{--<tr>--}}
                                {{--<th>Przedmioty</th>--}}
                                {{--<th>Forma zaliczenia</th>--}}
                                {{--<th>Wykład</th>--}}
                                {{--<th>Cw_Konw_Lab_1</th>--}}
                                {{--<th>ECTS_s1</th>--}}
                                {{--<th>semestr_1</th>--}}
                                {{--<th>rok1</th>--}}
                            {{--</tr>--}}

                            {{--{{$grid2}}--}}
                            {{--{{$subjectsMgr}}--}}
                            {{--{{$subjectsInz}}--}}

                            {{--@if(!is_null($subjectsInzs2))--}}
                                {{--@foreach($subjectsInzs2 as $row)--}}
{{--{{$row}}--}}
                                    {{--<tr>--}}
                                        {{--<td>{{ $row->Przedmioty }}</td>--}}
                                        {{--<td>{{ $row->Forma_zaliczenia }}</td>--}}
                                        {{--<td>{{ $row->Wykład1 }}</td>--}}
                                        {{--<td>{{ $row->Cw_Konw_Lab_1 }}</td>--}}
                                        {{--<td>{{ $row->ECTS_s1 }}</td>--}}
                                        {{--<td>{{ $row->semestr_1 }}</td>--}}
                                        {{--<td>{{ $row->rok1 }}</td>--}}
                                    {{--</tr>--}}

                                {{--@endforeach--}}
                            {{--@endif--}}

                        {{--</table>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}

            {{--<div class="panel panel-default">--}}
                {{--<div class="panel-heading">--}}
                    {{--<h3 class="panel-title">Przedmioty rok II Mgr</h3>--}}
                {{--</div>--}}
                {{--<div class="panel-body">--}}
                    {{--<div class="table-responsive">--}}
                        {{--<table class="table table-bordered table-hover">--}}
                            {{--<tr>--}}
                                {{--<th>Przedmioty</th>--}}
                                {{--<th>Forma zaliczenia</th>--}}
                                {{--<th>Wykład</th>--}}
                                {{--<th>Cw_Konw_Lab_1</th>--}}
                                {{--<th>ECTS_s1</th>--}}
                                {{--<th>semestr_1</th>--}}
                                {{--<th>rok1</th>--}}
                            {{--</tr>--}}

                            {{--{{$grid2}}--}}
                            {{--{{$subjectsMgr}}--}}
                            {{--{{$subjectsInz}}--}}

                            {{--@if(!is_null($subjectsMgrs2))--}}
                                {{--@foreach($subjectsMgrs2 as $row)--}}
{{--{{$row}}--}}
                                    {{--<tr>--}}
                                        {{--<td>{{ $row->Przedmioty }}</td>--}}
                                        {{--<td>{{ $row->Forma_zaliczenia }}</td>--}}
                                        {{--<td>{{ $row->Wykład1 }}</td>--}}
                                        {{--<td>{{ $row->Cw_Konw_Lab_1 }}</td>--}}
                                        {{--<td>{{ $row->ECTS_s1 }}</td>--}}
                                        {{--<td>{{ $row->semestr_1 }}</td>--}}
                                        {{--<td>{{ $row->rok1 }}</td>--}}
                                    {{--</tr>--}}

                                {{--@endforeach--}}
                            {{--@endif--}}

                        {{--</table>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}


            {{--<div class="panel panel-default">--}}
                {{--<div class="panel-heading">--}}
                    {{--<h3 class="panel-title">Przedmioty rok III Inż</h3>--}}
                {{--</div>--}}
                {{--<div class="panel-body">--}}
                    {{--<div class="table-responsive">--}}
                        {{--<table class="table table-bordered table-hover">--}}
                            {{--<tr>--}}
                                {{--<th>Przedmioty</th>--}}
                                {{--<th>Forma zaliczenia</th>--}}
                                {{--<th>Wykład</th>--}}
                                {{--<th>Cw_Konw_Lab_1</th>--}}
                                {{--<th>ECTS_s1</th>--}}
                                {{--<th>semestr_1</th>--}}
                                {{--<th>rok1</th>--}}
                            {{--</tr>--}}

                            {{--{{$grid3}}--}}
                            {{--{{$subjectsMgr}}--}}
                            {{--{{$subjectsInz}}--}}

                            {{--@if(!is_null($subjectsInzs3))--}}
                                {{--@foreach($subjectsInzs3 as $row)--}}
{{--{{$row}}--}}
                                    {{--<tr>--}}
                                        {{--<td>{{ $row->Przedmioty }}</td>--}}
                                        {{--<td>{{ $row->Forma_zaliczenia }}</td>--}}
                                        {{--<td>{{ $row->Wykład1 }}</td>--}}
                                        {{--<td>{{ $row->Cw_Konw_Lab_1 }}</td>--}}
                                        {{--<td>{{ $row->ECTS_s1 }}</td>--}}
                                        {{--<td>{{ $row->semestr_1 }}</td>--}}
                                        {{--<td>{{ $row->rok1 }}</td>--}}
                                    {{--</tr>--}}

                                {{--@endforeach--}}
                            {{--@endif--}}

                        {{--</table>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}



            {{--<div class="panel panel-default">--}}
                {{--<div class="panel-heading">--}}
                    {{--<h3 class="panel-title">Przedmioty rok IV Inż</h3>--}}
                {{--</div>--}}
                {{--<div class="panel-body">--}}
                    {{--<div class="table-responsive">--}}
                        {{--<table class="table table-bordered table-hover">--}}
                            {{--<tr>--}}
                                {{--<th>Przedmioty</th>--}}
                                {{--<th>Forma zaliczenia</th>--}}
                                {{--<th>Wykład</th>--}}
                                {{--<th>Cw_Konw_Lab_1</th>--}}
                                {{--<th>ECTS_s1</th>--}}
                                {{--<th>semestr_1</th>--}}
                                {{--<th>rok1</th>--}}
                            {{--</tr>--}}

                            {{--{{$grid4}}--}}
                            {{--{{$subjectsMgr}}--}}
                            {{--{{$subjectsInz}}--}}

                            {{--@if(!is_null($subjectsInzs7))--}}
                                {{--@foreach($subjectsInzs7 as $row)--}}
{{--{{$row}}--}}
                                    {{--<tr>--}}
                                        {{--<td>{{ $row->Przedmioty }}</td>--}}
                                        {{--<td>{{ $row->Forma_zaliczenia }}</td>--}}
                                        {{--<td>{{ $row->Wykład1 }}</td>--}}
                                        {{--<td>{{ $row->Cw_Konw_Lab_1 }}</td>--}}
                                        {{--<td>{{ $row->ECTS_s1 }}</td>--}}
                                        {{--<td>{{ $row->semestr_1 }}</td>--}}
                                        {{--<td>{{ $row->rok1 }}</td>--}}
                                    {{--</tr>--}}

                                {{--@endforeach--}}
                            {{--@endif--}}

                        {{--</table>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}





            {{--@endforeach--}}

    </div>



    {{--sciript filtrujący tabelę userów--}}
    <script>
        $(document).ready(function(){
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myTable tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>


    {{--script do zaznaczania usera w tabeli--}}
    <script>
        $(document).ready(function(){
            // defaultowe ustawienie zaznaczenia na pierwszy rząd tabeli
            $("tr.rzad:first").addClass('table-primary')
            $('input.hid').val($('tr.rzad:first').attr('about'))

            // zaznaczanie innego rzędu onclick
            $("tr.rzad").click(function(){
                // pobieranie id usera
                $('input.hid').val($(this).attr('about'))
                $('input.hid2').val($(this).attr('about2'))
                $('input.hid3').val($(this).attr('about3'))
                $('input.hid4').val($(this).attr('about4'))
                $('input.hid5').val($(this).attr('about5'))
                $('input.hid6').val($(this).attr('about6'))
                $('input.hid7').val($(this).attr('about7'))


                // kolorowanie klikniętego rzędu
                $('tr.rzad').removeClass('table-primary')
                $(this).addClass('table-primary')
            });
        })
    </script>
    <script>
        function toggle(sDivId) {
            var oDiv = document.getElementById(sDivId);
            oDiv.style.display = (oDiv.style.display == "none") ? "block" : "none";
        }
    </script>

@endsection