@extends('layouts.app')
@section('content')
    <div class="container">
    @if(session('komunikat'))
        <div class="alert alert-success">
            {{session('komunikat')}}
        </div>
    @endif
        <div>
        <div class="float-left" style="padding-right: 20px">
            <a href="/">
                <button type="button" class="btn btn-primary" data-toggle="modal">
                    Wróć do okna głównego
                </button>
            </a>
        </div>
        <div>
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModalComment">
        Dodaj prowadzacego
    </button>
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#moderator">
            Zarządzaj
    </button>


        </div>

        </div>

        <h3 style="text-align: center; padding: 20px">Wybierz prowadzącego w celu sprawdzenia danych kontaktowych:</h3>
        <div style="text-align: center; font-size: 20px;">
    @foreach($teachers as $teacher)
        <a id="linki" href="/prowadzacy/{{$teacher->id}}">
            <div>

                {{$teacher->name}}

            </div>
        </a>

    @endforeach
        </div>
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
                    <form action="/dodaj_prowadzacego">
                        <label>Imię i nazwisko prowadzącego:</label>
                        <div class="form-group row justify-content-center">
                            <input type="text" class="form-control" name="name" required>
                        </div>

                        <label>Wprowadź e-mail prowadzącego:</label>
                        <div class="form-group row justify-content-center">
                            <input type="text" class="form-control" name="email" required>
                        </div>

                        <label>Wprowadź numer telefonu prowadzącego:</label>
                        <div class="form-group row justify-content-center">
                            <input type="text" class="form-control" name="phone" required>
                        </div>


                        <label>Język:</label>
                        <div class="form-group row justify-content-center">

                            <input type="text" class="form-control" name="language" required>
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
        {{--modal do zarządzania maderatorami--}}
        <div class="modal fade " id="moderator">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Moderatorzy</h4>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body row">
                        <p style="margin-left: 20px">Lista prowadzących</p>
                        {{--tabela z moderatorami--}}
                        <input class="form-control" id="myInput2" type="text" placeholder="Szukaj.."><br/>
                        <input class="hid" type="hidden" name="user_id">
                        <div class="col-12" style="height: 250px; overflow:auto;">
                            <table class="table table-hover" style="height: 50%">
                                <thead>
                                <tr>
                                    <th>Login</th>
                                    <th>Email</th>
                                    <th style="text-align: right">Usuń</th>
                                </tr>
                                </thead>
                                <tbody id="myTable2">
                                @foreach($teachers as $teacher)
                                    <tr class="rzad2" about="{{$teacher->id}}">
                                        <td>{{$teacher->name}}</td>
                                        <td>{{$teacher->email}}</td>
                                        <td><form action="usun_moderatora">
                                                <input type="hidden" name="login" value="{{$teacher->name}}">
                                                <button type="submit" class="close" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </form>
                                        </td>

                                    </tr>
                                @endforeach

                                </tbody>
                            </table>


                        </div>
                    </div>

                    {{--formularz dodawanie nowego moderatora--}}
                    <div class="modal-body row">
                        <div class="col-12">
                            <label>Nowy prowadzący</label>
                            <form action="nowy_moderator">
                                <label>Wpisz login użytkownika: </label>
                                <input class="form-control" id="myInput" type="text" placeholder="Szukaj.."><br/>
                                <input class="hid" type="hidden" name="user_id">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>Login</th>
                                        <th>Email</th>
                                    </tr>
                                    </thead>
                                    <tbody id="myTable">
                                    @foreach($students as $student)
                                        <tr class="rzad" about="{{$student->id}}">
                                            <td>{{$student->name}}</td>
                                            <td>{{$student->email}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <button type="submit" class="btn btn-success">Dodaj</button>
                            </form>
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Zamknij</button>
                    </div>

                </div>
            </div>
        </div>
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
    {{--sciript filtrujący tabelę prowadzacych--}}
    <script>
        $(document).ready(function(){
            $("#myInput2").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myTable2 tr").filter(function() {
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

                // kolorowanie klikniętego rzędu
                $('tr.rzad').removeClass('table-primary')
                $(this).addClass('table-primary')
            });
        })
    </script>
    {{--script do zaznaczania prowadzacego w tabeli--}}
    <script>
        $(document).ready(function(){
            // defaultowe ustawienie zaznaczenia na pierwszy rząd tabeli
            $("tr.rzad2:first").addClass('table-primary')
            $('input.hid').val($('tr.rzad:first').attr('about'))

            // zaznaczanie innego rzędu onclick
            $("tr.rzad2").click(function(){
                // pobieranie id usera
                $('input.hid').val($(this).attr('about'))

                // kolorowanie klikniętego rzędu
                $('tr.rzad2').removeClass('table-primary')
                $(this).addClass('table-primary')
            });
        })
    </script>
@endsection