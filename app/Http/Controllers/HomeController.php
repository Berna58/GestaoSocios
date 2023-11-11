<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\Noticia;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $noticias = Noticia::all();
        $eventos = Evento::all();

        foreach ($noticias as $noticia) {
            $noticia->descricao = nl2br($noticia->descricao);
        }

        return view('home', compact('noticias', 'eventos'));
    }
}
