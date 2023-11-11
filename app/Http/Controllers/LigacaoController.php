<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Ligacao;

class LigacaoController extends Controller
{
    public function page()
    {
        $ligacoes = Ligacao::all();
        return view('ligacoes.page', compact('ligacoes'));
    }

    public function index()
    {
        $ligacoes = Ligacao::paginate(10);
        return view('ligacoes.index', compact('ligacoes'));
    }

    public function create()
    {
        return view('ligacoes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'descricao' => 'required',
            'instituicao' => 'required',
            'email' => 'required|string',
            'link' => 'required',
            'telefone' => 'required|numeric',
        ]);

        $ligacao = new Ligacao();
        $ligacao->descricao = $request->descricao;
        $ligacao->instituicao = $request->instituicao;
        $ligacao->email = $request->email;
        $ligacao->link = $request->link;
        $ligacao->telefone = $request->telefone;
        $ligacao->user_id = auth()->user()->id;
        $ligacao->save();

        return redirect()->route('ligacoes.index')->with('success', 'Ligação salva com sucesso.');
    }

    public function update(Request $request, $id)
    {
        $ligacao = Ligacao::findOrFail($id);

            $request->validate([
                'descricao' => 'nullable',
                'instituicao' => 'nullable',
                'email' => 'nullable|email',
                'link' => 'nullable|url',
                'telefone' => 'nullable|numeric',
            ]);

            $ligacao->descricao = $request->descricao;
            $ligacao->instituicao = $request->instituicao;
            $ligacao->email = $request->email;
            $ligacao->link = $request->link;
            $ligacao->telefone = $request->telefone;

            $ligacao->save();

        return back()->with('success', 'As alterações foram salvas com sucesso!');
    }


    public function destroy($id)
    {
        $ligacao = Ligacao::findOrFail($id);

        if ($ligacao->delete()) {
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false]);
        }
    }

    public function apagarPerm($id)
    {
        // Encontra a notícia arquivada pelo ID
        $ligacaoArquivado = Ligacao::onlyTrashed()->findOrFail($id);

        // Exclui permanentemente a notícia da base de dados
        $ligacaoArquivado->forceDelete();

        // Prepara a resposta com a mensagem de sucesso
        $response = [
            'success' => true,
            'message' => 'Ligação excluída permanentemente com sucesso.'
        ];

        // Retorna a resposta como JSON
        return response()->json($response);
    }

    public function show()
    {
        $ligacoesArquivados = Ligacao::onlyTrashed()->paginate(2);

        return view('arquivos.ligacoes', compact('ligacoesArquivados'));
    }

    public function restore($id)
    {
        $ligacao = Ligacao::onlyTrashed()->findOrFail($id);
        $ligacao->restore();

        $response = [
            'success' => true,
            'message' => 'Ligação restaurado com sucesso.'
        ];

        return response()->json($response);
    }

    public function search(Request $request)
    {
        // Get the search value from the request
        $search = $request->input('search');

        // Search in the title and body columns from the posts table
        $ligacoes = Ligacao::query()
            ->where('descricao', 'LIKE', "%{$search}%")
            ->paginate(10);

        // Return the search view with the resluts compacted
        return view('ligacoes.index', compact('ligacoes'));
    }

    public function searchA(Request $request)
    {
        // Get the search value from the request
        $search = $request->input('search');

        // Search for archived news with matching title
        $ligacoesArquivados = Ligacao::onlyTrashed()
            ->where('descricao', 'LIKE', "%{$search}%")
            ->paginate(10);

        // Return the search view with the results compacted
        return view('arquivos.ligacoes', compact('ligacoesArquivados'));
    }
}
