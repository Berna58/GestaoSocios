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
    <link rel="stylesheet" href="{{ asset('css/animationicon.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/forum.css') }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">


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
                    <div class="inner-main-header">
                        <span class="input-icon input-icon-sm ml-auto w-auto">
                             <form action="{{ route('topicos.search') }}" method="GET" class="d-flex align-items">
                                <input type="text" name="search" class="form-control form-control-sm bg-gray-200 border-gray-200 shadow-none mb-4 mt-4" placeholder="Pesquisar Tópico" />
                             </form>
                        </span>
                    </div>
                    <!-- /Inner main header -->

                    <!-- Inner main body -->

                    <!-- Forum List -->
                    <div id="forum-list" class="inner-main-body p-2 p-sm-3 collapse forum-content show">
                        <div class="card mb-2">
                            <div class="card-body p-2 p-sm-3">
                                @if ($topicos->isEmpty())
                                    <p>Não existem tópicos para visualizar.</p>
                                @else
                                    @foreach($topicos->sortByDesc('created_at') as $topico)
                                        <div class="media forum-item mb-3">
                                            <div class="avatar">
                                                <a href="#" data-toggle="collapse" data-target="#forum-content-{{ $topico->id }}">
                                                    <img src="{{ $topico->user->avatar }}" width="40" height="40" class="rounded-circle" alt="User" />
                                                </a>
                                                <span class="username">{{ $topico->user->name }}</span>
                                            </div>
                                            <div class="media-body ml-3">
                                                <h6>
                                                    <a href="{{ route('topicos.show', $topico->id) }}" class="text-body">{{ $topico->titulo }}</a>
                                                </h6>
                                                <p class="text-muted small">
                                                    Criado a <span class="text-secondary font-weight-bold">{{ $topico->created_at->format('d/m/Y') }}</span>
                                                </p>
                                            </div>
                                            <div class="text-muted small text-center align-self-center">
                                                <span><i class="far fa-comment ml-2"></i> {{ $topico->comentarios->count() }}</span>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        <!-- Paginação -->
                        <div class="d-flex justify-content-center mt-3">
                            <ul class="pagination custom-pagination">
                                {!! $topicos->links() !!}
                            </ul>
                        </div>
                    </div>
                    <!-- /Forum List -->


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
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/jquery.sticky.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js"></script>
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
    // Espera que o documento seja carregado antes de adicionar o código
    document.addEventListener('DOMContentLoaded', function() {
        // Encontra o formulário pelo ID
        var form = document.getElementById('createTopicForm');
        // Adiciona um evento de envio ao formulário
        form.addEventListener('submit', function() {
            // Fecha a modal
            $('#threadModal').modal('hide');
            // Recarrega a página
            window.location.reload();
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
