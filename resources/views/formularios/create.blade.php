@extends('layouts.app')
<title>ASSOCIAM - Admin Criar Formulário</title>
<link rel="icon" href="{{asset('images/logoassociam.png')}}">

@section('content')
    @include('vendor.adminlte.partials.common.preloader')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Novo Formulário') }}</h1>
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
                            <form action="{{ route('formularios.store') }}" method="POST" enctype="multipart/form-data">
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
                                    <label for="imagem">{{ __('Imagem') }}</label>
                                    <input type="file" name="imagem" class="form-control-file" id="imagem">
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
