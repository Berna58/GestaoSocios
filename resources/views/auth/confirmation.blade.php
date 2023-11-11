<title>ASSOCIAM - Lista Espera</title>
<link rel="icon" href="{{asset('images/logoassociam.png')}}">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

<style>
    body {
        background-image: url('https://images.pexels.com/photos/8892/pexels-photo.jpg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1');
        background-size: cover;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
    }

    .card {
        width: 25rem;
        text-align: center;
        background-color: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    }

    .icon-box {
        color: #fff;
        margin: 0 auto;
        width: 95px;
        height: 95px;
        border-radius: 50%;
        z-index: 9;
        background: #000000;
        padding: 15px;
        text-align: center;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
    }

    .icon-box i {
        font-size: 58px;
        position: relative;
        top: 3px;
    }

    .btn {
        color: #fff;
        border-radius: 4px;
        background: #000000;
        text-decoration: none;
        transition: all 0.4s;
        line-height: normal;
        border: none;
    }

    .btn:hover,
    .btn:focus {
        background: rgb(0, 0, 0);
        outline: none;
    }
</style>

<div class="card">
    <div class="card-body">
        <h5 class="card-title">Confirmação de Registro</h5>
        <div class="icon-box mt-3 mb-3">
            <i class="fa fa-spinner" aria-hidden="true"></i>
        </div>
        <p class="card-text">Obrigado pelo seu registro! <br> Seu pedido de conta foi enviado para análise do administrador e você receberá um e-mail de confirmação assim que sua conta for aprovada.</p>
        <p class="card-text">Por favor, aguarde a aprovação da sua inscrição.</p>
        <a href="{{ route('home') }}" class="btn btn-success btn-block">OK</a>
    </div>
</div>
