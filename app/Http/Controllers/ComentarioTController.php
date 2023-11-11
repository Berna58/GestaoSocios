<?php

namespace App\Http\Controllers;

use App\Models\ComentarioT;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComentarioTController extends Controller
{
    public function store(Request $request)
    {
        // Valide os dados do formulário
        $request->validate([
            'topico_id' => 'required|exists:topicos,id',
            'conteudo' => 'required|string',
        ]);

        // Crie um novo comentário
        $comentario = new ComentarioT();
        $comentario->user_id = Auth::id(); // ID do usuário autenticado
        $comentario->topico_id = $request->input('topico_id');
        $comentario->conteudo = $request->input('conteudo');
        $comentario->save();

        // Redirecione de volta para a página da publicação
        return redirect()->back()->with('success', 'Comentário adicionado com sucesso!');
    }

    public function destroy($id)
    {
        $comentario = ComentarioT::findOrFail($id);

        // Verificar se o usuário logado é o autor do comentário
        if ($comentario->user_id === auth()->user()->id) {
            $comentario->delete();
        }

        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        // Obtenha o comentário pelo ID
        $comentario = ComentarioT::findOrFail($id);

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
