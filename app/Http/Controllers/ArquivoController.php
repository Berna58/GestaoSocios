<?php

namespace App\Http\Controllers;

use App\Models\Documento;
use App\Models\Evento;
use App\Models\Formulario;
use App\Models\Ligacao;
use App\Models\Noticia;
use App\Models\Publicacao;
use App\Models\User;
use Illuminate\Http\Request;

class ArquivoController extends Controller
{
    public function index()
    {
        $eventosArquivados = Evento::onlyTrashed()->paginate(10);
        $numeroEventosArquivados = $eventosArquivados->count();
        $ultimaDataArquivoE = $eventosArquivados->max('deleted_at');

        $noticiasArquivados = Noticia::onlyTrashed()->paginate(10);
        $numeroNoticiasArquivados = $noticiasArquivados->count();
        $ultimaDataArquivoN = $eventosArquivados->max('deleted_at');

        $documentosArquivados = Documento::onlyTrashed()->paginate(10);
        $numeroDocumentosArquivados = $documentosArquivados->count();
        $ultimaDataArquivoD = $documentosArquivados->max('deleted_at');

        $publicacoesArquivados = Publicacao::onlyTrashed()->paginate(10);
        $numeroPublicacoesArquivados = $publicacoesArquivados->count();
        $ultimaDataArquivoP = $publicacoesArquivados->max('deleted_at');

        $ligacoesArquivados = Ligacao::onlyTrashed()->paginate(2);
        $numeroLigacoesArquivados = $ligacoesArquivados->count();
        $ultimaDataArquivoL = $ligacoesArquivados->max('deleted_at');

        $formulariosArquivados = Formulario::onlyTrashed()->paginate(10);
        $numeroFormulariosArquivados = $formulariosArquivados->count();
        $ultimaDataArquivoF = $formulariosArquivados->max('deleted_at');

        return view('arquivos.index', compact('eventosArquivados', 'noticiasArquivados', 'numeroEventosArquivados',
            'ultimaDataArquivoE','numeroNoticiasArquivados', 'ultimaDataArquivoN', 'documentosArquivados',
            'numeroDocumentosArquivados', 'ultimaDataArquivoD', 'publicacoesArquivados', 'numeroPublicacoesArquivados', 'ultimaDataArquivoP',
        'ligacoesArquivados', 'numeroLigacoesArquivados', 'ultimaDataArquivoL', 'formulariosArquivados', 'numeroFormulariosArquivados', 'ultimaDataArquivoF'));
    }


}
