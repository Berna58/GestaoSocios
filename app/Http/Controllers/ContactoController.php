<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use PHPMailer\PHPMailer\Exception;


class ContactoController extends Controller
{
    public function index()
    {
        return view('contacto');
    }

    public function sendContact(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        // Obtenha os emails dos usuários com a função de admin
        $adminEmails = Role::where('name', 'admin')->first()->users()->pluck('email')->toArray();

        // Crie o array $formData com os nomes corretos dos campos
        $formData = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'message' => $request->input('message'),
        ];

        // Envie o email para os emails dos usuários com a função de admin
        Mail::to($adminEmails)->send(new ContactFormMail($formData));

        return response()->json(['success' => 'E-mail enviado com sucesso!']);
    }

}
