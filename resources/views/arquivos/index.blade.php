@extends('layouts.app')
<title>ASSOCIAM - Admin Arquivos</title>
<link rel="icon" href="{{asset('images/logoassociam.png')}}">
<link rel="stylesheet" href="{{ asset('css/arquivo.css') }}">

@section('content')
    @include('vendor.adminlte.partials.common.preloader')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="ml-3">{{ __('Arquivo') }}</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div class="container d-flex justify-content-center">
        <ul class="list-group mt-3 ml-2 text-black">
            <a href="{{ route('arquivos.documentos') }}" style="color: black">
                <li class="list-group-item d-flex justify-content-between align-content-center">
                    <div class="d-flex flex-row">
                        <img src="https://img.icons8.com/color/100/000000/folder-invoices.png" width="40" />
                        <div class="ml-2">
                            <h6 class="mb-0">Arquivo Documentos</h6>
                            <div class="about">
                                <span>{{ $numeroDocumentosArquivados }} Ficheiros</span>
                                <span>{{ $ultimaDataArquivoD ? $ultimaDataArquivoD->format('M d, Y') : 'N/A' }}</span>
                            </div>
                        </div>
                    </div>
                </li>
            </a>

            <a href="{{ route('arquivos.eventos') }}" style="color: black">
            <li class="list-group-item d-flex justify-content-between align-content-center">
                <div class="d-flex flex-row">
                    <img src="https://img.icons8.com/color/100/000000/folder-invoices.png" width="40" />
                    <div class="ml-2">
                        <h6 class="mb-0">Arquivo Eventos</h6>
                        <div class="about">
                            <span>{{ $numeroEventosArquivados }} Ficheiros</span>
                            <span>{{ $ultimaDataArquivoE ? $ultimaDataArquivoE->format('M d, Y') : 'N/A' }}</span>
                        </div>
                    </div>
                </div>
            </li>
            </a>

            <a href="{{ route('arquivos.noticias') }}" style="color: black">
                <li class="list-group-item d-flex justify-content-between align-content-center">
                    <div class="d-flex flex-row">
                        <img src="https://img.icons8.com/color/100/000000/folder-invoices.png" width="40" />
                        <div class="ml-2">
                            <h6 class="mb-0">Arquivo Noticias</h6>
                            <div class="about">
                                <span>{{ $numeroNoticiasArquivados }} Ficheiros</span>
                                <span>{{ $ultimaDataArquivoN ? $ultimaDataArquivoN->format('M d, Y') : 'N/A' }}</span>
                            </div>
                        </div>
                    </div>
                </li>
            </a>

            <a href="{{ route('arquivos.publicacoes') }}" style="color: black">
                <li class="list-group-item d-flex justify-content-between align-content-center">
                    <div class="d-flex flex-row">
                        <img src="https://img.icons8.com/color/100/000000/folder-invoices.png" width="40" />
                        <div class="ml-2">
                            <h6 class="mb-0">Arquivo Publicações</h6>
                            <div class="about">
                                <span>{{ $numeroPublicacoesArquivados }} Ficheiros</span>
                                <span>{{ $ultimaDataArquivoP ? $ultimaDataArquivoP->format('M d, Y') : 'N/A' }}</span>
                            </div>
                        </div>
                    </div>
                </li>
            </a>

            <a href="{{ route('arquivos.ligacoes') }}" style="color: black">
                <li class="list-group-item d-flex justify-content-between align-content-center">
                    <div class="d-flex flex-row">
                        <img src="https://img.icons8.com/color/100/000000/folder-invoices.png" width="40" />
                        <div class="ml-2">
                            <h6 class="mb-0">Arquivo Ligações</h6>
                            <div class="about">
                                <span>{{ $numeroLigacoesArquivados }} Ficheiros</span>
                                <span>{{ $ultimaDataArquivoL ? $ultimaDataArquivoL->format('M d, Y') : 'N/A' }}</span>
                            </div>
                        </div>
                    </div>
                </li>
            </a>

            <a href="{{ route('arquivos.formularios') }}" style="color: black">
                <li class="list-group-item d-flex justify-content-between align-content-center">
                    <div class="d-flex flex-row">
                        <img src="https://img.icons8.com/color/100/000000/folder-invoices.png" width="40" />
                        <div class="ml-2">
                            <h6 class="mb-0">Arquivo Formulários</h6>
                            <div class="about">
                                <span>{{ $numeroFormulariosArquivados }} Ficheiros</span>
                                <span>{{ $ultimaDataArquivoF ? $ultimaDataArquivoF->format('M d, Y') : 'N/A' }}</span>
                            </div>
                        </div>
                    </div>
                </li>
            </a>
        </ul>
    </div>
@endsection
