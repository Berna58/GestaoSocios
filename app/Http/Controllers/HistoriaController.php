<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HistoriaController extends Controller
{
    public function index()
    {
        return view('historia');
    }
}
