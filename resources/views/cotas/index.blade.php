@extends('layouts.app')
<title>ASSOCIAM - Admin Cotas</title>
<link rel="icon" href="{{asset('images/logoassociam.png')}}">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-fk6mJzC8A3vQz3VTL2s3p6ARJlQ/vzHyquvXvMnJ9+fT8r6Eu4zLfh4GxZuynw5OexAgPq+7tRI9z4JtK3h99g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.0/css/boxicons.min.css" integrity="sha512-pVCM5+SN2+qwj36KonHToF2p1oIvoU3bsqxphdOIWMYmgr4ZqD3t5DjKvvetKhXGc/ZG5REYTT6ltKfExEei/Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<link rel="stylesheet" href="{{ asset('css/animationicon.css') }}">
<style>
    .custom-pagination .page-item .page-link {
        color: black;
    }

    .custom-pagination .page-item.active .page-link {
        background-color: black;
        border-color: black;
        color: white;
    }
</style>

@section('content')
    @include('vendor.adminlte.partials.common.preloader')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="ml-3">{{ __('Cotas') }}</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card m-3">
                        <div class="card-body p-0" style="max-height: 600px; overflow-y: scroll;">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th class="align-middle">Nome</th>
                                    <th class="text-center align-middle">Ações</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td class="text-nowrap align-middle">{{ $user->name }}</td>
                                        <td class="text-center align-middle">
                                            <div class="d-flex justify-content-around">
                                                <a class="btn btn-secondary btn-icon animated-hover" href="{{ route('cotas.cotasPagas', ['userId' => $user->id]) }}" title="Ver Registo de Cotas" style="color: white"><i class="fas fa-edit"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="d-flex justify-content-center mt-3">
                            <ul class="pagination custom-pagination">
                                {!! $users->links() !!}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
