<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\Noticia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NoticiaController extends Controller
{
    public function index()
    {
        $noticias = Noticia::paginate(10);

        foreach ($noticias as $noticia) {
            $noticia->descricao = nl2br($noticia->descricao);
        }

        return view('noticias.index', compact('noticias'));
    }

    public function create()
    {
        return view('noticias.create');
    }

    public function store(Request $request, Noticia $noticia)
    {
        $noticia->titulo = $request->titulo;
        $noticia->descricao = $request->descricao;
        $noticia->user_id = auth()->user()->id;

        if ($request->hasFile('imagem')) {
            $imagem = $request->file('imagem');
            $imagemNome = time() . '.' . $imagem->getClientOriginalExtension();
            $caminhoDestino = public_path('images/noticias');
            $imagem->move($caminhoDestino, $imagemNome);
            $noticia->imagem = 'images/noticias/' . $imagemNome;
        } else {
            // Define a imagem padrão caso nenhuma imagem tenha sido selecionada
            $noticia->imagem = 'images/noticias/default.jpg';
        }

        $noticia->save();

        return redirect()->route('noticias.index')->with('success', 'Notícia criada com sucesso.');
    }

    public function edit($id)
    {
        $noticia = Noticia::findOrFail($id);
        return view('noticias.edit', compact('noticia'));
    }

    public function update(Request $request, $id)
    {
        $noticia = Noticia::findOrFail($id);

        $request->validate([
            'titulo' => 'required',
            'descricao' => 'required',
            'imagem' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $noticia->titulo = $request->titulo;
        $noticia->descricao = $request->descricao;
        $noticia->save();

        if ($request->hasFile('imagem')) {
            // Excluir a imagem antiga, se necessário
            if ($noticia->imagem) {
                Storage::delete($noticia->imagem);
            }

            // Fazer upload da nova imagem
            $caminhoImagem = $request->imagem->store('public/images/noticias');
            $noticia->imagem = $caminhoImagem;
        }

        return back()->with('success', 'As alterações foram salvas com sucesso!');
    }

    public function destroy($id)
    {
        $noticia = Noticia::findOrFail($id);

        if ($noticia->delete()) {
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false]);
        }
    }

    public function apagarPerm($id)
    {
        // Encontra a notícia arquivada pelo ID
        $noticiaArquivada = Noticia::onlyTrashed()->findOrFail($id);

        // Exclui permanentemente a notícia da base de dados
        $noticiaArquivada->forceDelete();

        // Prepara a resposta com a mensagem de sucesso
        $response = [
            'success' => true,
            'message' => 'Notícia excluída permanentemente com sucesso.'
        ];

        // Retorna a resposta como JSON
        return response()->json($response);
    }

    public function show()
    {
        $noticiasArquivados = Noticia::onlyTrashed()->paginate(10);

        return view('arquivos.noticias', compact('noticiasArquivados'));
    }

    public function restore($id)
    {
        $noticia = Noticia::onlyTrashed()->findOrFail($id);
        $noticia->restore();

        $response = [
            'success' => true,
            'message' => 'Notícia restaurada com sucesso.'
        ];

        return response()->json($response);
    }

    public function search(Request $request)
    {
        // Get the search value from the request
        $search = $request->input('search');

        // Search in the title and body columns from the posts table
        $noticias = Noticia::query()
            ->where('titulo', 'LIKE', "%{$search}%")
            ->paginate(10);

        // Return the search view with the resluts compacted
        return view('noticias.index', compact('noticias'));
    }

    public function searchA(Request $request)
    {
        // Get the search value from the request
        $search = $request->input('search');

        // Search for archived news with matching title
        $noticiasArquivados = Noticia::onlyTrashed()
            ->where('titulo', 'LIKE', "%{$search}%")
            ->paginate(10);

        // Return the search view with the results compacted
        return view('arquivos.noticias', compact('noticiasArquivados'));
    }
}
