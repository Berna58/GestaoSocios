<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\Inscricao;
use App\Models\Pagamento;
use Illuminate\Http\Request;

class MinhaareaController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $totalEventosInscritos = Inscricao::where('user_id', $user->id)->count();
        $pagamentos = Pagamento::where('user_id', $user->id)->where('pago', true)->get();

        $totalCotasPagas = $pagamentos->count() * 15;


        return view('minhaarea', compact('totalEventosInscritos', 'totalCotasPagas'));
    }

    public function eventosInscritos()
    {
        $user = auth()->user();
        $eventosInscritos = Inscricao::where('inscricoes.user_id', $user->id)
            ->join('eventos', 'inscricoes.evento_id', '=', 'eventos.id')
            ->select('eventos.*', 'inscricoes.presenca')
            ->get();

        return view('eventosInscritos', compact('eventosInscritos'));
    }
}
