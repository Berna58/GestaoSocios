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
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.0/css/boxicons.min.css" integrity="sha512-pVCM5+SN2+qwj36KonHToF2p1oIvoU3bsqxphdOIWMYmgr4ZqD3t5DjKvvetKhXGc/ZG5REYTT6ltKfExEei/Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.4/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.4/dist/sweetalert2.all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <title>ASSOCIAM - Perfil</title>
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
            <div class="col-12 col-lg-auto mb-3" style="width: 200px;">
                <div class="card p-3">
                    <div class="e-navlist e-navlist--active-bg">
                        <ul class="nav">
                            <li class="nav-item"><a class="nav-link px-2 active" href="{{route('profile.show')}}" style="color:black;"><i class="fas fa-user mr-1"></i><span> Perfil</span></a></li>
                            <li class="nav-item-perfil"><a class="nav-link px-2" href="{{route('minhaarea')}}" style="color: black"><i class="fas fa-bookmark mr-1"></i><span> Minha Área</span></a></li>
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
                                            <div class="mx-auto" style="width: 140px;">
                                                <img src="{{ asset(Auth::user()->avatar) }}" style="height:160px; width:160px; border-radius:50%; margin-right:5px; border: 2px solid red; border-color: gray;">
                                            </div>
                                        </div>
                                        <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                                            <div class="text-center text-sm-left mb-2 mb-sm-0">
                                                <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap">{{ Auth::user()->name }}</h4>
                                                <p class="mb-0">{{ Auth::user()->email }}</p>
                                                <div class="text-muted"><small>Última vez Online: {{ Auth::user()->updated_at->format('d/m/Y') }}</small></div>
                                            </div>
                                            <div class="text-center text-sm-right">
                                                <span class="badge badge-secondary">{{ ucfirst(Auth::user()->role->name) }}</span>
                                                <div class="text-muted"><small>Membro desde {{ Auth::user()->created_at->format('d/m/Y') }}</small></div>
                                                <button class="btn btn-block btn-danger mt-4" onclick="location.href='{{ route('logout') }}'">
                                                    <i class="fa fa-sign-out"></i>
                                                    <span>Sair</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <ul class="nav nav-tabs">
                                        <li class="nav-item"><a href="" class="active nav-link">Informações</a></li>
                                    </ul>
                                    <div class="tab-content pt-3">
                                        <div class="tab-pane active">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label>Nome</label>
                                                                <input class="form-control" type="text" name="name" placeholder="" value="{{ Auth::user()->name }}" disabled="disabled">
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label>NIF</label>
                                                                <input class="form-control" type="text" name="nif" placeholder="" value="{{ Auth::user()->nif }}" disabled="disabled">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label>Telemóvel</label>
                                                                <input class="form-control" type="text" name="telemovel" placeholder="" value="{{ Auth::user()->telemovel }}" disabled="disabled">
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label>Data de Nascimento</label>
                                                                <input type="date" class="form-control" name="dataNascimento" value="{{ date('Y-m-d',strtotime(auth()->user()->dataNascimento)) }}" placeholder="Data Nascimento" disabled="disabled">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label>Morada</label>
                                                                <input type="text" class="form-control" name="morada" value="{{ Auth::user()->morada }}" placeholder="Morada" disabled="disabled">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col mb-3">
                                                            <div class="form-group">
                                                                <label>Email</label>
                                                                <input class="form-control" type="text" placeholder="" value="{{ Auth::user()->email }}" name="email" disabled="disabled">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 col-sm-6 mb-3">
                                                    <div class="mb-2"><b>Alterar Palavra-Passe</b></div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label>Nova Palavra-Passe</label>
                                                                <input class="form-control" type="password" placeholder="" name="password" value="{{ Auth::user()->password }}" disabled="disabled">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @error('status')
                                        <div class="alert alert-success">{{ $message }}</div>
                                        @enderror

                                        @error('avatar')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                        @error('email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                        @error('telemovel')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                        @error('morada')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <div class="row">
                                            <div class="col d-flex justify-content-end">
                                                <button class="btn btn-dark" type="button" data-toggle="modal" data-target="#edit-profile-modal">Editar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal de edição do perfil -->
        <div class="modal fade" id="edit-profile-modal" tabindex="-1" role="dialog" aria-labelledby="edit-profile-modal-label" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="{{ route('perfil.update', auth()->id()) }}" id="editForm" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="modal-header bg-dark text-white">
                            <h5 class="modal-title" id="edit-profile-modal-label">Editar Perfil</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true" style="color: white">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" id="email" name="email" placeholder="{{ Auth::user()->email }}">
                                @error('email')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="telemovel">Telemovel</label>
                                <input type="text" class="form-control" id="telemovel" name="telemovel" placeholder="{{ Auth::user()->telemovel }}">
                                @error('telemovel')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="morada">Morada</label>
                                <input type="text" class="form-control" id="morada" name="morada" placeholder="{{ Auth::user()->morada }}">
                                @error('morada')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="avatar">Avatar</label>
                                <input type="file" class="form-control-file" id="avatar" name="avatar">
                                @error('avatar')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-success">Salvar Alterações</button>
                        </div>
                    </form>
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

<script src="{{ asset('../js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('../js/popper.min.js') }}"></script>
<script src="{{ asset('../js/jquery.sticky.js') }}"></script>
<script src="{{ asset('../js/main.js') }}"></script>

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

<script>
    function editarPerfil(event) {
        event.preventDefault();

        var form = document.getElementById('editForm');
        var messageContainer = document.getElementById('messageContainer');

        // Simulando a validação do formulário
        var errors = false; // Defina como "true" se houver erros de validação

        if (errors) {
            // Exibir mensagem de erro
            messageContainer.innerHTML = '<div class="alert alert-danger">Ocorreu um erro ao salvar as alterações. Verifique os campos e tente novamente.</div>';
        } else {
            // Exibir mensagem de sucesso
            messageContainer.innerHTML = '<div class="alert alert-success">As alterações foram salvas com sucesso.</div>';

            // Você pode adicionar ações adicionais aqui, como atualizar a página ou redirecionar o usuário
            // Exemplo: window.location.href = '/perfil';
        }
    }
</script>


</body>
</html>
