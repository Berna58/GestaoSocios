<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
            <a href="{{ route('admin.dashboard') }}" class="d-block ml-3"><i class="nav-icon fas fa-th mr-2"></i> {{ __('Plataforma') }}</a>
            <a href="{{ route('admin.pedidos') }}" class="d-block ml-3 mt-3"><i class="nav-icon fas fa-question mr-2"></i> {{ __('Pedidos') }}</a>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

            <li class="nav-item">
                <a href="{{ route('users.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        {{ __('Associados') }}
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('documentos.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-file"></i>
                    <p>
                        {{ __('Documentos') }}
                    </p>
                </a>
            </li>


            <li class="nav-item">
                <a href="{{ route('eventos.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-calendar"></i>
                    <p>
                        {{ __('Eventos') }}
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('publicacoes.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-book"></i>
                    <p>
                        {{ __('Publicações') }}
                    </p>
                </a>
            </li>


            <li class="nav-item">
                <a href="{{ route('noticias.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-newspaper"></i>
                    <p>
                        {{ __('Noticias') }}
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('formularios.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-list-alt"></i>
                    <p>
                        {{ __('Formulários') }}
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('ligacoes.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-link"></i>
                    <p>
                        {{ __('Ligações Uteis') }}
                    </p>
                </a>
            </li>

            <div class="user-panel pb-3 mb-3 d-flex">
            </div>

            <li class="nav-item">
                <a href="{{ route('cotas.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-file-invoice-dollar"></i>
                    <p>
                        {{ __('Cotas') }}
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('arquivos.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-box"></i>
                    <p>
                        {{ __('Arquivos') }}
                    </p>
                </a>
            </li>

        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
