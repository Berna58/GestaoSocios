<?php

namespace App\Http\Controllers;

use App\Models\InscricaoTemporaria;
use App\Models\User;
use App\Models\Evento;
use App\Models\Noticia;
use App\Models\Inscricao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class EventoController extends Controller
{
    public function index(Request $request)
    {
        $searchTerm = $request->input('search');

        if ($searchTerm) {
            $eventos = Evento::where('titulo', 'LIKE', '%' . $searchTerm . '%')->get();
        } else {
            $eventos = Evento::paginate(10);
        }

        // Format the description for each event
        foreach ($eventos as $evento) {
            $evento->descricao = nl2br($evento->descricao);
        }

        return view('eventos.index', compact('eventos'));
    }


    public function create()
    {
        return view('eventos.create');
    }

    public function store(Request $request)
    {
        // Obter a data atual
        $dataAtual = date('Y-m-d');

        // Verificar se a data fornecida é anterior à data atual
        if ($request->data < $dataAtual) {
            return redirect()->back()->with('error', 'Não é possível criar eventos com data anterior ao dia de hoje.');
        }

        // Resto do código para salvar o evento
        $evento = new Evento;
        $evento->titulo = $request->titulo;
        $evento->descricao = $request->descricao;
        $evento->local = $request->local;
        $evento->data = $request->data;
        $evento->hora = $request->hora;
        $evento->user_id = auth()->user()->id;

        if ($request->hasFile('imagem'))
        {
            $imagem = $request->file('imagem');
            $imagemNome = time() . '.' . $imagem->getClientOriginalExtension();
            $caminhoDestino = public_path('images/eventos');
            $imagem->move($caminhoDestino, $imagemNome);
            $evento->imagem = 'images/eventos/' . $imagemNome;
        }

        $evento->save();

        return redirect()->route('eventos.index');
    }

    public function update(Request $request, Evento $evento)
    {
        // Obter a data atual
        $dataAtual = date('Y-m-d');

        // Validação dos campos
        $request->validate([
            'titulo' => 'nullable',
            'descricao' => 'nullable',
            'local' => 'nullable',
            'data' => 'nullable|date|after_or_equal:$dataAtual',
            'hora' => 'nullable',
            'imagem' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Atualizar os dados do evento
        $evento->titulo = $request->titulo;
        $evento->descricao = $request->descricao;
        $evento->local = $request->local;
        $evento->data = $request->data;
        $evento->hora = $request->hora;

        if ($request->hasFile('imagem')) {
            // Excluir a imagem antiga, se necessário
            if ($evento->imagem) {
                Storage::delete($evento->imagem);
            }

            // Fazer upload da nova imagem
            $caminhoImagem = $request->imagem->store('public/images/eventos');
            $evento->imagem = $caminhoImagem;
        }

        $evento->save();

        return back()->with('success', 'As alterações foram salvas com sucesso!');
    }


    public function destroy($id)
    {
        $evento = Evento::findOrFail($id);

        if ($evento->delete()) {
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false]);
        }
    }

    public function edit($id)
    {
        $evento = Evento::findOrFail($id);
        return view('eventos.editar', compact('evento'));
    }

    public function show()
    {
        $eventosArquivados = Evento::onlyTrashed()->paginate(10);
        return view('arquivos.eventos', compact('eventosArquivados'));
    }

    public function restore($id)
    {
        $evento = Evento::onlyTrashed()->findOrFail($id);
        $evento->restore();

        $response = [
            'success' => true,
            'message' => 'Evento restaurado com sucesso.'
        ];

        return response()->json($response);
    }

    public function apagarPerm($id)
    {
        // Encontra a notícia arquivada pelo ID
        $eventoArquivado = Evento::onlyTrashed()->findOrFail($id);

        // Exclui permanentemente a notícia da base de dados
        $eventoArquivado->forceDelete();

        // Prepara a resposta com a mensagem de sucesso
        $response = [
            'success' => true,
            'message' => 'Evento excluído permanentemente com sucesso.'
        ];

        // Retorna a resposta como JSON
        return response()->json($response);
    }

    public function search(Request $request)
    {
        // Obtenha o valor de pesquisa da solicitação
        $search = $request->input('search');

        // Pesquise nos títulos e descrições dos eventos
        $eventos = Evento::where('titulo', 'LIKE', "%{$search}%")
            ->paginate(10);

        // Retorne a visualização dos resultados da pesquisa
        return view('eventos.index', compact('eventos'));
    }

    public function searchA(Request $request)
    {
        // Get the search value from the request
        $search = $request->input('search');

        // Search for archived news with matching title
        $eventosArquivados = Evento::onlyTrashed()
            ->where('titulo', 'LIKE', "%{$search}%")
            ->paginate(10);

        // Return the search view with the results compacted
        return view('arquivos.eventos', compact('eventosArquivados'));
    }

    public function ver($id)
    {
        // Obtenha o evento com base no ID
        $evento = Evento::findOrFail($id);

        // Verifique se a data do evento é posterior à data atual
        $dataAtual = date('Y-m-d');
        $horaAtual = date('H:i:s');
        if ($evento->data < $dataAtual && $evento->hora < $horaAtual) {
            // A data do evento já passou, redirecione para a página anterior com um SweetAlert informando que o evento ocorreu
            return redirect()->back()->with('evento-ocorrido', true);
        }

        $users = User::all();

        // Aplica a função nl2br() para manter as quebras de linha na descrição
        $evento->descricao = nl2br($evento->descricao);

        // Retorne a view que exibirá os detalhes do evento
        return view('eventos.ver', compact('evento', 'users'));
    }


    public function inscrever(Request $request, $eventoId)
    {
        $evento = Evento::find($eventoId);
        $userId = auth()->user()->id;

        // Verifica se o usuário já está inscrito
        if ($evento->inscritos->contains($userId)) {
            return redirect()->back()->withErrors('Você já está inscrito neste evento.');
        }

        // Inscreve o usuário no evento
        $evento->inscritos()->attach($userId);

        return redirect()->back()->with('success', 'Inscrição realizada com sucesso.');
    }

    public function cancelarInscricao(Request $request, $eventoId)
    {
        $evento = Evento::find($eventoId);
        $user = auth()->user();

        // Verifica se o usuário está inscrito
        if (!$evento->inscritos->contains($user)) {
            return redirect()->back()->withErrors('Você não está inscrito neste evento.');
        }

        // Cancela a inscrição do usuário no evento
        $evento->inscritos()->detach($user);

        return redirect()->back()->with('success', 'Inscrição cancelada com sucesso.');
    }

    public function inscreverTemporaria(Request $request, $eventoId)
    {
        $evento = Evento::find($eventoId);
        $userIds = $request->input('user_ids', []);
        $inscricoesTemporarias = $request->input('inscricoes_temporarias', []);

        foreach ($userIds as $userId) {
            $user = User::find($userId);

            // Verifica se o usuário já está inscrito
            if ($evento->inscritos->contains($user)) {
                continue; // Pula para o próximo usuário
            }

            // Inscreve o usuário no evento
            $evento->inscritos()->attach($user);
        }

        foreach ($inscricoesTemporarias as $inscricaoTemporaria) {
            $tipoInscricao = $request->input('tipo_inscricao'); // Obter o valor selecionado do campo "tipo_inscricao"

            // Verificar se o tipo de inscrição é "Instituição" e obter o nome da instituição
            $instituicao = ($tipoInscricao === 'Instituição') ? $inscricaoTemporaria['instituicao'] : null;

            // Criar um novo registro na tabela inscricoes_temporarias
            $inscricao = new InscricaoTemporaria([
                'nome' => $inscricaoTemporaria['nome'],
                'email' => $inscricaoTemporaria['email'],
                'evento_id' => $evento->id,
                'tipo_inscricao' => $tipoInscricao,
                'instituicao' => $instituicao,
            ]);

            // Salvar a inscrição temporária no evento
            $evento->inscricoesTemporarias()->save($inscricao);
        }

        return redirect()->back()->with('success', 'Inscrição realizada com sucesso.');
    }


}
