@extends('layouts.app')
<title>ASSOCIAM - Admin Ligações</title>
<link rel="icon" href="{{asset('images/logoassociam.png')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.0/css/boxicons.min.css" integrity="sha512-pVCM5+SN2+qwj36KonHToF2p1oIvoU3bsqxphdOIWMYmgr4ZqD3t5DjKvvetKhXGc/ZG5REYTT6ltKfExEei/Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.2/dist/sweetalert2.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.2/dist/sweetalert2.min.css">
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
                    <h1 class="ml-3">{{ __('Ligações Uteis') }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <a type="button" class="btn btn-secondary float-right mr-3" href="{{ route('ligacoes.create') }}">
                        {{ __('Nova Ligação') }}
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
                    <div class="card m-3">
                        <div class="card-body p-0" style="max-height: 600px; overflow-y: scroll;">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Descrição</th>
                                    <th>Instituição</th>
                                    <th>Email</th>
                                    <th>Link</th>
                                    <th>Telefone</th>
                                    <th>Criado Por</th>
                                    <th>Ações</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($ligacoes as $ligacao)
                                    <tr>
                                        <td class="text-nowrap align-middle">{{ Str::limit($ligacao->descricao, 20) }}</td>
                                        <td class="text-nowrap align-middle">{{ Str::limit($ligacao->instituicao, 20) }}</td>
                                        <td class="text-nowrap align-middle">{{ Str::limit($ligacao->email, 20) }}</td>
                                        <td class="text-nowrap align-middle">
                                            <a href="">
                                                {{ Str::limit($ligacao->link, 20) }}
                                            </a>
                                        </td>
                                        <td class="text-nowrap align-middle">{{ Str::limit($ligacao->telefone, 20) }}</td>
                                        <td class="text-nowrap align-middle">{{ $ligacao->user->name }}</td>
                                        <td class="text-center align-middle">
                                            <div class="d-flex justify-content-around">
                                                <a class="btn btn-secondary btn-icon animated-hover" data-toggle="modal" data-target="#editModal{{ $ligacao->id }}" data-bs-toggle="tooltip" title="Editar Ligação" style="color: white"><i class="fas fa-edit"></i></a>
                                                <a class="btn btn-secondary btn-icon animated-hover" data-toggle="modal" data-target="#deleteModal{{ $ligacao->id }}" data-bs-toggle="tooltip" title="Apagar Ligação" style="color: white"><i class="fa fa-trash" aria-hidden="true"></i></a>
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
                            {!! $ligacoes->links() !!}
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
            @foreach ($ligacoes as $ligacao)
                <div class="modal fade" id="editModal{{ $ligacao->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-dark text-white">
                                <h5 class="modal-title" id="editModalLabel">Editar Ligação</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: white">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{ route('ligacoes.update', $ligacao->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="descricao">Descrição</label>
                                        <input type="text" name="descricao" class="form-control" value="{{ $ligacao->descricao }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="instituicao">Instituição</label>
                                        <input type="text" name="instituicao" class="form-control" value="{{ $ligacao->instituicao }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="text" name="email" class="form-control" value="{{ $ligacao->email }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="link">Link</label>
                                        <input type="text" name="link" class="form-control" value="{{ $ligacao->link }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="telefone">Telefone</label>
                                        <input type="text" name="telefone" class="form-control" value="{{ $ligacao->telefone }}" required>
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
            @foreach ($ligacoes as $ligacao)
                <div class="modal fade" id="deleteModal{{ $ligacao->id }}" tabindex="-1" role="dialog" aria-labelledby="renewModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-dark text-white">
                                <h5 class="modal-title" id="renewModalLabel"><b>Arquivar Ligação</b></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: white">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <br>
                                Tem certeza de que deseja arquivar a ligação <b>{{ $ligacao->descricao }}</b> ?
                            </div>
                            <div class="modal-footer">
                                <form action="{{ route('ligacoes.destroy', $ligacao->id) }}" id="arquivarForm{{ $ligacao->id }}" method="POST" onsubmit="arquivarLigacao(event, {{ $ligacao->id }});">
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
        </div><!-- /.container-fluid -->
    </div>

    @if ($ligacoes->count() > 0)
        <script>
            function arquivarLigacao(event, ligacaoId) {
                event.preventDefault(); // Impede o envio do formulário padrão

                Swal.fire({
                    title: 'Aguarde...',
                    text: 'A arquivar a ligação',
                    allowOutsideClick: false,
                    didOpen: () => {
                        Swal.showLoading();

                        // Crie manualmente um objeto FormData e adicione os valores do formulário a ele
                        const form = document.getElementById('arquivarForm' + ligacaoId);
                        const formData = new FormData(form);

                        // Adicione o ID do documento ao FormData
                        formData.append('ligacaoId', ligacaoId);

                        // Envie o formulário usando AJAX com o FormData modificado
                        axios.delete('{{ route('ligacoes.destroy', ['ligacao' => ':ligacaoId']) }}'.replace(':ligacaoId', ligacaoId))
                            .then(function (response) {
                                if (response.data.success) {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Ligação arquivada com sucesso',
                                        showConfirmButton: false,
                                        timer: 1500,
                                        willClose: () => {
                                            location.reload(); // Recarrega a página após o sucesso
                                        }
                                    });
                                } else {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Erro ao arquivar a ligação',
                                        text: 'Ocorreu um erro ao arquivar a ligação',
                                        showConfirmButton: false,
                                        timer: 3000
                                    });
                                }
                            })
                            .catch(function (error) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Erro ao arquivar a ligação',
                                    text: 'Ocorreu um erro ao arquivar a ligação',
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
