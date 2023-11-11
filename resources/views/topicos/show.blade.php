<!doctype html>
<html lang="en">
<head>
    <link rel="icon" href="{{asset('images/logoassociam.png')}}">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('fonts/icomoon/style.css')}}">

    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

    <!-- Style -->
    <link rel="stylesheet" href="{{ asset('css/animationicon.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/forum.css') }}">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.0/css/boxicons.min.css" integrity="sha512-pVCM5+SN2+qwj36KonHToF2p1oIvoU3bsqxphdOIWMYmgr4ZqD3t5DjKvvetKhXGc/ZG5REYTT6ltKfExEei/Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.4/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.4/dist/sweetalert2.all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>


    <title>ASSOCIAM - Fórum Discussão</title>
</head>
<body>


<div class="site-mobile-menu site-navbar-target">
    <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
            <span class="icon-close2 js-menu-toggle"></span>
        </div>
    </div>
    <div class="site-mobile-menu-body"></div>
</div>



<header class="site-navbar site-navbar-target" role="banner">

    <div class="container">
        <div class="row align-items-center position-relative">

            <div class="col-3">
                <div class="site-logo">
                    <a href="{{ route('home') }}" class="font-weight-bold">
                        <img src="{{asset('../logoassociam.png')}}" alt="Logo" class="mr-2" style="width: 50px; height: 50px;">ASSOCIAM
                    </a>
                </div>
            </div>

            <div class="col-9  text-right">
                <span class="d-inline-block d-lg-none"><a href="#" class="text-primary site-menu-toggle js-menu-toggle py-5"><span class="icon-menu h3 text-white"></span></a></span>
                <nav class="site-navigation text-right ml-auto d-none d-lg-block" role="navigation">
                    <ul class="site-menu main-menu js-clone-nav ml-auto ">
                        <li class="active dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Sobre Nós</a>
                            <div class="dropdown-menu">
                                <a href="{{ route('historia') }}" class="dropdown-item">História</a>
                                <div class="dropdown-divider"></div>
                                <a href="{{ route('objetivo') }}" class="dropdown-item">Objetivos</a>
                                <div class="dropdown-divider"></div>
                                <a href="{{ route('descricao') }}" class="dropdown-item">Descrição</a>
                                <div class="dropdown-divider"></div>
                                <a href="{{ route('orgaossociais') }}" class="dropdown-item">Órgãos Sociais</a>
                                <div class="dropdown-divider"></div>
                                <a href="{{ route('contacto') }}" class="dropdown-item">Contactos</a>
                            </div>
                        </li>
                        <li class="active"><a href="{{ route('documento') }}" class="nav-link">Documentos</a></li>
                        <li class="active"><a href="{{ route('publicacoes') }}" class="nav-link">Publicações</a></li>
                        <li class="active"><a href="{{ route('formularios') }}" class="nav-link">Formulários</a></li>
                        <li class="active"><a href="{{ route('ligacoes') }}" class="nav-link">Ligações Úteis</a></li>
                        @if (Auth::check())
                            <li class="nav-item dropdown">
                                <button class="btn custom-btn-conta dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="{{asset(Auth::user()->avatar)}}" style="height:30px; width:30px; border-radius:50%; margin-right:5px">
                                    {{ Auth::user()->name }}
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('profile.show') }}">Perfil</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('topicos.index') }}">Fórum</a>
                                    <div class="dropdown-divider"></div>
                                    @if (Auth::user()->hasRole('admin'))
                                        <a href="{{ route('admin.dashboard') }}" class="dropdown-item">Dashboard</a>
                                        <div class="dropdown-divider"></div>
                                    @endif
                                    <a class="dropdown-item" href="{{ route('logout') }}">Sair</a>
                                </div>
                            </li>
                        @else
                            <li><a href="{{ route('login') }}" class="nav-link"><i class="fas fa-sign-in-alt"></i></a></li>
                            <li><a href="{{ route('register') }}" class="nav-link"><i class="fas fa-user-plus"></i></a></li>
                        @endif
                    </ul>
                </nav>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="main-body p-0">
            <div class="inner-wrapper">
                <!-- Inner sidebar -->
                <div class="inner-sidebar">
                    <!-- Inner sidebar header -->
                    <div class="inner-sidebar-header justify-content-center">
                        <button class="btn btn-icon animated-hover btn-dark has-icon btn-block" type="button" data-toggle="modal" data-target="#threadModal">
                            <i class="fas fa-solid fa-plus"></i>
                            NOVO TÓPICO
                        </button>
                    </div>
                    <!-- /Inner sidebar header -->

                    <!-- Inner sidebar body -->
                    <div class="inner-sidebar-body p-0">
                        <div class="p-3 h-100" data-simplebar="init">
                            <div class="simplebar-wrapper" style="margin: -16px;">
                                <div class="simplebar-height-auto-observer-wrapper"><div class="simplebar-height-auto-observer"></div></div>
                                <div class="simplebar-mask">
                                    <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                                        <div class="simplebar-content-wrapper" style="height: 100%; overflow: hidden scroll;">
                                            <div class="simplebar-content" style="padding: 16px;" >
                                                <nav class="nav nav-pills nav-gap-y-1 flex-column">
                                                    <a href="{{ route('topicos.index') }}" class="nav-link nav-link-faded has-icon active" style="background-color: rgba(95, 95, 95, 0.44);">Todos os Tópicos</a>
                                                </nav>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Inner sidebar body -->
                </div>
                <!-- /Inner sidebar -->

                <!-- Inner main -->
                <div class="inner-main">
                    <!-- Inner main header -->
                    <!-- /Inner main header -->

                    <!-- Inner main body -->

                    <!-- Forum Detail -->
                    <div id="forum-content-{{ $topico->id }}" class="inner-main-body p-2 p-sm-3 forum-content">
                        <a class="btn btn-dark btn-icon animated-hover btn-sm mb-3" href="{{route('topicos.index')}}" style="color: white">
                            <i class="fa fa-fw fa-arrow-left mr-1"></i>
                            <span>Voltar</span>
                        </a>
                        <div class="card mb-2">
                            <div class="card-body">
                                <div class="media forum-item">
                                    <a href="" class="card-link" data-toggle="collapse" data-target="#forum-content-{{ $topico->id }}">
                                        <img src="{{ asset($topico->user->avatar) }}" width="40" height="40" class="rounded-circle" alt="User" />
                                    </a>
                                    <div class="media-body ml-3">
                                        <div class="d-flex align-items-center">
                                            <a href="" class="text-secondary" data-toggle="collapse" data-target="#forum-content-{{ $topico->id }}">{{ $topico->user->name }}</a>
                                            <small class="text-muted ml-2">{{ $topico->created_at->format('d/m/Y') }}</small>
                                            @if(auth()->check() && $topico->user_id === auth()->user()->id)
                                                <div class="dropdown ml-2">
                                                    <button class="btn btn-link p-0 custom-dropdown-btn" style="color: black" type="button" id="topicOptionsDropdown-{{ $topico->id }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="fa fa-ellipsis-v"></i>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-left dropdown-menu-sm custom-dropdown-menu" aria-labelledby="topicOptionsDropdown-{{ $topico->id }}">
                                                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#editTopicModal-{{ $topico->id }}"><i class="fa fa-edit"></i> Editar</a>
                                                        <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('deleteTopicForm{{ $topico->id }}').submit();"><i class="fa fa-trash"></i> Apagar</a>
                                                        <form id="deleteTopicForm{{ $topico->id }}" action="{{ route('topicos.destroy', $topico->id) }}" method="POST" style="display: none;">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                        <h5 class="mt-1">{{ $topico->titulo }}</h5>
                                        <div class="mt-3 font-size-sm">
                                            <p>{{ $topico->conteudo }}</p>
                                        </div>
                                    </div>
                                    <div class="text-muted small text-center">
                                        <span><i class="far fa-comment ml-2"></i> {{ $topico->comentarios->count() }}</span>
                                    </div>

                                </div>
                            </div>
                        </div>
                        @auth
                            <div class="mt-3 ml-3 mr-3 d-flex flex-row align-items-center p-3 form-color">
                                <img src="{{ asset(auth()->user()->avatar) }}" width="40" height="40" class="rounded-circle mr-2">
                                <form action="{{ route('comentariosT.store', $topico->id) }}" method="POST" class="w-100 d-flex">
                                    @csrf
                                    <input type="hidden" name="topico_id" value="{{ $topico->id }}">
                                    <div class="input-group" style="position: relative;">
                                        <input type="text" class="form-control" name="conteudo" placeholder="Escreve um comentário..." style="padding-right: 30px;">
                                        <button type="submit" class="btn btn-link" style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); font-size: 14px; color: black; background: none; border: none; padding: 0;"><i class="fa fa-paper-plane"></i></button>
                                    </div>
                                </form>
                            </div>
                        @endauth
                        <div class="card mb-2">
                            <div class="card-body">
                                @if ($comentarios->isEmpty())
                                    <p>Sem comentários</p>
                                @else
                                    @foreach ($comentarios->sortByDesc('created_at') as $comentario)
                                    <div class="media forum-item">
                                            <img src="{{ asset($comentario->user->avatar) }}" width="40" height="40" class="rounded-circle" alt="User" />
                                        <div class="media-body ml-3">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="d-flex flex-row align-items-center">
                                                    <div class="mr-2">
                                                        <span>{{ $comentario->user->name }}</span>
                                                    </div>
                                                    @if(auth()->check() && $comentario->user_id === auth()->user()->id)
                                                        <div class="dropdown ml-2">
                                                            <button class="btn btn-link p-0 custom-dropdown-btn" style="color: black" type="button" id="commentOptionsDropdown{{ $comentario->id }}" aria-haspopup="true" aria-expanded="false">
                                                                <i class="fa fa-ellipsis-v"></i>
                                                            </button>
                                                            <div class="dropdown-menu dropdown-menu-left custom-dropdown-menu" aria-labelledby="commentOptionsDropdown{{ $comentario->id }}">
                                                                <a class="dropdown-item custom-dropdown-btn" style="color: black" href="#" onclick="event.preventDefault(); toggleEditCommentForm('{{ $comentario->id }}')">
                                                                    <i class="fa fa-edit"></i> Editar
                                                                </a>
                                                                <a class="dropdown-item" title="Apagar Comentário" href="#" onclick="event.preventDefault(); document.getElementById('deleteCommentForm{{ $comentario->id }}').submit();"><i class="fa fa-trash"></i> Apagar</a>
                                                                <form id="deleteCommentForm{{ $comentario->id }}" action="{{ route('comentariosT.destroy', $comentario->id) }}" method="POST" style="display: none;">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                </form>
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="d-flex align-items-center">
                                                    <small>{{ $comentario->created_at->diffForHumans() }}</small>
                                                </div>
                                            </div>
                                            <div class="mt-3 font-size-sm">
                                                <p>{{ $comentario->conteudo }}</p>
                                                @if(auth()->check())
                                                    @if($comentario->user_id === auth()->user()->id)

                                                    @else
                                                        <div class="d-flex flex-row user-feed">
                                                            <span class="ml-3">
                                                                <button href="#" class="reply-btn" data-comment-id="{{ $comentario->id }}" style="background: none; border: none; padding: 0; font-size: 14px; color: black;">
                                                                    <i class="fa fa-comments-o mr-2"></i>
                                                                </button>
                                                            </span>
                                                        </div>
                                                    @endif
                                                @endif
                                            </div>
                                            <div id="replyForm{{ $comentario->id }}" class="mt-3 ml-3 mr-3 d-none">
                                                <form action="{{ route('respostas.store', $comentario->id) }}" method="POST" class="w-100 d-flex">
                                                    @csrf
                                                    <input type="hidden" name="topico_id" value="{{ $topico->id }}">
                                                    <div class="input-group" style="position: relative;">
                                                        <input type="text" class="form-control" name="conteudo" placeholder="Escreve um comentário..." style="padding-right: 30px;">
                                                        <button type="submit" class="btn btn-link" style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); font-size: 14px; color: black; background: none; border: none; padding: 0;"><i class="fa fa-paper-plane"></i></button>
                                                    </div>
                                                </form>
                                            </div>
                                            <div id="editCommentForm{{ $comentario->id }}" class="mt-3 ml-3 mr-3 d-none">
                                                <form action="{{ route('comentariosT.update', $comentario->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="topico_id" value="{{ $topico->id }}">
                                                    <div class="form-group">
                                                        <textarea class="form-control" name="conteudo">{{ $comentario->conteudo }}</textarea>
                                                    </div>
                                                    <button type="submit" class="btn btn-dark">Salvar</button>
                                                </form>
                                            </div>
                                            @if ($comentario->respostas->count() > 0)
                                                <div class="mt-3 ml-3 mr-3">
                                                    @foreach ($comentario->respostas->sortByDesc('created_at') as $resposta)
                                                        <div class="d-flex flex-row p-3">
                                                            <img src="{{ asset($resposta->user->avatar) }}" width="40" height="40" class="rounded-circle mr-3">
                                                            <div class="w-100">
                                                                <div class="d-flex justify-content-between align-items-center">
                                                                    <div class="d-flex flex-row align-items-center">
                                                                        <span class="mr-2">{{ $resposta->user->name }}</span>
                                                                    </div>
                                                                    <div class="d-flex align-items-center">
                                                                        @if(auth()->check() && $resposta->user_id === auth()->user()->id)
                                                                            <div class="dropdown ml-2">
                                                                                <button class="btn btn-link p-0 custom-dropdown-btn mr-2" style="color: black" type="button" id="commentOptionsDropdown{{ $resposta->id }}" aria-haspopup="true" aria-expanded="false">
                                                                                    <i class="fa fa-ellipsis-v"></i>
                                                                                </button>
                                                                                <div class="dropdown-menu dropdown-menu-left custom-dropdown-menu" aria-labelledby="commentOptionsDropdown{{ $resposta->id }}">
                                                                                    <a class="btn btn-link p-0 custom-dropdown-btn ml-2" style="color: black" href="#" onclick="event.preventDefault(); toggleEditReplyForm('{{ $resposta->id }}')">
                                                                                        <i class="fa fa-edit"></i> Editar
                                                                                    </a>
                                                                                    <br>
                                                                                    <a class="btn btn-link p-0 custom-dropdown-btn ml-2" style="color: black" title="Apagar Resposta" href="#" onclick="event.preventDefault(); document.getElementById('deleteCommentForm{{ $resposta->id }}').submit();"><i class="fa fa-trash"></i> Apagar</a>
                                                                                    <form id="deleteCommentForm{{ $resposta->id }}" action="{{ route('respostasT.destroy', $resposta->id) }}" method="POST" style="display: none;">
                                                                                        @csrf
                                                                                        @method('DELETE')
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                        @endif
                                                                        <small>{{ $resposta->created_at->diffForHumans() }}</small>
                                                                    </div>
                                                                </div>
                                                                <p class="text-justify comment-text mb-0">{{ $resposta->conteudo }}</p>
                                                                @if(auth()->check() && $resposta->user->id !== auth()->user()->id)
                                                                    <div class="d-flex flex-row user-feed">
                                                                        <span class="ml-3">
                                                                            <button href="#" class="reply-btn" data-comment-id="{{ $resposta->id }}" style="background: none; border: none; padding: 0; font-size: 14px; color: black;">
                                                                                <i class="fa fa-comments-o mr-2"></i>
                                                                            </button>
                                                                        </span>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div id="replyForm{{ $resposta->id }}" class="mt-3 ml-3 mr-3 d-none">
                                                            <form action="{{ route('respostas.store', $comentario->id) }}" method="POST" class="w-100 d-flex">
                                                                @csrf
                                                                <input type="hidden" name="topico_id" value="{{ $topico->id }}">
                                                                <div class="input-group" style="position: relative;">
                                                                    <input type="text" class="form-control" name="conteudo" placeholder="Escreve um comentário..." style="padding-right: 30px;">
                                                                    <button type="submit" class="btn btn-link" style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); font-size: 14px; color: black; background: none; border: none; padding: 0;"><i class="fa fa-paper-plane"></i></button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div id="editReplyForm{{ $resposta->id }}" class="mt-3 ml-3 mr-3 d-none">
                                                            <form action="{{ route('respostasT.update', $resposta->id) }}" method="POST">
                                                                @csrf
                                                                @method('PUT')
                                                                <input type="hidden" name="topico_id" value="{{ $topico->id }}">
                                                                <div class="form-group">
                                                                    <textarea class="form-control" name="conteudo">{{ $resposta->conteudo }}</textarea>
                                                                </div>
                                                                <button type="submit" class="btn btn-dark">Salvar</button>
                                                            </form>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- /Forum Detail -->
                </div>

                <!-- New Thread Modal -->
                <div class="modal fade" id="threadModal" tabindex="-1" role="dialog" aria-labelledby="threadModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <form id="createTopicForm" action="{{ route('topicos.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-header d-flex align-items-center bg-dark text-white">
                                    <h6 class="modal-title mb-0" id="threadModalLabel">Novo Tópico</h6>
                                    <button type="button" class="close" style="color: white" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="titulo">Título</label>
                                        <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Título">
                                    </div>
                                    <div class="form-group">
                                        <label for="conteudo">Conteúdo</label>
                                        <textarea class="form-control" id="conteudo" name="conteudo" placeholder="Conteúdo" rows="4"></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-success" id="postButton">Criar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Edit Topic Modal -->
                <div class="modal fade" id="editTopicModal-{{ $topico->id }}" tabindex="-1" role="dialog" aria-labelledby="editTopicModalLabel-{{ $topico->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <form id="editTopicForm-{{ $topico->id }}" action="{{ route('topicos.update', $topico->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="modal-header d-flex align-items-center bg-dark text-white">
                                    <h6 class="modal-title mb-0" id="editTopicModalLabel-{{ $topico->id }}">Editar Tópico</h6>
                                    <button type="button" class="close" style="color: white" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="editTitulo-{{ $topico->id }}">Título</label>
                                        <input type="text" class="form-control" id="editTitulo-{{ $topico->id }}" name="titulo" value="{{ $topico->titulo }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="editConteudo-{{ $topico->id }}">Conteúdo</label>
                                        <textarea class="form-control" id="editConteudo-{{ $topico->id }}" name="conteudo" rows="4" required>{{ $topico->conteudo }}</textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-success" id="editButton-{{ $topico->id }}">Salvar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<footer class="footer">
    <h2 class="footer-title">ASSOCIAM</h2>
    <div class="footer-icons">
        <a href="#" class="footer-icon"><i class="fa fa-facebook"></i></a>
        <a href="#" class="footer-icon"><i class="fa fa-twitter"></i></a>
        <a href="#" class="footer-icon"><i class="fa fa-instagram"></i></a>
        <a href="#" class="footer-icon"><i class="fa fa-linkedin"></i></a>
    </div>
    <p class="footer-text">&copy; 2023 ASSOCIAM. All rights reserved.</p>
</footer>

<script src="{{asset('js/popper.min.js')}}"></script>
<script src="{{asset('js/jquery.sticky.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js"></script>
<script>
    function toggleEditCommentForm(commentId) {
        var form = document.getElementById('editCommentForm' + commentId);
        form.classList.toggle('d-none');
    }
</script>

<script>
    function toggleEditReplyForm(replyId) {
        var form = document.getElementById('editReplyForm' + replyId);
        form.classList.toggle('d-none');
    }
</script>
<script>
    $(document).ready(function() {
        $('.custom-dropdown-btn').click(function() {
            $(this).next('.dropdown-menu').toggle();
        });
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        var backButton = document.querySelector(".btn[data-target='#forum-list']");
        backButton.addEventListener("click", function () {
            var forumContent = document.querySelector(".forum-content.show");
            if (forumContent) {
                forumContent.classList.remove("show");
            }
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var replyButtons = document.querySelectorAll('.reply-btn');

        replyButtons.forEach(function (button) {
            button.addEventListener('click', function (event) {
                event.preventDefault();

                var commentId = button.getAttribute('data-comment-id');
                var replyForm = document.getElementById('replyForm' + commentId);

                if (replyForm.classList.contains('d-none')) {
                    replyForm.classList.remove('d-none');
                } else {
                    replyForm.classList.add('d-none');
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#createTopicForm').submit(function(event) {
            event.preventDefault(); // Impede o envio do formulário padrão

            // Obtenha os dados do formulário
            var form = $(this);
            var url = form.attr('action');
            var method = form.attr('method');
            var data = form.serialize();

            // Faça a solicitação AJAX
            $.ajax({
                url: url,
                method: method,
                data: data,
                success: function(response) {
                    console.log(response); // Exiba a resposta do servidor
                    $('#threadModal').modal('hide'); // Feche a modal após o envio
                    $('#createTopicForm')[0].reset(); // Limpe o formulário
                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText); // Exiba o erro, se houver
                }
            });
        });
    });
</script>
<script>
    var dropdownMenu = document.querySelector('.dropdown-menu');
    var dropdownToggle = document.querySelector('.dropdown-toggle');
    var dropdownOpen = false;

    function handleDropdownToggle(event) {
        event.preventDefault();
        if (dropdownOpen) {
            dropdownMenu.classList.remove('show');
            dropdownOpen = false;
        } else {
            dropdownMenu.classList.add('show');
            dropdownOpen = true;
        }
    }

    dropdownToggle.addEventListener('click', handleDropdownToggle);
</script>

</body>
</html>
