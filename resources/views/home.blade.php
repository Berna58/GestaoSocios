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

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

    <title>ASSOCIAM - Página Inicial</title>

    <style>
        .my-swal-container {
            z-index: 99999; /* Ajuste o valor conforme necessário para garantir que o SweetAlert fique acima dos outros elementos */
        }

        .my-swal-popup {
            background-color: #ffffff;
            border: 1px solid #e4e7ea;
            border-radius: 4px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .my-swal-title {
            font-size: 18px;
            font-weight: bold;
        }

        .my-swal-text {
            font-size: 16px;
            margin-top: 10px;
        }

        .my-swal-confirm-button {
            background-color: #3085d6;
            color: #ffffff;
            border-radius: 4px;
            padding: 10px 20px;
            font-size: 16px;
            margin-top: 20px;
        }
    </style>
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


    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <ol class="carousel-indicators">
            @foreach ($noticias as $index => $noticia)
                <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{ $index }}" class="{{ $index == 0 ? 'active' : '' }}"></li>
            @endforeach
        </ol>
        <div class="carousel-inner">
            @foreach ($noticias as $index => $noticia)
                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                    <img src="{{ asset($noticia->imagem) }}" class="d-block w-100" alt="Slide {{ $index + 1 }}">
                    <div class="carousel-caption" style="background-color: rgba(0, 0, 0, 0.6);">
                        <h2 class="ml-3 mr-3 mb-3" style="-webkit-text-stroke-width: 0.6px; -webkit-text-stroke-color: black"><b>{{ $noticia->titulo }}</b></h2>
                        <p class="text-justify ml-3 mr-3" style="color: white;">{!! $noticia->descricao !!}</p>
                    </div>
                </div>
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden"></span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden"></span>
        </a>
    </div>

    <section class="divided clearfix mt-3">
        <h3>PRÓXIMOS EVENTOS</h3>
    </section>


    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-5">
                <hr class="custom-hr">
                <div id="calendar"></div>
            </div>

            @php
                $eventosCards = $eventos->filter(function ($evento) {
                    $dataHoraEvento = strtotime($evento->data . ' ' . $evento->hora);
                    $dataHoraAtual = strtotime(now()->format('Y-m-d H:i:s'));
                    $umaHoraAntes = strtotime('-1 hour', $dataHoraEvento);

                    return ($dataHoraEvento >= $dataHoraAtual && $dataHoraAtual <= $umaHoraAntes);
                })->sortBy(function ($evento) {
                    return strtotime($evento->data . ' ' . $evento->hora);
                })->take(2);
            @endphp

            @foreach ($eventosCards as $evento)
                <!-- Display the event information -->
                <div class="col-md-3">
                    <hr class="custom-hr">
                    <ul class="list-group">
                        <div class="text-left mb-3">
                            <button type="button" class="btn btn-dark" disabled>Próximo Evento</button>
                        </div>
                        <li class="list-group-item border-0">
                            <h5><a href="{{ route('evento.show', ['id' => $evento->id]) }}" style="color: black">{{ $evento->titulo }}</a></h5>
                            <p>{!! Illuminate\Support\Str::limit($evento->descricao, 100) !!}</p>
                            <p><b>Data de Início</b> <br>{{ date('d-m-Y', strtotime($evento->data)) }}</p>
                            <p><b>Hora</b> <br>{{ date('H:i', strtotime($evento->hora)) }}</p>
                        </li>
                    </ul>
                </div>
            @endforeach
        </div>
    </div>

</header>

<div class="hero"></div>


<footer class="footer container-fluid">
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
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.4/index.global.min.js'></script>
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.0.0/locales/pt.js'></script>
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

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            locale: 'pt',
            eventClick: function(info) {
                // Obtenha o ID do evento clicado
                var eventoId = info.event.id;

                // Obtenha a data do evento
                var eventoData = new Date(info.event.start);

                // Obtenha a data atual
                var dataAtual = new Date();

                // Verifique se a data do evento é posterior à data atual
                if (eventoData > dataAtual) {
                    // Faça a ação desejada com o ID do evento (por exemplo, redirecionar para a página de detalhes)
                    window.location.href = '/eventos/' + eventoId;
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Este evento já ocorreu.',
                        customClass: {
                            container: 'my-swal-container',
                            popup: 'my-swal-popup',
                            title: 'my-swal-title',
                            text: 'my-swal-text',
                            confirmButton: 'my-swal-confirm-button'
                        }
                    });
                }
            },
            events: [
                    @foreach($eventos as $evento)
                {
                    id: "{{ $evento->id }}",
                    title: "{{ $evento->titulo }}",
                    start: "{{ $evento->data }}",
                },
                @endforeach
            ]
        });
        calendar.render();
    });
</script>


</body>
</html>
