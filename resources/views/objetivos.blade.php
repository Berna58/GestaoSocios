<!doctype html>
<html lang="en">
<head>
    <link rel="icon" href="{{asset('images/logoassociam.png')}}">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('fonts/icomoon/style.css')}}">

    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">

    <!-- Style -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/historia.css')}}">
    <link rel="stylesheet" href="{{asset('css/objetivo.css')}}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

    <title>ASSOCIAM - Objetivos</title>
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

    <div class="wide">
        <div class="col-xs-5 line"><hr></div>
        <div class="col-xs-2 logo">OBJETIVOS</div>
        <div class="col-xs-5 line"><hr></div>
    </div>

    <ol class="mt-5" id="my-list">
        <li style="--accent-color:#2A2A2AFF" id="my-list">
            <div class="icon"><i class="fa-solid fa-bullseye"></i></div>
            <div class="title">Objetivo</div>
            <div class="descr">Promover o conhecimento técnico-científico para o
                desenvolvimento das atividades no domínio da Sociologia</div>
        </li>
        <li style="--accent-color:#2A2A2AFF" id="my-list">
            <div class="icon"><i class="fa-solid fa-bullseye"></i></div>
            <div class="title">Objetivo</div>
            <div class="descr">Implementar ações de aperfeiçoamento e atualização dos
                conhecimentos técnicos e científicos dos seus associados</div>
        </li>
        <li id="my-list" style="--accent-color:#2a2a2a">
            <div class="icon"><i class="fa-solid fa-bullseye"></i></div>
            <div class="title">Objetivo</div>
            <div class="descr">Pugnar pela divulgação e observância dos princípios
                deontológicos da investigação e ação sociológica dos seus associados</div>
        </li>
        <li style="--accent-color:#2A2A2AFF" id="my-list">
            <div class="icon"><i class="fa-solid fa-bullseye"></i></div>
            <div class="title">Objetivo</div>
            <div class="descr">Promover/estabelecer parcerias de cooperação que se venham a considerar oportunas
                com outras entidades, públicas e privadas, no âmbito das atividades da ASSOCIAM</div>
        </li>
        <li style="--accent-color:#2A2A2AFF" id="my-list">
            <div class="icon"><i class="fa-solid fa-bullseye"></i></div>
            <div class="title">Objetivo</div>
            <div class="descr">Divulgar junto das instituições e da opinião pública a
                natureza e os contributos da Sociologia enquanto ciência social</div>
        </li>
        <li style="--accent-color:#2A2A2AFF" id="my-list">
            <div class="icon"><i class="fa-solid fa-bullseye"></i></div>
            <div class="title">Objetivo</div>
            <div class="descr">Acolher iniciativas de estudos e eventos interdisciplinares,
                nomeadamente no âmbito das ciências sociais e humanas</div>
        </li>
        <li style="--accent-color:#2A2A2AFF" id="my-list">
            <div class="icon"><i class="fa-solid fa-bullseye"></i></div>
            <div class="title">Objetivo</div>
            <div class="descr">Contribuir para a participação dos seus associados na reflexão e tomada de posição relativamente
                a questões de ordem sociológica ligadas ao desenvolvimento regional do Minho</div>
        </li>
        <li style="--accent-color:#2A2A2AFF" id="my-list">
            <div class="icon"><i class="fa-solid fa-bullseye"></i></div>
            <div class="title">Objetivo</div>
            <div class="descr">a)	Assumir-se como parceiro social regional na definição das
                políticas de carácter educativo, social e cultural;<br>
                b)	Promover a edição de publicações.</div>
        </li>
    </ol>
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
