<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComentarioController extends Controller
{
    public function store(Request $request)
    {
        // Valide os dados do formulário
        $request->validate([
            'publicacao_id' => 'required|exists:publicacoes,id',
            'conteudo' => 'required|string',
        ]);

        // Crie um novo comentário
        $comentario = new Comentario();
        $comentario->user_id = Auth::id(); // ID do usuário autenticado
        $comentario->publicacao_id = $request->input('publicacao_id');
        $comentario->conteudo = $request->input('conteudo');
        $comentario->save();

        // Redirecione de volta para a página da publicação
        return redirect()->back()->with('success', 'Comentário adicionado com sucesso!');
    }

    public function destroy($id)
    {
        $comentario = Comentario::findOrFail($id);

        // Verificar se o usuário logado é o autor do comentário
        if ($comentario->user_id === auth()->user()->id) {
            $comentario->delete();
        }

        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        // Obtenha o comentário pelo ID
        $comentario = Comentario::findOrFail($id);

        // Verifique se o usuário autenticado é o autor do comentário
        if ($comentario->user_id !== auth()->user()->id) {
            return redirect()->back()->with('error', 'Você não tem permissão para editar este comentário.');
        }

        // Valide os dados do formulário
        $request->validate([
            'conteudo' => 'required|max:255',
        ]);

        // Atualize o conteúdo do comentário
        $comentario->conteudo = $request->conteudo;
        $comentario->save();

        return redirect()->back()->with('success', 'Comentário editado com sucesso.');
    }
}
