<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use PDF;

class DynamicPDFController extends Controller
{
    function index()
    {
        $customer_data = $this->get_customer_data();
        return view('dynamic_pdf')->with('customer_data', $customer_data);
    }

    function get_customer_data()
    {
        $customer_data = DB::table('selected_items')
            ->orderBy('Na_rok', 'DESC')->get();
        return $customer_data;
      }
//
// function get_customer_data()
//    {
//        $customer_data = DB::table('customers')
//            ->limit(10)
//            ->get();
//        return $customer_data;
//    }

    function pdf()
    {
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($this->convert_customer_data_to_html());
        return $pdf->stream();
    }

    function convert_customer_data_to_html()
    {
        $customer_data = $this->get_customer_data();
        $output = '
     <h3 align="center">Wybrane przedmioty</h3>
      
     <table width="100%" style="border-collapse: collapse; border: 0px; font-family : firefly, DejaVu Sans, sans-serif ; ">
      <tr>
    <th style="border: 1px solid; " width="15%">Przedmioty</th>
    <th style="border: 1px solid; " width="15%">Forma zaliczenia</th>
    <th style="border: 1px solid; " width="15%">Wykład</th>
    <th style="border: 1px solid; " width="15%">Cw/Konw/Lab</th>
    <th style="border: 1px solid; " width="10%">ECTS</th>
    <th style="border: 1px solid; " width="10%">Na rok</th>
    <th style="border: 1px solid; " width="10%">Z roku</th>
    <th style="border: 1px solid;" width="15%">Opis</th>
   </tr>
     ';
        foreach($customer_data as $customer)
        {
            $output .= '
      <tr>
       <td style="border: 1px solid;">'.$customer->Przedmioty.'</td>
       <td style="border: 1px solid;">'.$customer->Forma_zaliczenia.'</td>
       <td style="border: 1px solid;">'.$customer->Wykład.'</td>
       <td style="border: 1px solid;">'.$customer->Cw_Konw_Lab.'</td>
       <td style="border: 1px solid;">'.$customer->ECTS.'</td>
        <td style="border: 1px solid; ">'.$customer->Na_rok.'</td>
        <td style="border: 1px solid; ">'.$customer->Siatka_z_roku.'</td>
       <td style="border: 1px solid;">'.$customer->Opis.'</td>
      </tr>
      ';
        }
        $output .= '</table>';
        return $output;
    }


//    function convert_customer_data_to_html()
//{
//    $customer_data = $this->get_customer_data();
//    $output = '
//     <h3 align="center">Customer Data</h3>
//
//     <table width="100%" style="border-collapse: collapse; border: 0px; font-family : firefly, DejaVu Sans, sans-serif ; ">
//      <tr>
//    <th style="border: 1px solid; padding:12px;" width="20%">Name</th>
//    <th style="border: 1px solid; padding:12px;" width="30%">Address</th>
//    <th style="border: 1px solid; padding:12px;" width="15%">City</th>
//    <th style="border: 1px solid; padding:12px;" width="15%">Postal Code</th>
//    <th style="border: 1px solid; padding:12px;" width="20%">Country</th>
//   </tr>
//     ';
//    foreach($customer_data as $customer)
//    {
//        $output .= '
//      <tr>
//       <td style="border: 1px solid; padding:12px;">'.$customer->CustomerName.'</td>
//       <td style="border: 1px solid; padding:12px;">'.$customer->Address.'</td>
//       <td style="border: 1px solid; padding:12px;">'.$customer->City.'</td>
//       <td style="border: 1px solid; padding:12px;">'.$customer->PostalCode.'</td>
//       <td style="border: 1px solid; padding:12px;">'.$customer->Country.'</td>
//      </tr>
//      ';
//    }
//    $output .= '</table>';
//    return $output;
//}
}