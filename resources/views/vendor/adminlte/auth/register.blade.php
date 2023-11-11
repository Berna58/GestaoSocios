@extends('adminlte::auth.auth-page', ['auth_type' => 'register'])

@php( $login_url = View::getSection('login_url') ?? config('adminlte.login_url', 'login') )
@php( $register_url = View::getSection('register_url') ?? config('adminlte.register_url', 'register') )

@if (config('adminlte.use_route_url', false))
    @php( $login_url = $login_url ? route($login_url) : '' )
    @php( $register_url = $register_url ? route($register_url) : '' )

@else
    @php( $login_url = $login_url ? url($login_url) : '' )
    @php( $register_url = $register_url ? url($register_url) : '' )
@endif

@section('auth_header', __('adminlte::adminlte.register_message'))

@section('auth_body')
    <form action="{{ $register_url }}" method="post" enctype="multipart/form-data">
        @csrf
        <p><strong>1. Identificação</strong></p>
        {{-- Name field --}}
        <div class="input-group mb-3">
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                   value="{{ old('name') }}" placeholder="{{ __('adminlte::adminlte.full_name') }}" autofocus>

            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-user {{ config('adminlte.classes_auth_icon', '') }}"></span>
                </div>
            </div>

            @error('name')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

            <div class="row">
                <div class="col-md-6">
                    {{-- Password field --}}
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                               placeholder="{{ __('adminlte::adminlte.password') }}">

                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock {{ config('adminlte.classes_auth_icon', '') }}"></span>
                            </div>
                        </div>

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                    <div class="col-md-6">
                    {{-- Confirm password field --}}
                    <div class="input-group mb-3">
                        <input type="password" name="password_confirmation"
                               class="form-control @error('password_confirmation') is-invalid @enderror"
                               placeholder="{{ __('adminlte::adminlte.retype_password') }}">

                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock {{ config('adminlte.classes_auth_icon', '') }}"></span>
                            </div>
                        </div>

                        @error('password_confirmation')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    {{-- Data Nascimento field --}}
                    <div class="input-group mb-3">
                        <input type="date" name="dataNascimento"
                               class="form-control @error('dataNascimento') is-invalid @enderror"
                               placeholder="{{ __('adminlte::adminlte.dataNascimento') }}">

                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-calendar {{ config('adminlte.classes_auth_icon', '') }}"></span>
                            </div>
                        </div>

                        @error('dataNascimento')
                        <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                        @enderror
                    </div>
                </div>
            <div class="col-md-6">
                {{-- Naturalidade field --}}
                <div class="input-group mb-3">
                    <input type="text" name="naturalidade"
                           class="form-control @error('naturalidade') is-invalid @enderror"
                           placeholder="{{ __('Naturalidade') }}">

                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-globe {{ config('adminlte.classes_auth_icon', '') }}"></span>
                        </div>
                    </div>

                    @error('naturalidade')
                    <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                    @enderror
                </div>
            </div>
        </div>

            {{-- Bilhete de Identidade field --}}
            <div class="input-group mb-3">
                        <input type="text" name="bilheteIdentidade"
                               class="form-control @error('bilheteIdentidade') is-invalid @enderror"
                               placeholder="{{ __('Bilhete de Identidade') }}">

                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-id-card {{ config('adminlte.classes_auth_icon', '') }}"></span>
                            </div>
                        </div>

                        @error('bilheteIdentidade')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>

            {{-- NIF field --}}
            <div class="input-group mb-3">
                    <input type="text" name="nif"
                           class="form-control @error('nif') is-invalid @enderror"
                           placeholder="{{ __('NIF') }}">

                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-id-card {{ config('adminlte.classes_auth_icon', '') }}"></span>
                        </div>
                    </div>

                    @error('nif')
                    <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                    @enderror
                </div>

            {{-- Morada field --}}
            <div class="input-group mb-3">
                    <input type="text" name="morada"
                           class="form-control @error('morada') is-invalid @enderror"
                           placeholder="{{ __('Morada') }}">

                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-home {{ config('adminlte.classes_auth_icon', '') }}"></span>
                        </div>
                    </div>

                    @error('morada')
                    <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                    @enderror
                </div>

            <div class="row">
                <div class="col-md-6">
                    {{-- Email field --}}
                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                               value="{{ old('email') }}" placeholder="{{ __('adminlte::adminlte.email') }}">

                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope {{ config('adminlte.classes_auth_icon', '') }}"></span>
                            </div>
                        </div>

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    {{-- Telemovel field --}}
                    <div class="input-group mb-3">
                        <input type="text" name="telemovel"
                               class="form-control @error('telemovel') is-invalid @enderror"
                               placeholder="{{ __('Telemovel') }}">

                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-phone {{ config('adminlte.classes_auth_icon', '') }}"></span>
                            </div>
                        </div>

                        @error('telemovel')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>

        <p><strong>2. Situação Profissional</strong></p>

        {{-- Emprego field --}}
        <div class="input-group mb-3">
            <select name="emprego" class="form-control @error('emprego') is-invalid @enderror">
                <option value="">Selecione o status de emprego</option>
                <option value="procura_emprego" {{ old('emprego') == 'procura_emprego' ? 'selected' : '' }}>Á procura de emprego</option>
                <option value="empregado" {{ old('emprego') == 'empregado' ? 'selected' : '' }}>Empregado</option>
                <option value="desempregado" {{ old('emprego') == 'desempregado' ? 'selected' : '' }}>Desempregado</option>
            </select>

            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-building {{ config('adminlte.classes_auth_icon', '') }}"></span>
                </div>
            </div>

            @error('emprego')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>


        {{-- Profissão field --}}
        <div class="input-group mb-3">
            <input type="text" name="profissao"
                   class="form-control @error('profissao') is-invalid @enderror"
                   placeholder="{{ __('Profissão') }}">

            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-briefcase {{ config('adminlte.classes_auth_icon', '') }}"></span>
                </div>
            </div>

            @error('profissao')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        {{-- Empresa field --}}
        <div class="input-group mb-3">
            <input type="text" name="empresa"
                   class="form-control @error('empresa') is-invalid @enderror"
                   placeholder="{{ __('Empresa') }}">

            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-building {{ config('adminlte.classes_auth_icon', '') }}"></span>
                </div>
            </div>

            @error('empresa')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <p><strong>3. Formação Académica</strong></p>

        {{-- Nivel field --}}
        <div class="input-group mb-3">
            <select name="nivel" class="form-control @error('nivel') is-invalid @enderror">
                <option value="">Selecione o nível</option>
                <option value="estudante">Estudante</option>
                <option value="licenciatura">Licenciatura</option>
                <option value="mestrado">Mestrado</option>
                <option value="pós-graduação">Pós-Graduação</option>
                <option value="doutoramento">Doutoramento</option>
            </select>

            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-graduation-cap {{ config('adminlte.classes_auth_icon', '') }}"></span>
                </div>
            </div>

            @error('nivel')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="row">
            <div class="col-md-6">
                {{-- Desiginação do Curso field --}}
                <div class="input-group mb-3">
            <input type="text" name="curso"
                   class="form-control @error('curso') is-invalid @enderror"
                   placeholder="{{ __('Curso') }}">

            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-book {{ config('adminlte.classes_auth_icon', '') }}"></span>
                </div>
            </div>

            @error('curso')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
            </div>
            <div class="col-md-6">
                {{-- Estabelecimento de Ensiono field --}}
                <div class="input-group mb-3">
            <input type="text" name="estabelecimentoEnsino"
                   class="form-control @error('estabelecimentoEnsino') is-invalid @enderror"
                   placeholder="{{ __('Estabelecimento de Ensino') }}">

            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-university {{ config('adminlte.classes_auth_icon', '') }}"></span>
                </div>
            </div>

            @error('estabelecimentoEnsino')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
            </div>
        </div>

        <p><strong>4. Investigação/Trabalhos</strong></p>

        <div class="row">
            @for($i = 1; $i <= 4; $i++)
                <div class="col-md-6">
                    {{-- Título da Publicação --}}
                    <div class="input-group mb-3">
                        <input type="text" name="titulo_publicacao{{$i}}"
                               class="form-control @error('titulo_publicacao'.$i) is-invalid @enderror"
                               placeholder="{{ __('Título da Publicação') }} {{$i}}">

                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-heading {{ config('adminlte.classes_auth_icon', '') }}"></span>
                            </div>
                        </div>

                        @error('titulo_publicacao'.$i)
                        <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    {{-- Link da Publicação --}}
                    <div class="input-group mb-3">
                        <input type="text" name="link_publicacao{{$i}}"
                               class="form-control @error('link_publicacao'.$i) is-invalid @enderror"
                               placeholder="{{ __('Link da Publicação') }} {{$i}}">

                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-link {{ config('adminlte.classes_auth_icon', '') }}"></span>
                            </div>
                        </div>

                        @error('link_publicacao'.$i)
                        <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                        @enderror
                    </div>
                </div>
            @endfor
        </div>


        <p><strong>5. Cota de Associado</strong></p>

        {{-- NIB field --}}
        <div class="input-group mb-3">
            <input type="text" name="nib"
                   class="form-control @error('nib') is-invalid @enderror"
                   placeholder="{{ __('NIB') }}">

            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-money-check {{ config('adminlte.classes_auth_icon', '') }}"></span>
                </div>
            </div>

            @error('nib')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        {{-- Register button --}}
        <button type="submit" class="btn btn-block {{ config('adminlte.classes_auth_btn', 'btn-flat btn-primary') }}">
            <span class="fas fa-user-plus"></span>
            {{ __('adminlte::adminlte.register') }}
        </button>
    </form>
@stop

@section('auth_footer')
    <p class="my-0">
        <a href="{{ $login_url }}" style="color: #000000">
            {{ __('adminlte::adminlte.i_already_have_a_membership') }}
        </a>
    </p>
@stop
