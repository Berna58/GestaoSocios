@extends('layouts.app')
<title>ASSOCIAM - Admin Documentos</title>
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
                    <h1 class="ml-3">{{ __('Documentos') }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <a type="button" class="btn btn-secondary float-right mr-3" href="{{ route('documentos.create') }}">
                        {{ __('Novo Documento') }}
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
                        <form action="{{ route('documentos.search') }}" method="GET" class="d-flex align-items- ml-2">
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
                                    <th>Ações</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($documentos as $documento)
                                    <tr>
                                        <td class="align-middle text-center">
                                            <div class="bg-light d-inline-flex justify-content-center align-items-center align-top" style="width: 35px; height: 35px; border-radius: 3px;"><img src="{{ asset('images/' . helpers::getIconByExtension('pdf')) }}" alt="pdf-icon" style="width: 30px; height: 30px;"></div>
                                        </td>
                                        <td class="text-nowrap align-middle">{{ $documento->titulo }}</td>
                                        <td class="text-nowrap align-middle">
                                            {{ Str::limit($documento->descricao, 30) }}
                                        </td>
                                        <td class="text-nowrap align-middle"><span>{{ date('d-m-Y',strtotime($documento->created_at)) }}</span></td>
                                        <td class="text-nowrap align-middle">{{ $documento->user->name }}</td>
                                        <td class="text-center align-middle">
                                            <div class="d-flex justify-content-around">
                                                <a class="btn btn-secondary btn-icon animated-hover" data-toggle="modal" data-target="#editModal{{ $documento->id }}" data-bs-toggle="tooltip" title="Editar Documento"><i class="fas fa-edit"></i></a>
                                                <a class="btn btn-secondary btn-icon animated-hover" data-toggle="modal" data-target="#deleteModal{{ $documento->id }}" data-bs-toggle="tooltip" title="Arquivar Documento"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                                <a class="btn btn-secondary btn-icon animated-hover" href="{{ route('documentos.download', $documento->id) }}" title="Download Documento"><i class="fa fa-download" aria-hidden="true"></i></a>
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
                            {!! $documentos->links() !!}
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
            @foreach($documentos as $documento)
                <div class="modal fade" id="editModal{{ $documento->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-dark text-white">
                                <h5 class="modal-title" id="editModalLabel">Editar Documento</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: white">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{ route('documentos.update', $documento->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="titulo">Título</label>
                                        <input type="text" name="titulo" class="form-control" value="{{ $documento->titulo }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="descricao">Descrição</label>
                                        <input type="text" name="descricao" class="form-control" value="{{ $documento->descricao }}" required>
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

            @foreach($documentos as $documento)
                <div class="modal fade" id="deleteModal{{ $documento->id }}" tabindex="-1" role="dialog" aria-labelledby="renewModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-dark text-white">
                                <h5 class="modal-title" id="renewModalLabel"><b>Arquivar documento</b></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: white">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <br>
                                Tem certeza de que deseja arquivar o documento <b>{{ $documento->descricao }}</b> ?
                            </div>
                            <div class="modal-footer">
                                <form action="{{ route('documentos.destroy', $documento->id) }}" id="arquivarForm{{ $documento->id }}" method="POST" onsubmit="arquivarDocumento(event, {{ $documento->id }});">
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
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    @if ($documentos->count() > 0)
    <script>
        function arquivarDocumento(event, documentoId) {
            event.preventDefault(); // Impede o envio do formulário padrão

            Swal.fire({
                title: 'Aguarde...',
                text: 'A arquivar o documento',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();

                    // Crie manualmente um objeto FormData e adicione os valores do formulário a ele
                    const form = document.getElementById('arquivarForm' + documentoId);
                    const formData = new FormData(form);

                    // Adicione o ID do documento ao FormData
                    formData.append('documentoId', documentoId);

                    // Envie o formulário usando AJAX com o FormData modificado
                    axios.delete('{{ route('documentos.destroy', ['documento' => ':documentoId']) }}'.replace(':documentoId', documentoId))
                        .then(function (response) {
                            if (response.data.success) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Documento arquivado com sucesso',
                                    showConfirmButton: false,
                                    timer: 1500,
                                    willClose: () => {
                                        location.reload(); // Recarrega a página após o sucesso
                                    }
                                });
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Erro ao arquivar o documento',
                                    text: 'Ocorreu um erro ao arquivar o documento',
                                    showConfirmButton: false,
                                    timer: 3000
                                });
                            }
                        })
                        .catch(function (error) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Erro ao arquivar o documento',
                                text: 'Ocorreu um erro ao arquivar o documento',
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
