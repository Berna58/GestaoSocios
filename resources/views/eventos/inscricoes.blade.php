@extends('layouts.app')
<head>
    <title>ASSOCIAM - Admin Inscrições</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{asset('images/logoassociam.png')}}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.0/css/boxicons.min.css" integrity="sha512-pVCM5+SN2+qwj36KonHToF2p1oIvoU3bsqxphdOIWMYmgr4ZqD3t5DjKvvetKhXGc/ZG5REYTT6ltKfExEei/Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="{{ asset('css/animationicon.css') }}">
</head>
@section('content')
    @include('vendor.adminlte.partials.common.preloader')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="ml-3">{{ __('Inscritos no Evento') }}</h1>
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
                        <form action="{{ route('inscricoes.search') }}" method="GET" class="d-flex align-items- ml-2">
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
                                    <th>Nome</th>
                                    <th>Email</th>
                                    <th>Tipo Inscrição</th>
                                    <th>Tipo Membro</th>
                                    <th>Presença</th>
                                    <th>Ações</th>
                                </tr>
                                </thead>
                                <tbody>
                                <!-- Exibir inscrições -->
                                @foreach ($inscricoes as $inscricao)
                                    <tr>
                                        <td class="text-nowrap align-middle">{{ $inscricao->user->name }}</td>
                                        <td class="text-nowrap align-middle">{{ $inscricao->user->email }}</td>
                                        <td class="text-nowrap align-middle">-</td>
                                        <td class="text-nowrap align-middle">Associado</td>
                                        <td class="text-nowrap align-middle">
                                            @if ($inscricao->presenca)
                                                <span class="badge badge-success">Presente</span>
                                            @else
                                                <span class="badge badge-danger">Não presente</span>
                                            @endif
                                        </td>
                                        <td class="text-center align-middle">
                                            <div class="d-flex justify-content-around">
                                                <form action="{{ route('marcar-presenca', $inscricao->id) }}" method="POST">
                                                    @csrf
                                                    @method('POST')
                                                    <button type="submit" class="btn animated-hover {{ $inscricao->presenca ? 'btn-secondary' : 'btn-secondary' }}"
                                                            title="{{ $inscricao->presenca ? 'Marcar como Não presente' : 'Marcar como Presente' }}">
                                                        <i class="fa {{ $inscricao->presenca ? 'fa-times' : 'fa-check' }}"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                                <!-- Exibir inscrições temporárias -->
                                @foreach ($inscricoesTemporarias as $inscricaoTemporaria)
                                    <tr>
                                        <td class="text-nowrap align-middle">{{ $inscricaoTemporaria->nome }}</td>
                                        <td class="text-nowrap align-middle">{{ $inscricaoTemporaria->email }}</td>
                                        <td class="text-nowrap align-middle">
                                            @if ($inscricaoTemporaria->tipo_inscricao === 'Instituição')
                                                Instituição - {{ $inscricaoTemporaria->instituicao }}
                                            @else
                                                Particular
                                            @endif
                                        </td>
                                        <td class="text-nowrap align-middle">Visitante</td>
                                        <td class="text-nowrap align-middle">
                                            @if ($inscricaoTemporaria->presenca)
                                                <span class="badge badge-success">Presente</span>
                                            @else
                                                <span class="badge badge-danger">Não presente</span>
                                            @endif
                                        </td>
                                        <td class="text-center align-middle">
                                            <div class="d-flex justify-content-around">
                                                <form action="{{ route('marcar-presenca-temporaria', $inscricaoTemporaria->id) }}" method="POST">
                                                    @csrf
                                                    @method('POST')
                                                    <button type="submit" class="btn animated-hover {{ $inscricaoTemporaria->presenca ? 'btn-secondary' : 'btn-secondary' }}"
                                                            title="{{ $inscricaoTemporaria->presenca ? 'Marcar como Não presente' : 'Marcar como Presente' }}">
                                                        <i class="fa {{ $inscricaoTemporaria->presenca ? 'fa-times' : 'fa-check' }}"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>

            <!-- VIEW MODAL -->
            @foreach($inscricoes as $inscricao)
                <div class="modal fade" id="viewModal{{ $inscricao->id }}" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-dark text-white">
                                <h5 class="modal-title" id="viewModalLabel">Visualizar Membro</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: white">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="text-center mb-4">
                                    <img src="{{ asset($inscricao->user->avatar) }}" alt="Imagem do Membro" style="max-width: 200px; height: auto;">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            <!-- VIEW MODAL PARA INSCRIÇÕES TEMPORÁRIAS -->
            @foreach($inscricoesTemporarias as $inscricaoTemporaria)
                <div class="modal fade" id="viewModal{{ $inscricaoTemporaria->id }}" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-dark text-white">
                                <h5 class="modal-title" id="viewModalLabel">Visualizar Membro</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: white">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="text-center mb-4">
                                    <img src="{{ asset($inscricaoTemporaria->avatar) }}" alt="Imagem do Membro" style="max-width: 200px; height: auto;">
                                </div>
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
@endsection
