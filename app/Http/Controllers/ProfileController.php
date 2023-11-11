<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        return view('auth.profile', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validatedData = $request->validate([
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'email' => 'nullable|string|unique:users|email|max:255',
            'telemovel' => 'nullable|numeric|regex:/^(\+?351)?9\d{8}$/u|unique:users',
            'morada' => 'nullable|string',
        ]);

        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $avatarNome = time() . '.' . $avatar->getClientOriginalExtension();
            $avatar->move(public_path('avatars'), $avatarNome);
            $user->avatar = 'avatars/' . $avatarNome; // Atribui o caminho do avatar ao usuário
        }

        // Verifica se o campo email foi enviado e atualiza o valor
        if (isset($validatedData['email'])) {
            $user->email = $validatedData['email'];
        }

        // Verifica se o campo telemovel foi enviado e atualiza o valor
        if (isset($validatedData['telemovel'])) {
            $user->telemovel = $validatedData['telemovel'];
        }

        // Verifica se o campo morada foi enviado e atualiza o valor
        if (isset($validatedData['morada'])) {
            $user->morada = $validatedData['morada'];
        }

        $user->save();

        return back()->withErrors(['status' => 'As alterações foram salvas com sucesso!']);
    }


    public function delete(User $user)
    {
        $user->delete();

        return redirect()->route('home')
            ->withSuccess(__('Post delete successfully.'));
    }
}
