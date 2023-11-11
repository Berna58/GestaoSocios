@extends('layouts.app')
<title>ASSOCIAM - Admin Arquivo Publicações</title>
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
                    <h1 class="ml-3">{{ __('Publicações Arquivadas') }}</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div class="container">
        <div class="col-md-12 d-flex align-items-center justify-content-between">
            <form action="{{ route('arquivos.publicacoes.search') }}" method="GET" class="d-flex align-items">
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
                    @foreach ($publicacoesArquivados as $publicacao)
                        <tr>
                            <td class="text-nowrap align-middle">{{ $publicacao->titulo }}</td>
                            <td class="text-nowrap align-middle">
                                @php
                                    $descricao = wordwrap($publicacao->descricao, 30, "<br>");
                                @endphp
                                {!! $descricao !!}
                            </td>
                            <td class="text-center align-middle">
                                  <div class="d-flex justify-content-around">
                                    <a class="btn btn-secondary btn-icon animated-hover" onclick="event.preventDefault(); restaurarPublicacao({{ $publicacao->id }});" title="Restaurar"><i class="fa fa-undo"></i></a>
                                    <a type="submit" class="btn btn-secondary btn-icon animated-hover" onclick="event.preventDefault(); excluirPublicacao({{ $publicacao->id }});" title="Excluir Permanente"><i class="fa fa-trash"></i></a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-center mt-3">
                <ul class="pagination custom-pagination">
                    {!! $publicacoesArquivados->links() !!}
                </ul>
            </div>
        </div>
    </div>
@endsection

<script>
    function excluirPublicacao(publicacaoId) {
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
                axios.delete('{{ route('publicacoes.apagarPerm', ['publicacao' => ':publicacaoId']) }}'.replace(':publicacaoId', publicacaoId))
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
                            text: 'Ocorreu um erro ao excluir a publicação',
                            icon: 'error'
                        });
                    });
            }
        });
    }
</script>

<script>
    function restaurarPublicacao(publicacaoId) {
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
                axios.post('{{ route('publicacoes.restore', ['id' => ':publicacaoId']) }}'.replace(':publicacaoId', publicacaoId))
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
                            text: 'Ocorreu um erro ao restaurar a publicação.',
                            icon: 'error'
                        });
                    });
            }
        });
    }
</script>




