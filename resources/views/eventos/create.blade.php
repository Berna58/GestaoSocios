@extends('layouts.app')
<title>ASSOCIAM - Admin Criar Evento</title>
<link rel="icon" href="{{asset('images/logoassociam.png')}}">

@section('content')
    @include('vendor.adminlte.partials.common.preloader')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Novo Evento') }}</h1>
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
                            <form action="{{ route('eventos.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="titulo">{{ __('Título') }}</label>
                                    <input type="text" name="titulo" class="form-control" id="titulo" required>
                                </div>
                                <div class="form-group">
                                    <label for="descricao">{{ __('Descrição') }}</label>
                                    <textarea type="text" name="descricao" class="form-control" id="descricao" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="local">{{ __('Local') }}</label>
                                    <input type="text" name="local" class="form-control" id="local" required>
                                </div>
                                <div class="form-group">
                                    <label for="data">{{ __('Data') }}</label>
                                    <input type="date" name="data" class="form-control-date" id="data" required>
                                </div>
                                <div class="form-group">
                                    <label for="hora">{{ __('Hora') }}</label>
                                    <input type="time" name="hora" class="form-control-time" id="hora" required>
                                </div>
                                <div class="form-group">
                                    <label for="imagem">{{ __('Imagem') }}</label>
                                    <input type="file" name="imagem" class="form-control-file" id="imagem">
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

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.5/dist/sweetalert2.min.js"></script>
    <script>
        @if (session('success'))
        setTimeout(function() {
            Swal.fire({
                icon: 'success',
                title: 'Evento criado com sucesso!',
                showConfirmButton: false,
                timer: 1500
            }).then(function() {
                window.location.href = "{{ route('eventos.index') }}";
            });
        }, 1000);
        @elseif (session('error'))
        Swal.fire({
            icon: 'error',
            title: 'Erro ao criar evento!',
            text: 'Por favor, tente novamente.',
            confirmButtonText: 'OK'
        });
        @endif
    </script>
@endsection
