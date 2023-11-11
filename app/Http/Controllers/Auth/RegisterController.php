<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Mail\NewUserApprovalRequest;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'dataNascimento' => ['required', 'date', 'before_or_equal:' . Carbon::now()->subYears(18)->toDateString()],
            'nif' => ['required', 'numeric', 'digits:9', 'unique:users'],
            'telemovel' => ['required', 'numeric', 'regex:/^(\+?351)?9\d{8}$/u', 'unique:users'],
            'morada' => ['required', 'string'],
            'bilheteIdentidade' => ['required', 'string'],
            'naturalidade' => ['required', 'string'],
            'emprego' => ['required', 'string'],
            'profissao' => ['nullable', 'string'],
            'empresa' => ['nullable', 'string'],
            'nivel' => ['required', 'string'],
            'curso' => ['required', 'string'],
            'estabelecimentoEnsino' => ['required', 'string'],
            'titulo_publicacao1' => ['nullable', 'string'],
            'link_publicacao1' => ['nullable', 'url'],
            'titulo_publicacao2' => ['nullable', 'string'],
            'link_publicacao2' => ['nullable', 'url'],
            'titulo_publicacao3' => ['nullable', 'string'],
            'link_publicacao3' => ['nullable', 'url'],
            'titulo_publicacao4' => ['nullable', 'string'],
            'link_publicacao4' => ['nullable', 'url'],
            'nib' => ['required', 'string'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register(Request $request): \Illuminate\Http\RedirectResponse
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'status' => 'pendente',
            'role_id' => 2,
            'dataNascimento' => $request->input('dataNascimento'),
            'nif' => $request->input('nif'),
            'telemovel' => $request->input('telemovel'),
            'morada' => $request->input('morada'),
            'emprego' => $request->input('emprego'),
            'profissao' => $request->input('profissao'),
            'naturalidade' => $request->input('naturalidade'),
            'bilheteIdentidade' => $request->input('bilheteIdentidade'),
            'empresa' => $request->input('empresa'),
            'nivel' => $request->input('nivel'),
            'curso' => $request->input('curso'),
            'estabelecimentoEnsino' => $request->input('estabelecimentoEnsino'),
            'titulo_publicacao1' => $request->input('titulo_publicacao1'),
            'link_publicacao1' => $request->input('link_publicacao1'),
            'titulo_publicacao2' => $request->input('titulo_publicacao2'),
            'link_publicacao2' => $request->input('link_publicacao2'),
            'titulo_publicacao3' => $request->input('titulo_publicacao3'),
            'link_publicacao3' => $request->input('link_publicacao3'),
            'titulo_publicacao4' => $request->input('titulo_publicacao4'),
            'link_publicacao4' => $request->input('link_publicacao4'),
            'nib' => $request->input('nib'),
        ]);

        // Obtenha os emails dos usuários com a função de admin
        $adminEmails = Role::where('name', 'admin')->first()->users()->pluck('email')->toArray();

        $mail = new NewUserApprovalRequest($user);

        // Envie o email para os emails dos usuários com a função de admin
        Mail::to($adminEmails)->send($mail);

        return redirect()->route('confirmation');
    }

    public function confirmation()
    {
        return view('auth.confirmation');
    }
}
