<!DOCTYPE html>
<html>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap" rel="stylesheet">

    <style>
        body{
            font-family: Roboto;
        }
    </style>
    <body style="background-color:#000; color:#fff; padding: 5%">
        <div style="
            width: 100%;
            background-color: #000;
            color: #FFF;
            text-align: center">
            <h1>
                ILÍCITOS TEATRO
            </h1>
        </div>
        <div style="
            width: 80%;
            background-color: #fff;
            color: #000;
            padding: 5% 10%">
            <h1>Atenção...</h1>
            <p>Foi solicitada a alteração de senha para sua conta na plataforma Ilícitos. Se não foi você, por favor, entrar em contato com o administrador!
            </p>
            <span style="display:block">
                Clique em <b>Prosseguir</b> para alterar sua senha!
            </span>
            <a href="{{route('password.reset', $token)}}" style="background-color:#000; color:#fff; padding: 2%; display:block;text-align:center">
                <h3>Prosseguir</h3>
            </a>

            <small style="display:block">
                Se estiver com problemas para vizualizar esta mensagem, clique no link:
            </small style="display:block">
            <small>
                {{route('password.reset', $token)}}
            </small>
        </div>
    </body>
</html>
