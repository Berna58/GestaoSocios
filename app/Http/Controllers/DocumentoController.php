<?php

namespace App\Http\Controllers;

use App\Helpers\DocumentHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\Documento;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\File;
use Svg\Document;

class DocumentoController extends Controller
{
    protected $documentHelper;

    public function __construct(DocumentHelper $documentHelper)
    {
        $this->documentHelper = $documentHelper;
    }

    public function index(Request $request)
    {
        $searchTerm = $request->input('search');

        if ($searchTerm) {
            $documentos = Documento::where('titulo', 'LIKE', '%' . $searchTerm . '%')->paginate(10);
        } else {
            $documentos = Documento::paginate(10);
        }

        return view('documentos.index', compact('documentos'));
    }



    public function page()
    {
        $documentos = Documento::all();

        return view('documentos.page', ['documentos' => $documentos]);
    }

    public function create()
    {
        return view('documentos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:pdf|max:2048',
            'titulo' => 'required',
            'descricao' => 'required',
        ]);

        $file = $request->file('file');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $filePath = 'uploads/documentos/';
        $file->move(public_path($filePath), $fileName);

        $documento = new Documento();
        $documento->titulo = $request->input('titulo');
        $documento->descricao = $request->input('descricao');
        $documento->file = $filePath . $fileName;
        $documento->user_id = auth()->user()->id;
        $documento->save();

        return redirect()->route('documentos.index', $documento->id);
    }

    public function download($id)
    {
        $documento = Documento::findOrFail($id);
        $filePath = public_path($documento->file);

        return response()->download($filePath);
    }


    public function visualizar(Documento $documento)
    {
        $filePath = public_path('uploads/documentos/' . $documento->file);

        if (!file_exists($filePath)) {
            abort(404);
        }

        return response()->file($filePath, ['Content-Type' => 'application/pdf']);
    }

    public function destroy($id)
    {
        $documento = Documento::findOrFail($id);

        if ($documento->delete()) {
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false]);
        }
    }

    public function update(Request $request, $id)
    {
        $documento = Documento::findOrFail($id);
        $documento->titulo = $request->input('titulo');
        $documento->descricao = $request->input('descricao');

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = 'uploads/documentos/';

            if (!file_exists(public_path($filePath))) {
                File::makeDirectory(public_path($filePath), $mode = 0777, true, true);
            }

            $file->move(public_path($filePath), $fileName);

            if ($documento->file) {
                $oldFilePath = public_path($documento->file);
                if (file_exists($oldFilePath)) {
                    unlink($oldFilePath);
                }
            }

            $documento->file = $filePath . $fileName;
        }

        $documento->save();

        return back()->with('success', 'As alterações foram salvas com sucesso!');
    }


    public function show()
    {
        $documentosArquivados = Documento::onlyTrashed()->paginate(10);
        return view('arquivos.documentos', compact('documentosArquivados'));
    }

    public function restore($id)
    {
        $documento = Documento::onlyTrashed()->findOrFail($id);
        $documento->restore();

        $response = [
            'success' => true,
            'message' => 'Documento restaurado com sucesso.'
        ];

        return response()->json($response);
    }

    public function apagarPerm($id)
    {
        $documentoArquivado = Documento::onlyTrashed()->findOrFail($id);

        $filePath = public_path($documentoArquivado->file);

        if (file_exists($filePath)) {
            unlink($filePath);
        }

        $documentoArquivado->forceDelete();

        // Prepara a resposta com a mensagem de sucesso
        $response = [
            'success' => true,
            'message' => 'Documento excluído permanentemente com sucesso.'
        ];

        // Retorna a resposta como JSON
        return response()->json($response);
    }

    public function search(Request $request)
    {
        // Get the search value from the request
        $search = $request->input('search');

        // Search in the title column from the documentos table using pagination
        $documentos = Documento::query()
            ->where('titulo', 'LIKE', "%{$search}%")
            ->paginate(10); // Define o número de itens por página (no exemplo, 10)

        // Return the search view with the results compacted
        return view('documentos.index', compact('documentos'));
    }


    public function searchA(Request $request)
    {
        // Get the search value from the request
        $search = $request->input('search');

        // Search for archived news with matching title
        $documentosArquivados = Documento::onlyTrashed()
            ->where('titulo', 'LIKE', "%{$search}%")
            ->paginate(10);

        // Return the search view with the results compacted
        return view('arquivos.documentos', compact('documentosArquivados'));
    }



}
