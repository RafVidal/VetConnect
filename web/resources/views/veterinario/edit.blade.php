@extends('layout')

@section('content')

<div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edição do Veterinário</h6>
        </div>
    <div class="card-body">
<div class="row"">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Veterinário</h2>
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

    <form action="{{ route('veterinario.update',$veterinario->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-row col-xs-12 col-sm-12 col-md-12">
            <div class="form-group col-md-6">
                <strong>Nome:</strong>
                <input type="text" name="nome" value="{{ $veterinario->nome }}" class="form-control" placeholder="Nome">
            </div>
            <div class="form-group col-md-6">
                <strong>Telefone:</strong>
                <input type="text" name="telefone" value="{{ $veterinario->telefone }}" class="form-control" placeholder="Telefone">
            </div>
        </div>

        <div class="form-row col-xs-12 col-sm-12 col-md-12">
            <div class="form-group col-md-6">
                <strong>Cidade:</strong>
                <input type="text" name="cidade" value="{{ $veterinario->cidade }}" class="form-control" placeholder="Nome">
            </div>
            <div class="form-group col-md-6">
                <strong>Estado:</strong>
                <input type="text" name="estado" value="{{ $veterinario->estado }}" class="form-control" placeholder="Telefone">
            </div>
        </div>

        <div class="form-row col-xs-12 col-sm-12 col-md-12">
            <div class="form-group col-md-6">
                <strong>CEP:</strong>
                <input type="text" name="CEP" value="{{ $veterinario->CEP }}" class="form-control" placeholder="Nome">
            </div>
            <div class="form-group col-md-6">
                <strong>Bairro:</strong>
                <input type="text" name="bairro" value="{{ $veterinario->bairro }}" class="form-control" placeholder="Telefone">
            </div>
        </div>

        <div class="form-row col-xs-12 col-sm-12 col-md-12">
            <div class="form-group col-md-6">
                <strong>Rua:</strong>
                <input type="text" name="rua" value="{{ $veterinario->rua }}" class="form-control" placeholder="Nome">
            </div>
            <div class="form-group col-md-6">
                <strong>Número</strong>
                <input type="text" name="numero" value="{{ $veterinario->numero }}" class="form-control" placeholder="Telefone">
            </div>
        </div>

        <div class="form-row col-xs-12 col-sm-12 col-md-12">
            <div class="form-group col-md-6">
                <strong>Complemento:</strong>
                <input type="text" name="complemento" value="{{ $veterinario->complemento}}" class="form-control" placeholder="Nome">
            </div>
            <div class="form-group col-md-6 sele">
                <strong>Atende em domicílio: </strong>
                <select name="atende_domiciliar" class="custom-select">
                    <option> ... </option>
                    <option> Sim </option>
                    <option> Não </option>
                </select>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group ">
                <strong>Descrição:</strong>
                <textarea class="form-control" style="height:40px" name="descricao" placeholder="Insira a descrição"> {{ $veterinario->descricao}} </textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <a class="btn btn-primary" href="{{ route('veterinario.index') }}"> Voltar</a>
                <button type="submit" class="btn btn-primary">Atualizar</button>
        </div>
    </div>
            </form>
@endsection
