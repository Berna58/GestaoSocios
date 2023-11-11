<?php

namespace App\Http\Controllers;

use App\Models\Publicacao;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PublicacaoController extends Controller
{
    public function index(Request $request)
    {
        $searchTerm = $request->input('search');

        if ($searchTerm) {
            $publicacoes = Publicacao::where('titulo', 'LIKE', '%' . $searchTerm . '%')->get();
        } else {
            $publicacoes = Publicacao::paginate(10);
        }

        foreach ($publicacoes as $publicacao) {
            $publicacao->descricao = nl2br($publicacao->descricao);
        }

        return view('publicacoes.index', compact('publicacoes'));
    }

    public function download($id)
    {
        $publicacao = Publicacao::findOrFail($id);
        $filePath = public_path($publicacao->file);

        return response()->download($filePath);
    }

    public function page()
    {
        $publicacoes = Publicacao::all();
        return view('publicacoes.page', compact('publicacoes'));
    }

    public function create()
    {
        return view('publicacoes.create');
    }

    public function store(Request $request)
    {
        // Validação dos dados do formulário
        $request->validate([
            'titulo' => 'required',
            'descricao' => 'required',
            'imagem' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'file' => 'nullable|mimes:pdf|max:2048',
        ]);

        $publicacao = new Publicacao();
        $publicacao->titulo = $request->input('titulo');
        $publicacao->descricao = $request->input('descricao');
        $publicacao->user_id = auth()->user()->id;

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = 'uploads/publicacoes/';
            $file->move(public_path($filePath), $fileName);
            $publicacao->file = $filePath . $fileName;
        }

        if ($request->hasFile('imagem')) {
            $imagem = $request->file('imagem');
            $imagemNome = time() . '.' . $imagem->getClientOriginalExtension();
            $caminhoDestino = public_path('images/publicacoes');
            $imagem->move($caminhoDestino, $imagemNome);
            $imagemPath = 'images/publicacoes/' . $imagemNome;
            $publicacao->imagem = $imagemPath;
        }

        $publicacao->save();

        // Redirecionamento ou qualquer outra ação desejada

        return redirect()->route('publicacoes.index');
    }


    public function update(Request $request, $id)
    {
        $publicacao = Publicacao::findOrFail($id);

        $request->validate([
            'titulo' => 'required',
            'descricao' => 'required',
            'imagem' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'file' => 'nullable|mimes:pdf|max:2048',
        ]);

        $publicacao->titulo = $request->titulo;
        $publicacao->descricao = $request->descricao;

        if ($request->hasFile('imagem')) {
            // Excluir a imagem antiga, se necessário
            if ($publicacao->imagem) {
                Storage::delete($publicacao->imagem);
            }

            // Fazer upload da nova imagem
            $caminhoImagem = $request->imagem->store('public/images/publicacoes');
            $publicacao->imagem = $caminhoImagem;
        }

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = 'uploads/publicacoes/';
            $file->move(public_path($filePath), $fileName);

            // Deleta o arquivo físico antigo, se existir
            if ($publicacao->file) {
                $oldFilePath = public_path($publicacao->file);
                if (file_exists($oldFilePath)) {
                    unlink($oldFilePath);
                }
            }

            $publicacao->file = $filePath . $fileName;
        }

        $publicacao->save();

        return back()->with('success', 'As alterações foram salvas com sucesso!');
    }

    public function destroy($id)
    {
        $publicacao = Publicacao::findOrFail($id);

        if ($publicacao->delete()) {
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false]);
        }
    }

    public function edit($id)
    {
        $publicacao = Publicacao::findOrFail($id);
        return view('publicacoes.editar', compact('publicacao'));
    }

    public function show()
    {
        $publicacoesArquivados = Publicacao::onlyTrashed()->paginate(10);
        return view('arquivos.publicacoes', compact('publicacoesArquivados'));
    }

    public function ver($id)
    {
        $publicacao = Publicacao::findOrFail($id);
        $user = $publicacao->user ?? null;
        $comentarios = $publicacao->comentarios()->get();

        $publicacao->descricao = nl2br($publicacao->descricao);

        return view('publicacoes.ver', compact('publicacao', 'user', 'comentarios'));
    }

    public function restore($id)
    {
        $publicacao = Publicacao::onlyTrashed()->findOrFail($id);
        $publicacao->restore();

        $response = [
            'success' => true,
            'message' => 'Publicação restaurado com sucesso.'
        ];

        return response()->json($response);
    }

    public function apagarPerm($id)
    {
        // Encontra a notícia arquivada pelo ID
        $publicacaoArquivado = Publicacao::onlyTrashed()->findOrFail($id);

        // Exclui permanentemente a notícia da base de dados
        $publicacaoArquivado->forceDelete();

        // Prepara a resposta com a mensagem de sucesso
        $response = [
            'success' => true,
            'message' => 'Publicação excluído permanentemente com sucesso.'
        ];

        // Retorna a resposta como JSON
        return response()->json($response);
    }

    public function search(Request $request)
    {
        // Get the search value from the request
        $search = $request->input('search');

        // Search in the title and body columns from the posts table
        $publicacoes = Publicacao::query()
            ->where('titulo', 'LIKE', "%{$search}%")
            ->paginate(10);

        // Return the search view with the resluts compacted
        return view('publicacoes.index', compact('publicacoes'));
    }

    public function searchA(Request $request)
    {
        // Get the search value from the request
        $search = $request->input('search');

        // Search for archived news with matching title
        $publicacoesArquivados = Publicacao::onlyTrashed()
            ->where('titulo', 'LIKE', "%{$search}%")
            ->paginate(10);

        // Return the search view with the results compacted
        return view('arquivos.publicacoes', compact('publicacoesArquivados'));
    }
}
