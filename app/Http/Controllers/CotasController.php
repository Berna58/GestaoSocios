<?php

namespace App\Http\Controllers;

use App\Models\Pagamento;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\Paginator;

class CotasController extends Controller
{
    public function index()
    {
        $users = User::where('status', '!=', 'pendente')->paginate(10);
        return view('cotas.index', compact('users'));
    }

    public function cotasPagas($userId)
    {
        $user = User::findOrFail($userId);

        $primeiroAno = $user->created_at->format('Y');
        $limiteAnos = date('Y', strtotime('+10 years')); // Define the limit of 5 years
        $anos = [];
        for ($ano = $primeiroAno; $ano <= $limiteAnos; $ano++) {
            $pagamentoAno = $user->pagamentos->firstWhere('ano', $ano);
            $estadoPagamento = $pagamentoAno ? ($pagamentoAno->pago ? 'Pago' : 'Não Pago') : 'Não Pago';
            $corFundo = $pagamentoAno ? ($pagamentoAno->pago ? 'bg-green' : 'bg-red') : 'bg-red';
            $icone = $pagamentoAno ? ($pagamentoAno->pago ? 'fas fa-check-circle' : 'fas fa-times-circle') : 'fas fa-times-circle';
            $corTexto = $pagamentoAno ? ($pagamentoAno->pago ? 'text-green' : 'text-red') : 'text-red';
            $anos[] = [
                'ano' => $ano,
                'estado' => $estadoPagamento,
                'corFundo' => $corFundo,
                'icone' => $icone,
                'corTexto' => $corTexto
            ];
        }

        $perPage = 5;
        $currentPage = request()->query('page', 1);
        $offset = ($currentPage - 1) * $perPage;
        $paginatedAnos = array_slice($anos, $offset, $perPage, true);
        $anos = new \Illuminate\Pagination\LengthAwarePaginator(
            $paginatedAnos,
            count($anos),
            $perPage,
            $currentPage,
            [
                'path' => request()->url(),
                'query' => request()->query()
            ]
        );

        return view('cotas.cotas_pagas', compact('user', 'anos'));
    }

    public function updatePagamento($userId, $ano)
    {
        // Encontre o usuário
        $user = User::findOrFail($userId);

        // Encontre o pagamento correspondente ao ano fornecido
        $pagamento = $user->pagamentos()->where('ano', $ano)->first();

        if ($pagamento) {
            // Inverta o estado do pagamento
            $pagamento->pago = !$pagamento->pago;
            $pagamento->save();
        } else {
            // Crie um novo pagamento com o estado definido como "Pago"
            $user->pagamentos()->create([
                'ano' => $ano,
                'pago' => true,
            ]);
        }

        return redirect()->back()->with('success', 'Estado do pagamento atualizado com sucesso.');
    }



}
