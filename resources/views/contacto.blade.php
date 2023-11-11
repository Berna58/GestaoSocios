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
    <link rel="stylesheet" href="{{ asset('css/contacto.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">


    <title>ASSOCIAM - Contacto</title>
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

            <div class="container bootstrap snippets bootdeys mt-5">
                <div class="row text-center">
                    <div class="col-sm-7">
                        <div class="contact-detail-box">
                            <i class="fa fa-th fa-3x text-colored"></i>
                            <h4>Contacte-nos</h4>
                            <i class="fas fa-phone-alt"></i><abbr title="Phone"></abbr> 968 575 322<br>
                            <i class="fas fa-envelope"></i><a href="mailto:associamviana02@gmail.com" class="text-muted"> associamviana02@gmail.com</a>
                        </div>
                    </div><!-- end col -->

                    <div class="col-sm-3">
                        <div class="contact-detail-box">
                            <i class="fa fa-map-marker fa-3x text-colored"></i>
                            <h4>Localização</h4>
                            <address>
                                Rua de S. Vicente, n.º 325; 4900-818 <br>
                                Viana do Castelo
                            </address>
                        </div>
                    </div><!-- end col -->

                </div>
                <!-- end row -->


                <div class="row">
                    <div class="col-sm-6">
                        <div class="contact-map">
                            <iframe class="gmap_iframe" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=600&amp;height=400&amp;hl=en&amp;q=Rua de S. Vicente, n.º 325; 4900-818 Viana do Castelo.&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed" style="height: 360px; width: 100%;"></iframe>
                        </div>
                    </div><!-- end col -->

                    <!-- Contact form -->
                    <div class="col-sm-6">
                        <form role="form" name="ajax-form" id="ajax-form" action="{{ route('send.contact') }}" method="POST" class="form-main" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name2">Nome</label>
                                <input class="form-control" id="name2" name="name" onblur="if(this.value == '') this.value='Nome'" onfocus="if(this.value == 'Nome') this.value=''" type="text" placeholder="Nome">
                                <div class="error" id="err-name" style="display: none;">Insira o seu nome</div>
                            </div>

                            <div class="form-group">
                                <label for="email2">Email</label>
                                <input class="form-control" id="email2" name="email" type="text" onfocus="if(this.value == 'E-mail') this.value='';" onblur="if(this.value == '') this.value='E-mail';" placeholder="E-mail">
                                <div class="error" id="err-emailvld" style="display: none;">Email inválido</div>
                            </div>

                            <div class="form-group">
                                <label for="message2">Mensagem</label>
                                <textarea class="form-control" id="message2" name="message" rows="5" onblur="if(this.value == '') this.value='Mensagem'" onfocus="if(this.value == 'Mensagem') this.value=''">Mensagem</textarea>
                                <div class="error" id="err-message" style="display: none;">Digite a mensagem</div>
                            </div>

                            <div class="row">
                                <div class="col-xs-10">
                                    <div id="ajaxsuccess" class="text-success" style="display: none;"></div>
                                    <div class="error" id="err-form" style="display: none;">Ocorreu um problema ao validar o formulário, verifique!</div>
                                    <div class="error" id="err-timedout">A conexão com o servidor expirou!</div>
                                    <div class="error" id="err-state"></div>
                                    <button type="submit" class="btn btn-primary btn-shadow btn-rounded w-md" id="send">Enviar</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div> <!-- end row -->
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

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#ajax-form').submit(function(event) {
            event.preventDefault();

            // Mostrar mensagem de sucesso e ocultar mensagens de erro
            $('#ajaxsuccess').hide();
            $('#err-form').hide();

            // Enviar o formulário via AJAX
            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                data: $(this).serialize(),
                dataType: 'json',
                success: function(response) {
                    // Exibir mensagem de sucesso e limpar o formulário
                    $('#ajaxsuccess').show().text(response.success);
                    $('#ajax-form')[0].reset();
                },
                error: function(xhr, status, error) {
                    // Exibir mensagem de erro
                    $('#err-form').show();
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
