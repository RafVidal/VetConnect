@extends('layout_users')

@section('content')

<div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edição do Pet</h6>
        </div>
    <div class="card-body">
<div class="row"">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Pet</h2>
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

    <form action="{{ route('cliente.animal.update',$animal->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nome:</strong>
                <input type="text" name="nome" value="{{ $animal->nome }}" class="form-control" placeholder="Nome">
            </div>
        </div>
        <div class="form-row col-xs-12 col-sm-12 col-md-12">
            <div class="form-group col-md-6 sele">
                <strong> Espécie: </strong>
                <select name="especie" class="custom-select">
                    <option> Espécies... </option>
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
                <input type="text" name="raca" value="{{ $animal->raca }}" class="form-control" placeholder="Telefone">
            </div>
        </div>
        <div class="form-row col-xs-12 col-sm-12 col-md-12">
            <div class="form-group col-md-6 sele">
                <strong> Sexo: </strong>
                <select name="sexo" class="custom-select">
                    <option> ... </option>
                    <option> Macho </option>
                    <option> Fêmea </option>
                </select>
            </div>
            <div class="form-group col-md-6">
                <strong>Cor:</strong>
                <input type="text" name="cor" value="{{ $animal->cor }}" class="form-control" placeholder="Telefone">
            </div>
        </div>

        <div class="form-row col-xs-12 col-sm-12 col-md-12">
            <div class="form-group col-md-6">
                <strong>Nascimento:</strong>
                <input type="text" name="nascimento" value="{{ $animal->nascimento }}" class="form-control date wd" placeholder="dd/mm/aaaa" onkeypress="$(this).mask('00/00/0000');">
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
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <a class="btn btn-primary" href="{{ route('cliente.animal.index') }}"> Voltar</a>
                <button type="submit" class="btn btn-primary">Atualizar</button>
        </div>
    </div>
            </form>
@endsection
