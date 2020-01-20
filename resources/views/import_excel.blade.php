@extends('layouts.app')
@section('content')
<div class="container">
    <h3 align="center">Import Excel File in Laravel</h3>
    <br />
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
    <form method="post" enctype="multipart/form-data" action="{{ url('/import_excel/import') }}">
        {{ csrf_field() }}
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

    <br />
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Customer Data</h3>
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>Customer Name</th>
                        <th>Gender</th>
                        <th>Address</th>
                        <th>City</th>
                        <th>Postal Code</th>
                        <th>Country</th>
                    </tr>
                    @foreach($data as $row)
                        <tr>
                            <td>{{ $row->CustomerName }}</td>
                            <td>{{ $row->Gender }}</td>
                            <td>{{ $row->Address }}</td>
                            <td>{{ $row->City }}</td>
                            <td>{{ $row->PostalCode }}</td>
                            <td>{{ $row->Country }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    @if(session('komunikat'))
        <div class="alert alert-success">
            {{session('komunikat')}}
        </div>
    @endif
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModalComment">
        Dodaj komentarz
    </button>


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
                        <label>Wprowadź komentarz:</label>
                        <div class="form-group row justify-content-center">

                            <textarea name="CustomerName" class="form-control" style="width: 450px; height: 200px;" required></textarea>
                        </div>
                        <div class="form-group row justify-content-center">

                            <textarea name="Gender" class="form-control" style="width: 450px; height: 200px;" required></textarea>
                        </div>
                        <div class="form-group row justify-content-center">

                            <textarea name="Address" class="form-control" style="width: 450px; height: 200px;" required></textarea>
                        </div>
                        <div class="form-group row justify-content-center">

                            <textarea name="City" class="form-control" style="width: 450px; height: 200px;" required></textarea>
                        </div>
                        <div class="form-group row justify-content-center">

                            <textarea name="PostalCode" class="form-control" style="width: 450px; height: 200px;" required></textarea>
                        </div>
                        <div class="form-group row justify-content-center">

                            <textarea name="Country" class="form-control" style="width: 450px; height: 200px;" required></textarea>
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