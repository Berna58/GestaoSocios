@extends('layouts.app')
<title>ASSOCIAM - Admin Arquivo Noticias</title>
<link rel="icon" href="{{asset('images/logoassociam.png')}}">

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/axios@0.23.0/dist/axios.min.js"></script>

<link rel="stylesheet" href="{{ asset('css/animationicon.css') }}">
<style>
    .custom-pagination .page-item .page-link {
        color: black;
    }

    .custom-pagination .page-item.active .page-link {
        background-color: black;
        border-color: black;
        color: white;
    }
</style>

@section('content')
    @include('vendor.adminlte.partials.common.preloader')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="ml-3">{{ __('Noticias Arquivados') }}</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div class="container">
        <div class="col-md-12 d-flex align-items-center justify-content-between">
            <form action="{{ route('arquivos.noticias.search') }}" method="GET" class="d-flex align-items">
                <div class="input-group">
                    <input type="text" name="search" class="form-control border-0 rounded-0 shadow" placeholder="Pesquisar" required/>
                    <div class="input-group-append">
                        <button class="btn btn-secondary btn" type="submit"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
        </div>
        <div class="card m-3">
            <div class="card-body p-0" style="max-height: 600px; overflow-y: scroll;">
                <table class="table">
                    <thead>
                    <tr>
                        <th class="max-width">Título</th>
                        <th class="max-width">Descrição</th>
                        <th>Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($noticiasArquivados as $noticia)
                        <tr>
                            <td class="text-nowrap align-middle">{{ $noticia->titulo }}</td>
                            <td class="text-nowrap align-middle">
                                @php
                                    $descricao = wordwrap($noticia->descricao, 30, "<br>");
                                @endphp
                                {!! $descricao !!}
                            </td>
                            <td class="text-center align-middle">
                                <div class="d-flex justify-content-around">
                                    <a class="btn btn-secondary btn-icon animated-hover" data-toggle="modal" data-target="#viewModal{{ $noticia->id }}" data-bs-toggle="tooltip" title="Ver Notícia" style="color: white"><i class="fas fa-eye"></i></a>
                                    <a class="btn btn-secondary btn-icon animated-hover" href="#" onclick="event.preventDefault(); restaurarNoticia({{ $noticia->id }});" title="Restaurar"><i class="fa fa-undo"></i></a>
                                    <a type="submit" class="btn btn-secondary btn-icon animated-hover" onclick="event.preventDefault(); excluirNoticia({{ $noticia->id }});" title="Excluir Permanente"><i class="fa fa-trash"></i></a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

    <!-- VIEW MODAL -->
    @foreach ($noticiasArquivados as $noticia)
        <div class="modal fade" id="viewModal{{ $noticia->id }}" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-dark text-white">
                        <h5 class="modal-title" id="viewModalLabel">Visualizar Noticia Arquivada</h5>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Fechar">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h5><b>{{ $noticia->titulo }}</b></h5>
                        <p>{{ $noticia->descricao }}</p>
                        <p><strong>Data Criação:</strong> {{ date('d-m-Y', strtotime($noticia->created_at)) }}</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
            <div class="d-flex justify-content-center mt-3">
                <ul class="pagination custom-pagination">
                    {!! $noticiasArquivados->links() !!}
                </ul>
            </div>
        </div>
    </div>
@endsection

<script>
    function restaurarNoticia(noticiaId) {
        Swal.fire({
            title: 'Tem certeza?',
            text: 'Essa ação é irreversível!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Restaurar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                axios.post('{{ route('noticias.restore', ['id' => ':noticiaId']) }}'.replace(':noticiaId', noticiaId))
                    .then((response) => {
                        if (response.data.success) {
                            // Documento restaurado com sucesso
                            Swal.fire({
                                title: 'Sucesso!',
                                text: response.data.message,
                                icon: 'success'
                            }).then(() => {
                                // Atualizar a lista de documentos
                                window.location.reload();
                            });
                        } else {
                            // Ocorreu um erro ao restaurar o documento
                            Swal.fire({
                                title: 'Erro!',
                                text: response.data.message,
                                icon: 'error'
                            });
                        }
                    })
                    .catch((error) => {
                        // Ocorreu um erro ao restaurar o documento
                        Swal.fire({
                            title: 'Erro!',
                            text: 'Ocorreu um erro ao restaurar a notícia.',
                            icon: 'error'
                        });
                    });
            }
        });
    }
</script>

<script>
    function excluirNoticia(noticiaId) {
        Swal.fire({
            title: 'Tem certeza?',
            text: 'Essa ação é irreversível!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Excluir',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                axios.delete('{{ route('noticias.apagarPerm', ['noticia' => ':noticiaId']) }}'.replace(':noticiaId', noticiaId))
                    .then((response) => {
                        if (response.data.success) {
                            // Notícia excluída com sucesso
                            Swal.fire({
                                title: 'Sucesso!',
                                text: response.data.message,
                                icon: 'success'
                            }).then(() => {
                                // Atualizar a lista de notícias
                                window.location.reload();
                            });
                        } else {
                            // Ocorreu um erro ao excluir a notícia
                            Swal.fire({
                                title: 'Erro!',
                                text: response.data.message,
                                icon: 'error'
                            });
                        }
                    })
                    .catch((error) => {
                        // Ocorreu um erro ao excluir a notícia
                        Swal.fire({
                            title: 'Erro!',
                            text: 'Ocorreu um erro ao excluir a notícia',
                            icon: 'error'
                        });
                    });
            }
        });
    }
</script>




