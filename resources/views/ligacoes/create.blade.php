@extends('layouts.app')
<title>ASSOCIAM - Admin Criar Ligação</title>
<link rel="icon" href="{{asset('images/logoassociam.png')}}">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.0/css/boxicons.min.css" integrity="sha512-pVCM5+SN2+qwj36KonHToF2p1oIvoU3bsqxphdOIWMYmgr4ZqD3t5DjKvvetKhXGc/ZG5REYTT6ltKfExEei/Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<link rel="stylesheet" href="{{ asset('css/animationicon.css') }}">

@section('content')
    @include('vendor.adminlte.partials.common.preloader')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Nova Ligação') }}</h1>
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
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('ligacoes.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="descricao">{{ __('Descrição') }}</label>
                                    <input type="text" name="descricao" class="form-control" id="descricao" required>
                                </div>
                                <div class="form-group">
                                    <label for="instituicao">{{ __('Instituição') }}</label>
                                    <input type="text" name="instituicao" class="form-control" id="instituicao" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">{{ __('Email') }}</label>
                                    <input type="text" name="email" class="form-control" id="email" required>
                                </div>
                                <div class="form-group">
                                    <label for="link">{{ __('Link') }}</label>
                                    <input type="text" name="link" class="form-control" id="link" required>
                                </div>
                                <div class="form-group">
                                    <label for="telefone">{{ __('Telefone') }}</label>
                                    <input type="text" name="telefone" class="form-control" id="telefone" required>
                                </div>
                                <button type="submit" class="btn btn-success">{{ __('Salvar') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
