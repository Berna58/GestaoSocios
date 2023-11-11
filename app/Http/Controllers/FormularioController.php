<?php

namespace App\Http\Controllers;

use App\Helpers\DocumentHelper;
use App\Models\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Formulario;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\File;
use Svg\Document;

class FormularioController extends Controller
{

    public function index()
    {
        $formularios = Formulario::paginate(10);

        foreach ($formularios as $formulario) {
            $formulario->numSubmissoes = Upload::where('formulario_id', $formulario->id)->count();
        }

        return view('formularios.index', compact('formularios'));
    }

    public function page()
    {
        $formularios = Formulario::all();
        return view('formularios.page', compact('formularios'));
    }

    public function create()
    {
        return view('formularios.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'descricao' => 'required',
            'imagem' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'file' => 'nullable|mimes:pdf|max:2048',
        ]);

        $formulario = new Formulario();
        $formulario->titulo = $request->input('titulo');
        $formulario->descricao = $request->input('descricao');
        $formulario->user_id = auth()->user()->id;

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = 'uploads/formularios/';
            $file->move(public_path($filePath), $fileName);
            $formulario->file = $filePath . $fileName;
        }

        if ($request->hasFile('imagem')) {
            $imagem = $request->file('imagem');
            $imagemNome = time() . '.' . $imagem->getClientOriginalExtension();
            $caminhoDestino = public_path('images/formularios');
            $imagem->move($caminhoDestino, $imagemNome);
            $imagemPath = 'images/formularios/' . $imagemNome;
            $formulario->imagem = $imagemPath;
        }

        $formulario->save();

        return redirect()->route('formularios.index')->with('success', 'Formulário criado com sucesso.');
    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        $formularios = Formulario::query()
            ->where('titulo', 'LIKE', "%{$search}%")
            ->paginate(10);

        return view('formularios.index', compact('formularios'));
    }

    public function download($id)
    {
        $formulario = Formulario::findOrFail($id);
        $filePath = public_path($formulario->file);

        return response()->download($filePath);
    }

    public function destroy($id)
    {
        $formulario = Formulario::findOrFail($id);

        if ($formulario->delete()) {
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false]);
        }
    }

    public function update(Request $request, $id)
    {
        $formulario = Formulario::findOrFail($id);

        $formulario->titulo = $request->titulo;
        $formulario->descricao = $request->descricao;
        $formulario->user_id = auth()->user()->id;

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = 'uploads/formularios/';
            $file->move(public_path($filePath), $fileName);

            if ($formulario->file) {
                $oldFilePath = public_path($formulario->file);
                if (file_exists($oldFilePath)) {
                    unlink($oldFilePath);
                }
            }

            $formulario->file = $filePath . $fileName;
        }

        $formulario->save();

        return back()->with('success', 'As alterações foram salvas com sucesso!');
    }


    public function show()
    {
        $formulariosArquivados = Formulario::onlyTrashed()->paginate(10);
        return view('arquivos.formularios', compact('formulariosArquivados'));
    }

    public function restore($id)
    {
        $formulario = Formulario::onlyTrashed()->findOrFail($id);
        $formulario->restore();

        $response = [
            'success' => true,
            'message' => 'Formulário restaurado com sucesso.'
        ];

        return response()->json($response);
    }

    public function apagarPerm($id)
    {
        $formularioArquivado = Formulario::onlyTrashed()->findOrFail($id);

        // Obtém o caminho completo do arquivo
        $filePath = public_path($formularioArquivado->file);

        if (file_exists($filePath)) {
            unlink($filePath);
        }

        $formularioArquivado->forceDelete();

        $response = [
            'success' => true,
            'message' => 'Formulário excluído permanentemente com sucesso.'
        ];

        return response()->json($response);
    }

    public function searchA(Request $request)
    {
        $search = $request->input('search');


        $formulariosArquivados = Formulario::onlyTrashed()
            ->where('titulo', 'LIKE', "%{$search}%")
            ->paginate(10);

        return view('arquivos.formularios', compact('formulariosArquivados'));
    }

    public function upload(Request $request, $id)
    {
        $formulario = Formulario::findOrFail($id);

        if (Auth::check()) {
            $user = Auth::user();
            $userId = $user->id;
            $name = $user->name;
            $email = $user->email;
            $tipo_membro = 'Associado';
        } else {
            $userId = null;
            $name = $request->input('name');
            $email = $request->input('email');
            $tipo_membro = 'Visitante';
        }

        $request->validate([
            'file' => 'required|mimes:pdf|max:2048',
        ]);

        $file = $request->file('file');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $filePath = 'uploads/formulariosP/';
        $file->move(public_path($filePath), $fileName);

        if ($formulario->file) {
            $oldFilePath = public_path($formulario->file);
            if (file_exists($oldFilePath)) {
                unlink($oldFilePath);
            }
        }

        $upload = new Upload();
        $upload->formulario_id = $formulario->id;
        $upload->user_id = $userId;
        $upload->name = $name;
        $upload->email = $email;
        $upload->tipo_membro = $tipo_membro;
        $upload->file = $filePath . $fileName;
        $upload->save();

        return back()->with('success', 'O formulário foi enviado com sucesso!');
    }

}
