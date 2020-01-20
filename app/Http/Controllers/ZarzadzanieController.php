<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ZarzadzanieController extends Controller
{
    public function zarzadzanie()
    {
        return view('zarzadzanie');
    }
}
