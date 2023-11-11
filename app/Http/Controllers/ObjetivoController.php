<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ObjetivoController extends Controller
{
    public function index()
    {
        return view('objetivos');
    }
}
