<?php

namespace App\Http\Controllers;

use App\Models\Formulario;
use App\Models\Upload;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function submissoes($id)
    {
        $formulario = Formulario::findOrFail($id);
        $submissoes = $formulario->uploads;

        return view('formularios.submissoes', compact('formulario', 'submissoes'));
    }

    public function destroy($id)
    {
        $submissoes = Upload::findOrFail($id);

        // Verificar se o usuário logado é o autor do comentário
        if ($submissoes->user_id === auth()->user()->id) {
            $submissoes->delete();
        }

        return redirect()->route('formularios.submissoes');
    }

    public function search(Request $request)
    {
        // Get the search value from the request
        $search = $request->input('search');

        // Search for uploads by user name
        $submissoes = Upload::query()
            ->join('users', 'uploads.user_id', '=', 'users.id')
            ->where('users.name', 'LIKE', "%{$search}%")
            ->paginate(10);

        // Retrieve the $formulario variable (assuming it is an instance of a model or an array)
        $formulario = Formulario::find(1); // Example: retrieving a Formulario model instance

        // Return the search view with the results and $formulario variable compacted
        return view('formularios.submissoes', compact('submissoes', 'formulario'));
    }


}
