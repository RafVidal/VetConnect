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
    <a href="/cadastro">Voltar</a>
    <div class="container">
        <div class="card">
            <h1>Localização <br>Veterinário/Clinica</h1>


            <div class="label-float">
                <select style=" width: 35%;" name="estado" id="estado">
                    <option> Estado </option>
                    <option> AC </option>
                    <option> AL </option>
                    <option> AP </option>
                    <option> AM </option>
                    <option> BA </option>
                    <option> CE </option>
                    <option> DF </option>
                    <option> ES </option>
                    <option> GO </option>
                    <option> MA </option>
                    <option> MT </option>
                    <option> MS </option>
                    <option> MG </option>
                    <option> PA </option>
                    <option> PB </option>
                    <option> PR </option>
                    <option> PE </option>
                    <option> PI </option>
                    <option> RJ </option>
                    <option> RN </option>
                    <option> RS </option>
                    <option> RO </option>
                    <option> RR </option>
                    <option> SC </option>
                    <option> SP </option>
                    <option> SE </option>
                    <option> TO </option>
                </select>
                <input style="width: 63%;" type="text" id="cidade" placeholder="Cidade">
            </div>
            <br>
            <div class="label-float">
                <input style="width: 100%" type="text" id="cep" placeholder="CEP">
            </div>
        <br>
            <div class="label-float">
                <input style="width: 49%" type="text" id="rua" placeholder="Rua">
                <input style="width: 49%" type="text" id="numero" placeholder="Número">
            </div>
        <br>
            <div class="label-float">
                <input style="width: 49%" type="text" id="bairro" placeholder="Bairro">
                <input style="width: 49%" type="text" id="complemento" placeholder="Complemento">
            </div>
        <br>
            <div>
                <label for="atende_domiciliar"> Atende à domicílio:</label>
                <br>
                <input type="checkbox" id="btn1" placeholder="">
            </div>

            <div class="justify-center">
                <a style="background-color: #5E57B1;
                color: black;
                padding: 10px;
                font-weight: bold;
                font-size: 12pt;
                margin-top: 30px;
                border-radius: 18px;
                width: 60%;
                box-shadow: 3px 3px 1px 0px #000000;"
                href="/">Finalizar Cadastro</a>
            </div>

            <div class="justify-center">
                <hr>
            </div>

            <div>
                <p>Já possui uma conta ?
                    <a href="/api/login"> Entrar</a>
                </p>
            </div>

        </div>
    </div>
</body>
</html>
