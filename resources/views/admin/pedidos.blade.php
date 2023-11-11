<title>ASSOCIAM - Admin Pedidos</title>
<link rel="icon" href="{{asset('images/logoassociam.png')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.0/css/boxicons.min.css" integrity="sha512-pVCM5+SN2+qwj36KonHToF2p1oIvoU3bsqxphdOIWMYmgr4ZqD3t5DjKvvetKhXGc/ZG5REYTT6ltKfExEei/Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.css" integrity="sha256-NAxhqDvtY0l4xn+YVa6WjAcmd94NNfttjNs">
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
<script src="https://kit.fontawesome.com/ccf24ce75c.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="{{ asset('css/animationicon.css') }}">

@extends('layouts.app')

@section('content')
    @include('vendor.adminlte.partials.common.preloader')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="ml-3">{{ __('Pedidos Associado') }}</h1>
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
                                    <th class="align-middle">Nome</th>
                                    <th class="align-middle">Email</th>
                                    <th class="align-middle">Estado</th>
                                    <th class="text-center align-middle">Ações</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    @if($user->status == 'pendente')
                                        <tr>
                                            <td class="text-nowrap align-middle">{{ $user->name }}</td>
                                            <td class="text-nowrap align-middle">{{ $user->email }}</td>
                                            <td class="text-nowrap align-middle">{{ ucfirst($user->status) }}</td>
                                            <td  class="text-nowrap align-middle">
                                                <div class="d-flex justify-content-around">
                                                    <button type="button" class="btn btn-primary btn-icon animated-hover" data-toggle="modal" data-target="#fichaModal{{ $user->id }}"><i class="fas fa-file-alt"></i></button>
                                                    <form action="{{ route('admin.users.approve', $user->id) }}" method="POST">
                                                        @csrf
                                                        <button type="submit" class="btn btn-success btn-icon animated-hover"><i class="fa fa-check"></i></button>
                                                    </form>
                                                    <form action="{{ route('admin.users.reject', $user->id) }}" method="POST">
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger btn-icon animated-hover"><i class="fas fa-times"></i></button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>

                                        <!-- Modal -->
                                        <div class="modal fade" id="fichaModal{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="fichaModalLabel{{ $user->id }}" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-dark text-white">
                                                        <h5 class="modal-title" id="fichaModalLabel{{ $user->id }}">Ficha de Inscrição</h5>
                                                        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Fechar">
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
                                                                <p><strong>Bilhete de Identidade:</strong> {{ $user->bilheteIdentidade }}</p>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <p><strong>Empresa:</strong> {{ $user->empresa }}</p>
                                                                <p><strong>Nível:</strong> {{ $user->nivel }}</p>
                                                                <p><strong>Curso:</strong> {{ $user->curso }}</p>
                                                                <p><strong>Estabelecimento de Ensino:</strong> {{ $user->estabelecimentoEnsino }}</p>
                                                                <p><strong>Título da Publicação 1:</strong> {{ $user->titulo_publicacao1 }}</p>
                                                                <p><strong>Link da Publicação 1:</strong> {{ $user->link_publicacao1 }}</p>
                                                                <p><strong>Título da Publicação 2:</strong> {{ $user->titulo_publicacao2 }}</p>
                                                                <p><strong>Link da Publicação 2:</strong> {{ $user->link_publicacao2 }}</p>
                                                                <p><strong>Título da Publicação 3:</strong> {{ $user->titulo_publicacao3 }}</p>
                                                                <p><strong>Link da Publicação 3:</strong> {{ $user->link_publicacao3 }}</p>
                                                                <p><strong>Título da Publicação 4:</strong> {{ $user->titulo_publicacao4 }}</p>
                                                                <p><strong>Link da Publicação 4:</strong> {{ $user->link_publicacao4 }}</p>
                                                                <p><strong>NIB:</strong> {{ $user->nib }}</p>
                                                                <!-- Adicione aqui os campos restantes da ficha de inscrição -->
                                                                <!-- Certifique-se de usar as variáveis corretas para exibir os dados do usuário -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    @endif
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            {{ $users->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
