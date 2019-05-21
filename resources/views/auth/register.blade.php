@extends('layouts.app')


@section('conteudo')

        <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Nome do software | Registrar</title>

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="{{ asset('layout/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('layout/bower_components/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('layout/bower_components/Ionicons/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('layout/dist/css/AdminLTE.min.css') }}">
    <link rel="stylesheet" href="{{ asset('layout/plugins/iCheck/square/blue.css') }}">

    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition register-page">
<div class="register-box">
    <div class="register-logo">
        <a href="#"><b>Nome do </b>SOFTWARE</a>
    </div>

    <div class="register-box-body">
        <p class="login-box-msg">Registrar novo usuário</p>

        {!! Form::open(['route'=> 'registrar', 'method' => 'post']) !!}
        <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="Nome completo" name="name">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
            <input type="text" class="form-control input-positive" placeholder="Porcentagem de comissão" name="porcentagem_comissao">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
            <input type="email" class="form-control" placeholder="Email" name="email">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Senha" name="password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Repita a senha" name="password2">
            <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
        </div>

        <label class="form-group has-feedback">
                                                        <span class="block input-icon input-icon-right">
                                                            <select class="form-control select2" name="tipo">
                                                            <option value="vendedor">Vendedor</option>
                                                            <option value="gerente">Gerente</option>
                                                        </select>
                                                            <i class="ace-icon fa fa-retweet"></i>
                                                        </span>
        </label>
        <div class="row">
            <div class="col-xs-4">
                <button type="submit" class="btn btn-primary btn-block btn-flat">Salvar</button>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>

<script src="{{ asset('layout/bower_components/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('layout/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('layout/plugins/iCheck/icheck.min.js') }}"></script>
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' /* optional */
        });
    });
</script>
</body>
</html>

@endsection