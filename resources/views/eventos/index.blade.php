@extends('layouts.app')
<title>ASSOCIAM - Admin Eventos</title>
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
                    <h1 class="ml-3">{{ __('Eventos') }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <a type="button" class="btn btn-secondary float-right mr-3" href="{{ route('eventos.create') }}">
                        {{ __('Novo Evento') }}
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
                        <form action="{{ route('eventos.search') }}" method="GET" class="d-flex align-items- ml-2">
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
                                    <th>Título</th>
                                    <th>Descrição</th>
                                    <th>Local</th>
                                    <th class="max-width">Data</th>
                                    <th class="max-width">Hora</th>
                                    <th class="sortable">Nº Presenças</th>
                                    <th class="sortable">Criado Por</th>
                                    <th>Ações</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($eventos as $evento)
                                    <tr>
                                        <td class="text-nowrap align-middle">{{ Str::limit($evento->titulo, 25) }}</td>
                                        <td class="text-nowrap align-middle">
                                            {!! Str::limit($evento->descricao, 25) !!}
                                        </td>
                                        <td class="text-nowrap align-middle">
                                            {{ Str::limit($evento->local, 25) }}
                                        </td>
                                        <td class="text-nowrap align-middle"><span>{{ date('d/m/Y', strtotime($evento->data)) }}</span></td>
                                        <td class="text-nowrap align-middle"><span>{{ date('H:i', strtotime($evento->hora)) }}</span></td>
                                        <td class="text-nowrap align-middle">
                                            <a href="{{ route('eventos.inscricoes', $evento->id) }}">
                                                {{ $evento->totalInscricoes }}
                                            </a>
                                        </td>
                                        <td class="text-nowrap align-middle">{{ $evento->user->name }}</td>
                                        <td class="text-center align-middle">
                                            <div class="d-flex justify-content-around">
                                                <a class="btn btn-secondary btn-icon animated-hover" data-toggle="modal" data-target="#viewModal{{ $evento->id }}" data-bs-toggle="tooltip" title="Visualizar Evento" style="color: white"><i class="far fa-eye"></i></a>
                                                <a class="btn btn-secondary btn-icon animated-hover ml-1" data-toggle="modal" data-target="#editModal{{ $evento->id }}" data-bs-toggle="tooltip" title="Editar Evento" style="color: white"><i class="fas fa-edit"></i></a>
                                                <a class="btn btn-secondary btn-icon animated-hover ml-1" data-toggle="modal" data-target="#deleteModal{{ $evento->id }}" data-bs-toggle="tooltip" title="Apagar Evento" style="color: white"><i class="fa fa-trash" aria-hidden="true"></i></a>
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
                            {!! $eventos->links() !!}
                        </ul>
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    {{ $error }}
                                @endforeach
                        </div>
                    @endif

                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                </div>
            </div>

            @foreach($eventos as $evento)
                <div class="modal fade" id="editModal{{ $evento->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-dark text-white">
                                <h5 class="modal-title" id="editModalLabel">Editar Evento</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: white">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{ route('eventos.update', $evento->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="titulo">Título</label>
                                        <input type="text" name="titulo" class="form-control" value="{{ $evento->titulo }}" required id="titulo{{ $evento->id }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="descricao">Descrição</label>
                                        <textarea type="text" name="descricao" class="form-control" required id="descricao{{ $evento->id }}">{{ $evento->descricao }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="local">Local</label>
                                        <input type="text" name="local" class="form-control" value="{{ $evento->local }}" required id="local{{ $evento->id }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="data">Data</label>
                                        <input type="date" name="data" class="form-control-date" value="{{ $evento->data }}" required id="data{{ $evento->id }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="hora">Hora</label>
                                        <input type="time" name="hora" class="form-control-time" value="{{ $evento->hora }}" required id="hora{{ $evento->id }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="imagem">Imagem</label>
                                        <input type="file" name="imagem" class="form-control-file" value="{{ asset($evento->imagem) }}" id="imagem{{ $evento->id }}">
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

            <!-- APAGAR MODAL -->
            @foreach($eventos as $evento)
                <div class="modal fade" id="deleteModal{{ $evento->id }}" tabindex="-1" role="dialog" aria-labelledby="renewModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-dark text-white">
                                <h5 class="modal-title" id="renewModalLabel"><b>Arquivar Evento</b></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: white">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <br>
                                Tem certeza de que deseja arquivar o evento <b>{{ $evento->titulo }}</b> ?
                            </div>
                            <div class="modal-footer">
                                <form action="{{ route('eventos.destroy', $evento->id) }}" id="arquivarForm{{ $evento->id }}" method="POST" onsubmit="arquivarEvento(event, {{ $evento->id }});">
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
            @foreach($eventos as $evento)
                <div class="modal fade" id="viewModal{{ $evento->id }}" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-dark text-white">
                                <h5 class="modal-title" id="viewModalLabel">Visualizar Evento</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: white">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="text-center mb-4">
                                    <img src="{{ asset($evento->imagem) }}" alt="Imagem do Evento" style="max-width: 200px; height: auto;">
                                </div>
                                <h5 class="text-center"><strong>{{ $evento->titulo }}</strong></h5>
                                <hr>
                                <p><strong>Data:</strong> {{ date('d-m-Y', strtotime($evento->data)) }}</p>
                                <p><strong>Hora:</strong> {{ date('H:i', strtotime($evento->hora)) }}</p>
                                <hr>
                                <p><strong>Descrição:</strong></p>
                                <p>{!! $evento->descricao !!}</p>
                                <hr>
                                <p><strong>Local:</strong></p>
                                <p>{{ $evento->local }}</p>
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

    @if ($eventos->count() > 0)
        <script>
            function arquivarEvento(event, eventoId) {
                event.preventDefault(); // Impede o envio do formulário padrão

                Swal.fire({
                    title: 'Aguarde...',
                    text: 'A arquivar o evento',
                    allowOutsideClick: false,
                    didOpen: () => {
                        Swal.showLoading();

                        // Crie manualmente um objeto FormData e adicione os valores do formulário a ele
                        const form = document.getElementById('arquivarForm' + eventoId);
                        const formData = new FormData(form);

                        // Adicione o ID do documento ao FormData
                        formData.append('eventoId', eventoId);

                        // Envie o formulário usando AJAX com o FormData modificado
                        axios.delete('{{ route('eventos.destroy', ['evento' => ':eventoId']) }}'.replace(':eventoId', eventoId))
                            .then(function (response) {
                                if (response.data.success) {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Evento arquivado com sucesso',
                                        showConfirmButton: false,
                                        timer: 1500,
                                        willClose: () => {
                                            location.reload(); // Recarrega a página após o sucesso
                                        }
                                    });
                                } else {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Erro ao arquivar o evento',
                                        text: 'Ocorreu um erro ao arquivar o evento',
                                        showConfirmButton: false,
                                        timer: 3000
                                    });
                                }
                            })
                            .catch(function (error) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Erro ao arquivar o evento',
                                    text: 'Ocorreu um erro ao arquivar o evento',
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
