<?php

namespace App\Http\Controllers;

use App\Models\Topico;
use Illuminate\Http\Request;

class TopicosController extends Controller
{
    public function index()
    {
        $topicos = Topico::paginate(3);
        return view('topicos.index', compact('topicos'));
    }

    public function ver($id)
    {
        $topico = Topico::findOrFail($id);
        $user = $topico->user ?? null;
        $comentarios = $topico->comentarios()->get();


        return view('topicos.show', compact('topico', 'user', 'comentarios'));
    }

    public function create()
    {
        return view('topicos.create');
    }

    public function store(Request $request)
    {
        $topico = Topico::create([
            'titulo' => $request->input('titulo'),
            'conteudo' => $request->input('conteudo'),
            'user_id' => auth()->user()->id
        ]);

        return redirect()->route('topicos.index', $topico->id);
    }

    public function show($id)
    {
        $topico = Topico::findOrFail($id);

        return view('topicos.show', compact('topico'));
    }

    public function update(Request $request, $id)
    {
        // Obtenha a resposta pelo ID
        $topico = Topico::findOrFail($id);

        // Verifique se o usuário autenticado é o autor da resposta
        if ($topico->user_id !== auth()->user()->id) {
            return redirect()->back()->with('error', 'Você não tem permissão para editar este tópico.');
        }

        // Valide os dados do formulário
        $request->validate([
            'titulo' => 'required|max:255',
            'conteudo' => 'required|max:255',
        ]);

        // Atualize o conteúdo da resposta
        $topico->titulo = $request->titulo;
        $topico->conteudo = $request->conteudo;
        $topico->save();

        return redirect()->back()->with('success', 'Resposta editada com sucesso.');
    }

    public function destroy($id)
    {
        $topico = Topico::findOrFail($id);

        // Verificar se o usuário logado é o autor do comentário
        if ($topico->user_id === auth()->user()->id) {
            $topico->delete();
        }

        return redirect()->route('topicos.index');
    }

    public function search(Request $request)
    {
        // Get the search value from the request
        $search = $request->input('search');

        // Search in the title column from the topicos table
        $topicos = Topico::query()
            ->where('titulo', 'LIKE', "%{$search}%")
            ->paginate(6);

        // Return the search view with the results compacted
        return view('topicos.index', compact('topicos'));
    }
}
