@extends('layouts.app')
<title>ASSOCIAM - Admin Arquivo Eventos</title>
<link rel="icon" href="{{asset('images/logoassociam.png')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.0/css/boxicons.min.css" integrity="sha512-pVCM5+SN2+qwj36KonHToF2p1oIvoU3bsqxphdOIWMYmgr4ZqD3t5DjKvvetKhXGc/ZG5REYTT6ltKfExEei/Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.2/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.2/dist/sweetalert2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
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
                    <h1 class="ml-3">{{ __('Eventos Arquivados') }}</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div class="container">
        <div class="col-md-12 d-flex align-items-center justify-content-between">
            <form action="{{ route('arquivos.eventos.search') }}" method="GET" class="d-flex align-items">
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
                <table class="table" style="max-height: 600px; overflow-y: scroll;">
                    <thead>
                    <tr>
                        <th class="max-width">Título</th>
                        <th class="max-width">Descrição</th>
                        <th class="max-width">Data</th>
                        <th class="max-width">Hora</th>
                        <th class="sortable">Nº de participantes</th>
                        <th>Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($eventosArquivados as $evento)
                        <tr>
                            <td class="text-nowrap align-middle">{{ Str::limit($evento->titulo, 30) }}</td>
                            <td class="text-nowrap align-middle">
                                {{ Str::limit($evento->descricao, 30) }}
                            </td>
                            <td class="text-nowrap align-middle">{{ date('d-m-Y', strtotime($evento->data)) }}</td>
                            <td class="text-nowrap align-middle">{{ date('H:i', strtotime($evento->hora)) }}</td>
                            <td class="text-nowrap align-middle">{{ $evento->num_presentes }}</td>
                            <td class="text-nowrap align-middle">
                                <div class="d-flex justify-content-around">
                                    <a class="btn btn-secondary btn-icon animated-hover" data-toggle="modal" data-target="#viewModal{{ $evento->id }}" data-bs-toggle="tooltip" title="Ver Evento" style="color: white"><i class="fas fa-eye"></i></a>
                                    <a class="btn btn-secondary btn-icon animated-hover" href="#" onclick="event.preventDefault(); restaurarEvento({{ $evento->id }});" title="Restaurar"><i class="fa fa-undo"></i></a>
                                    <a type="submit" class="btn btn-secondary btn-icon animated-hover"  onclick="event.preventDefault(); excluirEvento({{ $evento->id }});" title="Excluir Permanente"><i class="fa fa-trash"></i></a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

    <!-- VIEW MODAL -->
    @foreach ($eventosArquivados as $evento)
        <div class="modal fade" id="viewModal{{ $evento->id }}" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-dark text-white">
                        <h5 class="modal-title" id="viewModalLabel">Visualizar Evento Arquivado</h5>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Fechar">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="text-center mb-4">
                            <img src="{{ asset($evento->imagem) }}" alt="Imagem da Notícia" style="max-width: 200px; height: auto;">
                        </div>
                        <h5><b>{{ $evento->titulo }}</b></h5>
                        <p>{{ $evento->descricao }}</p>
                        <p><strong>Data Criação:</strong> {{ date('d-m-Y', strtotime($evento->data)) }}</p>
                        <p><strong>Hora:</strong> {{ date('H:i', strtotime($evento->hora)) }}</p>
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
                {!! $eventosArquivados->links() !!}
            </ul>
        </div>
        </div>
    </div>
@endsection

<!-- Incluir a biblioteca Axios -->
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script>
    function excluirEvento(eventoId) {
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
                axios.delete('{{ route('eventos.apagarPerm', ['evento' => ':eventoId']) }}'.replace(':eventoId', eventoId))
                    .then((response) => {
                        if (response.data.success) {
                            // Evento excluído com sucesso
                            Swal.fire({
                                title: 'Sucesso!',
                                text: response.data.message,
                                icon: 'success'
                            }).then(() => {
                                // Atualizar a lista de eventos
                                window.location.reload();
                            });
                        } else {
                            // Ocorreu um erro ao excluir o evento
                            Swal.fire({
                                title: 'Erro!',
                                text: response.data.message,
                                icon: 'error'
                            });
                        }
                    })
                    .catch((error) => {
                        // Ocorreu um erro ao excluir o evento
                        Swal.fire({
                            title: 'Erro!',
                            text: 'Ocorreu um erro ao excluir o evento.',
                            icon: 'error'
                        });
                    });
            }
        });
    }
</script>

<script>
    function restaurarEvento(eventoId) {
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
                axios.post('{{ route('eventos.restore', ['id' => ':eventoId']) }}'.replace(':eventoId', eventoId))
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
                            text: 'Ocorreu um erro ao restaurar o evento.',
                            icon: 'error'
                        });
                    });
            }
        });
    }
</script>
