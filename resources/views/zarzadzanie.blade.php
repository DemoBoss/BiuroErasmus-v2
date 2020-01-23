@extends('layouts.app')

@section('content')

    <div class="row justify-content-center" style="margin-bottom: 40px">
        <div class="col-lg-5 col-sm-8 kafelki" style="text-align: center;box-shadow:3px 3px 6px black;  padding-top: 20px; padding-bottom: 20px; margin-left: 4%">
            <h3 class="label_login">Zarządzanie użytkownikami</h3><br><br>
            {{--zarządzanie moderatorami--}}
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#moderator">
                Zarządzaj
            </button>
            {{--informacje na temat zarządzania Adminami--}}
            @if(session('status'))
                <div class="alert alert-success alert-dismissible" style="margin-top: 10px">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    {{session('status')}}
                </div>
            @endif
        </div>

    </div>

    {{--modal do zarządzania maderatorami--}}
    <div class="modal fade " id="moderator">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Admini</h4>
                </div>

                <!-- Modal body -->
                <div class="modal-body row">
                    <p style="margin-left: 20px">Lista adminów:</p>
                    <div class="col-12" style="height: 250px; overflow:auto;">
                        <table class="table table-hover" style="height: 50%">
                            <thead>
                            <tr>
                                <th>Login</th>
                                <th>Email</th>
                                <th>Rola</th>
                                <th style="text-align: right">Usuń</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($admini as $admin)
                                <tr>
                                    <td>{{$admin->name}}</td>
                                    <td>{{$admin->email}}</td>
                                    <td>{{$admin->role_name}}</td>
                                    <td><form action="usun_admina">
                                            <input type="hidden" name="login" value="{{$admin->name}}">
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
                        <label>Nowy admin</label>
                        <form action="nowy_admin">
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
                                @foreach($users as $user)
                                    <tr class="rzad" about="{{$user->id}}">
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
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



@endsection