@extends('layouts.app')
<title>ASSOCIAM - Admin Criar Documento</title>
<link rel="icon" href="{{asset('images/logoassociam.png')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.0/css/boxicons.min.css" integrity="sha512-pVCM5+SN2+qwj36KonHToF2p1oIvoU3bsqxphdOIWMYmgr4ZqD3t5DjKvvetKhXGc/ZG5REYTT6ltKfExEei/Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.2/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.2/dist/sweetalert2.min.js"></script>
<link rel="stylesheet" href="{{ asset('css/animationicon.css') }}">

@section('content')
    @include('vendor.adminlte.partials.common.preloader')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Novo Documento') }}</h1>
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
                            <form action="{{ route('documentos.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="titulo">{{ __('Título') }}</label>
                                    <input type="text" name="titulo" class="form-control" id="titulo" required>
                                </div>
                                <div class="form-group">
                                    <label for="descricao">{{ __('Descrição') }}</label>
                                    <input type="text" name="descricao" class="form-control" id="descricao" required>
                                </div>
                                <div class="form-group">
                                    <label for="file">{{ __('Arquivo (somente PDF)') }}</label>
                                    <input type="file" name="file" class="form-control-file" id="file" accept=".pdf" required>
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
