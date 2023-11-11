@extends('layouts.app')
<title>ASSOCIAM - Admin Associados</title>
<link rel="icon" href="{{asset('images/logoassociam.png')}}">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.0/css/boxicons.min.css" integrity="sha512-pVCM5+SN2+qwj36KonHToF2p1oIvoU3bsqxphdOIWMYmgr4ZqD3t5DjKvvetKhXGc/ZG5REYTT6ltKfExEei/Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
<script src="https://kit.fontawesome.com/ccf24ce75c.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<style>
    .custom-pagination .page-item .page-link {
        color: black;
    }

    .custom-pagination .page-item.active .page-link {
        background-color: black;
        border-color: black;
        color: white;
    }

    .suspension-overlay {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 240px;
        height: 80px;
        background-color: rgba(255, 0, 0, 0.7);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: bold;
        font-size: 20px;
        text-align: center;
    }
</style>

<link rel="stylesheet" href="{{ asset('css/users.css') }}">

@section('content')
    @include('vendor.adminlte.partials.common.preloader')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Lista Associados') }}</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="container">
        <div class="col-lg-14 text-right mb-3">
            <div class="col-md-12 d-flex align-items-center justify-content-between">
                <form action="{{ route('users.search') }}" method="GET" class="d-flex align-items">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control border-0 rounded-0 shadow" placeholder="Pesquisar" required/>
                        <div class="input-group-append">
                            <button class="btn btn-secondary btn" type="submit"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </form>

                <div class="d-flex">
                    <div class="dropdown ml-3">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="filterDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Filtros
                        </button>
                        <div class="dropdown-menu" aria-labelledby="filterDropdown">
                            <form id="searchForm" action="{{ route('users.searchFilter') }}" method="GET">
                                <div class="form-check">
                                    <input class="form-check-input ml-1" type="radio" id="allCheckbox" name="filter" value="all" {{ $filter === 'all' ? 'checked' : '' }}>
                                    <label class="form-check-label ml-4" for="allCheckbox">
                                        Todos
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input ml-1" type="radio" id="approvedCheckbox" name="filter" value="approved" {{ $filter === 'approved' ? 'checked' : '' }}>
                                    <label class="form-check-label ml-4" for="approvedCheckbox">
                                        Aprovados
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input ml-1" type="radio" id="suspendedCheckbox" name="filter" value="suspended" {{ $filter === 'suspended' ? 'checked' : '' }}>
                                    <label class="form-check-label ml-4" for="suspendedCheckbox">
                                        Suspensos
                                    </label>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="btn-group ml-3">
                        <button id="listViewButton" type="button" class="btn btn-secondary btn"><i class="fa fa-list"></i></button>
                        <button id="gridViewButton" type="button" class="btn btn-secondary btn active"><i class="fa fa-th"></i></button>
                    </div>
                </div>
            </div>
        </div>

        <div class="row gridView">
            @foreach ($users as $user)
                <div class="col-lg-3 col-md-4 col-sm-12">
                    <div class="card product_item">
                        <div class="body">
                            <div class="cp_img">
                                @if ($user->status === 'suspenso')
                                <div class="suspension-overlay">
                                        <span>Suspenso</span>
                                </div>
                                @endif
                                <img src="{{ asset($user->avatar) }}" class="img-fluid custom-avatar">
                                <div class="hover">
                                    <a data-toggle="modal" data-target="#viewUserModal{{ $user->id }}" data-bs-toggle="tooltip" class="btn btn-secondary btn-sm waves-effect animated-hover" title="Ver Utilizador"><i class="fas fa-eye"></i></a>
                                    <a data-toggle="modal" data-target="#editUserModal{{ $user->id }}" data-bs-toggle="tooltip" class="btn btn-secondary btn-sm waves-effect animated-hover" title="Editar Utilizador"><i class="fas fa-edit"></i></a>
                                    <a data-toggle="modal" data-target="#deleteUserModal{{ $user->id }}" data-bs-toggle="tooltip" class="btn btn-secondary btn-sm waves-effect animated-hover" title="Apagar Utilizador"><i class="fa-solid fa-trash"></i></a>
                                </div>
                            </div>
                            <div class="product_details">
                                <h5><a>{{ $user->name }}</a></h5>
                                <h6><a>{{ ucfirst($user->role->name) }}</a></h6>
                                @if ($user->pagamentos->contains('ano', date('Y')) && $user->pagamentos->contains('pago', true))
                                    <a class="btn-sm btn-success btn-icon animated-hover">Pago</a>
                                @else
                                    <a class="btn-sm btn-danger btn-icon animated-hover">Por Pagar</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

        <div class="row clearfix listView d-none">
            <div class="card m-3">
                <div class="card-body p-0" style="max-height: 600px; overflow-y: scroll;">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="max-width">Nome</th>
                                <th class="max-width">Permissão</th>
                                <th class="max-width">Email</th>
                                <th class="max-width">Cota Paga</th>
                                <th class="max-width">Ações</th>
                            </tr>
                        </thead>
                    <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td class="text-nowrap align-middle">{{ $user->name }}</td>
                            <td class="text-nowrap align-middle">{{ ucfirst($user->role->name) }}</td>
                            <td class="text-nowrap align-middle">{{ $user->email }}</td>
                            <td class="text-nowrap align-middle">
                                @if ($user->pagamentos->contains('ano', date('Y')) && $user->pagamentos->contains('pago', true))
                                    <span class="payment-paid" style="color: green">Pago</span>
                                    <span class="small green-ball">&#9679;</span>
                                @else
                                    <span class="payment-pending" style="color: red;">Por Pagar</span>
                                    <span class="small red-ball">&#9679;</span>
                                @endif
                            </td>
                            <td class="text-nowrap align-middle">
                                <div class="d-flex justify-content-around">
                                    <a class="btn btn-secondary btn-icon animated-hover" data-toggle="modal" data-target="#viewUserModal{{ $user->id }}" data-bs-toggle="tooltip" title="Ver Utilizador"><i class="fas fa-eye"></i></a>
                                    <a class="btn btn-secondary btn-icon animated-hover" data-toggle="modal" data-target="#editUserModal{{ $user->id }}" data-bs-toggle="tooltip"  title="Editar Utilizador"><i class="fas fa-edit"></i></a>
                                    <a class="btn btn-secondary btn-icon animated-hover" data-toggle="modal" data-target="#deleteUserModal{{ $user->id }}" data-bs-toggle="tooltip" title="Apagar Utilizador"><i class="fa-solid fa-trash"></i></a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
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

    <div class="d-flex justify-content-center mt-3">
        <ul class="pagination custom-pagination">
            {!! $users->links() !!}
        </ul>
    </div>




    <!-- Modal para visualização do usuário -->
    @foreach($users as $user)
        <div class="modal fade" id="viewUserModal{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="viewUserModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-dark text-white">
                        <h5 class="modal-title" id="viewUserModalLabel">Informações do Usuário</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: white">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <p><strong>Nome:</strong> {{ $user->name }}</p>
                                <p><strong>Email:</strong> {{ $user->email }}</p>
                                <p><strong>Data de Nascimento:</strong> {{ $user->dataNascimento }}</p>
                                <p><strong>NIF:</strong> {{ $user->nif }}</p>
                                <p><strong>Telemóvel:</strong> {{ $user->telemovel }}</p>
                                <p><strong>Morada:</strong> {{ $user->morada }}</p>
                                <p><strong>Emprego:</strong> {{ $user->emprego }}</p>
                                <p><strong>Profissão:</strong> {{ $user->profissao }}</p>
                                <p><strong>Naturalidade:</strong> {{ $user->naturalidade }}</p>
                                <p><strong>Bilhete de Identidade:</strong> {{ $user->bilheteidentidade }}</p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>Permissão:</strong> {{ $user->role_id }} </p>
                                <p><strong>Data de Criação:</strong> {{ date('d/m/Y',strtotime($user->created_at)) }} </p>
                                <p><strong>Empresa:</strong> {{ $user->empresa }}</p>
                                <p><strong>Nível:</strong> {{ $user->nivel }}</p>
                                <p><strong>Curso:</strong> {{ $user->curso }}</p>
                                <p><strong>Estabelecimento de Ensino:</strong> {{ $user->estabelecimentoEnsino }}</p>
                                <p><strong>NIB:</strong> {{ $user->nib }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

        <!-- Modal para visualização do usuário -->
        @foreach($users as $user)
            <div class="modal fade" id="editUserModal{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="editUserModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-dark text-white">
                            <h5 class="modal-title" id="editUserModalLabel">Atualizar Permissão</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: white">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form method="POST" action="{{ route('users.updateRole', $user->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group m-3">
                                <label for="role_id">Role</label>
                                <select class="form-control" id="role_id" name="role_id">
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}" {{ $user->role->id === $role->id ? 'selected' : '' }}>
                                            {{ ucfirst($role->name) }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group m-3">
                                <label for="status">Status</label>
                                <select class="form-control" id="status" name="status">
                                    <option value="pendente" {{ $user->status === 'pendente' ? 'selected' : '' }}>Pendente</option>
                                    <option value="aprovado" {{ $user->status === 'aprovado' ? 'selected' : '' }}>Aprovado</option>
                                    <option value="rejeitado" {{ $user->status === 'rejeitado' ? 'selected' : '' }}>Rejeitado</option>
                                    <option value="suspenso" {{ $user->status === 'suspenso' ? 'selected' : '' }}>Suspenso</option>
                                </select>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success">Atualizar Permissão</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach


    <!-- Modal para atualização ou exclusão do usuário -->
        @foreach ($users as $user)
            <div class="modal fade" id="deleteUserModal{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteUserModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-dark text-white">
                            <h5 class="modal-title" id="deleteUserModalLabel"><b>Excluir Utilizador</b></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: white">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <br>
                            Tem certeza de que deseja apagar o utilizador <b>{{ $user->name }}</b> ?
                        </div>
                        <div class="modal-footer">
                            <form method="POST" action="{{ route('associados.destroy', $user->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-danger">Excluir</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>


    <script>
        // Guarda a informação do usuário atualmente selecionado
        let selectedUser;

        // Abre a modal ao clicar no ícone de visualização
        $('.fa-eye').on('click', function() {
            // Obtém o ID do usuário a partir do atributo data-id
            const userId = $(this).closest('.product_item').data('id');
            // Obtém o usuário correspondente ao ID
            selectedUser = {{ $users->firstWhere('id') }};

            // Atualiza a modal com as informações do usuário
            $('#viewUserName').text(selectedUser.name);
            $('#viewUserEmail').text(selectedUser.email);
            $('#viewUserPermission').text(selectedUser.permission);

            // Exibe a modal
            $('#viewUserModal').modal('show');
        });

        // Abre a modal ao clicar no ícone de edição
        $('.fa-edit').on('click', function() {
            // Obtém o ID do usuário a partir do atributo data-id
            const userId = $(this).closest('.product_item').data('id');
            // Obtém o usuário correspondente ao ID
            selectedUser = {{ $users->firstWhere('id') }};

            // Atualiza a modal com as informações do usuário
            $('#editUserPermission').val(selectedUser.permission);

            // Define a função a ser executada ao clicar no botão de atualizar
            $('#updateUserButton').off('click').on('click', function() {
                // Obtém a nova permissão do usuário
                const newPermission = $('#editUserPermission').val();

                // Envia uma requisição PATCH para atualizar a permissão do usuário
                $.ajax({
                    method: 'PATCH',
                    url: `/users/${selectedUser.id}`,
                    data: {
                        permission: newPermission
                    },
                    success: function(response) {
                        // Atualiza a permissão do usuário na página
                        selectedUser.permission = newPermission;
                        $(`.product_item[data-id="${selectedUser.id}"] .product_permission`).text(newPermission);

                        // Fecha a modal
                        $('#editUserModal').modal('hide');
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            });

            // Exibe a modal
            $('#editUserModal').modal('show');
        });
    </script>


    <script>
        $(document).ready(function() {
            // Função para alternar para o modo de exibição em lista
            $('#listViewButton').on('click', function() {
                // Ativa o botão de lista e desativa o botão de grelha
                $(this).addClass('active');
                $('#gridViewButton').removeClass('active');

                // Exibe o modo de exibição de lista e oculta o modo de exibição de grelha
                $('.gridView').addClass('d-none');
                $('.listView').removeClass('d-none');
            });

            // Função para alternar para o modo de exibição em grelha
            $('#gridViewButton').on('click', function() {
                // Ativa o botão de grelha e desativa o botão de lista
                $(this).addClass('active');
                $('#listViewButton').removeClass('active');

                // Exibe o modo de exibição de grelha e oculta o modo de exibição de lista
                $('.listView').addClass('d-none');
                $('.gridView').removeClass('d-none');
            });
        });
    </script>

    <script>
        function deleteUser(userId) {
            if (confirm('Tem certeza de que deseja arquivar o utilizador?')) {
                axios.delete('/admin/users/' + userId + '/destroy')
                    .then(function (response) {
                        // Exibição de mensagem de sucesso ou redirecionamento, se necessário
                        alert('Utilizador arquivado com sucesso.');
                        window.location.reload();
                    })
                    .catch(function (error) {
                        // Exibição de mensagem de erro, se necessário
                        console.error(error);
                    });
            }
        }
    </script>

    <script>
        // Aguarda o carregamento do DOM
        document.addEventListener('DOMContentLoaded', function() {
            // Seleciona o formulário de pesquisa
            var form = document.querySelector('#searchForm');

            // Adiciona um evento de mudança aos inputs de filtro
            var filterInputs = document.querySelectorAll('input[name="filter"]');
            filterInputs.forEach(function(input) {
                input.addEventListener('change', function() {
                    // Envia o formulário quando o filtro for selecionado
                    form.submit();
                });
            });
        });
    </script>


    <!-- /.content -->
@endsection
