<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\Inscricao;
use App\Models\InscricaoTemporaria;
use App\Models\User;
use Illuminate\Http\Request;

class InscricaoController extends Controller
{
    public function inscricoes(Evento $evento)
    {
        $inscricoes = Inscricao::with('user')->where('evento_id', $evento->id)->paginate(10);
        $inscricoesTemporarias = InscricaoTemporaria::where('evento_id', $evento->id)->paginate(10);
        $totalInscricoes = $inscricoes->count() + $inscricoesTemporarias->count();

        return view('eventos.inscricoes', compact('inscricoes', 'inscricoesTemporarias', 'totalInscricoes'));
    }

    public function marcarPresenca($inscricaoId)
    {
        // Encontre a inscrição pelo ID
        $inscricao = Inscricao::findOrFail($inscricaoId);

        // Verifique o estado atual de presença e altere para o oposto
        $inscricao->presenca = !$inscricao->presenca;
        $inscricao->save();

        // Redirecione ou retorne uma resposta adequada, conforme necessário
        return redirect()->back()->with('success', 'Presença marcada com sucesso!');
    }

    public function marcarPresencaTemporaria($inscricaoTemporariaId)
    {
        // Encontre a inscrição pelo ID
        $inscricao = InscricaoTemporaria::findOrFail($inscricaoTemporariaId);

        // Verifique o estado atual de presença e altere para o oposto
        $inscricao->presenca = !$inscricao->presenca;
        $inscricao->save();

        // Redirecione ou retorne uma resposta adequada, conforme necessário
        return redirect()->back()->with('success', 'Presença marcada com sucesso!');
    }

    public function search(Request $request)
    {
        // Obtenha o valor de pesquisa da solicitação
        $search = $request->input('search');

        // Pesquise nos títulos e descrições dos eventos
        $inscricoes = Inscricao::whereHas('user', function ($query) use ($search) {
            $query->where('name', 'LIKE', "%{$search}%");
        })->paginate(10);

        $inscricoesTemporarias = InscricaoTemporaria::where('nome', 'LIKE', "%{$search}%")->get();

        // Retorne a visualização dos resultados da pesquisa
        return view('eventos.inscricoes', compact('inscricoes', 'inscricoesTemporarias'));
    }




}
