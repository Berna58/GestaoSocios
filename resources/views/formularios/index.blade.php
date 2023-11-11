@extends('layouts.app')
<title>ASSOCIAM - Admin Formulários</title>
<link rel="icon" href="{{asset('images/logoassociam.png')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.0/css/boxicons.min.css" integrity="sha512-pVCM5+SN2+qwj36KonHToF2p1oIvoU3bsqxphdOIWMYmgr4ZqD3t5DjKvvetKhXGc/ZG5REYTT6ltKfExEei/Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.2/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.2/dist/sweetalert2.min.js"></script>
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
                    <h1 class="ml-3">{{ __('Formulários') }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <a type="button" class="btn btn-secondary float-right mr-3" href="{{ route('formularios.create') }}">
                        {{ __('Novo Formulário') }}
                    </a>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="col-md-12 d-flex align-items-center justify-content-between">
                        <form action="{{ route('formularios.search') }}" method="GET" class="d-flex align-items">
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
                                    <th>Tipo Ficheiro</th>
                                    <th class="max-width">Título</th>
                                    <th class="max-width">Descrição</th>
                                    <th class="sortable">Data Criação</th>
                                    <th class="sortable">Criado Por</th>
                                    <th class="sortable">Nº Submissões</th>
                                    <th>Ações</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($formularios as $formulario)
                                    <tr>
                                        <td class="align-middle text-center">
                                            <div class="bg-light d-inline-flex justify-content-center align-items-center align-top" style="width: 35px; height: 35px; border-radius: 3px;"><img src="{{ asset('images/' . helpers::getIconByExtension('pdf')) }}" alt="pdf-icon" style="width: 30px; height: 30px;"></div>
                                        </td>
                                        <td class="text-nowrap align-middle">{{ Str::limit($formulario->titulo, 20) }}</td>
                                        <td class="text-nowrap align-middle">
                                            {{ Str::limit($formulario->descricao, 20) }}
                                        </td>
                                        <td class="text-nowrap align-middle"><span>{{ date('d-m-Y',strtotime($formulario->created_at)) }}</span></td>
                                        <td class="text-nowrap align-middle">
                                            <a href="{{ route('formularios.submissoes', $formulario->id) }}">
                                                {{ $formulario->numSubmissoes }}
                                            </a>
                                        </td>
                                        <td class="text-nowrap align-middle">{{ $formulario->user->name }}</td>
                                        <td class="text-center align-middle">
                                            <div class="d-flex justify-content-around">
                                                <a class="btn btn-secondary btn-icon animated-hover" data-toggle="modal" data-target="#viewModal{{ $formulario->id }}" data-bs-toggle="tooltip" title="Ver Publicação" style="color: white"><i class="fas fa-eye"></i></a>
                                                <a class="btn btn-secondary btn-icon animated-hover" style="color: white" data-toggle="modal" data-target="#editModal{{ $formulario->id }}" data-bs-toggle="tooltip" title="Editar Formulário"><i class="fas fa-edit"></i></a>
                                                <a class="btn btn-secondary btn-icon animated-hover" style="color: white" data-toggle="modal" data-target="#deleteModal{{ $formulario->id }}" data-bs-toggle="tooltip" title="Arquivar Formulário"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                                <a class="btn btn-secondary btn-icon animated-hover" href="{{ route('formularios.download', $formulario->id) }}" title="Download Formulário"><i class="fa fa-download" aria-hidden="true"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <div class="d-flex justify-content-center mt-3">
                        <ul class="pagination custom-pagination">
                            {!! $formularios->links() !!}
                        </ul>
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: white">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            @foreach ($errors->all() as $error)
                                {{ $error }}
                            @endforeach
                        </div>
                    @endif

                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible" role="alert">
                            {{ session('success') }}
                            <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close" style="color: white">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                </div>
            </div>

            <!-- EDITAR MODAL -->
            @foreach($formularios as $formulario)
                <div class="modal fade" id="editModal{{ $formulario->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-dark text-white">
                                <h5 class="modal-title" id="editModalLabel">Editar Formulário</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: white">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{ route('formularios.update', $formulario->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="titulo">Título</label>
                                        <input type="text" name="titulo" class="form-control" value="{{ $formulario->titulo }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="descricao">Descrição</label>
                                        <input type="text" name="descricao" class="form-control" value="{{ $formulario->descricao }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="imagem">Imagem</label>
                                        <input type="file" name="imagem" class="form-control-file" value="{{ $formulario->imagem }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="file">Arquivo (somente PDF)</label>
                                        <input type="file" name="file" class="form-control-file" accept=".pdf">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-success">Salvar Alterações</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach

            @foreach($formularios as $formulario)
                <div class="modal fade" id="deleteModal{{ $formulario->id }}" tabindex="-1" role="dialog" aria-labelledby="renewModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-dark text-white">
                                <h5 class="modal-title" id="renewModalLabel"><b>Arquivar formulário</b></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: white">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <br>
                                Tem certeza de que deseja arquivar o formulário <b>{{ $formulario->descricao }}</b> ?
                            </div>
                            <div class="modal-footer">
                                <form action="{{ route('formularios.destroy', $formulario->id) }}" id="arquivarForm{{ $formulario->id }}" method="POST" onsubmit="arquivarFormulario(event, {{ $formulario->id }});">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-danger">Arquivar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            <!-- VIEW MODAL -->
            @foreach($formularios as $formulario)
                <div class="modal fade" id="viewModal{{ $formulario->id }}" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-dark text-white">
                                <h5 class="modal-title" id="viewModalLabel">Visualizar Formulário</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: white">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="text-center mb-4">
                                    <img src="{{ asset($formulario->imagem) }}" alt="Imagem da Notícia" style="max-width: 200px; height: auto;">
                                </div>
                                <h5 class="text-center"><strong>{{ $formulario->titulo }}</strong></h5>
                                <hr>
                                <p><strong>Data:</strong> {{ $formulario->created_at->format('d-m-Y') }}</p>
                                <hr>
                                <p><strong>Descrição:</strong></p>
                                <p>{{ $formulario->descricao }}</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div><!-- /.container-fluid -->
    </div>

    @if ($formularios->count() > 0)
        <script>
            function arquivarFormulario(event, formularioId) {
                event.preventDefault(); // Impede o envio do formulário padrão

                Swal.fire({
                    title: 'Aguarde...',
                    text: 'Arquivando o formulário',
                    allowOutsideClick: false,
                    didOpen: () => {
                        Swal.showLoading();

                        // Crie manualmente um objeto FormData e adicione os valores do formulário a ele
                        const form = document.getElementById('arquivarForm' + formularioId);
                        const formData = new FormData(form);


                        // Envie o formulário usando AJAX com o FormData modificado
                        axios.delete('{{ route('formularios.destroy', ['formulario' => ':formularioId']) }}'.replace(':formularioId', formularioId))
                            .then(function (response) {
                                if (response.data.success) {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Formulário arquivado com sucesso',
                                        showConfirmButton: false,
                                        timer: 1500,
                                        willClose: () => {
                                            location.reload(); // Recarrega a página após o sucesso
                                        }
                                    });
                                } else {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Erro ao arquivar o formulário',
                                        text: 'Ocorreu um erro ao arquivar o formulário',
                                        showConfirmButton: false,
                                        timer: 3000
                                    });
                                }
                            })
                            .catch(function (error) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Erro ao arquivar o formulário',
                                    text: 'Ocorreu um erro ao arquivar o formulário',
                                    showConfirmButton: false,
                                    timer: 3000
                                });
                            });
                    }
                });
            }
        </script>
    @endif

@endsection
