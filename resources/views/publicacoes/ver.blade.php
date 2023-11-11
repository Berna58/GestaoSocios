<!doctype html>
<html lang="en">
<head>
    <link rel="icon" href="{{asset('images/logoassociam.png')}}">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('fonts/icomoon/style.css')}}">

    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

    <!-- Style -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/comentarios.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animationicon.css') }}">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

    <title>ASSOCIAM - Publicações</title>
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
                        <img src="../logoassociam.png" alt="Logo" class="mr-2" style="width: 50px; height: 50px;">ASSOCIAM
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
        <div class="row flex-lg-nowrap">
            <div class="col-12 col-lg-auto mb-3" style="width: 200px;">
                <div class="card p-3">
                    <div class="e-navlist e-navlist--active-bg">
                        <ul class="nav">
                            <li class="nav-item flex-grow-1">
                                <a class="btn btn-dark btn-icon animated-hover w-100" href="{{route('publicacoes')}}" style="color: white">
                                    <i class="fa fa-fw fa-arrow-left mr-1"></i>
                                    <span>Voltar</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="row">
                    <div class="col mb-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="e-profile">
                                    <div class="row">
                                        <div class="col-12 col-sm-auto mb-3">
                                            <div class="mx-auto" style="width: 200px; height: 250px; border-radius: 5px; border: 3px solid black;">
                                                <img src="{{ asset($publicacao->imagem) }}" style="height: 100%; width: 100%; object-fit: cover; border-radius: 5px;">
                                            </div>
                                        </div>
                                        <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                                            <div class="text-center text-sm-left mb-2 mb-sm-0">
                                                    <h5 style="font-size: 15px;" class="pt-sm-2 pb-1 mb-0 text-nowrap">{{ $publicacao->titulo }}</h5>
                                                    <div class="text-muted"><small>Artigo publicado a {{ date('d/m/Y',strtotime($publicacao->created_at)) }}</small></div>
                                                @if ($publicacao->file)
                                                <a class="btn btn-dark btn-icon animated-hover mt-3" href="{{ route('publicacoes.download', ['id' => $publicacao->id]) }}" title="Baixar Publicação">
                                                    <i class="fa fa-download" aria-hidden="true"></i> Fazer Download
                                                </a>
                                                @endif
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col text-center text-sm-right">
                                                    <span class="badge badge-secondary">{{ ucfirst($publicacao->user->name) }}</span>
                                                    <div class="text-muted"><small>Membro desde {{ date('d/m/Y',strtotime($publicacao->user->created_at)) }}</small></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <ul class="nav nav-tabs">
                                    <li class="nav-item"><a href="" class="active nav-link">Descrição</a></li>
                                </ul>
                                <div class="tab-content pt-3">
                                    <div class="tab-pane active">
                                        <p class="mt-4 ml-2">{!! $publicacao->descricao !!}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="p-3 mt-2 ml-3 mr-3">
                                <h6>Comentários</h6>
                            </div>

                            @auth
                                <div class="mt-3 ml-3 mr-3 d-flex flex-row align-items-center p-3 form-color">
                                    <img src="{{ asset(auth()->user()->avatar) }}"  width="40" height="40" class="rounded-circle mr-2">
                                    <form action="{{ route('comentarios.store') }}" method="POST" class="w-100 d-flex">
                                        @csrf
                                        <input type="hidden" name="publicacao_id" value="{{ $publicacao->id }}">
                                        <div class="input-group" style="position: relative;">
                                            <input type="text" class="form-control" name="conteudo" placeholder="Escreve um comentário..." style="padding-right: 30px;">
                                            <button type="submit" class="btn btn-link" style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); font-size: 14px; color: black; background: none; border: none; padding: 0;"><i class="fa fa-paper-plane"></i></button>
                                        </div>
                                    </form>
                                </div>
                            @else
                                <div class="mt-3 ml-3 mr-3 p-3 form-color">
                                    <p>É necessário fazer login para comentar.</p>
                                </div>
                            @endauth

                            <!-- Iterar sobre os comentários -->
                            @foreach ($comentarios->sortByDesc('created_at') as $comentario)
                                <div class="mt-2 ml-3 mr-3">
                                    <div class="d-flex flex-row p-3">
                                        <img src="{{ asset($comentario->user->avatar) }}" width="40" height="40" class="rounded-circle mr-3">
                                        <div class="w-100">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="d-flex flex-row align-items-center">
                                                    <span class="mr-2">{{ $comentario->user->name }}</span>
                                                </div>
                                                <div class="d-flex align-items-center">
                                                    <small>{{ $comentario->created_at->diffForHumans() }}</small>
                                                    @if(auth()->check() && $comentario->user_id === auth()->user()->id)
                                                        <div class="dropdown ml-2">
                                                            <button class="btn btn-link p-0 custom-dropdown-btn" style="color: black" type="button" id="commentOptionsDropdown{{ $comentario->id }}" aria-haspopup="true" aria-expanded="false">
                                                                <i class="fa fa-ellipsis-v"></i>
                                                            </button>
                                                            <div class="dropdown-menu dropdown-menu-right custom-dropdown-menu" aria-labelledby="commentOptionsDropdown{{ $comentario->id }}">
                                                                <a class="btn btn-link p-0 custom-dropdown-btn ml-4" style="color: black" href="#" onclick="event.preventDefault(); toggleEditCommentForm('{{ $comentario->id }}')">
                                                                    <i class="fa fa-edit"></i> Editar
                                                                </a>
                                                                <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('deleteCommentForm{{ $comentario->id }}').submit();"><i class="fa fa-trash"></i> Apagar</a>
                                                                <form id="deleteCommentForm{{ $comentario->id }}" action="{{ route('comentarios.destroy', $comentario->id) }}" method="POST" style="display: none;">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                </form>
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <p class="text-justify comment-text mb-0">{{ $comentario->conteudo }}</p>
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
                                            <div id="replyForm{{ $comentario->id }}" class="mt-3 ml-3 mr-3 d-none">
                                                <form action="{{ route('respostas.reply', $comentario->id) }}" method="POST" class="w-100 d-flex">
                                                    @csrf
                                                    <input type="hidden" name="publicacao_id" value="{{ $publicacao->id }}">
                                                    <div class="input-group" style="position: relative;">
                                                        <input type="text" class="form-control" name="conteudo" placeholder="Escreve um comentário..." style="padding-right: 30px;">
                                                        <button type="submit" class="btn btn-link" style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); font-size: 14px; color: black; background: none; border: none; padding: 0;"><i class="fa fa-paper-plane"></i></button>
                                                    </div>
                                                </form>
                                            </div>
                                            <div id="editCommentForm{{ $comentario->id }}" class="mt-3 ml-3 mr-3 d-none">
                                                <form action="{{ route('comentarios.update', $comentario->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="publicacao_id" value="{{ $publicacao->id }}">
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
                                                                        <small>{{ $resposta->created_at->diffForHumans() }}</small>
                                                                        @if(auth()->check() && $resposta->user_id === auth()->user()->id)
                                                                            <div class="dropdown ml-2">
                                                                                <button class="btn btn-link p-0 custom-dropdown-btn" style="color: black" type="button" id="commentOptionsDropdown{{ $resposta->id }}" aria-haspopup="true" aria-expanded="false">
                                                                                    <i class="fa fa-ellipsis-v"></i>
                                                                                </button>
                                                                                <div class="dropdown-menu dropdown-menu-left custom-dropdown-menu" aria-labelledby="commentOptionsDropdown{{ $resposta->id }}">
                                                                                    <a class="btn btn-link p-0 custom-dropdown-btn ml-2" style="color: black" href="#" onclick="event.preventDefault(); toggleEditReplyForm('{{ $resposta->id }}')">
                                                                                        <i class="fa fa-edit"></i> Editar
                                                                                    </a>
                                                                                    <br>
                                                                                    <a class="btn btn-link p-0 custom-dropdown-btn ml-2" style="color: black" title="Apagar Resposta" href="#" onclick="event.preventDefault(); document.getElementById('deleteCommentForm{{ $resposta->id }}').submit();"><i class="fa fa-trash"></i> Apagar</a>
                                                                                    <form id="deleteCommentForm{{ $resposta->id }}" action="{{ route('respostas.destroy', $resposta->id) }}" method="POST" style="display: none;">
                                                                                        @csrf
                                                                                        @method('DELETE')
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                        @endif
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
                                                            <form action="{{ route('respostas.reply', $comentario->id) }}" method="POST" class="w-100 d-flex">
                                                                @csrf
                                                                <input type="hidden" name="publicacao_id" value="{{ $publicacao->id }}">
                                                                <div class="input-group" style="position: relative;">
                                                                    <input type="text" class="form-control" name="conteudo" placeholder="Escreve um comentário..." style="padding-right: 30px;">
                                                                    <button type="submit" class="btn btn-link" style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); font-size: 14px; color: black; background: none; border: none; padding: 0;"><i class="fa fa-paper-plane"></i></button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div id="editReplyForm{{ $resposta->id }}" class="mt-3 ml-3 mr-3 d-none">
                                                            <form action="{{ route('respostas.update', $resposta->id) }}" method="POST">
                                                                @csrf
                                                                @method('PUT')
                                                                <input type="hidden" name="publicacao_id" value="{{ $publicacao->id }}">
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
                                </div>
                            @endforeach
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

<script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('js/popper.min.js')}}"></script>
<script src="{{asset('js/jquery.sticky.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
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
