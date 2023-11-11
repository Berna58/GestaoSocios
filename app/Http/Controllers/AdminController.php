<?php

namespace App\Http\Controllers;

use App\Mail\UserApprovedMail;
use App\Mail\UserRejectedMail;
use App\Models\Evento;
use App\Models\Publicacao;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    // Função para a view dashboard do admin
    public function dashboard()
    {
        $users = User::where('status', '!=', 'pendente')->get();
        $eventos = Evento::withTrashed()->get();
        $publicacoes = Publicacao::all();
        $totalCotasPagas = 0;

        foreach ($users as $user) {
            $totalCotasPagas += $this->getTotalCotasPagas($user->id);
        }

        return view('admin.dashboard', compact('users', 'totalCotasPagas', 'eventos', 'publicacoes'));
    }

    // Função para fazer a contagem do total de cotas pagas de todos os utilizadores
    // Multiplica por 15, uma vez que é este o valor anual a ser pago á associação
    public function getTotalCotasPagas($userId)
    {
        $user = User::findOrFail($userId);
        $pagamentos = $user->pagamentos()->where('pago', true)->get();
        $totalCotasPagas = $pagamentos->count() * 15;

        return $totalCotasPagas;
    }


    // Função para a view dos pedidos onde apenas aparecem os utilizadores com o estado pendente
    public function pedidos()
    {
        $users = User::where('status', 'pendente')->paginate(10);
        return view('admin.pedidos', compact('users'));
    }

    // Função que é executada quando é pressionado o botão a verde na view dos pedidos sendo
    // que altera o estado para aprovado dando, enviando um email ao utilizador
    public function approveUser(User $user)
    {
        // Update the user's status to approved
        $user->status = 'aprovado';
        $user->save();

        // Send an email to the user confirming their approval
        Mail::to($user->email)->send(new UserApprovedMail($user));

        // Redirect back to the users list
        return redirect()->back()->with('success', 'Utilizador aprovado com sucesso');
    }

    // Função que é executada quando é pressionado o botão a vermelho na view dos pedidos sendo
    // que altera o estado para rejeitado dando, enviando um email ao utilizador
    public function rejectUser(User $user)
    {
        // Update the user's status to rejected
        $user->status = 'rejeitado';
        $user->save();

        // Delete the user from the database
        $user->delete();

        // Send an email to the user confirming their rejection
        Mail::to($user->email)->send(new UserRejectedMail($user));

        // Redirect back to the users list
        return redirect()->back()->with('success', 'Utilizador rejeitado!');
    }



}
