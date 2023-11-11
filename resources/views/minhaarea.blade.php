<!doctype html>
<html lang="en">
<head>
    <link rel="icon" href="{{asset('images/logoassociam.png')}}">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('fonts/icomoon/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

    <!-- Style -->
    <link rel="stylesheet" href="{{ asset('css/minhaarea.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.0/css/boxicons.min.css" integrity="sha512-pVCM5+SN2+qwj36KonHToF2p1oIvoU3bsqxphdOIWMYmgr4ZqD3t5DjKvvetKhXGc/ZG5REYTT6ltKfExEei/Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.4/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.4/dist/sweetalert2.all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/animationicon.css') }}">


    <title>ASSOCIAM - Minha Área</title>
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
                <span class="d-inline-block d-lg-none">
                    <a href="#" class="text-primary site-menu-toggle js-menu-toggle py-5"><span class="icon-menu h3 text-white"></span></a></span>
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
            <div class="col-12 col-lg-auto mb-3 mr-3" style="width: 200px;">
                <div class="card p-3">
                    <div class="e-navlist e-navlist--active-bg">
                        <ul class="nav">
                            <li class="nav-item"><a class="nav-link px-2 active" href="{{ route('profile.show') }}" style="color:black;"><i class="fas fa-user mr-1"></i><span> Perfil</span></a></li>
                            <li class="nav-item-perfil"><a class="nav-link px-2" href="{{ route('minhaarea') }}" style="color: black"><i class="fas fa-bookmark mr-1"></i><span> Minha Área</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-4 mb-3">
                <div class="card radius-10 border-start border-0 border-3 border-info">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-secondary">Eventos Inscritos</p>
                                <h4 class="my-1 text-dark">{{ $totalEventosInscritos }}</h4>
                                <a class="btn btn-sm btn-secondary btn-icon animated-hover" id="ver-mais-button" style="color: white">Ver Mais <i class="fas fa-plus"></i></a>
                            </div>
                            <div class="widgets-icons-2 rounded-circle bg-gradient-scooter text-white ms-auto"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-4 mb-3">
                <div class="card radius-10 border-start border-0 border-3 border-info">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-secondary">Total Cotas Pagas</p>
                                <h1 class="my-2 text-dark">{{ $totalCotasPagas }} €</h1>
                            </div>
                            <div class="widgets-icons-2 rounded-circle bg-gradient-scooter text-white ms-auto">
                                <i class="fa fa-handshake"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col mt-4" id="eventos-inscritos-container"></div>
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

<script src="{{ asset('../js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('../js/popper.min.js') }}"></script>
<script src="{{ asset('../js/jquery.sticky.js') }}"></script>
<script src="{{ asset('../js/main.js') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#ver-mais-button').on('click', function() {
            var button = $(this);
            var buttonText = button.text();

            if (buttonText.includes('Ver Mais')) {
                button.html('Fechar <i class="fas fa-times"></i>');
                $('#tabela-eventos-inscritos').show(); // Mostrar a tabela ao clicar em "Ver Mais"
            } else {
                button.html('Ver Mais <i class="fas fa-plus"></i>');
                $('#tabela-eventos-inscritos').hide(); // Ocultar a tabela ao clicar em "Fechar"
            }
        });

        $('#fechar-button').on('click', function() {
            $('#tabela-eventos-inscritos').hide(); // Ocultar a tabela ao clicar em "Fechar"
            $('#ver-mais-button').html('Ver Mais <i class="fas fa-plus"></i>'); // Restaurar o texto e o ícone do botão "Ver Mais"
        });

        // Buscar eventos-inscritos ao clicar no botão "Ver Mais"
        $('#ver-mais-button').click(function() {
            var button = $(this);
            if (!button.hasClass('loaded')) {
                $.ajax({
                    url: '{{ route('eventos-inscritos') }}',
                    type: 'GET',
                    success: function(response) {
                        $('#eventos-inscritos-container').html(response);
                        button.addClass('loaded');
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                    }
                });
            }
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
