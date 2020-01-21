<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Laravel - How to Generate Dynamic PDF from HTML using DomPDF</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style type="text/css">
        .box{
            width:600px;
            margin:0 auto;
        }
    </style>
</head>
<body>
<br />
<div class="container">
    <h3 align="center">Wybrane przedmioty</h3><br />
    <div class="float-left" style="padding-right: 20px">
        <a href="/">
            <button type="button" class="btn btn-primary" data-toggle="modal">
                Wróć do okna głównego
            </button>
        </a>
    </div>
    <div class="row">
        <div class="col-md-7" align="right">
            <h4>Customer Data</h4>
        </div>
        <div class="col-md-5" align="right">
            <a href="{{ url('dynamic_pdf/pdf') }}" class="btn btn-danger">Konwertuj do  PDF</a>
        </div>
    </div>
    <br />
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>Przedmioty</th>
                <th>Forma zaliczenia</th>
                <th>Wykład</th>
                <th>Cw_Konw_Lab Code</th>
                <th>ECTS</th>
                <th>Na rok</th>
                <th>Siatka z roku</th>
                <th>Opis</th>
            </tr>
            </thead>
            <tbody>
            @foreach($customer_data as $customer)
                <tr>
                    <td>{{ $customer->Przedmioty }}</td>
                    <td>{{ $customer->Forma_zaliczenia }}</td>
                    <td>{{ $customer->Wykład }}</td>
                    <td>{{ $customer->Cw_Konw_Lab }}</td>
                    <td>{{ $customer->ECTS }}</td>
                    <td>{{ $customer->Na_rok }}</td>
                    <td>{{ $customer->Siatka_z_roku }}</td>
                    <td>{{ $customer->Opis }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
