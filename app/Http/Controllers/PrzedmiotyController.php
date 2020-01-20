<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Grid;
use App\Subject;
use App\Specialization;


class PrzedmiotyController extends Controller
{
    public function index()
    {
        $specializations = Specialization::all();
        return view('kierunki')->with(compact('specializations'));
    }
}



