<?php

namespace App\Http\Controllers;

use App\Models\Pagamento;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $filter = 'all';
        $users = User::where('status', '!=', 'pendente')->paginate(4);
        $pagamentos = Pagamento::all();
        $roles = Role::all();
        return view('users.index', compact('users', 'pagamentos', 'roles', 'filter'));
    }


    public function search(Request $request)
    {
        // Get the search value from the request
        $roles = Role::all();
        $filter = 'all';
        $search = $request->input('search');

        // Search in the title and body columns from the posts table
        $users = User::query()
            ->where('name', 'LIKE', "%{$search}%")
            ->paginate(4);

        // Return the search view with the resluts compacted
        return view('users.index', compact('users', 'roles', 'filter'));
    }

    public function searchFilter(Request $request)
    {
        $roles = Role::all();
        $search = $request->input('search');
        $filter = $request->input('filter', 'all');

        $query = User::query();

        if (!empty($filter)) {
            if ($filter === 'approved') {
                $query->where('status', 'aprovado');
            } elseif ($filter === 'suspended') {
                $query->where('status', 'suspenso');
            }
        }

        $users = $query->where('name', 'LIKE', "%{$search}%")->paginate(4);

        return view('users.index', compact('users', 'roles', 'filter'));
    }

    public function updateRole(Request $request, $id)
    {
        $loggedInUserId = auth()->user()->id;

        if ($id == $loggedInUserId) {
            return back()->withErrors(['Não é permitido atualizar a função e o estado do usuário logado.']);
        }

        $user = User::findOrFail($id);
        $roleId = $request->input('role_id');
        $status = $request->input('status');

        $role = Role::findOrFail($roleId);
        $user->role()->associate($role);
        $user->status = $status;
        $user->save();

        return redirect()->back()->with('success', 'Função e estado do utilizador atualizados com sucesso.');
    }

    public function destroy($id)
    {
        try {
            $loggedInUserId = auth()->user()->id;

            if ($id == $loggedInUserId) {
                return back()->withErrors(['status' => 'Não é permitido apagar o usuário logado.']);
            }

            $user = User::findOrFail($id);

            if ($user->delete()) {
                return redirect()->back()->with('success', 'Utilizador apagado com sucesso.');
            } else {
                return redirect()->back()->with('error', 'Erro ao apagar o utilizador.');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erro ao apagar o utilizador: ' . $e->getMessage());
        }
    }
}
