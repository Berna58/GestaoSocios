<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/confirmation', [App\Http\Controllers\Auth\RegisterController::class, 'confirmation'])->name('confirmation');
Route::get('/suspensao', [App\Http\Controllers\Auth\LoginController::class, 'suspension'])->name('suspension');
Route::get('/historia', [App\Http\Controllers\HistoriaController::class, 'index'])->name('historia');
Route::get('/objetivo', [App\Http\Controllers\ObjetivoController::class, 'index'])->name('objetivo');
Route::get('/contacto', [App\Http\Controllers\ContactoController::class, 'index'])->name('contacto');
Route::get('/orgaossociais', [App\Http\Controllers\OrgaoSociaisController::class, 'index'])->name('orgaossociais');
Route::get('/descricao', [App\Http\Controllers\DescricaoController::class, 'index'])->name('descricao');
Route::get('/ligacoes', [App\Http\Controllers\LigacaoController::class, 'page'])->name('ligacoes');
Route::get('/documentos', [App\Http\Controllers\DocumentoController::class, 'page'])->name('documento');
Route::get('/publicacoes', [App\Http\Controllers\PublicacaoController::class, 'page'])->name('publicacoes');
Route::get('/formularios', [App\Http\Controllers\FormularioController::class, 'page'])->name('formularios');

Route::post('/enviar-contato', [App\Http\Controllers\ContactoController::class, 'sendContact'])->name('send.contact');


Route::get('/eventos/{id}', [App\Http\Controllers\EventoController::class, 'ver'])->name('evento.show');
Route::post('/evento/inscrever-temporaria/{evento}', [App\Http\Controllers\EventoController::class, 'inscreverTemporaria'])->name('evento.inscreverTemporaria');

Route::get('/formularios/download/{id}', [App\Http\Controllers\FormularioController::class, 'download'])->name('formularios.download');
Route::get('/documentos/download/{id}', [App\Http\Controllers\DocumentoController::class, 'download'])->name('documentos.download');
Route::get('/publicacoes/download/{id}', [App\Http\Controllers\PublicacaoController::class, 'download'])->name('publicacoes.download');
Route::get('/publicacao/{id}', [App\Http\Controllers\PublicacaoController::class, 'ver'])->name('publicacoes.ver');
Route::get('documentos/visualizar/{documento}', [App\Http\Controllers\DocumentoController::class, 'visualizar'])->name('documentos.visualizar');
Route::post('/formularios/{id}/upload', [App\Http\Controllers\FormularioController::class, 'upload'])->name('formularios.upload');


