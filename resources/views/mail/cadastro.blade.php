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
            <h1>Comemoremos...</h1>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque nec velit sit amet nisl feugiat pulvinar vel in lectus. Suspendisse eget magna sit amet purus ultrices elementum laoreet non urna. Nulla sit amet magna viverra, pretium lorem at, gravida tortor. Nulla sagittis nisi et risus gravida aliquam. Aliquam erat volutpat. Vivamus nec blandit arcu. Ut iaculis velit massa, sed faucibus neque maximus eu. Nunc et odio non neque euismod sagittis. Praesent sit amet quam leo. Quisque eu nisl sed augue faucibus gravida.

                Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Proin a dui in erat dignissim condimentum. Integer id mi ut ante efficitur facilisis. Duis lacus tortor, dignissim vel blandit sit amet, finibus id mauris. Interdum et malesuada fames ac ante ipsum primis in faucibus. Phasellus faucibus bibendum suscipit. Sed vestibulum blandit efficitur. Sed eros velit, mollis in pharetra at, vehicula id turpis. Praesent lobortis velit a erat pulvinar, a blandit arcu congue. Sed in dignissim velit. Curabitur facilisis mollis eros in ultrices.
            </p>
            <span style="display:block">
                Clique em <b>Prosseguir</b> para confirmar sua posição!
            </span>
            <a href="{{URL::to('/').'/user/create/'.$hash}}" style="background-color:#000; color:#fff; padding: 2%; display:block;text-align:center">
                <h3>Prosseguir</h3>
            </a>

            <small style="display:block">
                Se estiver com problemas para vizualizar esta mensagem, clique no link:
            </small style="display:block">
            <small>
                {{URL::to('/').'user/create/'.$hash}}
            </small>
        </div>
    </body>
</html>
