<?php

namespace App\Http\Controllers;

use App\Models\ComentarioT;
use App\Models\RespostaT;
use App\Models\Topico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RespostasTController extends Controller
{
    public function store(Request $request, $comentarioId)
    {
        $request->validate([
            'conteudo' => 'required',
        ]);

        try {
            $comentario = ComentarioT::findOrFail($comentarioId);

            $resposta = new RespostaT();
            $resposta->conteudo = $request->input('conteudo');
            $resposta->user_id = Auth::id();

            // Associar a resposta ao comentário
            $comentario->respostas()->save($resposta);

            return redirect()->back();
        } catch (\Exception $e) {
            // Tratar exceção caso o comentário não seja encontrado
            return redirect()->back()->with('error', 'Erro ao enviar a resposta.');
        }
    }

    public function destroy($id)
    {
        $resposta = RespostaT::findOrFail($id);

        // Verificar se o usuário logado é o autor do comentário
        if (auth()->check() && $resposta->user_id === auth()->user()->id) {
            $resposta->delete();
        }

        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        // Obtenha a resposta pelo ID
        $resposta = RespostaT::findOrFail($id);

        // Verifique se o usuário autenticado é o autor da resposta
        if ($resposta->user_id !== auth()->user()->id) {
            return redirect()->back()->with('error', 'Você não tem permissão para editar esta resposta.');
        }

        // Valide os dados do formulário
        $request->validate([
            'conteudo' => 'required|max:255',
        ]);

        // Atualize o conteúdo da resposta
        $resposta->conteudo = $request->conteudo;
        $resposta->save();

        return redirect()->back()->with('success', 'Resposta editada com sucesso.');
    }
}