Route::middleware(['web', 'auth'])->group(function () {
    Route::get('/minhaarea', [App\Http\Controllers\MinhaareaController::class, 'index'])->name('minhaarea');
    Route::get('/eventos-inscritos', [App\Http\Controllers\MinhaareaController::class, 'eventosInscritos'])->name('eventos-inscritos');

    Route::post('/evento/inscrever/{evento}', [App\Http\Controllers\EventoController::class, 'inscrever'])->name('evento.inscrever');
    Route::delete('/evento/cancelar-inscricao/{evento}', [App\Http\Controllers\EventoController::class, 'cancelarInscricao'])->name('evento.cancelar-inscricao');

    Route::resource('perfil', App\Http\Controllers\ProfileController::class);
    Route::get('profile', [App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('/perfil/{user}',[App\Http\Controllers\ProfileController::class,'update'])->name('perfil.update');
    Route::get('/perfil/{user}', [App\Http\Controllers\ProfileController::class, 'delete'])->name('perfil.delete');

    Route::prefix('forum')->group(function () {
        Route::get('/', [App\Http\Controllers\TopicosController::class, 'index'])->name('topicos.index');
        Route::get('/create', [App\Http\Controllers\TopicosController::class, 'create'])->name('topicos.create');
        Route::post('/', [App\Http\Controllers\TopicosController::class, 'store'])->name('topicos.store');
        Route::get('/topicos/{id}', [App\Http\Controllers\TopicosController::class, 'show'])->name('topicos.show');
        Route::delete('/topico/{id}', [App\Http\Controllers\TopicosController::class, 'destroy'])->name('topicos.destroy');
        Route::put('/topico/{id}', [App\Http\Controllers\TopicosController::class, 'update'])->name('topicos.update');
        Route::post('/{topicoId}/respostas', [App\Http\Controllers\RespostasTController::class, 'store'])->name('respostas.store');
        Route::delete('/{respostaId}', [App\Http\Controllers\RespostasTController::class, 'destroy'])->name('respostasT.destroy');
        Route::put('/{respostaId}', [App\Http\Controllers\RespostasTController::class, 'update'])->name('respostasT.update');
        Route::get('/topico/{id}', [App\Http\Controllers\TopicosController::class, 'ver'])->name('topicos.show');
        Route::get('/pesquisa', [App\Http\Controllers\TopicosController::class, 'search'])->name('topicos.search');
    });


    Route::post('/reply/{id}', [App\Http\Controllers\RespostaController::class, 'reply'])->name('respostas.reply');
    Route::delete('/respostas/{id}', [App\Http\Controllers\RespostaController::class, 'destroy'])->name('respostas.destroy');
    Route::put('/respostas/{id}', [App\Http\Controllers\RespostaController::class, 'update'])->name('respostas.update');

    Route::prefix('comentarios')->group(function () {
        Route::post('/', [App\Http\Controllers\ComentarioController::class, 'store'])->name('comentarios.store');
        Route::delete('/{id}', [App\Http\Controllers\ComentarioController::class, 'destroy'])->name('comentarios.destroy');
        Route::delete('/{id}', [App\Http\Controllers\ComentarioController::class, 'destroy'])->name('comentarios.destroy');
        Route::put('/{id}', [App\Http\Controllers\ComentarioController::class, 'update'])->name('comentarios.update');
    });

    Route::prefix('comentariostopicos')->group(function () {
        Route::post('/', [App\Http\Controllers\ComentarioTController::class, 'store'])->name('comentariosT.store');
        Route::delete('/{id}', [App\Http\Controllers\ComentarioTController::class, 'destroy'])->name('comentariosT.destroy');
        Route::put('/{id}', [App\Http\Controllers\ComentarioTController::class, 'update'])->name('comentariosT.update');
    });

});



Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/pedidos', [App\Http\Controllers\AdminController::class, 'pedidos'])->name('admin.pedidos');
    Route::get('/cotas', [App\Http\Controllers\CotasController::class, 'index'])->name('cotas.index');
    Route::get('/cotas/pagas/{userId}', [App\Http\Controllers\CotasController::class, 'cotasPagas'])->name('cotas.cotasPagas');
    Route::get('/cotas/pagas/{userId}/{ano}', [App\Http\Controllers\CotasController::class, 'updatePagamento'])->name('cotas.updatePagamento');
    Route::get('/cotas/total/{userId}', [App\Http\Controllers\CotasController::class, 'showPage'])->name('cotas.showPage');
    Route::get('/pesquisa', [App\Http\Controllers\InscricaoController::class, 'search'])->name('inscricoes.search');
    Route::post('/marcar-presenca/{inscricao}', [App\Http\Controllers\InscricaoController::class, 'marcarPresenca'])->name('marcar-presenca');
    Route::post('/marcar-presenca-temporaria/{inscricaoTemporaria}', [App\Http\Controllers\InscricaoController::class, 'marcarPresencaTemporaria'])->name('marcar-presenca-temporaria');


    Route::prefix('users')->group(function ()
    {
        Route::get('/', [App\Http\Controllers\UserController::class, 'index'])->name('users.index');
        Route::get('/pesquisa', [App\Http\Controllers\UserController::class, 'search'])->name('users.search');
        Route::get('/filtros', [App\Http\Controllers\UserController::class, 'searchFilter'])->name('users.searchFilter');
        Route::put('/{user}/update-role', [App\Http\Controllers\UserController::class, 'updateRole'])->name('users.updateRole');
        Route::delete('/{user}', [App\Http\Controllers\UserController::class, 'destroy'])->name('associados.destroy');
        Route::post('/{user}/approve', [App\Http\Controllers\AdminController::class, 'approveUser'])->name('admin.users.approve');
        Route::post('/{user}/reject', [App\Http\Controllers\AdminController::class, 'rejectUser'])->name('admin.users.reject');
    });

    Route::prefix('ligacoes')->group(function () {
        Route::resource('ligacoes', App\Http\Controllers\LigacaoController::class);
        Route::get('/', [App\Http\Controllers\LigacaoController::class, 'index'])->name('ligacoes.index');
        Route::get('/create', [App\Http\Controllers\LigacaoController::class, 'create'])->name('ligacoes.create');
        Route::post('/', [App\Http\Controllers\LigacaoController::class, 'store'])->name('ligacoes.store');
        Route::delete('/{ligacao}', [App\Http\Controllers\LigacaoController::class, 'destroy'])->name('ligacoes.destroy');
        Route::put('/{ligacao}', [App\Http\Controllers\LigacaoController::class, 'update'])->name('ligacoes.update');
        Route::get('/pesquisa', [App\Http\Controllers\LigacaoController::class, 'search'])->name('ligacoes.search');
        Route::delete('/{ligacao}/apagar-perm', [App\Http\Controllers\LigacaoController::class, 'apagarPerm'])->name('ligacoes.apagarPerm');
    });

    Route::prefix('documentos')->group(function () {
        Route::resource('documentos', App\Http\Controllers\DocumentoController::class);
        Route::get('/', [App\Http\Controllers\DocumentoController::class, 'index'])->name('documentos.index');
        Route::get('/create', [App\Http\Controllers\DocumentoController::class, 'create'])->name('documentos.create');
        Route::get('/{documento}/edit', [App\Http\Controllers\DocumentoController::class, 'edit'])->name('documentos.edit');
        Route::post('/', [App\Http\Controllers\DocumentoController::class, 'store'])->name('documentos.store');
        Route::delete('/{documento}', [App\Http\Controllers\DocumentoController::class, 'destroy'])->name('documentos.destroy');
        Route::delete('/{documento}/apagar-perm', [App\Http\Controllers\DocumentoController::class, 'apagarPerm'])->name('documentos.apagarPerm');
        Route::get('/pesquisa', [App\Http\Controllers\DocumentoController::class, 'search'])->name('documentos.search');
    });

    Route::prefix('eventos')->group(function () {
        Route::resource('eventos', App\Http\Controllers\EventoController::class);
        Route::get('/', [App\Http\Controllers\EventoController::class, 'index'])->name('eventos.index');
        Route::get('/create', [App\Http\Controllers\EventoController::class, 'create'])->name('eventos.create');
        Route::get('/{evento}/edit', [App\Http\Controllers\EventoController::class, 'edit'])->name('eventos.edit');
        Route::post('/', [App\Http\Controllers\EventoController::class, 'store'])->name('eventos.store');
        Route::delete('/{evento}', [App\Http\Controllers\EventoController::class, 'destroy'])->name('eventos.destroy');
        Route::delete('/{evento}/apagar-perm', [App\Http\Controllers\EventoController::class, 'apagarPerm'])->name('eventos.apagarPerm');
        Route::get('/pesquisa', [App\Http\Controllers\EventoController::class, 'search'])->name('eventos.search');
        Route::get('/inscricoes/{evento}', [App\Http\Controllers\InscricaoController::class, 'inscricoes'])->name('eventos.inscricoes');
    });

    Route::prefix('publicacoes')->group(function () {
        Route::resource('publicacoes', App\Http\Controllers\PublicacaoController::class);
        Route::get('/', [App\Http\Controllers\PublicacaoController::class, 'index'])->name('publicacoes.index');
        Route::get('/create', [App\Http\Controllers\PublicacaoController::class, 'create'])->name('publicacoes.create');
        Route::get('/{publicacao}/edit', [App\Http\Controllers\PublicacaoController::class, 'edit'])->name('publicacoes.edit');
        Route::post('/', [App\Http\Controllers\PublicacaoController::class, 'store'])->name('publicacoes.store');
        Route::put('/{publicacao}', [App\Http\Controllers\PublicacaoController::class, 'update'])->name('publicacoes.update');
        Route::delete('/{publicacao}', [App\Http\Controllers\PublicacaoController::class, 'destroy'])->name('publicacoes.destroy');
        Route::delete('/{publicacao}/apagar-perm', [App\Http\Controllers\PublicacaoController::class, 'apagarPerm'])->name('publicacoes.apagarPerm');
        Route::get('/pesquisa', [App\Http\Controllers\PublicacaoController::class, 'search'])->name('publicacoes.search');
    });

    Route::prefix('noticias')->group(function () {
        Route::resource('noticias', App\Http\Controllers\NoticiaController::class);
        Route::get('/', [App\Http\Controllers\NoticiaController::class, 'index'])->name('noticias.index');
        Route::get('/create', [App\Http\Controllers\NoticiaController::class, 'create'])->name('noticias.create');
        Route::get('/{noticia}/edit', [App\Http\Controllers\NoticiaController::class, 'edit'])->name('noticias.edit');
        Route::post('/', [App\Http\Controllers\NoticiaController::class, 'store'])->name('noticias.store');
        Route::delete('/{noticia}', [App\Http\Controllers\NoticiaController::class, 'destroy'])->name('noticias.destroy');
        Route::delete('/{noticia}/apagar-perm', [App\Http\Controllers\NoticiaController::class, 'apagarPerm'])->name('noticias.apagarPerm');
        Route::get('/pesquisa', [App\Http\Controllers\NoticiaController::class, 'search'])->name('noticias.search');
    });

    Route::prefix('formularios')->group(function () {
        Route::resource('formularios', App\Http\Controllers\FormularioController::class);
        Route::get('/create', [App\Http\Controllers\FormularioController::class, 'create'])->name('formularios.create');
        Route::post('/', [App\Http\Controllers\FormularioController::class, 'store'])->name('formularios.store');
        Route::get('/', [App\Http\Controllers\FormularioController::class, 'index'])->name('formularios.index');
        Route::get('/{formulario}/edit', [App\Http\Controllers\FormularioController::class, 'edit'])->name('formularios.edit');
        Route::delete('/{formulario}', [App\Http\Controllers\FormularioController::class, 'destroy'])->name('formularios.destroy');
        Route::delete('/{formulario}/apagar-perm', [App\Http\Controllers\FormularioController::class, 'apagarPerm'])->name('formularios.apagarPerm');
        Route::get('/pesquisa', [App\Http\Controllers\FormularioController::class, 'search'])->name('formularios.search');
        Route::get('/{id}/submissoes', [App\Http\Controllers\UploadController::class, 'submissoes'])->name('formularios.submissoes');
    });

    Route::get('/submissoes/pesquisar', [App\Http\Controllers\UploadController::class, 'search'])->name('submissoes.search');

    Route::prefix('arquivados')->group(function () {
        Route::get('/', [App\Http\Controllers\ArquivoController::class, 'index'])->name('arquivos.index');
        Route::get('/eventos', [App\Http\Controllers\EventoController::class, 'show'])->name('arquivos.eventos');
        Route::get('/noticias', [App\Http\Controllers\NoticiaController::class, 'show'])->name('arquivos.noticias');
        Route::get('/documentos', [App\Http\Controllers\DocumentoController::class, 'show'])->name('arquivos.documentos');
        Route::get('/publicacoes', [App\Http\Controllers\PublicacaoController::class, 'show'])->name('arquivos.publicacoes');
        Route::get('/ligacoes', [App\Http\Controllers\LigacaoController::class, 'show'])->name('arquivos.ligacoes');
        Route::get('/formularios', [App\Http\Controllers\FormularioController::class, 'show'])->name('arquivos.formularios');
        Route::post('/eventos/{id}/restore', [App\Http\Controllers\EventoController::class, 'restore'])->name('eventos.restore');
        Route::post('/noticias/{id}/restore', [App\Http\Controllers\NoticiaController::class, 'restore'])->name('noticias.restore');
        Route::post('/documentos/{id}/restore', [App\Http\Controllers\DocumentoController::class, 'restore'])->name('documentos.restore');
        Route::post('/publicacoes/{id}/restore', [App\Http\Controllers\PublicacaoController::class, 'restore'])->name('publicacoes.restore');
        Route::post('/ligacoes/{id}/restore', [App\Http\Controllers\LigacaoController::class, 'restore'])->name('ligacoes.restore');
        Route::post('/formularios/{id}/restore', [App\Http\Controllers\FormularioController::class, 'restore'])->name('formularios.restore');
        Route::get('/noticias/pesquisar', [App\Http\Controllers\NoticiaController::class, 'searchA'])->name('arquivos.noticias.search');
        Route::get('/documentos/pesquisar', [App\Http\Controllers\DocumentoController::class, 'searchA'])->name('arquivos.documentos.search');
        Route::get('/publicacoes/pesquisar', [App\Http\Controllers\PublicacaoController::class, 'searchA'])->name('arquivos.publicacoes.search');
        Route::get('/eventos/pesquisar', [App\Http\Controllers\EventoController::class, 'searchA'])->name('arquivos.eventos.search');
        Route::get('/formularios/pesquisar', [App\Http\Controllers\FormularioController::class, 'searchA'])->name('arquivos.formularios.search');
        Route::get('/ligacoes/pesquisar', [App\Http\Controllers\LigacaoController::class, 'searchA'])->name('arquivos.ligacoes.search');
    });

});

