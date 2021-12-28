@extends('layout')

@section('content')

<!-- Para inclusão do calendário -->
<link href="/css/bootstrap-datetimepicker.min.css" rel="stylesheet">

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Inserção de Veterinário</h6>
    </div>
<div class="card-body">
<div class="row"">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Inserindo um novo veterinário: </h2>
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

<form action="{{ route('veterinario.store') }}" method="POST" class="container" novalidate="" enctype="multipart/form-data">
    @csrf

    <div class="row">
        <div class="form-row col-xs-12 col-sm-12 col-md-12">
            <div class="form-group col-md-6">
                <strong>Nome:</strong>
                <input type="text" name="nome" class="form-control is-valid" placeholder="Nome" required>
            </div>
            <div class="form-group col-md-6">
                <strong>Telefone:</strong>
                <input type="text" name="telefone" class="form-control is-valid" placeholder="Telefone" required>
            </div>
        </div>

        <div class="form-row col-xs-12 col-sm-12 col-md-12">
            <div class="form-group col-md-6">
                <strong>Cidade:</strong>
                <input type="text" name="cidade" class="form-control is-valid" placeholder="Cidade" required>
            </div>
            <div class="form-group col-md-6">
                <strong> Estado </strong>
                <select name="estado" class="custom-select" required>
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
            </div>
        </div>

        <div class="form-row col-xs-12 col-sm-12 col-md-12">
            <div class="form-group col-md-6">
                <strong>CEP:</strong>
                <input type="text" name="CEP" class="form-control is-valid" placeholder="CEP" required>
            </div>
            <div class="form-group col-md-6">
                <strong>Bairro:</strong>
                <input type="text" name="bairro" class="form-control is-valid" placeholder="Bairro" required>
            </div>
        </div>

        <div class="form-row col-xs-12 col-sm-12 col-md-12">
            <div class="form-group col-md-6">
                <strong>Rua:</strong>
                <input type="text" name="rua" class="form-control is-valid" placeholder="Rua" required>
            </div>
            <div class="form-group col-md-6">
                <strong>Número:</strong>
                <input type="text" name="numero" class="form-control" placeholder="Número (opcional)">
            </div>
        </div>

        <div class="form-row col-xs-12 col-sm-12 col-md-12">
            <div class="form-group col-md-6">
                <strong>Complemento:</strong>
                <input type="text" name="complemento" class="form-control" placeholder="Complemento (opcional)">
            </div>
            <div class="form-group col-md-6">
                <strong> Atende em domicílio: </strong>
                <select name="atende_domiciliar" class="custom-select">
                    <option> ... </option>
                    <option> Sim </option>
                    <option> Não </option>
                </select>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Descrição:</strong>
                <textarea class="form-control is-valid" style="height:45px" name="descricao" placeholder="Insira a descrição" required></textarea>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <a class="btn btn-primary" href="{{ route('veterinario.index') }}"> Voltar</a>
                <button type="submit" class="btn btn-primary">Cadastrar</button>
        </div>
    </div>

</form>
@endsection
