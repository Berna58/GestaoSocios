<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SocioController extends Controller
{
    public function dashboard()
    {
        return view('socio.dashboard');
    }
}
