@extends('layout_users')

@section('content')

<!-- Para inclusão do calendário -->
<link href="/css/bootstrap-datetimepicker.min.css" rel="stylesheet">

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Inserção de Pet</h6>
    </div>
<div class="card-body">
<div class="row"">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Inserindo um novo Pet: </h2>
        </div>
    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Ops!</strong> Houve alguns problemas com os dados inseridos.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('animal.store') }}" method="POST" class="container was-validated" novalidate="" enctype="multipart/form-data">
    @csrf

    <div class="row">

        <strong style="margin-left: 13px;">Foto do animal:</strong>
        <div class="form-row col-xs-12 col-sm-12 col-md-12">
            <div style="margin-left: 6px;" class="form-group col-md-6">
                <input type="file" name="img_pet" id="img_pet" class="form-control wd is-valid custom-file-input" required>
                <label class="custom-file-label" for="img_pet">Escolha a foto</label>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group ">
                <strong>Nome:</strong>
                <input type="text" name="nome" class="form-control is-valid" placeholder="Insira o nome do pet" required>
            </div>
        </div>

        <div class="form-row col-xs-12 col-sm-12 col-md-12">
            <div class="form-group col-md-6">
                <strong> Espécie: </strong>
                <select name="especie" class="custom-select" required>
                    <option value=""> ... </option>
                    <option> Cachorro </option>
                    <option> Gato </option>
                    <option> Furão </option>
                    <option> Pássaro </option>
                    <option> Réptil </option>
                    <option> Outra </option>
                </select>
            </div>
            <div class="form-group col-md-6">
                <strong>Raça:</strong>
                <input type="text" name="raca" class="form-control is-valid" placeholder="Raça" required>
            </div>
        </div>

       <div class="form-row col-xs-12 col-sm-12 col-md-12">
        <div class="form-group col-md-6">
            <strong> Sexo: </strong>
            <select name="sexo" class="custom-select" required>
                <option value=""> ... </option>
                <option> Macho </option>
                <option> Fêmea </option>
            </select>
        </div>
            <div class="form-group col-md-6">
                <strong>Cor:</strong>
                <input type="text" name="cor" class="form-control is-valid" placeholder="Cor" required>
            </div>
       </div>

        <div class="form-row col-xs-12 col-sm-12 col-md-12">
            <div class="form-group col-md-6">
                <strong>Nascimento:</strong>
                <input type="text" name="nascimento" class="form-control date wd is-valid" placeholder="dd/mm/aaaa" onkeypress="$(this).mask('00/00/0000');"  required>
                <script type="text/javascript">
                $('.date').datepicker({
                    format: 'dd/mm/aaaa',
                    numberOfMonths: 1,
                    dayNames: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sabado'],
                    dayNamesMin: ['D', 'S', 'T', 'Q', 'Q', 'S', 'S'],
                    dayNamesShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab'],
                    monthNames: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
                    monthNamesShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
                })
                </script>
            </div>
        </div>

        <div class="form-row col-xs-12 col-sm-12 col-md-12">
            <div class="form-group col-md-6">
                <strong>Cliente ID:</strong>
                <input type="text" name="cliente_id" id="cliente_id" class="form-control is-valid" placeholder="ID do cliente" required>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <a class="btn btn-primary" href="{{ route('animal.index') }}"> Voltar</a>
                <button type="submit" class="btn btn-primary">Cadastrar</button>
        </div>
    </div>

</form>
@endsection
