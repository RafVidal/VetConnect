<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vet Connect</title>
    <link rel="stylesheet" href="/css/estilo.css">
</head>

<body>
    <a href="/">Voltar</a>
    <div class="container">
        <div class="card">
            <h1>Cadastre seus dados</h1>

            <div class="label-float">
                <input style="width: 100%" type="text" id="nome" placeholder="Nome">
            </div>
            <br>
            <div class="label-float">
                <input style="width: 100%" type="email" id="email" placeholder="Email">
            </div>
            <br>
            <div class="label-float">
                <input style="width: 100%" type="tel" id="telefone" placeholder="Telefone">
            </div>
            <br>
            <div class="label-float">
                <input style="width: 100%" type="text" id="descricao" placeholder="Descrição (Informações adicionais)">
            </div>
            <br>
            <div class="label-float">
                <input style="width: 100%" type="text" id="senha" placeholder="Senha">

            </div>
            <br>
            <div class="label-float">
                <input style="width: 100%" type="text" id="senha" placeholder="Confirmar Senha">
            </div>
<br>
            <div class="justify-center">
                <a style="background-color: #5E57B1;
                color: black;
                padding: 10px;
                font-weight: bold;
                font-size: 12pt;
                margin-top: 30px;
                border-radius: 18px;
                width: 80%;
                box-shadow: 3px 3px 1px 0px #000000;"
                href="/localizacao">Próxima etapa</a>
            </div>

            <div class="justify-center">
                <hr>
            </div>

            <div>
                <p>Já possui uma conta ?
                    <a href="/api/login"> Logar</a>
                </p>
            </div>


        </div>
    </div>
</body>
</html>
